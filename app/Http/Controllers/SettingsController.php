<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // Get the authenticated user's email
        $name = Auth::user()->name;
        $email = Auth::user()->email;

        // Dummy data for subscription (replace with your own data)
        $subscriptionStatus = 'active';
        $subscriptionStartDate = '2024-01-01';
        $subscriptionEndDate = '2025-01-01';
        $subscriptionType = 'Premium';
        $subscriptionFeatures = 'Unlimited access to premium features';

        // Available languages
        $languages = ['english', 'french', 'spanish'];

        // Default preferred language (replace with user's preferred language)
        $preferredLanguage = 'french';

        // Return the view with the data
        return view('reuniones.parametre', compact('name', 'email', 'subscriptionStatus', 'subscriptionStartDate', 'subscriptionEndDate', 'subscriptionType', 'subscriptionFeatures', 'languages', 'preferredLanguage'));
    }

    public function update(Request $request)
    {
        // Get the authenticated user's ID
        $userId = Auth::id();
    
        // Validate the request data
        $validatedData = $request->validate([
            'language' => 'required|string|in:english,french,spanish',
        ]);
    
        // Update the preferred language for the user with the authenticated user's ID
        $affectedRows = User::where('id', $userId)->update(['preferred_language' => $validatedData['language']]);
    
        if ($affectedRows > 0) {
            // Language updated successfully
            return redirect()->back()->with('success', 'Preferred language updated successfully.');
        } else {
            // Handle if the update operation fails
            return redirect()->back()->with('error', 'Failed to update preferred language.');
        }
    }
    
}
