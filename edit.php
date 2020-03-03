<?php
$name = preg_replace("/[^a-z0-9\-\.]/is", "", $_GET["file"]);
$file = "notes/{$name}";
if(!is_file($file))
{
    die("Invalid note file");
}

//print_r($_POST);
if(isset($_POST["notes"]))
{
    $fc = file_put_contents($file, $_POST["notes"], FILE_BINARY);

    //header("Location: {$name}");
    header("Location: notes.php");
}

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
        <label>
            <textarea name="notes" class="w3-input" style="height: 600px;"><?php echo file_get_contents($file); ?></textarea>
        </label>
        <p>
            <input type="hidden" name="file" value="<?php echo $file; ?>" />
            <input type="submit" class="w3-teal w3-btn" value="Edit Note - Save Changes" />
            <a href="notes.php" class="w3-teal w3-btn">Notes</a>
        </p>
    </form>
</div>
</body>
</html>
