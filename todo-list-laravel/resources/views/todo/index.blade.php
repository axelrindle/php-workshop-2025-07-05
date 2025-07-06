@if (session('message'))
    <div style="border: 1px solid green; padding: 4px;">
        {{ session('message') }}
    </div>
@endif

<div style="display: flex; flex-flow: row nowrap; justify-content: space-between; align-items: center;">
    <img
        class="mt-4 w-[250px] mx-auto"
        style="width: 100px;"
        src="https://media.tenor.com/1G8D0kk1bMQAAAAi/anime-hello.gif"
        alt="nice"
    >

    <h1>
        <span>ToDo Liste</span>
        <a href="{{ route('todo.create') }}">
            <button>
                Erstellen
            </button>
        </a>
        <form
            action="{{ route('logout') }}"
            method="post"
            style="display: inline-block;"
        >
            @csrf

            <button type="submit">
                Abmelden
            </button>
        </form>
    </h1>

    <img
        style="width: 100px;"
        src="https://media.tenor.com/qiMsFYfPu-wAAAAi/anime-hello.gif"
    >
</div>

<ul>
    @foreach ($todos as $item)
    <li>
        <span>{{ $item->note }}</span>
        <span><small>
            ({{ $item->user->name }})
        </small></span>
        <a href="{{ route('todo.edit', [ 'todo' => $item->id ]) }}">
            <button>
                Bearbeiten
            </button>
        </a>
        <form
            action="{{ route('todo.destroy', [ 'todo' => $item->id ]) }}"
            method="post"
            style="display: inline-block;"
        >
            @csrf
            @method("DELETE")

            <button type="submit">
                Löschen
            </button>
        </form>
    </li>
    @endforeach
</ul>
