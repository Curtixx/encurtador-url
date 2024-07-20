<?php

namespace App\Livewire;

use App\Models\Link;
use App\Pipes\GenerateHasUrl;
use App\Service\EncurtadorService;
use Illuminate\Support\Facades\Pipeline;
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

        $createURL =  Pipeline::send($this->url)
            ->through([
                GenerateHasUrl::class,
            ])
            ->then(fn(Link $link) => $link);

        $this->createURL = $createURL;
    }
}
