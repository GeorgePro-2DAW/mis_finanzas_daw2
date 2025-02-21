<x-layouts.index title="Update">

    <!-- When there is no desire, all things are at peace. - Laozi -->
    @if (request()->path()=='incomes/update/'.request()->route('id'))
        <form method="post" action={{route("update.index",request()->route('id'))}}>
        @csrf <!-- Token de seguridad obligatorio en Laravel -->
            <label>Select a date</label>
            <input type="date" name="date" value="{{old('date',$income->date)}}">
            <br><br>
            <label>Select a category</label>
            <input name="category" value="{{old('category',$income->category)}}">
            <br><br>
            <label>Select the amount</label>
            <input type="number" name="amount" value="{{old('amount',$income->amount)}}">
            <br><br>
            <button type="submit">Actualizar</button>
        </form>

    @elseif (request()->path()=='expenses/update/'.request()->route('id'))
        <form method="post" action={{route("updateExpense.index",request()->route('id'))}}>
        @csrf <!-- Token de seguridad obligatorio en Laravel -->
            <label>Select a date</label>
            <input type="date" name="date" value="{{old('date',$expense->date)}}">
            <br><br>
            <label>Select a category</label>
            <input name="category" value="{{old('category',$expense->category)}}">
            <br><br>
            <label>Select the amount</label>
            <input type="number" name="amount" value="{{old('amount',$expense->amount)}}">
            <br><br>
            <button type="submit">Actualizar</button>
        </form>
    @endif
            

    
    <x-alert></x-alert>



</x-layouts.index>