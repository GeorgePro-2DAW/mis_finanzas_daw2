
<x-layouts.index title="Select the category">
    @foreach ($list as $id => $category)
        <x-button  href="{{route('categorylist.show',['category' => $id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded inline-block">{{$category}}</x-button>
        <br>    
    @endforeach
</x-layouts.index>
    

