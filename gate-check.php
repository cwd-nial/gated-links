<?php ob_start();

function ftpServerGetUrls()
{
    $csvFile = file('urls.csv');
    $data = [];
    foreach ($csvFile as $line) {
        $t = str_getcsv($line);
        $data[$t[0]] = $t[1];
    }

    return $data;
}

$urls = ftpServerGetUrls();

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
        header('Location: links.php?url=' . $urls[$_GET['ref']]);
    } elseif ($_POST['submit']) {
        if ($_POST['email'] === 'kung-lao@mk11.com' && $_POST['password'] === 'you-loose') {
            header('Location: links.php?url=' . $urls[$_POST['ref']]);
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
        <?php if (isset($_GET['error'])) : ?>
            <br>
            <i>credentials are wrong!</i><br>
            <sub>HINT: try with "kung-lao@mk11.com" AND "you-loose" ;)</sub>
        <?php endif;
    } ?>
    </body>
    </html>
<?php ob_end_flush(); ?>