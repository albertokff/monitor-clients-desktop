<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Native\Laravel\Facades\Notification;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function store(Request $request) 
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'nullable|email',
        ]);

        $cliente = Cliente::create($data);

        try {
            if (class_exists(\Native\Laravel\Facades\Notification::class)) {
                \Native\Laravel\Facades\Notification::new()
                    ->title('HGV Monitor')
                    ->message("Cliente {$cliente->nome} cadastrado!")
                    ->show();
            }
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::info("Notificação não disparada: " . $e->getMessage());
        }

        return redirect()->back();
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->back();
    }
}
