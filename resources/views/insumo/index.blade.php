<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Insumos') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            Insumos

            <x-card>

                @slot('title')
                    Lista de Insumos
                @endslot

                @slot('html')
                    <livewire:insumo.insumo-list></livewire:insumo.insumo-list>
                @endslot

            </x-card>

        </div>
    </div>
</x-app-layout>
