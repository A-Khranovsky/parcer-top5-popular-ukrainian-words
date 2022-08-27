<?php

namespace App;

class Parcer
{
    private $source, $buffer = [];

    public function __construct($source)
    {
        $this->source = $source;

        $words = $this->getWords();
        $this->buffer = $this->findPopular($words);
    }

    private function getWords()
    {
        $pattern = '/([а-яіїє]+)/ui';
        preg_match_all($pattern, $this->source, $words);
        return $words;
    }

    private function findPopular($words)
    {
        $result = [];
        foreach ($words[0] as $word) {
            $result[$word] = preg_match_all('/\b' . $word . '\b/ui', $this->source);
        }
        return $result;
    }

    private function popularCount($source, &$number)
    {
        foreach ($source as $key => $item) {
            if ($item == $number) {
                yield $key;
            }
        }
    }

    public function parse()
    {
        $result = [];
        for ($i = 1; $i <= 5; $i++) {
            foreach ($this->popularCount($this->buffer, $i) as $item) {
                $result[$i][] = $item;
            }
            if(isset($result[$i])) {
                usort($result[$i], function ($first, $second) {
                    $first = preg_replace([
                        '/а/u', '/б/u', '/в/u', '/г/u', '/ґ/u', '/д/u', '/е/u', '/є/u', '/ж/u', '/з/u', '/и/u', '/і/u',
                        '/ї/u', '/й/u', '/к/u', '/л/u', '/м/u', '/н/u', '/о/u', '/п/u', '/р/u', '/с/u', '/т/u', '/у/u',
                        '/ф/u', '/х/u', '/ц/u', '/ч/u', '/ш/u', '/щ/u', '/ь/u', '/ю/u', '/я/u',
                    ], [
                        'X', 'Y', 'Z', '[', ']', '^', '_', '`', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k',
                        'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'
                    ], $first);
                    $second = preg_replace([
                        '/а/u', '/б/u', '/в/u', '/г/u', '/ґ/u', '/д/u', '/е/u', '/є/u', '/ж/u', '/з/u', '/и/u', '/і/u',
                        '/ї/u', '/й/u', '/к/u', '/л/u', '/м/u', '/н/u', '/о/u', '/п/u', '/р/u', '/с/u', '/т/u', '/у/u',
                        '/ф/u', '/х/u', '/ц/u', '/ч/u', '/ш/u', '/щ/u', '/ь/u', '/ю/u', '/я/u',
                    ], [
                        'X', 'Y', 'Z', '[', ']', '^', '_', '`', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k',
                        'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'
                    ], $second);

                    return $first <=> $second;
                });
            }
        }
        return $result;
    }
}

