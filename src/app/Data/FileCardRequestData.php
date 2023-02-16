<?php

namespace App\Data;

use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;

class FileCardRequestData extends Data
{
    public function __construct(
        public UploadedFile $file,
        public string $url,
    ) {}
}
