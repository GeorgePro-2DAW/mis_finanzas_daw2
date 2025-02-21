
<x-layouts.index title="Select the category">
    @foreach ($tableData as $data)
        <x-button  href="{{route('categorylist.show',['category' => $data['id']]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded inline-block">{{$data['category']}}</x-button>
        <br>    
    @endforeach
</x-layouts.index>
    

