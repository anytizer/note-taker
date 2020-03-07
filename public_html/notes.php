<?php
require_once "../inc/inc.config.php";

$category = $_GET["category"]??"undefined";

$nm = new note_manager();
$files = $nm->notes($category);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Note Taker</title>
    <?php require_once "../inc/inc.meta.php"; ?>
</head>
<body>
<div class="wrapper wrapper-index">
    <p><a href="index.php" class="w3-btn w3-teal">Back</a></p>
    <div class="notes">
<?php

$F = count($files)+1;
foreach($files as $f => $file)
{
    --$F;

    $name = basename($file);
    $title = file($file)[0];

    echo "<div class='w3-container w3-teal w3-padding w3-border w3-border-bottom'>{$F}. <a href='read.php?category={$category}&amp;name={$name}'>{$title}<a></div>";
}
?>
    </div>
</div>
</body>
</html>
