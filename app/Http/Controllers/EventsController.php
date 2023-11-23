<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public readonly Events $events;
    public function __construct()
    {
        $this->events = new Events();
    }

    public function index()
    {
        $events = $this->events->all();
        return view('index', ['events' => $events]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required',
            'evento' => 'required',
            'data' => 'required|date',
            'horario' => 'required',
            'local' => 'required',
            'status' => 'required',
        ]);

        $this->events::create($request->all());

        return redirect()->route('index')->with('success', 'Evento cadastrado com sucesso!');
    }

    public function changeStatus(Request $request, Events $event)
    {
        $newStatus = $event->status == 0 ? 1 : 0;
        $event->update(['status' => $newStatus]);

        return redirect()->back()->with('success', 'Status alterado com sucesso.');
    }

    public function edit(string $id)
    {
        $event = $this->events->find($id);

        return view('edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->events->where('id', $id)->update($request->except('_token', '_method'));
        
        if ($updated) {
            return redirect()->route('index')->with('success', 'Evento atualizado com sucesso.');
        }

        return redirect()->back()->with('error', 'Evento não atualizado.');
    }

    public function destroy(Request $request, $event)
    {
        $events = $this->events->find($event);

        if ($events) {
            $events->delete();
            return redirect()->back()->with('success', 'Evento excluído com sucesso.');
        }

        return redirect()->back()->with('error', 'Evento não encontrado.');
    }
}
