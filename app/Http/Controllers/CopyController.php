<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CopyController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function generate(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string',
            'audience' => 'required|string',
        ]);

        $prompt = "Generate 3 elements of marketing copy for the product '{$request->product_name}' for an audience of '{$request->audience}':
        1. Subject line (short, catchy).
        2. Headline (engaging).
        3. Short description (max 40 words).
        Return in JSON with keys: subject_line, headline, description.";

            // Call Gemini API with X-goog-api-key header
            $response = Http::withHeaders([
                'X-goog-api-key' => env('GEMINI_API_KEY'),
            ])->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent', [
                'contents' => [
                    ['parts' => [['text' => $prompt]]]
                ]
            ]);

        $result = null;
        if ($response->successful()) {

            $text = $response->json('candidates.0.content.parts.0.text');

            // Remove 'json\n' at the beginning and '\n' at the end
            $text = preg_replace('/^```json\\n/', '', $text);
            $text = preg_replace('/```\\n$/', '', $text);
            $result = json_decode($text, true);
        } else {
            $result = ['error' => 'Failed to generate content. Please try again.'];
            dump($result);
        }

        return view('form', [
            'result' => $result,
            'product_name' => $request->product_name,
            'audience' => $request->audience
        ]);
    }
}
