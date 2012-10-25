<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?
            foreach ($_POST['fach'] as $fach) {
                if ($fach == "μ") {
                    $file = "../posts_math/";
                } else {
                    $file = "../posts_inf/";
                }
                $mail = preg_replace('/\n|\r/', '', $_POST["email"]);
                $file .= sha1($_POST["email"] . $_POST["text"]) . ".txt";
                file_put_contents($file,"$mail\n" . $_POST["text"]);
            }
        ?>
        <h1>Nachricht gespeichert.</h1>
    </body>
</html>
