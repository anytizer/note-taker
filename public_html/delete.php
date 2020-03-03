<?php
$name = preg_replace("/[^a-z0-9\-\.]/is", "", $_GET["file"]);
$file = "../notes/{$name}";
if(!is_file($file))
{
    die("Invalid note file");
}

rename($file, "../notes.deleted/{$name}");

header("Location: notes.php");
