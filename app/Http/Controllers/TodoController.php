<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TodoController extends Controller
{

    public function index() {

        $todos = Todo::all();
        return Inertia::render('Principal', ["todos" => $todos]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'id' => 'required',
            'isDone' => 'required',
        ]);

        $todo = Todo::findOrFail($validated["id"]);

        $todo->update([
            'isDone' => $request["isDone"]
        ]);

        return redirect()->route("todo.index");
    }


}
