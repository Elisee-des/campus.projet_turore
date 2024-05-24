<?php

namespace App\Livewire\Public;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('connexion')->with('success', 'Déconnexion réussie.');
    }

    public function render()
    {
        return view('livewire.public.logout');
    }
}
