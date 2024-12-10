<?php

namespace App\Livewire\User;

use App\Models\Event;
use Livewire\Component;

class News extends Component
{
    public function render()
    {

        $events = Event::all();

        return view('livewire.user.news', compact('events'));
    }
}
