<?php
$name = preg_replace("/[^a-z0-9\-\.]/is", "", $_GET["file"]);
$file = "../notes/{$name}";
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="css/book.css" />
</head>
<body>
<div class="wrapper wrapper-note w3-padding">
    <form name="editor" method="post" action="edit.php?file=<?php echo $name; ?>">
        <div class="w3-container w3-padding w3-teal">
            <span><?php echo $title; ?></span>
        </div>
        <label>
            <textarea name="notes" class="w3-input" style="height: 400px;"><?php echo file_get_contents($file); ?></textarea>
        </label>
        <p>
            <input type="hidden" name="file" value="<?php echo $file; ?>" />
            <input type="submit" class="w3-red w3-btn" value="Save Changes" />
            <a href="notes.php" class="w3-teal w3-btn">Cancel</a>
        </p>
    </form>
</div>
</body>
</html>
