<?php

namespace App\Http\Livewire;

use App\Models\datalistrik;
use Livewire\Component;

class RealtimeListrik extends Component
{
    public $lastDataListrik;

    public function mount()
    {
        $this->loadLastListrik();
    }

    public function render()
    {
        return view('livewire.realtime-listrik');
    }

    public function loadLastListrik()
    {
        $this->lastDataListrik = datalistrik::latest()->first();
    }
    public function hydrate()
    {
        $this->emit('debug', 'Hydrated!');
        $this->loadLastListrik();
    }
}
