<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

abstract class BaseExportExlService
{
    protected string $pathToFile;
    protected Spreadsheet $spreadsheet;
    protected Worksheet $sheet;
    protected string $extension = 'xls';
    protected function openSpreadsheet(): void
    {
        if (file_exists($this->pathToFile)) {
            $this->extension = pathinfo($this->pathToFile, PATHINFO_EXTENSION);
            $reader = new Xlsx();
            if ($this->extension == 'xls') {
                $reader = new Xls();
            }
            $this->spreadsheet = $reader->load($this->pathToFile);
            $this->sheet = $this->spreadsheet->getActiveSheet();
        }
    }

    public function setPathToFile(string $path): void
    {
        $this->pathToFile = storage_path($path);
    }

    protected function setCellValue(string $cell, mixed $value): void
    {
        $this->sheet->setCellValue($cell, $value);
    }

    protected function save()
    {
        if ($this->extension == 'xls') {
            $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xls($this->spreadsheet);
        }else{
            $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($this->spreadsheet);
        }
        $writer->save($this->pathToFile);
    }
}
