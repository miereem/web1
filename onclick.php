<?php
session_start();
$start = microtime(true);
$x = (float)(@$_GET['x']);
$y = (float)(@$_GET['y']);
$r = (float)(@$_GET['r']);
$timezone= @$_GET["timezone"];

function inPolygon($x, $y, $r)
{
    return ($x <= 0 and $x >= -$r and $y >= 0 and $y <= $r / 2 and $r / 2 + 0.5 * $x >= $y)
        or ($x >= 0 and $x <= $r / 2 and $y >= 0 and $y <= $r / 2 and $x * $x + $y * $y <= $r * $r / 4)
        or ($x >= 0 and $x <= $r / 2 and $y <= 0 and $y >= -$r);
}

$attempt = array('x' => $x, 'y' => $y, 'r' => $r, 'result' => inPolygon($x, $y, $r), 'current_time' => date( "G:i:s j/m/o", time()-$timezone*60), 'execution_time' => round(microtime(true) - $start, 5));

if (!isset($_SESSION['attempts'])) {
    $_SESSION['attempts'] = array($attempt);
} else {
    array_push($_SESSION['attempts'], $attempt);
}

if (isset($_SESSION['attempts'])) {
    foreach ($_SESSION['attempts'] as $index => $elem) {
        echo "<tr class='columns'>";
        echo "<td>" . $index + 1 . "</td>";
        echo "<td>" . $elem['x'] . "</td>";
        echo "<td>" . $elem['y'] . "</td>";
        echo "<td>" . $elem['r'] . "</td>";
        if ($elem['result'] == 1) {
            echo ('<td> <p>HIT</p></td>');
        } else {
            echo ('<td> <p>MISS</p></td>');
        }
        echo "<td>" . $elem['current_time'] . "</td>";
        echo "<td>" . $elem['execution_time'] . "ms" . "</td>";
        echo "</tr>";
    }
}









