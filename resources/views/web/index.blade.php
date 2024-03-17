<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-card>

                @slot('title')
                    Configuracion de Sitio Web
                @endslot

                @slot('html')
                    <livewire:sitio-web.actualizar-configuracion></livewire:sitio-web.actualizar-configuracion>
                @endslot

            </x-card>

        </div>
    </div>
</x-app-layout>
