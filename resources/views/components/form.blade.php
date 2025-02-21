    <!-- Simplicity is an acquired taste. - Katharine Gerould -->
     <form method="post" action="{{route($href)}}">
        @csrf <!-- Token de seguridad obligatorio en Laravel -->
        <label>Select a date</label>
        <input type="date" name="date">
        <br><br>
        <label>Select a category</label>
        <select name="category_id">
            @foreach ($categories as $category)
                <option value={{$category->id}} >{{ucfirst($category->name)}}</option>    
            @endforeach
        </select>
        <br><br>
        <label>Select the amount</label>
        <input type="number" name="amount">
        <br><br>

        <button type="submit">Enviar datos</button>

    </form>
