<?php

namespace App;

use Iterator;

use function array_filter;

use function array_keys;
use function current;
use function gettype;

use function key;
use function next;
use function reset;
use function var_dump;

use const PHP_EOL;

class WordPairList implements Iterator
{
    private array $wordPairList;

    /**
     * @param array $wordPairList
     */
    public function __construct(array $wordPairList)
    {
        $this->wordPairList = $wordPairList;
    }

    public function filter(callable $callable): WordPairList
    {
        return new WordPairList(array_filter($this->wordPairList, $callable));
    }

    public function print(): string
    {
        $output = '';
        foreach ($this->wordPairList as $wordPair) {
            $output .= $wordPair . PHP_EOL;
        }
        return $output;
    }

    public function current(): mixed
    {
        return current($this->wordPairList);
    }

    public function next(): void
    {
        next($this->wordPairList);
    }

    public function key(): ?int
    {
        return key($this->wordPairList);
    }

    public function valid(): bool
    {
        return $this->key() !== null;
    }

    public function rewind(): void
    {
        reset($this->wordPairList);
    }
}
