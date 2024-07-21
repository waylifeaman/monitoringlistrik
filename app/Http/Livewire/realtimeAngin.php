<?php

namespace App\Http\Livewire;

use App\Models\angin;
use Livewire\Component;
use App\Models\dataangin;

class RealtimeAngin extends Component
{
    public $lastdataangin;

    public function mount()
    {
        $this->loadLastangin();
    }

    public function render()
    {

        return view('livewire.real-time-angin');
    }

    public function loadLastangin()
    {
        $this->lastdataangin = dataangin::latest()->first();
    }
    public function hydrate()
    {
        $this->emit('debug', 'Hydrated!');
        $this->loadLastangin();
    }
    public function updatedData()
    {
        $this->emit('updateChart', $this->lastdataangin->kec_angin,);
        // $this->emit('updateChart', $this->lastdata->kec_angin, $this->lastdata->kelembaban_ind);
    }
}
