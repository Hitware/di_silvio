<div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <x-card>

            @slot('title')
            Solicitar Pago
            @endslot

            @slot('html')

            <form wire:submit.prevent="submit" method="post">

                <div class="mt-10 grid grid-cols-1 gap-x-10 gap-y-8 sm:grid-cols-10">

                    
                    @empty($id)
                    
                    <div class="col-span-6 sm:col-span-6">
                        <x-label>Describe la novedad del servicio prestado</x-label>
                        <textarea wire:model="descripcion_solicitud" id="descripcion_solicitud"
                            name="descripcion_solicitud" rows="8"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                        @error('nombre_encargado')
                        {{ $message }}
                        @enderror
                    </div>

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
                    @endempty

                    <div class="col-span-6 sm:col-span-6">
                        <x-label>Cuenta de Cobro</x-label>
                        <x-input type="file" wire:model="archivo" multiple/>
                        @error('archivo')
                        {{ $message }}
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <x-label>Evidencias</x-label>
                        <x-input type="file" wire:model="evidencias" multiple/>
                        @error('archivo')
                        {{ $message }}
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <x-label>Valor</x-label>
                        <x-input type="text" wire:model="valor_pago" placeholder="Valor" />
                        @error('valor_pago')
                        {{ $message }}
                        @enderror
                    </div>

                    
                

                </div>

                <br>
                <x-button type="submit">
                    Cargar Cuenta
                </x-button>
            </form>

            @endslot
        </x-card>
    </div>

</div>