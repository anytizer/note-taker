<?php
require_once "../inc/inc.config.php";

$nm = new note_manager();
$notes = $nm->search($_POST["query"]);
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
        $F = count($notes)+1;
        foreach($notes as $n => $note)
        {
            --$F;

            $name = basename($note["search"]);
            $title = file($note["search"])[0];
            $category = $note["category"]->folder;

            echo "<div class='w3-container w3-teal w3-padding w3-border w3-border-bottom'>{$F}. <a href='read.php?category={$category}&amp;name={$name}'>{$title}<a> - {$category}</div>";
        }
        ?>
    </div>
    <p><a href="index.php" class="w3-btn w3-teal">Back</a></p>
</div>
</body>
</html>
