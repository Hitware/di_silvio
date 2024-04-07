<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Servicios') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            Servicios

            <x-card>

                @slot('title')
                    Servicios Solicitados
                @endslot

                @slot('html')
                    <livewire:servicio.servicios-list></livewire:servicio.servicios-list>
                @endslot

            </x-card>

        </div>
    </div>
</x-app-layout>
