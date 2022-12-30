<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AcountController extends Controller
{
    public function __invoke($id = 'My')
    {
        if($id == 'My')
            return Inertia::render('Account/Details',['isUser' => true]);    
        else
            return Inertia::render('Account/Details',['isUser' => false]);
    }
}
