<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacante extends Component
{
    public $vacante;
    public function render()
    {
        // $vacante = Vacante::find($)
        return view('livewire.mostrar-vacante');
    }
}
