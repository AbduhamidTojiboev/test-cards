<?php

namespace App\Exports;

use App\Data\CardData;
use App\Services\CardService;

class ExportFileCardService extends BaseExportExlService
{
    public function exportFile(string $path): string
    {
        $this->setPathToFile($path);
        $this->openSpreadsheet();
        $service = new CardService();
        foreach ($this->sheet->toArray() as $key => $item) {
            $data = new CardData($item[1]??'', $item[2]??'');
            $service->getData($data);
            $this->setCellValue('D' . $key + 1, $data->type);
            $this->setCellValue('E' . $key + 1, $data->bankName);
        }
        $this->save();

        return $path;
    }
}
