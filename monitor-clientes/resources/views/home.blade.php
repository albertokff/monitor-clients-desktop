@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center h-full text-center">
    <h1 class="text-4xl font-extrabold text-gray-800 mb-4">Bem-vindo ao Monitor HGV</h1>
    <p class="text-gray-500 text-lg max-w-md">Gerencie seus clientes de forma rápida e segura diretamente do seu desktop.</p>

    <div class="mt-10 grid grid-cols-2 gap-6">
        <div class="p-6 bg-white rounded-xl shadow-sm border border-gray-200">
            <span class="text-3xl">🧔</span>
            <h3 class="font-bold mt-2">Clientes</h3>
            <p class="text-xs text-gray-400">Total: {{ Cliente::count() }}</p>
        </div>
        <div class="p-6 bg-white rounded-xl shadow-sm border border-gray-200">
            <span class="text-3xl">🚀</span>
            <h3 class="font-bold mt-2">Status</h3>
            <p class="text-xs text-gray-400">Sistema Online</p>
        </div>
    </div>
</div>
@endsection