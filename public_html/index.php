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
        <h1>Note Taker</h1>
    </div>
    <form name="notes" method="post" action="save.php" class="w3-white" autocomplete="off">
        <div class="w3-container">
            <label>
                <p>Enter new note:</p>
                <textarea name="notes" class="w3-input w3-border w3-border-red" style="height: 200px;" required="required" placeholder="Enter notes..."></textarea>
            </label>
            <label>
                <br/>
                <input type="submit" class="w3-input w3-btn w3-red" value="Save Note" />
            </label>
        </div>
        <br/>
    </form>
    <form name="search" method="post" action="search.php" autocomplete="off">
        <label>
            <input class="w3-input w3-border w3-border-red" type="text" name="query" value="" placeholder="Search something..."/>
        </label>
        <label>
            <input class="w3-btn w3-teal w3-input" type="submit" value="Search"/>
        </label>
    </form>

    <div class="w3-pale-blue">
        <h3 class="w3-blue w3-padding">Jump to a Category</h3>
        <div class="w3-small w3-padding">
            <ul><?php echo implode("", array_map(array($nm, "_explore_category"), $categories)); ?></ul>
        </div>
    </div>
</div>
</body>
</html>