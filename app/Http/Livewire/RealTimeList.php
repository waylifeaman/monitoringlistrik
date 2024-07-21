<?php

namespace App\Http\Livewire;

use App\Models\Indor;
use Livewire\Component;
use App\Models\dataindor;

class RealTimeList extends Component
{
    public $lastdata;

    public function mount()
    {
        $this->loadLastIndor();
    }

    public function render()
    {
        return view('livewire.real-time-list');
    }

    public function loadLastIndor()
    {
        $this->lastdata = dataindor::latest()->first();
    }
    public function hydrate()
    {
        $this->emit('debug', 'Hydrated!');
        $this->loadLastIndor();
    }
}
