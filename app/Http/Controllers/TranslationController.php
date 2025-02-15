<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TranslationController extends Controller
{
    /**
     * Display a listing of translations.
     */
    public function index(Request $request)
    {
        $query = Translation::query();
        
        if ($request->has('key')) {
            $query->where('key', 'LIKE', "%{$request->key}%");
        }

        if ($request->has('locale')) {
            $query->where('locale', $request->locale);
        }

        if ($request->has('tags')) {
            $query->where('tags', 'LIKE', "%{$request->tags}%");
        }

        return response()->json($query->paginate(50));
    }

    /**
     * Store a newly created translation.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'key' => 'required|string|unique:translations,key',
            'value' => 'required|string',
            'locale' => 'required|string',
            'tags' => 'nullable|string',
        ]);

        $translation = Translation::create($validated);

        return response()->json($translation, 201);
    }

    /**
     * Display a single translation.
     */
    public function show(Translation $translation)
    {
        return response()->json($translation);
    }

    /**
     * Update an existing translation.
     */
    public function update(Request $request, Translation $translation)
    {
        $validated = $request->validate([
            'key' => 'string|unique:translations,key,' . $translation->id,
            'value' => 'string',
            'locale' => 'string',
            'tags' => 'nullable|string',
        ]);

        $translation->update($validated);

        return response()->json($translation);
    }

    /**
     * Remove the specified translation.
     */
    public function destroy(Translation $translation)
    {
        $translation->delete();

        return response()->json(['message' => 'Translation deleted successfully.'], 200);
    }

    /**
     * Export all translations as JSON.
     */
    public function export()
    {
        $translations = Cache::remember('translations_export', 300, function () {
            return Translation::all();
        });

        return response()->json($translations);
    }
}
