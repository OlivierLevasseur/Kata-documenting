<?php

require __DIR__ . '/vendor/autoload.php';

$referenceWord = new \App\Word('documenting');
$filePath = __DIR__.'/word_list_long.txt';

$wordPairList = (new \App\AnagramComputer($filePath))->findAllFrom($referenceWord);

foreach ($wordPairList as $wordPair) {
    echo $wordPair.PHP_EOL;
}
