<?php
require_once "../inc/inc.config.php";

$nm = new note_manager();
$nm->create($_POST["notes"]);

header("Location: notes.php");
