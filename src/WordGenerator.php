<?php

namespace App;

use function array_map;
use function explode;
use function file;
use function file_get_contents;
use function implode;
use function preg_replace;
use function trim;

class WordGenerator
{
    private const WORD_SEPARATOR = ' ';
    private string $filePath;

    /**
     * @param string $filePath
     */
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function extractFromFile(): WordList
    {
        $stringWords = $this->getStringWords();
        return $this->extractWordListFromLine($stringWords);
    }

    /**
     * @param array $stringWords
     * @return WordList
     */
    private function extractWordListFromLine(array $stringWords): WordList
    {
        return new WordList(array_map(static fn($stringWord) => new Word($stringWord), $stringWords));
    }

    private function getStringWords(): array
    {
        $lines = file($this->filePath) ?? [];
        $lines = array_map(fn(string $line) => trim($line), $lines);
        $oneLineString = preg_replace('/\s+/',self::WORD_SEPARATOR, implode( self::WORD_SEPARATOR, $lines));
        return explode(self::WORD_SEPARATOR, $oneLineString);
    }
}
