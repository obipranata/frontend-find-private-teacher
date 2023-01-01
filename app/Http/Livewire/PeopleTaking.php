<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PeopleTaking extends Component
{
    public $mapel;
    public $paket;
    public $guru;
    public function render()
    {
        return view('livewire.people-taking');
    }
}
