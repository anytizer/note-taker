<!DOCTYPE html>
<html lang="en">
<head>
    <title>Note Taker</title>
    <?php require_once "../inc/inc.meta.php"; ?>
</head>
<body>
<div class="wrapper">
    <form name="notes" method="post" action="save.php" class="w3-white" autocomplete="off">
        <div class="w3-container w3-teal">
            <h1>Note Taker</h1>
        </div>
        <div class="w3-container">
            <label>
                <p>Enter new note:</p>
                <textarea name="notes" class="w3-input w3-border w3-border-red" style="height: 200px;" required="required"></textarea>
            </label>
            <label>
                <br/>
                <input type="submit" class="w3-input w3-btn w3-red" value="Save Note" />
            </label>
        </div>
        <br/>
    </form>
    <p><a href="notes.php" class="w3-btn w3-teal">View Notes</a></p>
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