<?php

namespace App\Livewire\User;

use App\Models\Profile;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Status extends Component
{
    public $profileExists;

    public function mount()
    {

        $this->profileExists = Profile::where('user_id', Auth::id())->exists();
    }

    public function render()
    {
        return view('livewire.user.status');
    }
}

