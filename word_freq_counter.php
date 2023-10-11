<!DOCTYPE html>
<html>
<head>
    <title>Word Frequency Counter</title>
</head>
<body>
    <h1>Word Frequency Counter</h1>

    <?php
    function tokenize_Text($text) {
        $text = strtolower($text);
        $text = preg_replace("/[^a-z\s]/", "", $text);
        $words = preg_split("/\s+/", $text, -1, PREG_SPLIT_NO_EMPTY);
        return $words;
    }

    function calculateWordFrequency($text, $stopWords) {
        $words = tokenize_Text($text);
        $wordCounts = array_count_values($words);

        foreach ($stopWords as $stopWord) {
            unset($wordCounts[$stopWord]);
        }

        return $wordCounts;
    }

    $stopWords = array("the", "and", "in", "of", "to", "a", "for");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $text = $_POST["text"];
        $sortOrder = $_POST["sort"];
        $displayLimit = $_POST["display_limit"];

        $wordCounts = calculateWordFrequency($text, $stopWords);

        if ($sortOrder === "desc") {
            arsort($wordCounts);
        } else {
            asort($wordCounts);
        }


        $wordCounts = array_slice($wordCounts, 0, $displayLimit);


        echo "<h2>Top $displayLimit words:</h2>";
        echo "<table>";
        echo "<tr><th>Word</th><th>Frequency</th></tr>";
        foreach ($wordCounts as $word => $count) {
            echo "<tr><td>$word</td><td>$count</td></tr>";
        }
        echo "</table>";
    }
    ?>
    <p><a href="index.php">Word frequency counter</a></p>
</body>
</html>
