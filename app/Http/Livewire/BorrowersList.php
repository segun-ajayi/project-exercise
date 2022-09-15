<?php

namespace App\Http\Livewire;

use App\Borrower;
use App\Notifications\BorrowerCreated;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class BorrowersList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $showModal = false, $email, $dob, $monthly_sales, $monthly_expenses, $view = false, $borrower;

    private function setView($borrower) {
        $this->email = $borrower->email;
        $this->dob = $borrower->dob;
        $this->monthly_sales = $borrower->monthly_sales;
        $this->monthly_expenses = $borrower->monthly_expenses;
        $this->borrower = $borrower;
    }

    public function view(Borrower $borrower) {
        $this->setView($borrower);
    }

    public function edit(Borrower $borrower) {
        $this->setView($borrower);
        $this->view = true;
    }

    public function save() {
        $this->validate([
            'email' => 'email|required',
            'dob' => 'date|required',
            'monthly_sales' => 'numeric|required',
            'monthly_expenses' => 'numeric|required'
        ]);

        $this->borrower->update([
            'email' => $this->email,
            'dob' => $this->dob,
            'monthly_sales' => $this->monthly_sales,
            'monthly_expenses' => $this->monthly_expenses
        ]);

        $this->emit('closeModal', 'bd-example-modal-lg');

    }

    public function delete(Borrower $borrower) {
        $borrower->delete();
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

        $this->emit('closeModal', 'showModal');
    }

    public function render()
    {
        return view('livewire.borrowers-list', [
            'borrowers' => Borrower::paginate(10)
        ]);
    }
}
