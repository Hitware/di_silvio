<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            Usuarios

            <x-card>

                @slot('title')
                    Lista de Usuarios
                @endslot

                @slot('html')
                    <livewire:usuario.usuarios-list></livewire:usuario.usuarios-list>
                @endslot

            </x-card>

        </div>
    </div>
</x-app-layout>
