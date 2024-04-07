<div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <x-card>

            @slot('title')
                Agregar Usuario
            @endslot

            @slot('html')

                <form wire:submit.prevent="submit" method="post">

                    <div class="mt-10 grid grid-cols-1 gap-x-10 gap-y-8 sm:grid-cols-10">
                        
                        <div class="col-span-6 sm:col-span-4">
                            <x-label>Rol </x-label>
                            <select name="rol" id="rol" wire:model="rol"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option value="">SELECCIONE</option>
                                <option value="1">Administrador</option>
                                <option value="2">Pagos</option>
                                <option value="3">Pedidos</option>
                                <option value="4">Operador</option>
                                <option value="5">N/A</option>
                            </select>
                            @error('identificacion')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-label>Identificacion </x-label>
                            <x-input type="text" wire:model="identificacion" placeholder="identificacion" />
                            @error('identificacion')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label>Nombres </x-label>
                            <x-input type="text" wire:model="nombres" placeholder="Nombres" />
                            @error('nombres')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label>Apellidos</x-label>
                            <x-input type="text" wire:model="apellidos" placeholder="Apellidos" />
                            @error('apellidos')
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

                        <div class="col-span-6 sm:col-span-6">
                            <x-label>Referencia Bancaria</x-label>
                            <x-input type="file" wire:model="referencia_bancaria" />
                            @error('referencia_bancaria')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-6">
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
