<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Vote;
use App\Models\VoteOption;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function create()
    {    
       


        return Inertia::render('CreateVote', [
            'status' => session('status'),
            'creator' => Auth::user()->email,
        ]);
        
    }

    public function store(Request $request)
    {
        
        $user = Auth::user();
    
        
        $validatedData = $request->validate([
            'title' => 'required|string|min:50|max:255',
            'description' => 'required|string|min:50|max:1000',
            'expiryDate' => 'required|date',
            'options' => 'required|array|min:1',
            'options.*.name' => 'required|string|max:255'
        ]);
    
        
        $vote = new Vote();
        $vote->user_id = $user->id;
    
        
        $vote->title = $validatedData['title'];
        $vote->description = $validatedData['description'];
        $vote->expiry_date = $validatedData['expiryDate'];
    
        
        $vote->save();
    
        
        foreach ($validatedData['options'] as $optionData) {
            $vote->options()->create([
                'name' => $optionData['name']
            ]);
        }
    }
    

   
}
