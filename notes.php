<!DOCTYPE html>
<html lang="en">
<head>
    <title>Note Taker</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w3.css" />
    <link rel="stylesheet" href="css/book.css" />
</head>
<body>
<div class="wrapper wrapper-index">
    <div class="notes">
<?php
$files = glob("notes/notes-*.txt");
$files = array_reverse($files);

foreach($files as $f => $file)
{
    $F = $f + 1;

    $name = basename($file);
    $title = file($file)[0];

    echo "<div class='w3-container w3-teal w3-padding w3-border w3-border-bottom'>{$F}. <a href='read.php?file={$name}'>{$title}<a></div>";

    #echo "<div class='content'>{$title}</div>";
    #echo "<br/>";
}
?>
    </div>
</div>
</body>
</html>
