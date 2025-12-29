<?php

namespace App\Http\Controllers;

use App\Models\SectionRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionRatingController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'section_key' => ['required', 'string', 'max:80'],
            'rating'      => ['required', 'integer', 'min:1', 'max:5'],
        ]);

        $userId = Auth::id();

        SectionRating::updateOrCreate(
            ['section_key' => $data['section_key'], 'user_id' => $userId],
            [
                'rating' => $data['rating'],
                'ip_address' => $request->ip(),
                'user_agent' => substr((string) $request->userAgent(), 0, 2000),
            ]
        );

        return response()->json(['ok' => true]);
    }


    public function show(Request $request)
    {
        $data = $request->validate([
            'section_key' => ['required', 'string', 'max:80'],
        ]);

        $rating = \App\Models\SectionRating::where('section_key', $data['section_key'])
            ->where('user_id', \Illuminate\Support\Facades\Auth::id())
            ->value('rating');

        return response()->json([
            'ok' => true,
            'rating' => $rating ?? 0,
        ]);
    }
}
