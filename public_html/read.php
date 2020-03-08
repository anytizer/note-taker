<?php
require_once "../inc/inc.config.php";

$category = $_GET["category"]??"undefined";
$name = $_GET["name"]??"";

$nm = new note_manager();
$note = $nm->read($category, $name);
$categories = $nm->categories();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Note Taker</title>
    <?php require_once "../inc/inc.meta.php"; ?>
</head>
<body>
<div class="wrapper wrapper-note">
    <div class="w3-pale-yellow">
        <h3 class="w3-yellow w3-padding">Move to a different Category</h3>
        <div class="w3-small w3-padding">
            <?php echo implode(", ", array_map(array($nm, "_move_note_category"), $categories)); ?>
        </div>
    </div>
    <div class="w3-container w3-padding w3-teal">
        <?php echo $note->title; ?>
    </div>
    <div class="w3-padding">
        <?php echo nl2br($note->text); ?>
    </div>
    <div>
        <p>
            <a href="edit.php?category=<?php echo $category; ?>&amp;name=<?php echo $name; ?>" class="w3-teal w3-btn">Edit this Note</a>
            <a href="notes.php?category=<?php echo $category; ?>" class="w3-teal w3-btn">Cancel</a>
        </p>
    </div>
</div>
</body>
</html>
