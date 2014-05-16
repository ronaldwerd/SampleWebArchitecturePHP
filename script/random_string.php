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

    $stringBuffer;

    return $stringBuffer;
}

class RandomStringTest {

    static function testLength($length) {

        $realLength = strlen(randomString($length));

        if($length == $realLength) {
            echo "String length passed\n";
        } else {
            echo "String length failed\n";
        }
    }

    static function testCharacters() {

        $stringToTest = randomString(10);

        $result = preg_match('/^[a-zA-Z0-9]+$/', $stringToTest);

        if($result == true) {
            echo "String characters passed\n";
        } else {
            echo "String characters failed\n";
        }
    }
}


RandomStringTest::testLength(10);
RandomStringTest::testCharacters();
