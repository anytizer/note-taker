<?php
require_once "../inc/inc.config.php";

$files = [];

foreach($categories as $category)
{
    $searches = glob("../notes/{$category}/notes-*.txt");
    foreach($searches as $s => $search)
    {
        $fc = file_get_contents($search);
        if(preg_match("/".preg_quote($_POST["query"])."/is", $fc))
        {
            // the only files that matched
            $files[] = [
                "category" => $category,
                "search" => $search,
            ];
        }
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
        foreach($files as $f => $fileinfo)
        {
            --$F;

            $name = basename($fileinfo["search"]);
            $title = file($fileinfo["search"])[0];
            $category = $fileinfo["category"];

            echo "<div class='w3-container w3-teal w3-padding w3-border w3-border-bottom'>{$F}. <a href='read.php?category={$category}&amp;name={$name}'>{$title}<a> - {$category}</div>";
        }
        ?>
    </div>
    <p><a href="index.php" class="w3-btn w3-teal">Back</a></p>
</div>
</body>
</html>
