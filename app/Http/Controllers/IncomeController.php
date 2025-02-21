<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Incomes;
use App\Models\Category;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tableData = Incomes::with('category')->get()->map(function($incomes) {
            return [
                'date' => $incomes->date,
                'category' => ucfirst($incomes->category->name),
                'amount' => $incomes->amount,
                'id' => $incomes->id
            ];
        });
        $columns = collect(DB::getSchemaBuilder()->getColumnListing('incomes'));
        $columns = $columns->filter(function ($value, $key) {
            return in_array($value, ['id', 'created_at', 'updated_at']) === false;
        });
        
        $elementos=["My Incomes"=>"incomes","My expenses"=>"expenses","My list"=>"list"];
        
        
        //Aquí la lógica de negocio para el index
        return view('income.index',['title' => 'My incomes','tableData'=>$tableData,'columns'=>$columns,'elementos'=>$elementos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories=Category::all();
        $elementos=["My Incomes"=>"/incomes","My expenses"=>"/expenses"];
        return view('income.create',['categories'=>$categories,'elementos'=>$elementos,'title'=>'Create Income']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate=$request->validate([
            'date'=>'required|date',
            'category_id' => 'required',
            'amount'=>'required|numeric'
        ]);
        Incomes::create($validate);

        return redirect()->route('incomes.index');
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
            'categorY_id' => 'required|string|max:2',
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
