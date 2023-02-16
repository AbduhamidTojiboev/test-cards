<?php

namespace App\Repositories\Eloquent;

use App\Data\FileCardData;
use App\Models\FileCard;
use App\Models\Post;
use App\Models\User;
use App\Repositories\Contract\FileCardRepositoryContract;
use App\Repositories\Contract\PostRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class FileCardRepository implements FileCardRepositoryContract
{
    /**
     * FileCardRepository constructor
     *
     * @param FileCard $model
     */
    public function __construct(protected FileCard $model)
    {
    }

    /**
     * @param FileCardData $data
     * @return FileCardData
     */
    public function create(FileCardData $data): FileCardData
    {
        return FileCardData::from($this->model->create($data->toArray()));
    }
}
