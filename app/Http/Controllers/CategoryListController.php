<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incomes;
use App\Models\Expenses;
use Illuminate\Support\Facades\DB;

class CategoryListController extends Controller
{
    //
    public function index()
    {
        $list= [1=>'Salario',2=>'Stuff'] ;
        return view("categorylist/index",['list'=>$list]);
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
        $tableData = Incomes::with('category')->where('category_id',$id)->get()->map(function($incomes) {
            return [
                'date' => $incomes->date,
                'category' => ucfirst($incomes->category->name),
                'amount' => $incomes->amount,
                'id' => $incomes->id
            ];
        });
        $tableDataExpenses = Expenses::with('category')->where('category_id',$id)->get()->map(function($incomes) {
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
        return view("categorylist/show",['tableData'=>$tableData,'columns'=>$columns,'tableDataExpenses'=>$tableDataExpenses]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        
    }
}
