<x-navegacion :elementos="$elementos" :title="$title" ></x-navegacion>
<x-layouts.index :title="$title">
  <x-table :tableData="$tableData" :columns="$columns"/>
  <div class="m-5">
    <x-button href="expenses/create" >Expenses Create </x-button>
  </div>
</x-layouts.index>