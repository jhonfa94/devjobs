<?php

namespace App\Http\Livewire;

// use Illuminate\View\Component;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;


class CrearVacante extends Component
{
    use WithFileUploads;

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    protected $rules  = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:1024', // 1MB Max,
    ];

    public function render()
    {
        //Consultar base de datos
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.crear-vacante', compact('salarios', 'categorias'));
    }

    public function crearVacante()
    {
        $datos = $this->validate();

        //Almacenar la imagen
        $imagen = $this->imagen->store('public/vacantes');
        $nombre_imagen = str_replace('public/vacantes/', '', $imagen);

        //Crear la Vacante
        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $nombre_imagen,
            'user_id' => auth()->user()->id
        ]);


        //crear un mensaje
        session()->flash('mensaje', 'La Vacante se publicó correctamente');

        //Redireccionar al usuario
        return redirect()->route('vacantes.index');
    }
}
