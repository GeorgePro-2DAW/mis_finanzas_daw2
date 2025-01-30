<x-navegacion :elementos="$elementos" :title="$title" ></x-navegacion>
<x-layouts.index :title="$title">
  <x-table :tableData="$tableData" :columns="$columns"/>
  <div class="m-5">
    <x-button href="#google" >Outcome ver </x-button>
  </div>
</x-layouts.index>