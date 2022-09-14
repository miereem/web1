<?php
$start = microtime(true);

if (!(isset($_GET['x']) && isset($_GET['y']) && isset($_GET['r']))) {
    echo "Not all variables set.";
    http_response_code(400);
} else {
        $x = (float)($_GET['x']);
        $y = (float)($_GET['y']);
        $r = (float)($_GET['r']);

    function table_clean(): void
    {
        $_SESSION['attempts'] = array();
    }


        function inPolygon($x, $y, $r)
        {
            return ($x <= 0 and $x >= -$r and $y >= 0 and $y <= $r / 2 and $r / 2 + 0.5 * $x >= $y)
                or ($x >= 0 and $x <= $r / 2 and $y >= 0 and $y <= $r / 2 and $x * $x + $y * $y <= $r * $r / 4)
                or ($x >= 0 and $x <= $r / 2 and $y <= 0 and $y >= -$r);
        }

        $attempt = array('x' => $x, 'y' => $y, 'r' => $r, 'result' => inPolygon($x, $y, $r), 'current_time' => time(), 'execution_time' => (microtime(true) - $start));

        session_start();
        //table_clean();

        if (!isset($_SESSION['attempts'])) {
            $_SESSION['attempts'] = array($attempt);
        } else {
            array_push($_SESSION['attempts'], $attempt);
        }
        include 'table.php';


}