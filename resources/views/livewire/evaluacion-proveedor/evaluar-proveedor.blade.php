<div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <x-card>

            @slot('title')
            Evaluacion de Proveedor
            @endslot
            @slot('html')
            <form wire:submit.prevent="submit" method="post">
                <div class="mt-10 grid grid-cols-1 gap-x-10 gap-y-8 sm:grid-cols-10">

                    <br>
                    <div class="col-span-6 sm:col-span-6">
                        <h2>Instrucciones</h2>
                        <p>Por favor, califique al proveedor en cada característica utilizando la siguiente escala:</p>
                        <ul>
                            <li>5: Excelente</li>
                            <li>4: Bueno</li>
                            <li>3: Regular</li>
                            <li>2: Malo</li>
                            <li>1: Pésimo</li>
                        </ul>
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <h2>Tabla de evaluación</h2>

                    </div>

                    <div class="col-span-6 sm:col-span-10">
                        <table>
                            <thead>
                                <tr>
                                    <th>Características</th>
                                    <th>Puntaje</th>
                                    <th>Criterios</th>
                                    <th>Calificación</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Cumplimiento y Entrega</td>
                                    <td>Entre 4,5 y 5,0</td>
                                    <td>Entrega del producto o servicio a tiempo y en las condiciones acordadas.</td>
                                    <td><x-input type="number" min="1" max="5" name="calificacion1"/></td>
                                </tr>
                                <tr>
                                    <td>Calidad del Producto o Servicio</td>
                                    <td>Entre 4,0 y 4,5</td>
                                    <td>El producto o servicio cumple con las especificaciones y expectativas acordadas.
                                    </td>
                                    <td><x-input type="number" min="1" max="5" name="calificacion2"/></td>
                                </tr>
                                <tr>
                                    <td>Comunicación y Servicio al Cliente</td>
                                    <td>Entre 3,5 y 4,0</td>
                                    <td>El proveedor se comunica de manera efectiva y oportuna, y ofrece un servicio al
                                        cliente de calidad.</td>
                                    <td><x-input type="number" min="1" max="5" name="calificacion3"/></td>
                                </tr>
                                <tr>
                                    <td>Precio y Competitividad</td>
                                    <td>Entre 3,0 y 3,5</td>
                                    <td>El precio del producto o servicio es competitivo en el mercado.</td>
                                    <td><x-input type="number" min="1" max="5" name="calificacion4"/></td>
                                </tr>
                                <tr>
                                    <td>Relación Calidad-Precio</td>
                                    <td>Entre 2,5 y 3,0</td>
                                    <td>El precio del producto o servicio se ajusta a la calidad del mismo.</td>
                                    <td><x-input type="number" min="1" max="5" name="calificacion5"/></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <x-button type="submit">
                            Enviar evaluación
                        </x-button>
                    </div>
                </div>
            </form>
            @endslot
        </x-card>
    </div>

</div>