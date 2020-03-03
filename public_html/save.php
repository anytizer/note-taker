<?php
$datestamp = date("Ymd-His");
$name = "notes-{$datestamp}.txt";
$file = "../notes/{$name}";

// @todo Save binary/bom data
$fc = file_put_contents($file, $_POST["notes"], FILE_APPEND|FILE_BINARY);

header("Location: read.php?file={$name}");
