<?php

namespace App\Parser;

use RuntimeException;

class TagParser implements TagParserInterface
{
    const PATTERN = '/<%s[^>]*>(?P<value>.*)<\/%s>/';

    public function __invoke(string $content, string $tag)
    {
        preg_match_all(sprintf(self::PATTERN, $tag, $tag), $content, $matches);
        if (count($matches ['value']) === 0) {
            throw $this->tagNotFound($tag);
        }
        return $matches['value'];
    }

    protected function tagNotFound(string $tag): RuntimeException
    {
        return new RuntimeException(sprintf('Tag [`%s`] not found', $tag));
    }


}
