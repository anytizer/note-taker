<?php
$datestamp = date("Ymd-His");
$name = "notes/notes-{$datestamp}.txt";

// @todo Save binary/bom data
$fc = file_put_contents($name, $_POST["notes"], FILE_APPEND|FILE_BINARY);

header("Location: {$name}");
