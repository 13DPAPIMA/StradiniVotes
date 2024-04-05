<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function create()
    {
        // Здесь мы можем вернуть представление с формой создания голосования
        return view('votes.create');
    }
}