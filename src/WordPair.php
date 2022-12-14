<?php

namespace App;

use function implode;

class WordPair
{
    private Word $firstWord;
    private Word $secondWord;

    /**
     * @param Word $firstWord
     * @param Word $secondWord
     */
    public function __construct(Word $firstWord, Word $secondWord)
    {
        $this->firstWord = $firstWord;
        $this->secondWord = $secondWord;
    }

    public function __toString(): string
    {
        return $this->firstWord . ' ' . $this->secondWord;
    }

    public function toWord(): Word
    {
        return $this->firstWord->merge($this->secondWord);
    }
}
