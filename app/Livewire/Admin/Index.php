<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Event;
use Livewire\Component;

class Index extends Component
{
    public $newRegisterCount;
    public $newsUpdateCount;
    public $alumniCount;

    public function mount()
    {

        $this->newRegisterCount = User::count();


        $this->newsUpdateCount = Event::All()->count();


        $this->alumniCount = User::where('is_approved', true)->count();
    }

    public function render()
    {
        return view('livewire.admin.index');
    }
}
