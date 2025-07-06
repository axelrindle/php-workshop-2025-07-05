<?php

namespace App\Http\Controllers;

use App\Http\Requests\Todo\StoreRequest;
use App\Models\TodoItem;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return ['auth'];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $todos = TodoItem::query()->cursor();

        return view('todo.index', [
            'todos' => $todos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('todo.create', [
            'mode' => 'create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $entity = new TodoItem($request->validated());
        $entity->user_id = Auth::id();
        $entity->save();

        return redirect()
            ->route('todo.index')
            ->with('message', 'Success');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TodoItem $todoItem): View
    {
        return view('todo.create', [
            'mode' => 'edit',
            'todo' => $todoItem,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, TodoItem $todoItem): RedirectResponse
    {
        $todoItem->update($request->validated());

        return redirect()
            ->route('todo.index')
            ->with('message', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TodoItem $todoItem): RedirectResponse
    {
        $result = $todoItem->delete();

        return redirect()
            ->route('todo.index')
            ->with('message', "Das Todo Item {$todoItem->id} wurde gelöscht.");
    }
}
