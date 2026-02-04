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
                            <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-700">
                                {{ $cliente->status }}
                            </span>
                        </td>
                        <td class="py-2">
                            <button class="text-blue-500 hover:underline">Editar</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="py-4 text -center text-gray-500">Nenhum cliente cadastrado ainda.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>