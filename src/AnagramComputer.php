<?php

namespace App;

use function var_dump;

class AnagramComputer
{
    private WordGenerator $wordGenerator;

    public function __construct(string $filePath)
    {
        $this->wordGenerator = new WordGenerator($filePath);
    }


    public function findAllFrom(Word $reference): WordPairList
    {
        $sourceWordList = $this->wordGenerator->extractFromFile();
        $wordPairList = $this->generateWordPairList($sourceWordList);
        $anagrameWordPairList = new AnagramWordPairList($reference, $wordPairList);
        return $anagrameWordPairList->toWordPairList();
    }

    private function generateWordPairList(WordList $wordList): WordPairList
    {
        $wordPairList = [];

        foreach ($wordList as $word) {
            $wordPairs = $this->generateWordPairForWord($word, $wordList->clone());
            array_push($wordPairList, ...$wordPairs);
        }

        return new WordPairList($wordPairList);
    }

    private function generateWordPairForWord(Word $firstWord, WordList $wordList): array
    {
        $wordPairs = [];
        foreach ($wordList as $otherWord) {
            $wordPairs[] = new WordPair($firstWord, $otherWord);
        }
        return $wordPairs;
    }
}
