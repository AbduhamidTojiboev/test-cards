<?php

namespace App\Services;

use App\Data\FileCardData;
use App\Data\FileCardRequestData;
use App\Repositories\Contract\FileCardRepositoryContract;
use App\Services\Contract\FileCardServiceContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FileCardService implements FileCardServiceContract
{
    public const PATH = 'cards';
    /**
     * FileCardService constructor
     *
     * @param FileCardRepositoryContract $repository
     */
    public function __construct(protected FileCardRepositoryContract $repository)
    {
    }

    /**
     * @param FileCardRequestData $data
     * @return FileCardData
     */
    public function create(FileCardRequestData $data): FileCardData
    {
        $name = Str::uuid() . '.' .$data->file->getClientOriginalExtension();
        $data->file->move(storage_path(self::PATH), $name);
        $data = $data->toArray();
        $data['file'] = self::PATH . DIRECTORY_SEPARATOR . $name;

        return $this->repository->create(FileCardData::from($data));
    }
}
