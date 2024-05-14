<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deal;

class DealController extends Controller
{
    public function index()
    {
        $deals = Deal::all();

        return view('deals.index',['deals' => $deals]);
    }

    public function create()
    {
        return view('deals.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric',
            'amount' => 'required|numeric',
            'next_follup_date' => 'required|date'
        ]);

        Deal::create($attributes);
        
        return redirect('/deals')->with('success','Deal created successfully');
    }

    public function edit(Deal $deal)
    {
        return view('deals.edit',['deal' => $deal]);
    }

    public function update()
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric',
            'amount' => 'required|numeric',
            'next_follup_date' => 'required|date'
        ]);

        $deal = Deal::find($attributes['deal_id']);
        $deal->update($attributes);
        
        return redirect('/deals')->with('success','Deal updated successfully');
    }

    public function delete()
    {
        $attribute = request()->validate([
            'deal_id' => 'required|numeric'
        ]);

        $deal = Deal::find($attribute['deal_id']);
        $deal->delete();

        return redirect('/deals')->with('success','Deal Deleted successfully');
    }
}
