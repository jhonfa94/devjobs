<div>
    {{-- The Master doesn't talk, he acts. --}}

    <form method="post" action="" class="" wire:submit.prevent='editarVacante'>

        <div class="mt-4">
            <x-label for="titulo" :value="__('Título Vacante')" />
            <x-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')"
                placeholder="Título de la vacante" />
            @error('titulo')
                <livewire:mostrar-alerta :message="$message">
                @enderror
        </div>

        <div class="mt-4">
            <x-label for="salario" :value="__('Salario Mensual')" />
            <select wire:model="salario" id="salario"
                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                <option value="">--Seleccione un salario--</option>
                @foreach ($salarios as $salario)
                    <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
                @endforeach
            </select>
            @error('salario')
                <livewire:mostrar-alerta :message="$message">
                @enderror
        </div>

        <div class="mt-4">
            <x-label for="categoria" :value="__('Categoría')" />
            <select wire:model="categoria" id="categoria"
                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                <option value="">--Seleccione una categoría--</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                @endforeach
            </select>
            @error('categoria')
                <livewire:mostrar-alerta :message="$message">
                @enderror
        </div>

        <div class="mt-4">
            <x-label for="empresa" :value="__('Empresa')" />
            <x-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')"
                placeholder="Ejemplo: Uber, Netflix, " />
            @error('empresa')
                <livewire:mostrar-alerta :message="$message">
                @enderror
        </div>

        <div class="mt-4">
            <x-label for="ultimo_dia" :value="__('Último día para postularse')" />
            <x-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia"
                :value="old('ultimo_dia')" />
            @error('ultimo_dia')
                <livewire:mostrar-alerta :message="$message">
                @enderror
        </div>

        <div class="mt-4">
            <x-label for="descripcion" :value="__('Descripción puesto')" />
            <textarea id="descripcion" wire:model="descripcion"
                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full h-50"
                placeholder="Descripción general del puestom experiencia"></textarea>
            @error('descripcion')
                <livewire:mostrar-alerta :message="$message">
                @enderror
        </div>

        <div class="mt-4 mb-4">
            <x-label for="imagen_nueva" :value="__('Imagen Vacante')" />
            <x-input id="imagen_nueva" class="block mt-1 w-full" type="file" wire:model="imagen_nueva" accept="image/*" />
            @error('imagen_nueva')
                <livewire:mostrar-alerta :message="$message">
                @enderror
        </div>

        <div class="my-5 w-80">
            <x-label  :value="__('Imagen Actual')" />

            <img src="{{ asset('storage/vacantes/'.$imagen) }}" alt="{{ 'Imagen Vacante' . $titulo }}">


        </div>

        <div class="my-5 w-80">
            @if ($imagen_nueva)
                <x-label  :value="__('Imagen nueva')" />
                <img src="{{ $imagen_nueva->temporaryUrl() }}">
            @endif
        </div>

        <x-button>
            Guardar Cambios
        </x-button>
    </form>




    <!-- Validation Errors -->
    {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
</div>
