<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class VoteController extends Controller
{
    public function create()
    {
        return Inertia::render('CreateVote', [
            'status' => session('status'),
        ]);
    }
}