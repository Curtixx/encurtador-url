<?php

namespace App\Service;

use App\Models\Link;

class EncurtadorService
{

    public $url;
    public $hasURL;
    public $urlShort;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function generateHasURL()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $charactersLength = strlen($characters);
        $maxLength = 5;
        $randomString = '';

        for ($i = 0; $i < $maxLength; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $this->hasURL = $randomString;
    }

    public function generateShortURL()
    {

        $this->generateHasURL();
        $this->urlShort = 'http://127.0.0.1/r/' . $this->hasURL;

        return Link::create([
            'original_url' => $this->url,
            'short_url' => $this->urlShort,
        ]);
    }
}
