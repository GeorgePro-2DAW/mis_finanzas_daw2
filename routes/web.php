<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\CreateExpensesController;
use App\Http\Controllers\CategoryListController;
use App\Models\Expenses;

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('incomes', IncomeController::class);
Route::get('/incomes', [IncomeController::class, 'index'])->name('incomes.index');
Route::get('/expenses',[ExpensesController::class,'index'])->name('outcomes.index');
Route::get('/list',[CategoryListController::class,'index'])->name('categorylist.index');


Route::get('/incomes/create',[IncomeController::class,'create'])->name('incomes.create');
Route::get('/expenses/create',[ExpensesController::class,'create'])->name('expenses.create');
Route::get('/list/{category}',[CategoryListController::class,'show'])->name('categorylist.show');


Route::post('/guardarIncome', [IncomeController::class, 'store'])->name('income.store');
Route::post('/guardarExpense', [ExpensesController::class, 'store'])->name('expenses.store');

Route::get('/incomes/update/{id}',[IncomeController::class, 'edit'])->name('show.index');
Route::get('/incomes/destroy/{id}',[IncomeController::class, 'destroy'])->name('destroy.index');
Route::post('/actualizar/{id}',[IncomeController::class, 'update'])->name('update.index');

Route::get('/expenses/update/{id}',[ExpensesController::class, 'edit'])->name('showExpense.index');
Route::get('/expenses/destroy/{id}',[ExpensesController::class, 'destroy'])->name('destroyExpense.index');
Route::post('/expenses/actualizar/{id}',[ExpensesController::class, 'update'])->name('updateExpense.index');





