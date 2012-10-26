<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Kummerkästchen</h1>
        <p>Da der Kummerkasten derzeit nicht funktionsfähig ist, aber die Probleme im Studienbetrieb nicht warten, muss kurzfristig provisorischer Ersatz geschaffen werden.</p>
        <p>Nach <a href="http://www.landesrecht-bw.de/jportal/?quelle=jlink&docid=jlr-HSchulGBWV6P26&psml=bsbawueprod.psml&max=true#P26-A5">LHG § 26 (5)</a> haben alle Studierenden</p>
        <blockquote>
            …das Recht, den zuständigen Studiendekan auf
            Mängel bei der Durchführung des Lehr-
            und Studienbetriebes oder die Nichteinhaltung von
            Vorschriften der Studien- und Prüfungsordnung
            hinzuweisen und die Erörterung der Beschwerde in
            der zuständigen Studienkommission zu beantragen.
            Antragsteller sind über das Ergebnis der Beratung
            zu unterrichten.
        </blockquote>
        <p>Mit diesem Formular möchten wir euch ermöglichen, dieses Recht direkt wahr zu nehmen. Dazu müsst ihr nur angeben, wer der_die zuständige Studiendekan_in ist, eure Hinweise in das Freitextfeld eintragen und das Formular absenden.</p>
        <p>Eure Bedenken werden dann (nach einer Überprüfung auf eindeutig beleidigende Inhalte) direkt anonym an den_die zuständige Studiendekan_in weitergeleitet. Auf Wunsch könnt ihr auch eine E-Mail-Addresse angeben, an die die Rückantwort versandt werden soll, gebt damit aber natürlich eure Anonymität auf.</p>
        <form action="post.php" method="POST">
            <input type="hidden" name="utf8" value="✔">

            <label for="fach">Das Problem betrifft:</label>
            <label for="math">Mathematik</label><input type="checkbox" name="fach[]" value="μ" id="math">
            <label for="inf">Informatik</label><input type="checkbox" name="fach[]" value="ι" id="inf">

            <textarea rows="10" cols="80" name="text"></textarea>
            <label for="email">E-Mail (optional):</label> <input name="email">

            <input type="submit" name="submit" value="Abschicken" id="submit">
        </form>
    </body>
</html>
