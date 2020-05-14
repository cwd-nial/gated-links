<?php ob_start(); ?>
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
    if ($_POST['submit']) {
        if ($_POST['email'] === 'kung-lao@mk11.com' && $_POST['password'] === 'you-loose') {

            switch ($_POST['ref']) {
                case 1:
                    $url = "https://www.google.com/search?q=Get+rich+in+5+hours!";
                    break;
                case 2:
                    $url = "https://www.google.com/search?q=Get+a+six+pack+fast!";
                    break;
                default:
                    $url = "";
            }
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