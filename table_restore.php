<?php
session_set_cookie_params(0);
session_start();
if (isset($_SESSION['attempts'])) {
    foreach ($_SESSION['attempts'] as $index => $elem) {
        echo "<tr class='columns'>";
        echo "<td>" . $index + 1 . "</td>";
        echo "<td>" . $elem['x'] . "</td>";
        echo "<td>" . $elem['y'] . "</td>";
        echo "<td>" . $elem['r'] . "</td>";
        if ($elem['result']) {
            echo('<td> <p>HIT</p></td>');
        } else {
            echo('<td> <p>MISS</p></td>');
        }
        echo "<td>" . $elem['current_time'] . "</td>";
        echo "<td>" . $elem['execution_time'] . "ms" . "</td>";
        echo "</tr>";
    }
}