<?php
require_once "../inc/inc.config.php";

$nm = new NoteManager();
$categories = $nm->categories();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Note Taker</title>
    <?php require_once "../inc/inc.meta.php"; ?>
</head>
<body>
<div class="wrapper">
    <div class="w3-container w3-teal">
        <h1>Categories</h1>
    </div>
    <form name="search" method="post" action="search.php" autocomplete="off">
        <label>
            <input class="w3-input" type="text" name="query" value=""/>
        </label>
        <label>
            <input class="w3-btn w3-teal w3-input" type="submit" value="Search"/>
        </label>
    </form>
    <div class="categories">
        <ul>
            <?php echo implode("\r\n\t\t\t", array_map(array($nm, "_explore_category"), $categories)); ?>
        </ul>
    </div>
</div>
</body>
</html>