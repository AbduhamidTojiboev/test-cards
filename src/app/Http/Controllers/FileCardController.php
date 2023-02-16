<?php

namespace App\Http\Controllers;

use App\Data\FileCardRequestData;
use App\Http\Requests\Card\FileCardRequest;
use App\Jobs\FileCardJob;
use App\Services\Contract\FileCardServiceContract;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FileCardController extends Controller
{
    public function __construct(private FileCardServiceContract $fileCardService)
    {

    }

    public function upload(FileCardRequest $request)
    {
        try {
            $data = $this->fileCardService->create(FileCardRequestData::from($request->validated()));
            FileCardJob::dispatch($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Successfully upload file',
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function import(Request $request)
    {
        try {
            $request->file('file')->store('import', 'local');
            return response()->json([
                'status' => 'success',
                'message' => 'Successfully upload file',
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
