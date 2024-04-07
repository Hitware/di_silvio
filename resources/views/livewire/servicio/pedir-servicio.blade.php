<div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <x-card>

            @slot('title')
            Solicitar Servicio
            @endslot

            @slot('html')

            <form wire:submit.prevent="submit" method="post">

                <div class="mt-10 grid grid-cols-1 gap-x-10 gap-y-8 sm:grid-cols-10">

                    <div class="col-span-6 sm:col-span-6">
                        <x-label>Novedad</x-label>
                        <x-input type="text" wire:model="novedad" placeholder="Novedad" />
                        @error('novedad')
                        {{ $message }}
                        @enderror
                    </div>


                    <div class="col-span-6 sm:col-span-4">
                        <x-label>Prioridad Solicitud</x-label>
                        <select name="prioridad" id="prioridad" wire:model="prioridad"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="">SELECCIONE</option>
                            <option value="1">Baja</option>
                            <option value="2">Media</option>
                            <option value="3">Alta</option>
                        </select>
                        @error('nombre_encargado')
                        {{ $message }}
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <x-label>Describe la novedad del servicio requerido</x-label>
                        <textarea wire:model="descripcion_solicitud" id="descripcion_solicitud"
                            name="descripcion_solicitud" rows="8"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                        @error('nombre_encargado')
                        {{ $message }}
                        @enderror
                    </div>

                    @if(Auth::user()->rol==1)
                    <div class="col-span-6 sm:col-span-4">
                        <x-label>Proveedor</x-label>
                        <select wire:model="id_proveedor" name="id_proveedor"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="">--SELECCIONE--</option>
                            @foreach ($proveedor as $proveedor)
                                <option value="{{$proveedor->id}}">{{$proveedor->nombres}}</option>
                            @endforeach
                        </select>
                        @error('prioridad')
                        {{ $message }}
                        @enderror
                    </div>
                    @endif
                    <div class="col-span-6 sm:col-span-4">
                        <x-label>Sede</x-label>
                        <select name="id_sede" id="id_sede" wire:model="id_sede"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="">--SELECCIONE--</option>
                            @foreach ($sedes as $sede)
                                <option value="{{$sede->id}}">{{$sede->nombre_sede}}</option>
                            @endforeach
                        </select>
                        @error('prioridad')
                        {{ $message }}
                        @enderror
                    </div>

                </div>

                <br>
                <x-button type="submit">
                    Crear Solicitud
                </x-button>
            </form>

            @endslot
        </x-card>
    </div>

</div>