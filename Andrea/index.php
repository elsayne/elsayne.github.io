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
        $conn = DB::getConnection();
        $sql = 'SELECT media.MediaID, media.Name, media.Rating, media.Length, 
                SUM(IF(media.MediaID = user_watched_media.MediaID AND user_watched_media.UserID = 1, 1, 0)) AS "Maddie status",
                SUM(IF(media.MediaID = user_watched_media.MediaID AND user_watched_media.UserID = 2, 1, 0)) AS "Andrea status"
                FROM `media`
                LEFT JOIN user_watched_media ON media.MediaID = user_watched_media.MediaID
                GROUP BY media.MediaID;';
        $result = $conn->query($sql);
        
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $content = [
            new Game($row["Name"], $row["Rating"], $row["Maddie status"], $row["Andrea status"], $row["Length"]), 
        ];

        $row = $result->fetch(PDO::FETCH_ASSOC);
        array_push($content, new Game($row["Name"], $row["Rating"], $row["Maddie status"], $row["Andrea status"], $row["Length"]));

        $row = $result->fetch(PDO::FETCH_ASSOC);
        array_push($content, new Movie($row["Name"], $row["Rating"], $row["Maddie status"], $row["Andrea status"], $row["Length"]));

        $row = $result->fetch(PDO::FETCH_ASSOC);
        array_push($content, new TvShow($row["Name"], $row["Rating"], $row["Maddie status"], $row["Andrea status"], $row["Length"], 34));
        
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
        echo "</table>";
    ?>
</body>
