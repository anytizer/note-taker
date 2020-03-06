<?php
# move.php?to=undefined&from=technology&name=notes-20200229-002443.txt

$to = preg_replace("/[^a-z]/is", "", $_GET["to"]);
$from = preg_replace("/[^a-z]/is", "", $_GET["from"]);
$name = preg_replace("/[^a-z0-9\-\.]/is", "", $_GET["name"]);
$file = "../notes/{$from}/{$name}";
if(!is_file($file))
{
    die("Invalid note file");
}

mkdir("../notes/{$to}");
rename($file, "../notes/{$to}/{$name}");

header("Location: notes.php?category={$to}");
