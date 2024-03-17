<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tour Operadores') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            Listado de Tour Operadores

            <x-card>

                @slot('title')
                    Tour Operadores
                @endslot



                @slot('html')
                    <livewire:tour-operador-list></livewire::tour-operador-list>
                @endslot

            </x-card>

        </div>
    </div>
</x-app-layout>
