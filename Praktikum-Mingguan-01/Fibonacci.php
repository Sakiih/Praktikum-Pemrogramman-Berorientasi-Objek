<?php


function fibonacci($n) {
    $a = 0;
    $b = 1;

    echo "Deret Fibonacci ($n suku): ";

    for ($i = 0; $i < $n; $i++) {
        echo $a . " ";

        $next = $a + $b;
        $a = $b;
        $b = $next;
    }
}

fibonacci(10); // 0 1 1 2 3 5 8 13 21 34

?>
