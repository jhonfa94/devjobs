<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bol-my-4">Postularme a esta Vacante </h3>

    @if (session()->has('mensaje'))
        <p class="uppercase border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 rounded-lg">
            {{ session('mensaje') }}
        </p>
    @else
        <form class="w-96 mt-5" wire:submit.prevent='postularme'>
            <div class="mb-4">
                <x-label for="cvUser" :value="__('Curriculum o Hoja de vida (PDF)')" />
                <x-input id="cvUser" wire:model="cv" type="file" accept=".pdf" class="block w-full" />
            </div>
            @error('cv')
                <livewire:mostrar-alerta :message="$message">
                @enderror

                <x-button class="my-5">
                    Postularme
                </x-button>
        </form>
    @endif
</div>
