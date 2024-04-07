<div>
    @if(Auth::user()->rol!=6)
    <x-a class="p-1" onclick="Livewire.dispatch('openModal', { component: 'servicio.pedir-servicio'})">
        Solicitar Servicio
    </x-a>
    <br>

    <div class="flex">
        <x-input type="text" class="block border-gray-200 w-200 mr-2 bg-transparent  text-black "
            wire:model.live="colaborador" />
        <x-secondary-button class="ml-2" wire:click="cleanFilter">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M2.515 10.674a1.875 1.875 0 0 0 0 2.652L8.89 19.7c.352.351.829.549 1.326.549H19.5a3 3 0 0 0 3-3V6.75a3 3 0 0 0-3-3h-9.284c-.497 0-.974.198-1.326.55l-6.375 6.374ZM12.53 9.22a.75.75 0 1 0-1.06 1.06L13.19 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06l1.72-1.72 1.72 1.72a.75.75 0 1 0 1.06-1.06L15.31 12l1.72-1.72a.75.75 0 1 0-1.06-1.06l-1.72 1.72-1.72-1.72Z" clip-rule="evenodd" />
              </svg>              
        </x-secondary-button>
    </div>
    @endif

    @if(Auth::user()->rol==6)
    <x-a class="p-1" onclick="Livewire.dispatch('openModal', { component: 'servicio.solicitar-pago'})">
        Solicitar Pago
    </x-a>
    <br>
    @endif

    <div class="mt-4 mx-4">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="table-auto w-full">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="p-3">Novedad</th>
                            <th class="p-3">Detalle Servicio Requerido</th>
                            <th class="p-3">Solicitante</th>
                            @if(Auth::user()->rol!=6)
                            <th class="p-3">Proveedor</th>
                            @endif
                            @if(Auth::user()->rol==1)
                            <th class="p-3">Actualizar Proveedor</th>
                            @endif
                            <th class="p-3">Sede</th>
                            <th class="p-3">Prioridad</th>
                            <th class="p-3">Estado</th>
                            @if(Auth::user()->rol==1)
                            <th class="p-3">Actualizar Estado</th>
                            @endif
                            @if(Auth::user()->rol==6)
                            <th class="p-3">Solicitar Pago</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @forelse ($servicios as $servicio)
                        <tr
                            class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">{{ $servicio->novedad }}</td>
                            <td class="px-4 py-3">{{ $servicio->descripcion_servicio }}</td>
                            <td class="px-4 py-3">{{ $servicio->nombre_solicitante }}</td>
                            @if(Auth::user()->rol!=6)
                            <td class="px-4 py-3">{{ $servicio->nombre_proveedor }}</td>
                            @endif
                            @if(Auth::user()->rol==1)
                            <div wire:ignore>
                                <td>
                                    <div class="flex items-center"> <!-- Contenedor flexbox -->
                                        <select wire:model="proveedor.{{ $servicio->id }}" id="estado_{{ $servicio->id }}"
                                                class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            <option value="">--SELECCIONE--</option>
                                            @foreach ($proveedores as $proveedor)
                                                <option value="{{$proveedor->id}}">{{$proveedor->nombres}}</option>
                                            @endforeach
                                        </select>
                                    
                                        <x-button  wire:click="actualizarProveedor({{ $servicio->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                                <path fill-rule="evenodd" d="M4.755 10.059a7.5 7.5 0 0 1 12.548-3.364l1.903 1.903h-3.183a.75.75 0 1 0 0 1.5h4.992a.75.75 0 0 0 .75-.75V4.356a.75.75 0 0 0-1.5 0v3.18l-1.9-1.9A9 9 0 0 0 3.306 9.67a.75.75 0 1 0 1.45.388Zm15.408 3.352a.75.75 0 0 0-.919.53 7.5 7.5 0 0 1-12.548 3.364l-1.902-1.903h3.183a.75.75 0 0 0 0-1.5H2.984a.75.75 0 0 0-.75.75v4.992a.75.75 0 0 0 1.5 0v-3.18l1.9 1.9a9 9 0 0 0 15.059-4.035.75.75 0 0 0-.53-.918Z" clip-rule="evenodd" />
                                              </svg>
                                        </x-button>
                                    </div>
                                    
                                </td>
                            </div>
                            @endif

                            <td class="px-4 py-3">{{ $servicio->nombre_sede }}</td>
                            <td class="px-4 py-3">
                                @if($servicio->prioridad == '1')
                                Baja
                                @elseif($servicio->prioridad == '2')
                                Media
                                @elseif($servicio->prioridad == '3')
                                Alta
                                @endif
                            </td>
                            <td class="px-4 py-3">

                                @if($servicio->estado == '1')
                                Solicitado
                                @elseif($servicio->estado == '2')
                                Cancelado
                                @elseif($servicio->estado == '3')
                                Aceptado
                                @elseif($servicio->estado == '4')
                                En Proceso
                                @elseif($servicio->estado == '5')
                                Finalizado
                                @elseif($servicio->estado == '6')
                                Pagado
                                @endif

                            </td>
                            @if(Auth::user()->rol==1)
                            <td>
                                <div wire:ignore>
                                    <select wire:change="actualizarEstado({{ $servicio->id }})"
                                        wire:model="estados.{{ $servicio->id }}" id="estado_{{ $servicio->id }}"
                                        class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                        <option value="1" {{ $servicio->estado == 1}}>
                                            Solicitado</option>
                                        <option value="2" {{ $servicio->estado == 2}}>
                                            Cancelado</option>
                                        <option value="3" {{ $servicio->estado == 3}}>
                                            Aceptado</option>
                                        <option value="4" {{ $servicio->estado == 4}}>
                                            En Proceso</option>
                                        <option value="5" {{ $servicio->estado == 5}}>
                                            Finalizado</option>
                                        <option value="6" {{ $servicio->estado == 6}}>
                                            Pagado</option>
                                    </select>
                                </div>
                            </td>
                            @endif
                            <td>
                                @if(Auth::user()->rol==6 && $servicio->estado==5)

                                <x-a class="bg-blue-600"
                                    onclick="Livewire.dispatch('openModal', { component: 'servicio.solicitar-pago',arguments: { id: {{ $servicio->id }} }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m6.75 12-3-3m0 0-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                </x-a>

                                @endif
                            </td>
                        </tr>
                        @empty
                        <p>Sin registros</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>