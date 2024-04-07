<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solicitudes de Pago') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            Solicitudes de Pago

            <x-card>

                @slot('title')
                    Lista de Solicitudes
                @endslot

                @slot('html')
                    <livewire:pagos.solicitudes-pagos></livewire:pagos.solicitudes-pagos>
                @endslot

            </x-card>

        </div>
    </div>
</x-app-layout>
