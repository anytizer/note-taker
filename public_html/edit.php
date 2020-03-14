<?php
require_once "../inc/inc.config.php";

$category = $_GET["category"];
$name = $_GET["name"];

$nm = new NoteManager();
$note = $nm->read($category, $name);

if(isset($_POST["notes"]))
{
    $nm = new NoteManager();
    $nm->edit($category, $name, $_POST["notes"]);

    # read.php?category=undefined&name=notes-20200312-134627.txt
    header("Location: notes.php?category={$category}");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Note Taker - Edit Note</title>
    <?php require_once "../inc/inc.meta.php"; ?>
</head>
<body>
<div class="wrapper wrapper-note">
    <form name="editor" method="post" action="edit.php?category=<?php echo $category; ?>&amp;name=<?php echo $name; ?>">
        <div class="w3-container w3-padding w3-teal">
            <span><?php echo $note->title; ?></span>
        </div>
        <label>
            <textarea name="notes" class="w3-input" style="height: 400px;"><?php echo $note->text; ?></textarea>
        </label>
        <p>
            <input type="submit" class="w3-red w3-btn" value="Save Changes" />
            <a href="notes.php?category=<?php echo $category; ?>" class="w3-teal w3-btn">Cancel</a>
        </p>
    </form>
</div>
</body>
</html>
