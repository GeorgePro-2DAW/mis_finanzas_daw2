<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <x-layouts.index title="Show">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Incomes:</h1>
        <x-table :tableData="$tableData" :columns="$columns"/>
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Expenses:</h1>
        <x-table :tableData="$tableDataExpenses" :columns="$columns"></x-table>
    </x-layouts.index>

</body>
</html>


