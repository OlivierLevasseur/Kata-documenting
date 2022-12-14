<?php

namespace App;

use Traversable;

use function array_key_exists;
use function current;
use function reset;

class WordList implements \Iterator
{
    private array $words;

    /**
     * @param array $words
     */
    public function __construct(array $words)
    {
        $this->words = $words;
    }

    public function current(): mixed
    {
        return current($this->words);
    }

    public function next(): void
    {
        next($this->words);
    }

    public function key(): ?int
    {
        return key($this->words);
    }

    public function valid(): bool
    {
        return $this->key() !== null;
    }

    public function rewind(): void
    {
        reset($this->words);
    }

    public function clone(): WordList
    {
        return new WordList($this->words);
    }
}
