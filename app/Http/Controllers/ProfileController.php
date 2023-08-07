<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    
    public function uploadPhoto(Request $request)
    {

        //$users = User::all();
        $user = $request->user();

        $data = $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $uploadedImage = $request->file('photo');
        //dd($uploadedImage);
        



        if(request('photo')){
            $imagePath = request('photo')->store('avatar', 'public');
            $photo = Image::make(public_path("/storage/{$imagePath}"))->fit(800,800);
            $photo->save();

            $user->photo_path = $photo;
            // Mettre à jour le chemin de la photo dans la base de données
            $user->photo_path = "/storage/{$imagePath}";
            //dd($user->photo_path);
            $user->save();

            return redirect()->route('profile.edit')->with('status', 'Photo de profil mise à jour avec succès.');

        }else{
            return redirect()->route('profile.edit')->with('erreur', 'aucune photo n\'a été selectionné.');
        }
        //dd($request->all()) ;
        
    }



    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
