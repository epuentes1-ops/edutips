<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use OneLogin\Saml2\Auth as Saml2Auth;
use App\Http\Controllers\Controller;

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
        $saml = new Saml2Auth(config('saml2'));
        $saml->processResponse();

        if ($saml->getErrors()) {
            return response()->json([
                'error' => 'SAML Response Error',
                'details' => $saml->getErrors()
            ], 400);
        }

        if (!$saml->isAuthenticated()) {
            return redirect()->route('login')->withErrors(['No autenticado por el IdP']);
        }

        // Obtener datos del usuario desde Azure
        $attributes = $saml->getAttributes();
        $email = $attributes['http://schemas.xmlsoap.org/ws/2005/05/identity/claims/emailaddress'][0] ?? null;
        $name  = $attributes['http://schemas.xmlsoap.org/ws/2005/05/identity/claims/name'][0] ?? 'Usuario Microsoft';

        if (!$email) {
            return response()->json([
                'error' => 'Azure no envió el atributo email'
            ], 400);
        }

        // Crear o actualizar usuario local
        $user = \App\Models\User::updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'email_verified_at' => now(),
            ]
        );

        Auth::login($user);

        return redirect('/aquiempiezatodo');
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
        $saml = new Saml2Auth(config('saml2'));
        $logoutUrl = $saml->logout(null, [], null, null, true);

        Auth::logout();

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
