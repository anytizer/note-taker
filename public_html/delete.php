<?php
require_once "../inc/inc.config.php";

die("Do not delete like this... move the category");

#$nm = new NoteManager();
#$nm->delete($_GET["category"], $_GET["file"]);


$name = preg_replace("/[^a-z0-9\-\.]/is", "", $_GET["file"]);
$file = "../notes/{$name}";
if(!is_file($file))
{
    die("Invalid note file");
}

rename($file, "../notes.deleted/{$name}");

header("Location: notes.php");
