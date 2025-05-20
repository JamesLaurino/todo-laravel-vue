<?php

namespace App\Http\Controllers;
use App\Models\Friend;
use App\Models\Todo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TodoController extends Controller
{

    public function index() {

        $todos = Todo::all();
        return Inertia::render('Todo', ["todos" => $todos]);
    }

    public function createShow() {
        return Inertia::render('TodoAdd');
    }

    public function destroy($id) {

        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect()->route("todo.index");
    }

    public function delete() {
        $todos = Todo::all();
        return Inertia::render('TodoDelete',["todos" => $todos]);
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'title' => "required|string|min:4",
        ]);

        Todo::create([
            'title' => $validated['title'],
        ]);

        return redirect()->route("todo.index");
    }

    public function update(Request $request)
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
