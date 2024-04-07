<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Proveedores') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            Proveedores

            <x-card>

                @slot('title')
                    Lista de Proveedores
                @endslot

                @slot('html')
                    <livewire:proveedor.proveedor-list></livewire:proveedor.proveedor-list>
                @endslot

            </x-card>

        </div>
    </div>
</x-app-layout>
