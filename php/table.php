<?php
if (isset($_SESSION['attempts'])) {
    error_log('err.txt');
    echo("<!DOCTYPE html>
<html lang = 'en'>
<head>
    <link rel = 'stylesheet' href = 'style.css'>
    <meta charset='utf-8'>
    <title>table</title>
</head>
<body>
<div class = 'grid-container'>
<header id = 'header'>
    Abdurasul kyzy Meerim, P32302, 3200
</header>");
    echo("<table id = 'tablee'>");
    echo("
    <thead>
    <tr>
        <th>№</th>
        <th>X</th>
        <th>Y</th>
        <th>R</th>
        <th>Result</th>
        <th>Current time</th>
        <th>Execution time</th>
    </tr>
    </thead>
</table>");

    echo("<tbody id = 'body'>");

    foreach ($_SESSION['attempts'] as $index => $attempt) {
        echo('<tr>');

        printf('<td>%s</td>', $index + 1);

        printf('<td>%s</td>', $attempt['x']);
        printf('<td>%s</td>', $attempt['y']);
        printf('<td>%s</td>', $attempt['r']);

        if ($attempt['result']) {
            echo('<td> <p class="inside">INSIDE</p></td>');
        } else {
            echo('<td> <p class="outside">OUTSIDE</p></td>');
        }

        printf('<td>%s</td>',  date('H:i:s', $attempt['current_time']));

        printf('<td>%s ms</td>', number_format($attempt['execution_time'], 5));

        echo('</tr>');
    }

    echo("<tbody>");
    echo("<table>");

}

