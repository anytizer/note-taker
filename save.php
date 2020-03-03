<?php
$datestamp = date("Ymd-His");
$file = "notes/notes-{$datestamp}.txt";

// @todo Save binary/bom data
$fc = file_put_contents($file, $_POST["notes"], FILE_APPEND|FILE_BINARY);

header("Location: {$file}");
