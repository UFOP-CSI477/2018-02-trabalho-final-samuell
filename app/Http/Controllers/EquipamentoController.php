<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipamento;

class EquipamentoController extends Controller
{
    public function index() {
        $equipamentos = Equipamento::all();
        $total = Equipamento::all()->count();
        
        $cDia = 0;
        foreach ($equipamentos as $equipamento) {
            $cDia += (float)$equipamento->potencia * (float)$equipamento->quantidade * (float)$equipamento->tempo; 
        }
        
        $cDia = $cDia/1000;
        $cMes = $cDia * 30;
        $cAno = $cMes * 12;
        
        $gDia = $cDia * 0.58684;
        $gMes = $cMes * 0.58684;
        $gAno = $cAno * 0.58684; 

        return view('list-equipamento', compact('equipamentos', 'total', 'cDia', 'cMes', 'cAno', 'gDia', 'gMes', 'gAno'));
    }

    public function create() {
        return view('include-equipamento');
    }

    public function store(Request $request) {
        $equipamento = new Equipamento;
        $equipamento->nome = $request->nome;
        $equipamento->potencia = $request->potencia;
        $equipamento->quantidade = $request->quantidade;
        $equipamento->tempo = $request->tempo;
        $equipamento->save();
        return redirect()->route('equipamento.index')->with('message', 'Equipamento criado com sucesso!');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $equipamento = Equipamento::findOrFail($id);
        return view('alter-equipamento', compact('equipamento'));
    }

    public function update(Request $request, $id) {
        $equipamento = Equipamento::findOrFail($id); 
        $equipamento->nome = $request->nome;
        $equipamento->potencia = $request->potencia;
        $equipamento->quantidade = $request->quantidade;
        $equipamento->tempo = $request->tempo;
        $equipamento->save();
        return redirect()->route('equipamento.index')->with('message', 'Equipamento alterado com sucesso!');
    }

    public function destroy($id) {
        $equipamento = Equipamento::findOrFail($id);
        $equipamento->delete();
        return redirect()->route('equipamento.index')->with('message', 'Equipamento excluído com sucesso!');
    }
}