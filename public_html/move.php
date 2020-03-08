<?php
# move.php?to=undefined&from=technology&name=notes-20200229-002443.txt
# move.php?to=organization&from=farming&name=notes-20200303-230402.txt

require_once "../inc/inc.config.php";

$to = preg_replace("/[^a-z]/is", "", $_GET["to"]);
$from = preg_replace("/[^a-z]/is", "", $_GET["from"]);
$name = preg_replace("/[^a-z0-9\-\.]/is", "", $_GET["name"]);

$nm = new note_manager();
$nm->move($to, $from, $name);

#header("Location: notes.php?category={$to}");
header("Location: read.php?category={$to}&name={$name}");
