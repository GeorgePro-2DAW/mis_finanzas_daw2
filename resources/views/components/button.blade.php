<div>

    @if (key($datos)=="enlace")

        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" href= {{$datos["enlace"]}} >
            Enviar a enlace
        </a>
    
    @elseif(key($datos)=="nombre")
        
        <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" type="submit">
            Income Input
        </button>
    @endif
</div>