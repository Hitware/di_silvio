<div>

    <x-a class="p-1" onclick="Livewire.dispatch('openModal', { component: 'pedidos.cargar-pedido' })">
        Cargar Orden/Pedido
    </x-a>
    <br>
    <div class="flex">
        <x-input type="text" class="block border-gray-200 w-200 mr-2 bg-transparent  text-black "
            wire:model.live="orden" />
        <x-secondary-button class="ml-2" wire:click="cleanFilter">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd"
                    d="M2.515 10.674a1.875 1.875 0 0 0 0 2.652L8.89 19.7c.352.351.829.549 1.326.549H19.5a3 3 0 0 0 3-3V6.75a3 3 0 0 0-3-3h-9.284c-.497 0-.974.198-1.326.55l-6.375 6.374ZM12.53 9.22a.75.75 0 1 0-1.06 1.06L13.19 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06l1.72-1.72 1.72 1.72a.75.75 0 1 0 1.06-1.06L15.31 12l1.72-1.72a.75.75 0 1 0-1.06-1.06l-1.72 1.72-1.72-1.72Z"
                    clip-rule="evenodd" />
            </svg>

        </x-secondary-button>
    </div>

    <div class="mt-4 mx-4">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="table-auto w-full">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="p-3">Naturaleza</th>
                            <th class="p-3">Orden/Pedido</th>
                            <th class="p-3">Factura</th>
                            <th class="p-3">Solicitante</th>
                            @if(Auth::user()->rol!=6)
                            <th class="p-3">Proveedor</th>
                            @endif
                            @if(Auth::user()->rol==1)
                            <th class="p-3">Actualizar Proveedor</th>
                            @endif
                            <th class="p-3">Sede</th>
                            <th class="p-3">Fecha</th>
                            <th class="p-3">Estado</th>
                            @if(Auth::user()->rol==1)
                            <th class="p-3">Actualizar Estado</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @forelse ($pedidos as $pedido)
                        <tr
                            class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">{{ $pedido->naturaleza }}</td>
                            <td class="px-4 py-3">
                                <a wire:click="descargarDocumento('ordenes_servicio_compra','{{ $pedido->orden_compra }}')"
                                    class="text-blue-500 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6">
                                        <path fill-rule="evenodd"
                                            d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875Zm5.845 17.03a.75.75 0 0 0 1.06 0l3-3a.75.75 0 1 0-1.06-1.06l-1.72 1.72V12a.75.75 0 0 0-1.5 0v4.19l-1.72-1.72a.75.75 0 0 0-1.06 1.06l3 3Z"
                                            clip-rule="evenodd" />
                                        <path
                                            d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
                                    </svg>
                                </a>
                            </td>
                            <td class="px-4 py-3">
                                @if(!empty($pedido->factura))
                                <a wire:click="descargarDocumento('facturas','{{ $pedido->factura }}')"
                                    class="text-blue-500 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6">
                                        <path fill-rule="evenodd"
                                            d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875Zm5.845 17.03a.75.75 0 0 0 1.06 0l3-3a.75.75 0 1 0-1.06-1.06l-1.72 1.72V12a.75.75 0 0 0-1.5 0v4.19l-1.72-1.72a.75.75 0 0 0-1.06 1.06l3 3Z"
                                            clip-rule="evenodd" />
                                        <path
                                            d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
                                    </svg>
                                </a>

                                @else
                                <a onclick="Livewire.dispatch('openModal', { component: 'pedidos.cargar-factura', arguments: { id_pedido: {{ $pedido->id }} }})" 
                                    class="text-blue-500 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                        <path fill-rule="evenodd" d="M10.5 3.75a6 6 0 0 0-5.98 6.496A5.25 5.25 0 0 0 6.75 20.25H18a4.5 4.5 0 0 0 2.206-8.423 3.75 3.75 0 0 0-4.133-4.303A6.001 6.001 0 0 0 10.5 3.75Zm2.03 5.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 1 0 1.06 1.06l1.72-1.72v4.94a.75.75 0 0 0 1.5 0v-4.94l1.72 1.72a.75.75 0 1 0 1.06-1.06l-3-3Z" clip-rule="evenodd" />
                                      </svg>                                      
                                </a>
                                @endif
                            </td>
                            <td class="px-4 py-3">{{$pedido->name}}</td>
                            @if(Auth::user()->rol!=6)
                            <td class="px-4 py-3">{{ $pedido->nombres_proveedor }}</td>
                            @endif
                            @if(Auth::user()->rol==1)
                            <div wire:ignore>
                                <td>
                                    <div class="flex items-center"> <!-- Contenedor flexbox -->
                                        <select wire:model="proveedor.{{ $pedido->id }}" id="estado_{{ $pedido->id }}"
                                                class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            <option value="">--SELECCIONE--</option>
                                            @foreach ($proveedores as $proveedor)
                                                <option value="{{$proveedor->id}}">{{$proveedor->nombres}}</option>
                                            @endforeach
                                        </select>
                                    
                                        <x-button  wire:click="actualizarProveedor({{ $pedido->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                                <path fill-rule="evenodd" d="M4.755 10.059a7.5 7.5 0 0 1 12.548-3.364l1.903 1.903h-3.183a.75.75 0 1 0 0 1.5h4.992a.75.75 0 0 0 .75-.75V4.356a.75.75 0 0 0-1.5 0v3.18l-1.9-1.9A9 9 0 0 0 3.306 9.67a.75.75 0 1 0 1.45.388Zm15.408 3.352a.75.75 0 0 0-.919.53 7.5 7.5 0 0 1-12.548 3.364l-1.902-1.903h3.183a.75.75 0 0 0 0-1.5H2.984a.75.75 0 0 0-.75.75v4.992a.75.75 0 0 0 1.5 0v-3.18l1.9 1.9a9 9 0 0 0 15.059-4.035.75.75 0 0 0-.53-.918Z" clip-rule="evenodd" />
                                              </svg>
                                        </x-button>
                                    </div>
                                    
                                </td>
                            </div>
                            @endif
                            <td class="px-4 py-3">{{$pedido->nombre_sede}}</td>
                            <td class="px-4 py-3">{{$pedido->created_at}}</td>
                            <td class="px-4 py-3">
                                @if($pedido->estado == '1')
                                Solicitado
                                @elseif($pedido->estado == '2')
                                Cancelado
                                @elseif($pedido->estado == '3')
                                Aceptado
                                @elseif($pedido->estado == '4')
                                En Proceso
                                @elseif($pedido->estado == '5')
                                Pagado
                                @endif
                            </td>
                            @if(Auth::user()->rol==1)
                            <td>
                                <div wire:ignore>
                                    <select wire:change="actualizarEstado({{ $pedido->id }})"
                                        wire:model="estados.{{ $pedido->id }}" id="estado_{{ $pedido->id }}"
                                        class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                        <option value="1" {{ $pedido->estado == 1}}>
                                            Solicitado</option>
                                        <option value="2" {{ $pedido->estado == 2}}>
                                            Cancelado</option>
                                        <option value="3" {{ $pedido->estado == 3}}>
                                            Aceptado</option>
                                        <option value="5" {{ $pedido->estado == 4}}>
                                            Finalizado</option>
                                        <option value="6" {{ $pedido->estado == 5}}>
                                            Pagado</option>
                                    </select>
                                </div>
                            </td>
                            @endif


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