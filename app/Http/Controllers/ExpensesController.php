<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Expenses;
use App\Models\Category;

class ExpensesController extends Controller
{
    //
    public function index()
    {
        $tableData = Expenses::with('category')->get()->map(function($expenses) {
            return [
                'date' => $expenses->date,
                'category' => ucfirst($expenses->category->name),
                'amount' => $expenses->amount,
                'id' => $expenses->id
            ];
        });
        $columns = collect(DB::getSchemaBuilder()->getColumnListing('expenses'));
        $columns = $columns->filter(function ($value, $key) {
            return in_array($value, ['id', 'created_at', 'updated_at']) === false;
        });
        $elementos=["My Incomes"=>"incomes","My expenses"=>"expenses","My list"=>"list"];

        //Aquí la lógica de negocio para el index
        return view('outcomes.index',['title'=>'My expenses','tableData'=>$tableData,'tableData','columns'=>$columns,'elementos'=>$elementos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories=Category::all();
        $elementos=["My Incomes"=>"/incomes","My expenses"=>"/expenses"];
        return view('outcomes.create',['categories'=>$categories,'elementos'=>$elementos,'title'=>'Create Income']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return '<p>Esta es la página del show de outcomes</p>';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $expense=Expenses::findOrFail($id);
        return view('update', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'date'=>'required|date',
            'category' => 'required|string|max:255',
            'amount'=>'required|numeric'
        ]);

        Expenses::whereId($id)
            ->update([
                'date'=>$request->date,
                'category'=>$request->category,
                'amount'=>$request->amount
            ]);
            
        return redirect()->route('outcomes.index')->with('success', 'Registro actualizado correctamente');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Expenses::whereId($id)->delete();
        return redirect()->route('outcomes.index')->with('success', 'Registro borrado correctamente');
    }
}
