<?php

namespace App\Livewire\User;

use App\Models\Profile as prof;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    public $name;
    public $phone;
    public $number;
    public $graduation_year;
    public $program;
    public $occupation;
    public $address;
    public $linkedin;
    public $skills;
    public $achievements;
    public $profile;




    protected $rules = [
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'graduation_year' => 'required|integer|between:1980,2024',
        'program' => 'required|string|max:255',
        'occupation' => 'nullable|string|max:255',
        'address' => 'required|string|max:500',
        'linkedin' => 'nullable|url|max:255',
        'skills' => 'nullable|string|max:500',
        'achievements' => 'nullable|string|max:1000',
    ];


    public function mount()
    {
        // Load the profile if it exists
        $this->profile = prof::where('user_id', Auth::id())->first();

        // Pre-fill the form fields with the profile data if it exists
        if ($this->profile) {
            $this->name = $this->profile->name;
            $this->phone = $this->profile->phone;
            $this->graduation_year = $this->profile->graduation_year;
            $this->program = $this->profile->program;
            $this->occupation = $this->profile->occupation;
            $this->address = $this->profile->address;
            $this->linkedin = $this->profile->linkedin;
            $this->skills = $this->profile->skills;
            $this->achievements = $this->profile->achievements;
        }
    }

    public function submit()
    {
        $this->validate();


        prof::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'name' => $this->name,
                'phone' => $this->phone,
                'graduation_year' => $this->graduation_year,
                'program' => $this->program,
                'occupation' => $this->occupation,
                'address' => $this->address,
                'linkedin' => $this->linkedin,
                'skills' => $this->skills,
                'achievements' => $this->achievements,
            ]
        );

        session()->flash('message', 'Profile saved successfully.');
    }

    public function render()
    {
        return view('livewire.user.profile');
    }
}
