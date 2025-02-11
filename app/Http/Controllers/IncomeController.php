<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Incomes;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tableData = DB::table('incomes')->select('id','date','category','amount')->get();

        $columns = collect(DB::getSchemaBuilder()->getColumnListing('incomes'));
        $columns = $columns->filter(function ($value, $key) {
            return in_array($value, ['id', 'created_at', 'updated_at']) === false;
        });
        
        $elementos=["My Incomes"=>"incomes","My expenses"=>"expenses"];

        //Aquí la lógica de negocio para el index
        return view('income.index',['title' => 'My incomes','tableData'=>$tableData,'columns'=>$columns,'elementos'=>$elementos]);
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return '<p>Esta es la página del show de incomes</p>';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $income=Incomes::findOrFail($id);
        return view('update', compact('income'));

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

        Incomes::whereId($id)
            ->update([
                'date'=>$request->date,
                'category'=>$request->category,
                'amount'=>$request->amount
            ]);
            
        return redirect()->route('incomes.index')->with('success', 'Registro actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Incomes::whereId($id)->delete();
        return redirect()->route('incomes.index')->with('success', 'Registro borrado correctamente');

    }
}
