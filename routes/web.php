<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\CreateIncomeController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\CreateExpensesController;

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('incomes', IncomeController::class);
Route::get('/incomes', [IncomeController::class, 'index'])->name('incomes.index');
Route::get('/expenses',[ExpensesController::class,'index'])->name('outcomes.index');

Route::get('/incomes/create',[CreateIncomeController::class,'index'])->name('create.index');
Route::get('/expenses/create',[CreateExpensesController::class,'index'])->name('create2.index');

Route::post('/guardarIncome', [CreateIncomeController::class, 'store'])->name('create.store');
Route::post('/guardarExpense', [CreateExpensesController::class, 'store'])->name('create2.store');

Route::get('/incomes/update/{id}',[IncomeController::class, 'edit'])->name('show.index');
Route::get('/incomes/destroy/{id}',[IncomeController::class, 'destroy'])->name('destroy.index');
Route::post('/actualizar/{id}',[IncomeController::class, 'update'])->name('update.index');

Route::get('/expenses/update/{id}',[ExpensesController::class, 'edit'])->name('showExpense.index');
Route::get('/expenses/destroy/{id}',[ExpensesController::class, 'destroy'])->name('destroyExpense.index');
Route::post('/expenses/actualizar/{id}',[ExpensesController::class, 'update'])->name('updateExpense.index');





