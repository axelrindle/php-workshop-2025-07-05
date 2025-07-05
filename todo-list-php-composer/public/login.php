<?php

use Act\TodoList\Auth;

require __DIR__ . '/../vendor/autoload.php';

$auth = new Auth();

if ($auth->isAuthenticated()) {
    header("Location: /");
    exit(0);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (! $auth->login($_POST["username"], $_POST["password"])) {
        echo "Invalid credentials!";
        exit(1);
    } else {
        header("Location: /");
    }
}
?>

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

    <form action="/login.php" method="post">
        <div>
            <label for="username">Benutzername</label>
            <input type="text" name="username" id="username">
        </div>
        
        <div>
            <label for="password">Passwort</label>
            <input type="password" name="password" id="password">
        </div>

        <input type="submit" value="Anmelden">
    </form>
</div>
