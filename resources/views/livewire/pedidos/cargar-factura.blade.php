<div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <x-card>

            @slot('title')
            Cargar Factura
            @endslot

            @slot('html')

            <form wire:submit.prevent="submit" method="post">

                <div class="mt-10 grid grid-cols-1 gap-x-10 gap-y-8 sm:grid-cols-10">

           
                    <div class="col-span-6 sm:col-span-6">
                        <x-label>Factura</x-label>
                        <x-input type="file" wire:model="factura" multiple />
                        @error('factura')
                        {{ $message }}
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <x-label>Valor Factura</x-label>
                        <x-input type="text" wire:model="valor_factura" />
                        @error('valor_factura')
                        {{ $message }}
                        @enderror
                    </div>

                </div>

                <br>
                <x-button type="submit">
                    Actualizar Factura
                </x-button>
            </form>

            @endslot
        </x-card>
    </div>

</div>