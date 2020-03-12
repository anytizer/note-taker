<?php
require_once "../inc/inc.config.php";

$nm = new NoteManager();
$nm->create($_POST["notes"]);

header("Location: notes.php");
