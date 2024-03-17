<div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <x-card>

            @slot('title')
                Agregar Agencia
            @endslot

            @slot('html')

                <form wire:submit.prevent="submit" method="post">

                    <div class="mt-10 grid grid-cols-1 gap-x-10 gap-y-8 sm:grid-cols-10">
                        
                        <div class="col-span-6 sm:col-span-4">
                            <x-label>Nombre Usuario</x-label>
                            <x-input type="text" wire:model="nombre" placeholder="Nombre Agencia" />
                            @error('nombre')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label>Nombre Contacto</x-label>
                            <x-input type="text" wire:model="nombre_contacto" placeholder="Nombre Contacto" />
                            @error('nombre_contacto')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label>Correo</x-label>
                            <x-input type="text" wire:model="correo" placeholder="Correo" />
                            @error('correo')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label>Direccion</x-label>
                            <x-input type="text" wire:model="direccion" placeholder="Direccion" />
                            @error('direccion')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label>Telefono</x-label>
                            <x-input type="text" wire:model="telefono" placeholder="Telefono" />
                            @error('telefono')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label>Referencia Bancaria</x-label>
                            <x-input type="file" wire:model="referencia_bancaria" />
                            @error('referencia_bancaria')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label>RUT</x-label>
                            <x-input type="file" wire:model="rut" />
                            @error('rut')
                                {{ $message }}
                            @enderror
                        </div>

                    </div>

                    <br>
                    <x-button type="submit">
                        Guardar Usuario
                    </x-button>
                </form>

            @endslot
        </x-card>
    </div>

</div>
