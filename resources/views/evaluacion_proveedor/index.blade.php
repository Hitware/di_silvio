<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Evaluacion Proveedor') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          
            <x-card>

                @slot('title')
                    Evaluacion Proveedor
                @endslot

                @slot('html')
                    <livewire:evaluacion-proveedor.evaluacion-proveedor-list>
                        
                    </livewire:evaluacion-proveedor.evaluacion-proveedor-list>
                @endslot

            </x-card>

        </div>
    </div>
</x-app-layout>
