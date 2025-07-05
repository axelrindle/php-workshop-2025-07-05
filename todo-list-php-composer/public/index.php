<?php

use Act\TodoList\Auth;
use Act\TodoList\ItemManager;

require __DIR__ . '/../vendor/autoload.php';

$auth = new Auth();

if (! $auth->isAuthenticated()) {
    header("Location: /login.php");
    exit(0);
}

$items = new ItemManager();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_GET["action"])) {
        if ($_GET["action"] === "delete") {
            // delete an item
            $id = intval($_POST["id"]);
            $items->deleteItem($id);
        } else if ($_GET["action"] === "add") {
            // add new items via POST request
            $items->addItem($_POST["note"]);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>TODO LISTE</title>
</head>
<body>
    <p class="mb-4">
        Hier wird mit Composer gearbeitet. Jetzt sind wir schon fast richtige
        Php Experten.
    </p>

    <ul class="list-disc list-inside">
        <?php foreach ($items->getItems() as $item) { ?>
            <form action="/?action=delete" method="post">
                <li>
                    <?php echo $item["note"]; ?>

                    <input type="hidden" name="id" value="<?php echo $item["id"]; ?>">
                    <input type="submit" value="Löschen">
                </li>
            </form>
        <?php } ?>
    </ul>

    <a href="/logout.php">
        Abmelden
    </a>

    <form action="/?action=add" method="post">
        <input type="text" name="note" id="note">

        <button type="submit">Hinzufügen</button>
    </form>

    <img
        class="mt-4 w-[250px] mx-auto"
        style="width: 100px;"
        src="https://media.tenor.com/Mv6989TPgS4AAAAi/rem-re-zero.gif"
        alt="nice"
    >

    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->
</body>
</html>
