<?php
session_start();

function validate_number($val, $min, $max): bool
{
    return isset($val) && is_numeric($val) && ($val>=$min) && ($val<=$max);
}

$start = microtime(true);
$x = (@$_GET['x']);
$y = (@$_GET['y']);
$r = (@$_GET['r']);
$timezone= @$_GET["timezone"];

if(validate_number($x,-2,2) && validate_number($y,-3,5) && validate_number($r,1,3) ){
    $x = (float)($x);
    $y = (float)($y);
    $r = (float)($r);
} else {
    http_response_code(400);
    echo "Invalid parameters";
    return;
}


function inPolygon($x, $y, $r)
{
    return ($x <= 0 and $x >= -$r and $y >= 0 and $y <= $r/2 and $y>=-2*$x-$r)
        or ($x >= 0 and $x <= $r and $y <= 0 and $y <= $r and sqrt($x*$x+$y*$y)<=$r/2)
        or ($x <= 0 and $x <= $r and $y <= 0 and $y <= $r/2);
}


$attempt = array('x' => $x, 'y' => $y, 'r' => $r, 'result' => inPolygon($x, $y, $r), 'current_time' => date( "G:i:s j/m/o", time()-$timezone*60), 'execution_time' => round(microtime(true) - $start,6));

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









