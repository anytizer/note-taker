<?php
$name = preg_replace("/[^a-z0-9\-\.]/is", "", $_GET["file"]);
$file = "../notes/{$name}";
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
<div class="wrapper wrapper-note w3-padding">
    <div>
        <?php echo nl2br(file_get_contents($file)); ?>
    </div>
    <div>
        <p>
            <a href="edit.php?file=<?php echo $name; ?>" class="w3-teal w3-btn">Edit this Note</a>
            <a href="notes.php" class="w3-teal w3-btn">Cancel</a>
        </p>
    </div>
</div>
</body>
</html>
