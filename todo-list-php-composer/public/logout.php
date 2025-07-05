<?php

use Act\TodoList\Auth;

require __DIR__ . '/../vendor/autoload.php';

$auth = new Auth();

$auth->signout();

header("Location: /");
