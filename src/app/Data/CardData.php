<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class CardData extends Data
{
    public function __construct(
      public string $holderName,
      public string $PAN,
      public ?string $type = null,
      public ?string $bankName = null,
    ) {}
}
