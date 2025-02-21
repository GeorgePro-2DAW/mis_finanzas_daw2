
<x-layouts.index title="Select what category u want to see">
    @foreach ($list as $id => $category)
        <x-button  href="{{route('categorylist.show',['category' => $id]) }}" class="btn btn-primary">{{$category}}</x-button>
        <br>    
    @endforeach
</x-layouts.index>
    

