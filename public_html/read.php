<?php
require_once "../inc/inc.config.php";

$category = $_GET["category"]??"undefined";
$name = $_GET["name"]??"";

$nm = new NoteManager();
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

    <div class="w3-container w3-padding w3-teal">
        <?php echo $note->title; ?>
    </div>
    <div class="w3-container w3-padding w3-small w3-pale-red">
1. Introduction
2. Body Organization
3. Supporting Chapter
4. Critical Overview
5. Ending Notes
    </div>
    <div class="w3-padding">
        <?php echo nl2br($note->text); ?>
    </div>
    <div>
        <p>
            <a href="edit.php?category=<?php echo $category; ?>&amp;name=<?php echo $name; ?>" class="w3-teal w3-btn">Edit this Note</a>
            <a href="notes.php?category=<?php echo $category; ?>" class="w3-teal w3-btn">Cancel</a>
            <a href="index.php" class="w3-teal w3-btn">Home</a>
        </p>
    </div>

    <div class="w3-pale-yellow">
        <h3 class="w3-yellow w3-padding">Change Category ...
            <a href="#" class="w3-btn w3-teal w3-right w3-small" onclick="return toggle();">A</a>
        </h3>
        <div class="w3-small w3-padding" id="categoriescloud" style="display: none;">
            <?php echo implode(", ", array_map(array($nm, "_move_note_category"), $categories)); ?>
        </div>
    </div>

    <div class="w3-pale-blue">
        <h3 class="w3-blue w3-padding">Jump to a Category</h3>
        <div class="w3-small w3-padding">
            <ul><?php echo implode("", array_map(array($nm, "_explore_category"), $categories)); ?></ul>
        </div>
    </div>
</div>
<script>
function toggle()
{
    var cloud = document.getElementById("categoriescloud");
    cloud.style.display = cloud.style.display == "none" ? "block":"none";
    return false;
}
</script>
</body>
</html>
