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
<div class="wrapper">
    <form name="notes" method="post" action="save.php" class="w3-white" autocomplete="off">
        <div class="w3-container w3-teal">
            <h1>Note Taker</h1>
        </div>
        <div class="w3-container">
            <label>
                <p>Notes</p>
                <textarea name="notes" class="w3-input w3-border w3-border-red" style="height: 200px;" required="required"></textarea>
            </label>
            <label>
                <input type="submit" class="w3-input w3-btn w3-red" value="Save Note" />
            </label>
        </div>
        <br/>
    </form>
    <p><a href="notes.php">View notes</a></p>
<!--    <img src="images/qr.png" height="270" width="272"/>-->
</div>
</body>
</html>