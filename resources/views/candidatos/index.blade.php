<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidatos Vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold text-center mb-10">
                        Candidatos Vacante: {{ $vacante->titulo }}
                    </h1>

                    <div class="md:flex md:justify-center p-5">
                        <ul class="divide-y divide-gray-200 w-full">
                            @forelse ($vacante->candidatos as $candidato)
                                <li class="p-3 flex items-center">
                                    <div class="flex-1">
                                        {{-- <pre>
                                            {{ $candidato->user }}
                                        </pre> --}}
                                        <p class="text-xl font-medium text-gray-800">
                                            {{ $candidato->user->name }}
                                        </p>
                                        <p class="text-sm  text-gray-600">
                                            {{ $candidato->user->email }}
                                        </p>
                                        <p class="text-sm font-medium  text-gray-600">
                                            Día que se postuló
                                            <span class="font-normal">
                                                {{ $candidato->created_at->diffForHumans() }}
                                            </span>
                                        </p>

                                    </div>

                                    <div class="">
                                        <a class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50"
                                            href="{{ asset('storage/cv/' . $candidato->cv) }}"
                                            target="_blank"
                                            rel="noreferrer noopener"
                                            >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>

                                </li>
                            @empty
                                <p class="p-3 text-cetner text-sm text-gray-600">No hay candidatos aún </p>
                            @endforelse
                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
