<?php

namespace App\Livewire;

use App\Models\Link;
use App\Service\EncurtadorService;
use Livewire\Component;

class Encurtador extends Component
{
    public $url;
    public $createURL;

    public function render()
    {
        return view('livewire.encurtador');
    }

    public function generateEncurtador()
    {
        $this->validate([
            'url' => 'required|url',
        ], [
            'url.required' => 'Por favor, insira uma URL',
            'url.url' => 'Por favor, insira uma URL válida',
        ]);

        $service = new EncurtadorService($this->url);
        $this->createURL = $service->generateShortURL();

    }
}
