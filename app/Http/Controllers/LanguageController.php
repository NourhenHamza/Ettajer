<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\LanguageHelper;

class LanguageController extends Controller
{
    // Show all languages
    public function index()
    {
        $languages = Language::all();
        return view('languages.index', compact('languages'));
    }

    // Show the form to create a new language
    public function create()
    {
        return view('languages.create');
    }

    // Store a new language in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:languages,code',
            'name' => 'required',
            'native_name' => 'required',
        ]);

        Language::create($validatedData);

        return redirect()->route('languages.index')->with('success', 'Language created successfully.');
    }

    // Show the form to edit an existing language
    public function edit(Language $language)
    {
        return view('languages.edit', compact('language'));
    }

    // Update an existing language in the database
    public function update(Request $request, Language $language)
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:languages,code,' . $language->id,
            'name' => 'required',
            'native_name' => 'required',
        ]);

        $language->update($validatedData);

        return redirect()->route('languages.index')->with('success', 'Language updated successfully.');
    }

    // Delete an existing language from the database
    public function destroy(Language $language)
    {
        $language->delete();

        return redirect()->route('languages.index')->with('success', 'Language deleted successfully.');
    }

    // Switch language
   // Switch language
public function switchLang($lang)
{
    $languages = array_keys(LanguageHelper::getAvailableLanguages());
    
    if (in_array($lang, $languages)) {
        Session::put('locale', $lang); // Store the language in the session
    } else {
        Session::put('locale', 'en'); // Default to English if language not found
    }

    return redirect()->back(); // Redirect back to the previous page
}


    // Get all languages for the dropdown
    public static function getAllLanguages()
    {
        return Language::all();
    }
}
