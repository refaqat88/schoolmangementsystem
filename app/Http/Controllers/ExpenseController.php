<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;
use DateTime;
class ExpenseController extends Controller
{

    
    public function suppler()
    {

        return view('accountPortal.expense.suppler');
    
    }
    

    public function expense()
    {
        return view('accountPortal.expense.expense_general');
    }


}
