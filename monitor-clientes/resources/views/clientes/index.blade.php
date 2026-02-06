<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor de Clientes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Monitor de Clientes - HGV</h1>

        <form action="{{ route('clientes.store') }}" method="POST" class="mb-8 flex gap-4 items-end bg-gray-50 p-4 rounded border">
            @csrf
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700">Nome do Cliente</label>
                <input type="text" name="nome" required class="mt-1 block w-full border rounded-md p-2 outline-blue-500">
            </div>
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700">E-mail</label>
                <input type="email" name="email" class="mt-1 block w-full border rounded-md p-2 outline-blue-500">
            </div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
                Adicionar
            </button>
        </form>

        <table class="w-full text-left border-collapse">
            </table>
    </div>

    <div class="mb-4 mt-4 p-6">
        <form action="{{ route('clientes.index') }}" method="GET" class="flex gap-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Pesquisar por nome ou e-mail..." class="flex-1 border rounded-md p-2 outline-blue-500">
            @if(request('search'))
                <a href="{{ route('clientes.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 flex items-center">
                    Limpar
                </a>
            @endif
        </form>
    </div>

    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Lista de Clientes - HGV</h1>

        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b">
                    <th class="py-2">Nome</th>
                    <th class="py-2">Status</th>
                    <th class="py-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($clientes as $cliente)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-2">{{ $cliente->nome }}</td>
                        <td class="py-2">
                            <td class="py-2">
                                <span class="px-2 py-1 text-xs rounded-full font-semibold 
                                    {{ $cliente->status === 'Ativo' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                    {{ $cliente->status }}
                                </span>
                            </td>
                        </td>
                        <td class="py-2">
                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este cliente?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-medium">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="py-4 text-center text-gray-500">Nenhum cliente cadastrado ainda.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>

<script>
    let timeout = null;
    document.querySelector('input[name="search"]').addEventListener('keyup', function() {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            this.form.submit();
        }, 500); // Espera 500ms após parar de digitar para não sobrecarregar o banco
    });
</script>