<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use OneLogin\Saml2\Auth as Saml2Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\DataProcessingAcceptance;
use App\Services\AuthAuditService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SAMLController extends Controller
{
    /**
     * Redirige al usuario al login de Microsoft Entra ID (SAML2)
     */
    public function login()
    {
        $saml = new Saml2Auth(config('saml2'));

        return redirect($saml->login(null, [], false, false, true));
    }

    /**
     * Endpoint donde Azure/Entra envía el Assertion (ACS)
     */
    public function acs(Request $request)
    {
        try {
            $saml = new Saml2Auth(config('saml2'));
            $saml->processResponse();

            if ($saml->getErrors()) {
                AuthAuditService::log(
                    'login_failed',
                    $request,
                    null,
                    null,
                    false,
                    'SAML Response Error: ' . implode(', ', $saml->getErrors())
                );

                return response()->json([
                    'error' => 'SAML Response Error',
                    'details' => $saml->getErrors()
                ], 400);
            }

            if (!$saml->isAuthenticated()) {
                AuthAuditService::log(
                    'login_failed',
                    $request,
                    null,
                    null,
                    false,
                    'Usuario no autenticado por el IdP'
                );

                return redirect()->route('login')->withErrors(['No autenticado por el IdP']);
            }

            $attributes = $saml->getAttributes();

            $email = $attributes['http://schemas.xmlsoap.org/ws/2005/05/identity/claims/emailaddress'][0] ?? null;
            $name  = $attributes['http://schemas.xmlsoap.org/ws/2005/05/identity/claims/name'][0] ?? 'Usuario Microsoft';

            if (!$email) {
                AuthAuditService::log(
                    'login_failed',
                    $request,
                    null,
                    null,
                    false,
                    'Azure no envió el atributo email'
                );

                return response()->json([
                    'error' => 'Azure no envió el atributo email'
                ], 400);
            }

            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'password' => Hash::make(Str::random(32)),
                    'email_verified_at' => now(),
                ]
            );

            $user->update([
                'name' => $name,
                'email_verified_at' => $user->email_verified_at ?? now(),
            ]);

            DB::transaction(function () use ($user, $request) {

                if (session('data_policy_accepted')) {

                    $policyVersion = session('data_policy_version', 'v1.0');

                    $alreadyAccepted = DataProcessingAcceptance::where('user_id', $user->id)
                        ->where('policy_version', $policyVersion)
                        ->where('accepted', true)
                        ->exists();

                    if (!$alreadyAccepted) {
                        DataProcessingAcceptance::create([
                            'user_id' => $user->id,
                            'email' => $user->email,
                            'accepted' => true,
                            'policy_version' => $policyVersion,
                            'accepted_at' => session('data_policy_accepted_at', now()),
                            'ip_address' => session('data_policy_ip', $request->ip()),
                            'user_agent' => session('data_policy_user_agent', $request->userAgent()),
                        ]);
                    }

                    AuthAuditService::log(
                        'data_policy_accepted',
                        $request,
                        $user,
                        $user->email,
                        true,
                        null,
                        [
                            'policy_version' => $policyVersion,
                            'already_accepted' => $alreadyAccepted,
                        ]
                    );

                    session()->forget([
                        'data_policy_accepted',
                        'data_policy_accepted_at',
                        'data_policy_version',
                        'data_policy_ip',
                        'data_policy_user_agent',
                    ]);
                }

                AuthAuditService::log(
                    'login_success',
                    $request,
                    $user,
                    $user->email,
                    true
                );
            });

            Auth::login($user);

            return redirect('/aquiempiezatodo');
        } catch (\Throwable $e) {

            AuthAuditService::log(
                'login_failed',
                $request,
                null,
                null,
                false,
                $e->getMessage()
            );

            throw $e;
        }
    }

    /**
     * Metadata para que el IdP (Azure) registre la App
     */
    public function metadata()
    {
        $saml = new Saml2Auth(config('saml2'));
        $metadata = $saml->getSettings()->getSPMetadata();

        return response($metadata, 200, ['Content-Type' => 'text/xml']);
    }

    /**
     * Logout SP → IdP
     */
    public function logout()
    {
        $user = Auth::user();

        if ($user) {
            AuthAuditService::log(
                'logout',
                request(),
                $user,
                $user->email,
                true
            );
        }

        $saml = new Saml2Auth(config('saml2'));
        $logoutUrl = $saml->logout(null, [], null, null, true);

        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect($logoutUrl);
    }

    /**
     * Endpoint para logout de retorno del IdP
     */
    public function sls()
    {
        $saml = new Saml2Auth(config('saml2'));
        $saml->processSLO();

        return redirect('/');
    }
}
