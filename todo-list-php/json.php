<?php

$items = [];

$contents = file_get_contents("items.json");
if ($contents !== false) {
    $decoded = json_decode($contents, true);

    if ($decoded !== false) {
        $items = $decoded;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_GET["action"]) && $_GET["action"] === "delete") {
        // delete an item
        $id = intval($_POST["id"]);
        $items = array_filter($items, fn ($item) => $item["id"] !== $id);
        
        $json = json_encode($items);
        if ($json !== false) {
            file_put_contents("items.json", $json);
        }
    } else {
        // add new items via POST request
        $newItem = [
            "id" => time(),
            "note" => $_POST["note"],
        ];
        array_push($items, $newItem);
        
        $json = json_encode($items);
        if ($json !== false) {
            file_put_contents("items.json", $json);
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
        Diese Items sind dynamisch aus einer JSON Datei gelesen.
    </p>

    <img
        class="mt-4 w-[250px] mx-auto"
        style="width: 50px;"
        src="https://media.tenor.com/-WEizP3LZb8AAAAi/ha-ha.gif"
        alt="nice"
    >

    <ul class="list-disc list-inside">
        <?php foreach ($items as $item) { ?>
            <form action="/json.php?action=delete" method="post">
                <li>
                    <?php echo $item["note"]; ?>

                    <input type="hidden" name="id" value="<?php echo $item["id"]; ?>">
                    <input type="submit" value="Löschen">
                </li>
            </form>
        <?php } ?>
    </ul>

    <form action="/json.php" method="post">
        <input type="text" name="note" id="note">

        <button type="submit">Hinzufügen</button>
    </form>

    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->
</body>
</html>
