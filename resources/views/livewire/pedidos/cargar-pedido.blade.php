<div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <x-card>

            @slot('title')
            Cargar Pedido/Pedido
            @endslot

            @slot('html')

            <form wire:submit.prevent="submit" method="post">

                <div class="mt-10 grid grid-cols-1 gap-x-10 gap-y-8 sm:grid-cols-10">

                    <div class="col-span-6 sm:col-span-4">
                        <x-label>Naturaleza</x-label>
                        <select name="naturaleza" id="naturaleza" wire:model="naturaleza"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="">SELECCIONE</option>
                            <option value="Insumos">Insumos</option>
                            <option value="Herramienta / Instrumento">Herramientas / Instrumentos</option>
                            <option value="Mantenimiento Preventivo">Mantenimiento Preventivo</option>
                            <option value="Mantenimiento Correctivo">Mantenimiento Correctivo</option>
                            <option value="Reemplazo de Equipos">Reemplazo de Equipos</option>
                        </select>
                        @error('naturaleza')
                        {{ $message }}
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <x-label>Sede</x-label>
                        <select name="sede" id="sede" wire:model="sede"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="">SELECCIONE</option>
                            @foreach ($sedes as $sede)
                                <option value="{{$sede->id}}">{{$sede->nombre_sede}}</option>
                            @endforeach
                        </select>
                        @error('sede')
                        {{ $message }}
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <x-label>Orden de Servicio / Pedido</x-label>
                        <x-input type="file" wire:model="orden_servicio" multiple />
                        @error('nombre')
                        {{ $message }}
                        @enderror
                    </div>

                </div>

                <br>
                <x-button type="submit">
                    Cargar Orden
                </x-button>
            </form>

            @endslot
        </x-card>
    </div>

</div>