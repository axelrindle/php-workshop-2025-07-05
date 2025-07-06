@if (session('message'))
    <div style="border: 1px solid green; padding: 4px;">
        {{ session('message') }}
    </div>
@endif

<div style="display: flex; flex-flow: row nowrap; justify-content: space-between;">
    <img
        class="mt-4 w-[250px] mx-auto"
        style="width: 100px;"
        src="https://media.tenor.com/1G8D0kk1bMQAAAAi/anime-hello.gif"
        alt="nice"
    >

    <img
        style="width: 100px;"
        src="https://media.tenor.com/qiMsFYfPu-wAAAAi/anime-hello.gif"
    >
</div>

<div style="width: min-content; margin: 0 auto;">
    <p style="font-weight: bold; font-size: 24px;">
        Login
    </p>

    <form
        action="{{ route('login') }}"
        method="post"
    >
        @csrf

        <div>
            <label for="username">Benutzername</label>
            <input type="email" name="email" id="username" value="{{ old('email') }}">
        </div>
        @error('email')
            <div style="border: 1px solid red; color: red; padding: 2px;">{{ $message }}</div>
        @enderror

        <div>
            <label for="password">Passwort</label>
            <input type="password" name="password" id="password">
        </div>

        <input type="submit" value="Anmelden">
    </form>
</div>
