<?
    include("../config.php");
    function utf8_to_latin2($str) {
        return iconv('utf-8', 'ISO-8859-2', $str);
    }
    function send_mail($msg, $from, $fach, $to) {
        return mail($to,
                   "Probleme in der Lehre $fach",
                   $msg,
                   "Content-Type: text/plain; charset=UTF-8; format=flowed\r\n" .
                   "Content-Transfer-Encoding: 8bit\r\n" .
                   "From: " . $from . "\r\n" .
                   "Reply-To: " . $from . "\r\n");
     }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?
            if (isset($_GET["approve"])) {
                $id = preg_replace("/[^0-9a-f]/", "", $_GET["approve"]);
                $found = false;
                if (file_exists("../posts_inf/$id.txt")) {
                    $found = true;
                    $file = file("../posts_inf/$id.txt", FILE_IGNORE_NEW_LINES);

                    $from = $file[0];
                    if ($from == "") {
                        $from = $conf['default_mail'];
                    }

                    $msg = join("\n", array_splice($file, 1));
                    if (send_mail($msg, $from, "Informatik", $conf['info_mail'])) {
                        unlink("../posts_inf/$id.txt");
                    } else {
                        echo "<p>Konnte Mail nicht versenden</p>";
                    }
                }
                if (file_exists("../posts_math/$id.txt")) {
                    $found = true;
                    $file = file("../posts_math/$id.txt", FILE_IGNORE_NEW_LINES);

                    $from = $file[0];
                    if ($from == "") {
                        $from = $conf['default_mail'];
                    }

                    $msg = join("\n", array_splice($file, 1));
                    if (send_mail($msg, $from, "Mathematik", $conf['math_mail'])) {
                        unlink("../posts_math/$id.txt");
                    } else {
                        echo "<p>Konnte Mail nicht versenden</p>";
                    }
                }
                if (!$found) {
                    echo "<p>$id nicht gefunden</p>";
                }
            }
            if (isset($_GET["delete"])) {
                $id = preg_replace("/[^0-9a-f]/", "", $_GET["delete"]);
                $found = false;
                if (file_exists("../posts_math/$id.txt")) {
                    unlink("../posts_math/$id.txt");
                    $found = true;
                }
                if (file_exists("../posts_inf/$id.txt")) {
                    unlink("../posts_inf/$id.txt");
                    $found = true;
                }
                if (!$found) {
                    echo ("<p>$id nicht gefunden</p>");
                }
            }
        ?>
        <h1>Mathematik</h1>
        <table>
            <tr>
                <th>E-Mail</th>
                <th>Text</th>
                <th>Approve</th>
            </tr>
            <?
                foreach (glob("../posts_math/*.txt") as $filename) {
                    $file = file($filename, FILE_IGNORE_NEW_LINES);

                    preg_match("/posts_math\/(.+)\.txt/", $filename, $matches);
                    $id = $matches[1];

                    echo "<tr>";
                    echo "<td>" . $file[0] . "</td>";
                    echo "<td>";
                    echo htmlspecialchars($file[1]);
                    for ($i = 2; $i < count($file); $i++) {
                        echo "<br>\n" . htmlspecialchars($file[$i], ENT_HTML5);
                    }
                    echo "</td>";
                    echo "<td class=\"appr\"><a href=\"?delete=$id\"><img src=\"thumb_down.png\"></a><a href=\"?approve=$id\"><img src=\"thumb_up.png\"></a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
        <h1>Informatik</h1>
        <table>
            <tr>
                <th>E-Mail</th>
                <th>Text</th>
                <th>Approve</th>
            </tr>
            <?
                foreach (glob("../posts_inf/*.txt") as $filename) {
                    $file = file($filename, FILE_IGNORE_NEW_LINES);

                    preg_match("/posts_inf\/(.+)\.txt/", $filename, $matches);
                    $id = $matches[1];

                    echo "<tr>";
                    echo "<td>" . $file[0] . "</td>";
                    echo "<td>";
                    echo htmlspecialchars($file[1]);
                    for ($i = 2; $i < count($file); $i++) {
                        echo "<br>\n" . htmlspecialchars($file[$i], ENT_HTML5);
                    }
                    echo "</td>";
                    echo "<td class=\"appr\"><a href=\"?delete=$id\"><img src=\"thumb_down.png\"></a><a href=\"?approve=$id\"><img src=\"thumb_up.png\"></a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>
