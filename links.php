<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Gated Links</title>
    <meta name="description" content="Gated Links">
    <meta name="author" content="cyclops web-dev">
</head>

<body>
<?php if ($_GET['ref']): ?>
    <h2>Go ahead, google it, SUCKER! :D</h2>
    <a href="<?= $_GET['ref'] ?>"><?= $_GET['ref'] ?></a>
<?php else: ?>
    <h2>So you want this information?</h2>
    <a href="http://localhost/gate-check.php?ref=1">Get rich in 5 hours! (PDF download)</a><br>
    <a href="http://localhost/gate-check.php?ref=2">Get a six pack fast! (PDF download)</a><br>
    <a href="http://localhost/gate-check.php?ref=3&logged-in=1">Understand the meaning of life... (PDF download)</a>
<?php endif; ?>
</body>
</html>