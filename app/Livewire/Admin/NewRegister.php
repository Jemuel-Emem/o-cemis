<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class NewRegister extends Component
{
    public function approve($userId)
    {

        $user = User::find($userId);
        if ($user) {
            $user->is_approved = true;
            $user->save();

            session()->flash('message', 'User approved successfully!');
        }
    }

    public function decline($userId)
    {

        $user = User::find($userId);
        if ($user) {
            $user->is_approved = false;
            $user->save();

            session()->flash('message', 'User declined successfully!');
        }
    }

    public function render()
    {

        $users = User::where('role', 0)->get();

        return view('livewire.admin.new-register', compact('users'));
    }
}
