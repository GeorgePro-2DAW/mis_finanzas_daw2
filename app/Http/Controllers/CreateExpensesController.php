<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses;

class CreateExpensesController extends Controller
{
    //
    public function index()
    {
        $elementos=["My Incomes"=>"/incomes","My expenses"=>"/expenses"];

        return view('outcomes.create',['elementos'=>$elementos,'title'=>'Crear Outcome']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return '<p>Esta es la página del create de incomes</p>';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'date'=>'required|date',
            'category' => 'required|string|max:255',
            'amount'=>'required|numeric'
        ]);
        Expenses::create([
            'date'=>$request->date,
            'category'=>$request->category,
            'amount'=>$request->amount
        ]);

        return redirect()->route('outcomes.index')->with('success', 'Registro guardado correctamente');
    }
}
