<?php

namespace App\Livewire\Admin;
use App\Models\Event;
use Livewire\Component;

class AddEvent extends Component
{

    public function render()
    {
        return view('livewire.admin.add-event');
    }
    public $title;
    public $description;
    public $date;
    public $eventId;
    public $events = [];
    public $showModal = false;
    public $isEditing = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:500',
        'date' => 'required|date',
    ];


    public function mount()
    {
        $this->fetchEvents();
    }

    public function fetchEvents()
    {

        $this->events = Event::orderBy('date', 'asc')->get();
    }

    public function openModal()
    {
        $this->reset(['title', 'description', 'date', 'eventId']);
        $this->isEditing = false;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }


    public function saveEvent()
    {
        $this->validate();

        if ($this->isEditing) {

            $event = Event::find($this->eventId);
            $event->update([
                'title' => $this->title,
                'description' => $this->description,
                'date' => $this->date,
            ]);
            session()->flash('success', 'Event updated successfully!');
        } else {

            Event::create([
                'title' => $this->title,
                'description' => $this->description,
                'date' => $this->date,
            ]);
            session()->flash('success', 'Event added successfully!');
        }


        $this->fetchEvents();


        $this->closeModal();
    }


    public function editEvent($eventId)
    {
        $event = Event::find($eventId);
        $this->eventId = $event->id;
        $this->title = $event->title;
        $this->description = $event->description;
        $this->date = $event->date;
        $this->isEditing = true;
        $this->showModal = true;
    }


    public function deleteEvent($eventId)
    {
        Event::find($eventId)->delete();
        session()->flash('success', 'Event deleted successfully!');
        $this->fetchEvents();
    }

}
