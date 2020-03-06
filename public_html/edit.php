<?php
require_once "../inc/inc.config.php";

$name = preg_replace("/[^a-z0-9\-\.]/is", "", $_GET["name"]);

$category = input($_GET["category"]??".");

$file = "../notes/{$category}/{$name}";
if(!is_file($file))
{
    die("Invalid note file");
}

if(isset($_POST["notes"]))
{
    $fc = file_put_contents($file, $_POST["notes"], FILE_BINARY);

    header("Location: notes.php");
}

$title = file($file)[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Note Taker - Edit Note</title>
    <?php require_once "../inc/inc.meta.php"; ?>
</head>
<body>
<div class="wrapper wrapper-note w3-padding">
    <form name="editor" method="post" action="edit.php?category=<?php echo $category; ?>&amp;name=<?php echo $name; ?>">
        <div class="w3-container w3-padding w3-teal">
            <a class="w3-btn w3-yellow" href="delete.php?file=<?php echo $name; ?>">X</a>
            <span><?php echo $title; ?></span>
        </div>
        <label>
            <textarea name="notes" class="w3-input" style="height: 400px;"><?php echo file_get_contents($file); ?></textarea>
        </label>
        <p>
            <input type="submit" class="w3-red w3-btn" value="Save Changes" />
            <a href="notes.php?category=<?php echo $category; ?>" class="w3-teal w3-btn">Cancel</a>
        </p>
    </form>
</div>
</body>
</html>
