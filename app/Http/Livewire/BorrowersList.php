<?php

namespace App\Http\Livewire;

use App\Borrower;
use App\Notifications\BorrowerCreated;
use Carbon\Carbon;
use Livewire\Component;

class BorrowersList extends Component
{
    public $borrowers, $showModal = false, $email, $dob;

    public function mount() {
        $this->borrowers = Borrower::all();
    }

    public function add() {
        $this->showModal = true;
        dd('fff');
    }

    public function create() {
        $this->showModal = true;

        // run validation
        $this->validate([
            'email' => 'email|required',
            'dob' => 'date|required'
        ]);

        $step = 4;
        $steps = [];

        $dob = Carbon::parse($this->dob)->format('Y-m-d');

        // generate steps array
        for ($i = 0; $i < 5; $i++) {
            array_push($steps, random_int(0, 99));
        }

        //write to database
        $borrower = Borrower::create([
            'email' => $this->email,
            'dob' => $dob,
            'step' => $step,
            'steps' => json_encode($steps)
        ]);

        $borrower->notify(new BorrowerCreated());
    }

    public function render()
    {
        return view('livewire.borrowers-list');
    }
}
