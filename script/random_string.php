<?php

function randomString($len) {

    $stringBuffer = "";

    $charArray = array();

    for($i = 0; $i < 10; $i++) {
        $charArray[] = (string)$i;
    }

    for($i = 65; $i < 91; $i++) {
        $charArray[] = chr($i);
    }

    for($i = 97; $i < 123; $i++) {
        $charArray[] = chr($i);
    }

    $charArraySize = sizeof($charArray);

    for($i = 0; $i < $len; $i++) {
        $rand = rand(0, $charArraySize - 1);

        $stringBuffer .= $charArray[$rand];
    }

    return $stringBuffer;
}

echo randomString(10);