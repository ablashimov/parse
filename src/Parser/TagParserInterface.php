<?php

namespace App\Parser;

interface TagParserInterface
{
    public function __invoke(string $content, string $tag);
}
