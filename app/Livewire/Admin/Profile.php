<?php

namespace App\Livewire\Admin;

use App\Models\Profile as pro;
use Livewire\Component;

class Profile extends Component
{
    public $alumniProfiles;

    public function mount()
    {

        $this->alumniProfiles = pro::all();
    }

    public function render()
    {
        return view('livewire.admin.profile');
    }
}
