<!DOCTYPE html>
<html lang="en">
<head>
<title>Regex Tester</title>
<link rel="stylesheet"
href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
<script
src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<style>
body{
margin-top: 30px;
}
.label {
margin: 0px 3px;
}
</style>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="alert alert-danger hide" id="alert-box" name="alert-box"></div>
<div class="form-group">
<label for="input-text">Text</label>
<form  method="post">
<input
type="text"
class="form-control"
id="input-text"
name="input-text"
placeholder="Text"
>
</div>
<label for="inputRegex">Regex</label>
<div class="input-group">
<input
type="text"
class="form-control"
id="input-regex",
name="input-regex",
placeholder="Regex"
>
<span class="input-group-btn">
<input type="submit" value="TEST!!" class="btn btn-default"
id="test-button",
name="test-button",>

</span>
</div>
</div>
</div>

<div class="row">
<h3>Results</h3>
<div class="col-sm-12">
<div class="well well-lg" id="results-box", name="results-box"></div>
</div>
</div>
</div>

</form>
<?php

$textbox = $_POST['input-text'];
$regexbox = $_POST['input-regex'];
$alertbox = $_POST['alert-box'];
$resultsbox = $_POST['results-box'];

$text = $textbox;
$regex = $regexbox;

//handle empty value
if (empty($text)) {
    err("Please enter some text to test.");
} else if (empty($regex)) {
    err("Please enter a regular expression.");
} else {
    $regex = createRegex($regex);
    if (!$regex) {
        return;
    }
    //get matches
    $results = getMatches($regex, $text);
    if (count($results) > 0 && $results[0] !== null) {
        $html = getMatchesCountString($results);
        $html .= getResultsString($results, $text);
        $resultsbox = $html;
    } else {
        $resultsbox = "There were no matches.";
    }
}

function clearResultsAndErrors() {
    global $resultsbox, $alertbox;
    $resultsbox = "";
    $alertbox = "";
}

function err($str) {
    global $alertbox;
    $alertbox = $str;
}

function createRegex($regex) {
    if (substr($regex, 0, 1) == '/') {
        $regex = explode("/", $regex);
        array_shift($regex);
        $flags = array_pop($regex);
        $regex = implode("/", $regex);
        $regex = new RegExp($regex, $flags);
    } else {
        $regex = new RegExp($regex, "g");
    }
    return $regex;
}

function getMatches($regex, $text) {
    $results = [];
    $result;
    if ($regex->global) {
        while(($result = $regex->exec($text)) !== null) {
            $results[] = $result;
        }
    } else {
        $results[] = $regex->exec($text);
    }
    return $results;
}

function getMatchesCountString($results) {
    if (count($results) === 1) {
        return "<p>There was one match.</p>";
    } else {
        return "<p>There are " . count($results) . " matches.</p>";
    }
}

function getResultsString($results, $text) {
    for ($i = count($results) - 1; $i >= 0; $i--) {
        $result = $results[$i];
        $match = (string)$result;
        $prefix = substr($text, 0, $result->index);
        $suffix = substr($text, $result->index + strlen($match));
        $text = $prefix . '<span class="label label-info">' . $match . '</span>' . $suffix;
    }
    return "<h4>" . $text . "</h4>";
}

?>


</body>
</html>


   
