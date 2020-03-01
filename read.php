<?php
$file = "notes/".preg_replace("/[^a-z0-9\-\.]/is", "", $_GET["file"]);
#die($file);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Notes Taker</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w3.css" />
    <link rel="stylesheet" href="css/book.css" />
</head>
<body>
<div class="wrapper wrapper-note">
    <?php echo nl2br(file_get_contents($file)); ?>
</div>
</body>
</html>
