<?php

namespace App;

use const PHP_EOL;

class AnagramWordPairList
{
    private WordPairList $wordPairList;

    /**
     * @param Word $referenceWord
     * @param WordPairList $wordPairList
     */
    public function __construct(Word $referenceWord, WordPairList $wordPairList)
    {
        $this->wordPairList = $wordPairList->filter(fn(WordPair $wordPair) => $referenceWord->isAnagrameOf($wordPair->toWord()));
    }

    public function print(): string
    {
        $output = '';
        foreach ($this->wordPairList as $wordPair) {
            $output .= $wordPair . PHP_EOL;
        }
        return $output;
    }

    public function toWordPairList(): WordPairList
    {
        return $this->wordPairList;
    }
}
