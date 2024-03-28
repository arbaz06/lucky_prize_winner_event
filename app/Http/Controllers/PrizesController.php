<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Prize;
use App\Http\Requests\PrizeRequest;
use Illuminate\Http\Request;



class PrizesController extends Controller
{
    
    public function index()
    {
        $prizes = Prize::all();
        return view('prizes.index', ['prizes' => $prizes]);
    }

  
    public function create()
    {
        return view('prizes.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'probability' => 'required|numeric|min:0|max:100',
        ]);

        Prize::create([
            'title' => $request->title,
            'probability' => $request->probability,
        ]);

        return redirect()->route('prizes.index');
    }

   
    public function edit($id)
    {
        $prize = Prize::findOrFail($id);
        return view('prizes.edit', ['prize' => $prize]);
    }

  
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'probability' => 'required|numeric|min:0|max:100',
        ]);

        $prize = Prize::findOrFail($id);
        $prize->update([
            'title' => $request->title,
            'probability' => $request->probability,
        ]);

        return redirect()->route('prizes.index');
    }

   
    public function destroy($id)
    {
        Prize::findOrFail($id)->delete();
        return redirect()->route('prizes.index');
    }

       public function simulate(Request $request)
    {
        for ($i = 0; $i < ($request->number_of_prizes ?? 10); $i++) {
            Prize::nextPrize();
        }

        return redirect()->route('prizes.index');
    }

   
    public function reset()
    {
        // You can implement the logic to reset the prize selection here.
        // For example:
        // Prize::truncate(); // Reset all prizes
        // or any other logic you may want to implement
        return redirect()->route('prizes.index');
    }
}