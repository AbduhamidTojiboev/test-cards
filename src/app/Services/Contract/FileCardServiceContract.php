<?php

namespace App\Services\Contract;

use App\Data\FileCardData;
use App\Data\FileCardRequestData;
use Illuminate\Database\Eloquent\Model;

interface FileCardServiceContract
{
    /**
     * Create a model
     *
     * @param FileCardRequestData $data
     * @return FileCardData
     */
    public function create(FileCardRequestData $data): FileCardData;
}
