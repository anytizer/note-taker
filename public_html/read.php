<?php
require_once "../inc/inc.config.php";

$category = input($_GET["category"]??".");

$name = preg_replace("/[^a-z0-9\-\.]/is", "", $_GET["name"]);
$file = "../notes/{$category}/{$name}";
if(!is_file($file))
{
    die("Invalid note file");
}

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
        <?php echo file($file)[0]; ?>
    </div>
    <div class="w3-container w3-pale-yellow">
        <h3 class="w3-yellow w3-padding">Move to a Category</h3>
        <div class="w3-small w3-padding">
            <?php echo implode(", ", array_map("_move", $categories)); ?>
        </div>
    </div>
    <div class="w3-padding">
        <?php echo nl2br(file_get_contents($file)); ?>
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
