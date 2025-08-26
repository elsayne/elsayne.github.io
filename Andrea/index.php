<!DOCTYPE html>
<html>

<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <style>
        h1 {text-align: center;}
    </style>
    <?php
        spl_autoload_register(function ($class) {
            include 'class/' . $class . '.php';
        });
    ?>
</head>
<body>
    <h1>Ready for the mosh pit, shaka brah!</h1>
    <p>Andrea is the love of my life and I can hardly believe I get to spend time with her following our dreams. Děkuju, moje lásko</p>
    <a href="../index.html">Back</a>
    <?php
        echo "\n";
        $content = [
            new Game("Cult of the Lamb", 82, TRUE, FALSE, 19.5),
            new Game("Minecraft", 93, TRUE, TRUE, -1),
            new Movie("Winter on Fire", 83, FALSE, TRUE, 102),
            new TvShow("Konosuba", 78, FALSE, FALSE, 24, 34)
        ];
        echo "<table>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Length</th>
                    <th>Rating</th>
                    <th>Did Maddie see it already?</th>
                    <th>Did Andrea see it already?</th>
                </tr>";
        foreach ($content as $media) {
            echo $media->generateRow();
        }
        echo "</table>"
    ?>
</body>
