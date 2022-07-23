<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;

    public $cv;
    public $vacante;

    protected $rules = ['cv' => 'required|mimes:pdf'];

    public function mount(Vacante $vacante)
    {
        // dd($vacante);
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        $datos = $this->validate();

        //Almacenar CV en el disco duro
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $cv);

        $user_id = auth()->user()->id;
        //Crear el candidato a la vacante
        $this->vacante->candidatos()->create([
            'user_id' => $user_id,
            'cv' => $datos['cv']
        ]);

        // dd($this->vacante);

        // Crear notificacion y enviar el email
        $this->vacante->reclutador->notify(
            new NuevoCandidato(
                $this->vacante->id,
                $this->vacante->titulo,
                $user_id
            )
        );

        //Mostrar al usuario un mensaje de ok
        session()->flash('mensaje', 'Se envió correctamente tu información, mucha suerte');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
