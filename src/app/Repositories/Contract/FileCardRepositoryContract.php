<?php

namespace App\Repositories\Contract;

use App\Data\FileCardData;
use Illuminate\Database\Eloquent\Model;

interface FileCardRepositoryContract
{
    /**
     * Create a model
     *
     * @param FileCardData $data
     * @return FileCardData
     */
    public function create(FileCardData $data): FileCardData;
}
