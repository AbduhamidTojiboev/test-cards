<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class FileCardData extends Data
{
    public function __construct(
        public ?int $id,
        public string $file,
        public string $url,
    ) {}
}
