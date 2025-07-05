<?php
$items = [
    [
        "id" => 1,
        "note" => "Bananen kaufen",
    ],
    [
        "id" => 2,
        "note" => "Saugen",
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>TODO LISTE (Basic)</title>
</head>
<body>
    <p class="mb-4">
        Diese Items sind statisch im Code.
    </p>

    <ul class="list-disc list-inside">
        <?php foreach ($items as $item) { ?>
            <li>
                <?php echo $item["note"]; ?>
            </li>
        <?php } ?>
    </ul>

    <img
        class="mt-4 w-[250px] mx-auto"
        src="https://media1.tenor.com/m/A-ozELwp694AAAAd/thumbs-thumbs-up-kid.gif"
        alt="nice"
    >

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</body>
</html>
