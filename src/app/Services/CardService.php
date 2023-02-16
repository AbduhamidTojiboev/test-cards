<?php

namespace App\Services;

use App\Data\CardData;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class CardService
{
    private $card = [
        'AMERICAN EXPRESS',
        'VISA',
        'DISCOVER CONSUMER',
        'PAYPAL',
        'MASTERCARD',
        'AXES',
        'BANKCARD',
        'UNION PAY',
        'MAESTRO',
        'GENERIC',
        'ELECTRONIC',
    ];

    private $bank = [
        'Allahabad Bank',
        'Andhra Bank',
        'Axis Bank',
        'Bank of Bahrain and Kuwait',
        'Bank of Baroda - Corporate Banking',
        'Bank of Baroda - Retail Banking',
        'Bank of India',
        'Bank of Maharashtra',
        'Canara Bank',
        'Central Bank of India',
        'City Union Bank',
    ];

    public function getData(CardData $data)
    {
        $data->type = $this->card[rand(0, 9)];
        $data->bankName = $this->bank[rand(0, 9)];
    }

    public static function getClient()
    {
        return new Client([
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'multipart/form-data',
                'User-Agent' => 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)'
            ],
        ]);
    }

    public function sendFilePostRequest(string $url, string $path): bool
    {
        try {
            $client = self::getClient();
            $client->post($url,
                [
                    'multipart' => [
                        [
                            'name' => 'file',
                            'contents' => file_get_contents($path),
                            'filename' => 'filecard.'.pathinfo($path, PATHINFO_EXTENSION)
                        ]
                    ],
                ]);

            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
}
