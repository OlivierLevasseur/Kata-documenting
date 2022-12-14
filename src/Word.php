<?php

namespace App;

use function array_diff;
use function explode;
use function implode;
use function sprintf;

use const PHP_EOL;

class Word
{
    private array $letters;

    /**
     * @param string $letters
     */
    public function __construct(string $letters)
    {
        $this->letters = str_split($letters);
    }

    public function merge(Word $other): self
    {
        return new Word($this.$other);
    }

    public function isAnagrameOf(Word $word): bool
    {
        $orderedletterList = $this->letters;
        sort($orderedletterList);
        $otherOrderedletterList = $word->letters;
        sort($otherOrderedletterList);

//        printf("composer %s with %s ".PHP_EOL, $this, $word);

        return $otherOrderedletterList === $orderedletterList;
    }

    public function isSameSizeAs(Word $other): bool
    {
        return count($this->letters) === count($other->letters);
    }

    public function __toString(): string
    {
        return implode('',$this->letters);
    }
}
