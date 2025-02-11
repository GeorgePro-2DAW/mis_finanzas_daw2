<div class="relative overflow-x-auto">

    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                @foreach ($columns as $heading)
                    <th scope="col" class="px-6 py-3">
                        {{$heading}}
                    </th>    
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($tableData as $index => $row)
                <!-- Alternating row colors between white and light blue -->
                <tr class="{{ $loop->even ? 'bg-white' : 'bg-blue-100' }} border-b">
                    @foreach ($row as $key => $cell)
                        <!-- First column as <th> and others as <td> -->
                            @if($key!='id')
                                @if ($loop->first)
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{$cell}}
                                    </th>
                                @else
                                    <td class="px-6 py-4 text-gray-900 whitespace-nowrap">
                                        {{$cell}}
                                    </td>
                                @endif                                
                            @endif
                    @endforeach
                    @if (request()->path()=='incomes')
                        <td>
                            <x-button  href="{{route('show.index', ['id' => $row->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Update</x-button>
                        </td>
                        <td>
                            <x-button  href="{{route('destroy.index' , ['id' => $row->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Delete</x-button>
                        </td>
                    @elseif(request()->path()=='expenses')
                        <td>
                            <x-button  href="{{route('showExpense.index', ['id' => $row->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Update</x-button>
                        </td>
                        <td>
                            <x-button  href="{{route('destroyExpense.index', ['id' => $row->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Delete</x-button>
                        </td>
                    @endif
                    
                </tr>    
            @endforeach
        </tbody>
    </table>
</div>
