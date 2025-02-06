<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpensesController extends Controller
{
    //
    public function index()
    {
        $tableData = DB::table('expenses')->select('date','category','amount')->get();

        $columns = collect(DB::getSchemaBuilder()->getColumnListing('outcomes'));
        $columns = $columns->filter(function ($value, $key) {
            return in_array($value, ['id', 'created_at', 'updated_at']) === false;
        });
        $elementos=["My Incomes"=>"incomes","My expenses"=>"expenses"];

        //Aquí la lógica de negocio para el index
        return view('outcomes.index',['title'=>'My expenses','tableData'=>$tableData,'tableData','columns'=>$columns,'elementos'=>$elementos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return '<p>Esta es la página del create de outcomes</p>';
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
        return '<p>Esta es la página del edit de outcomes</p>';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
