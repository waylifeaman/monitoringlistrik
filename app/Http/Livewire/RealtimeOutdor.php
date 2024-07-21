<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\dataoutdor;

class RealtimeOutdor extends Component
{
    public $lastDataOutdor;

    public function mount()
    {
        $this->loadLastOutdor();
    }

    public function render()
    {
        return view('livewire.realtime-outdor');
    }

    public function loadLastOutdor()
    {
        $this->lastDataOutdor = dataoutdor::latest()->first();
    }
    public function hydrate()
    {
        $this->emit('debug', 'Hydrated!');
        $this->loadLastOutdor();
    }
}
