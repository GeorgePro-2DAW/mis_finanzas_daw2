    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
        <form method="post" action="{{route("create2.store")}}">
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

        <button type="submit">Enviar datos</button>

    </form>

