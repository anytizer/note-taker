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
$files = glob("../notes/notes-*.txt");
$files = array_reverse($files);

$F = count($files)+1;
foreach($files as $f => $file)
{
    --$F;

    $name = basename($file);
    $title = file($file)[0];

    echo "<div class='w3-container w3-teal w3-padding w3-border w3-border-bottom'>{$F}. <a href='read.php?file={$name}'>{$title}<a></div>";
}
?>
    </div>
    <p><a href="index.php" class="w3-btn w3-teal">Back</a></p>
    <form name="search" method="post" action="search.php" autocomplete="off">
        <label>
            <input class="w3-input" type="text" name="query" value=""/>
        </label>
        <label>
            <input class="w3-btn w3-teal w3-input" type="submit" value="Search"/>
        </label>
    </form>
</div>
</body>
</html>
