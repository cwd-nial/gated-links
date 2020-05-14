<?php ob_start();

function ftpServerGetUrl($ref)
{
    $csvFile = file('urls.csv');
    $data = [];
    foreach ($csvFile as $line) {
        $t = str_getcsv($line);
        $data[$t[0]] = $t[1];
    }

    return $data[$ref];
}

?>
    <!doctype html>

    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Gated Links</title>
        <meta name="description" content="Gated Links">
        <meta name="author" content="cyclops web-dev">
    </head>

    <body>
    <h2>gate-check</h2>
    <?php
    if ($_GET['logged-in'] === '1') {
        $url = ftpServerGetUrl($_GET['ref']);
        header('Location: links.php?ref=' . $url);
    } elseif ($_POST['submit']) {
        if ($_POST['email'] === 'kung-lao@mk11.com' && $_POST['password'] === 'you-loose') {
            $url = ftpServerGetUrl($_POST['ref']);
            header('Location: links.php?ref=' . $url);
        } else {
            header('Location: gate-check.php?error=wrong');
        }
    } else {
        ?>
        <form method="post">
            <label>Email
                <input name="email" type="email">
            </label>
            <label>Password
                <input name="password" type="password">
            </label>
            <input name="submit" type="submit" value="submit">
            <input name="ref" type="hidden" value="<?= $_GET['ref'] ?>">
        </form>
        <?php
        if (isset($_GET['error'])) {
            ?>
            <br>
            <red>credentials are wrong!</red><br>
            <sub>HINT: try with "kung-lao@mk11.com" AND "you-loose" ;)</sub>
            <?php
        }
    }
    ?>
    </body>
    </html>
<?php ob_end_flush(); ?>