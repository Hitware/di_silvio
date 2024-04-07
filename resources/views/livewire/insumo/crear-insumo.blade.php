<div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <x-card>

            @slot('title')
            Agregar Insumo
            @endslot

            @slot('html')

            <form wire:submit.prevent="submit" method="post">

                <div class="mt-10 grid grid-cols-1 gap-x-10 gap-y-8 sm:grid-cols-10">

                    <div class="col-span-6 sm:col-span-4">
                        <x-label>Nombre Insumo/Producto</x-label>
                        <x-input type="text" wire:model="nombre" placeholder="Nombre" />
                        @error('nombre')
                        {{ $message }}
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <x-label>Categoria Insumo</x-label>
                        <select name="tipo_insumo" id="tipo_insumo" wire:model="tipo_insumo"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="">SELECCIONE</option>
                            <option value="Materia Prima">Materia Prima</option>
                            <option value="Herramienta / Instrumento">Herramienta / Instrumento</option>
                        </select>
                        @error('nombre_encargado')
                        {{ $message }}
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <x-button type="submit">
                            Guardar Insumo
                        </x-button>
                    </div>


                </div>
            </form>

            @endslot
        </x-card>
    </div>

</div>