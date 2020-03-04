<?php
$files = [];

$searches = glob("../notes/notes-*.txt");
foreach($searches as $s => $search)
{
    $fc = file_get_contents($search);
    if(preg_match("/".preg_quote($_POST["query"])."/is", $fc))
    {
        $files[] = $search;
    }
}
?>
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
</div>
</body>
</html>
