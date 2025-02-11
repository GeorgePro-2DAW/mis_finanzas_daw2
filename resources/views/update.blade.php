
    <!-- When there is no desire, all things are at peace. - Laozi -->
    @if (request()->path()=='incomes/update/'.request()->route('id'))
        <form method="post" action={{route("update.index",request()->route('id'))}}>

    @elseif (request()->path()=='expenses/update/'.request()->route('id'))
        <form method="post" action={{route("updateExpense.index",request()->route('id'))}}>
    @endif
            @csrf <!-- Token de seguridad obligatorio en Laravel -->
            <label>Select a date</label>
            <input type="date" name="date">
            <br><br>
            <label>Select a category</label>
            <input name="category">
            <br><br>
            <label>Select the amount</label>
            <input type="number" name="amount">
            <br><br>
            <button type="submit">Actualizar</button
        </form>
    

