<?php

namespace App\Jobs;

use App\Data\FileCardData;
use App\Exports\ExportFileCardService;
use App\Services\CardService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FileCardJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(protected FileCardData $data)
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $service = new ExportFileCardService();
        $path = $service->exportFile($this->data->file);
        $cardService = new CardService();
        $cardService->sendFilePostRequest($this->data->url, storage_path($path));
    }
}
