<?php

namespace App\Http\Controllers;

use App\Borrower;
use Illuminate\Http\Request;

class BorrowerController extends Controller
{
        public function index () {
            return view('borrowers');
        }
}
