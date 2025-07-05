<?php

use Act\TodoList\Auth;

require __DIR__ . '/../vendor/autoload.php';

$auth = new Auth();

if ($auth->isAuthenticated()) {
    header("Location: /");
    exit(0);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["action"]) && $_POST["action"] === "login") {
        if (! $auth->login($_POST["username"], $_POST["password"])) {
            echo "Invalid credentials!";
            exit(1);
        }
    }
}
?>

<img
    class="mt-4 w-[250px] mx-auto"
    style="width: 100px;"
    src="https://media.tenor.com/1G8D0kk1bMQAAAAi/anime-hello.gif"
    alt="nice"
>

<p>
    Login
</p>

<form action="/login.php" method="post">
    <input type="hidden" name="action" value="login">

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