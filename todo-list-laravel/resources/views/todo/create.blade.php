<h1>
    @if ($mode === 'edit')
    <span>ToDo bearbeiten</span>
    @else
    <span>ToDo erstellen</span>
    @endif

    <a href="{{ route('todo.index') }}">
        <button>
            Abbrechen
        </button>
    </a>
</h1>

<form
    action="{{ $mode === 'edit' ? route('todo.update', [ 'todo' => $todo->id ]) : route('todo.store') }}"
    method="post"
>
    @csrf

    @if ($mode === 'edit')
    @method('PUT')
    @endif

    <label for="note">Titel</label>
    <input type="text" name="note" id="note" value="{{ $mode === 'edit' ? $todo->note : old('note') }}">

    @error('note')
        <div style="border: 1px solid red; color: red; padding: 2px;">{{ $message }}</div>
    @enderror

    <button type="submit">Speichern</button>
</form>

<img
    class="mt-4 w-[250px] mx-auto"
    style="width: 100px;"
    src="https://media.tenor.com/Mv6989TPgS4AAAAi/rem-re-zero.gif"
    alt="nice"
>
