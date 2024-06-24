<?php

namespace App\Livewire\Public;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Connexion extends Component
{
    public $email;
    public $password;
    public $remember = false;
    public $loading = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    protected $messages = [
        'email.required' => 'Le champ email est requis.',
        'email.email' => 'Veuillez entrer une adresse email valide.',
        'password.required' => 'Le champ mot de passe est requis.',
    ];

    public function submit()
    {
        $this->loading = true;
        $this->validate();

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->addError('login', 'Email ou mot de passe incorrect.');
            $this->loading = false;
            return;
        }

        session()->regenerate();        
        session()->flash('success', 'Connexion réussie !');

        return redirect()->route('ontologies.index');
    }


    public function render()
    {
        return view('livewire.public.connexion');
    }
}
