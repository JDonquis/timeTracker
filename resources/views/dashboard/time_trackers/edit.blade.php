@extends('layouts.dashboard')

@section('styles')
<style>
    .nftmax-table__body tr td {
                text-align: start;
                width: 10%;
            }

            .nftmax__item{
                width: min( 1200px, 100% ) 
            }

            table{
                width: 100% !important;
                border-collapse: collapse !important;
            }
            th,
            td{
                padding: 0.75rem !important;
            }

            th{
                text-align: left !important;
            }

            .table-container{
                max-width: 100%;
                overflow-x: scroll;
            }
</style>
@endsection

@section('content')

@php
    use Carbon\Carbon;
@endphp

<form action="{{ route('time_tracker.update',['timeTracker' => $timeTracker->id]) }}" method="POST" id="register-form">
    @csrf
    @method('PUT')
    
    <div class="nftmax-inner__heading">
        <h2 class="nftmax-inner__page-title">Edit register</h2>
    </div>
    
    <div class="nftmax__item">
        <label for="">Register from:</label>
        <input type="date" id="first-date" name="first_date" value="{{ session('first_date', $timeTracker->start->format('Y-m-d')) }}" required>
        <label for="">To:</label>
        <input type="date" id="second-date" name="second_date" value="{{ session('second_date', $timeTracker->end->format('Y-m-d')) }}" required>
        @can('update-time_tracker')
            <button class="btn btn-primary" type="button" id="generate-table-btn">Generate</button>
        @endcan
        <div class="table-container">
            <table>
                <!-- NFTMax Table Head -->
                <thead>
                    <tr id="tr-head-table">
                        <th>Dates</th>
                        @foreach ($typeHours as $typeHour)
                            <th data-id="{{ $typeHour->id }}">{{ $typeHour->name }}</th>
                        @endforeach
                        <th>Total</th>
                    </tr>
                </thead>
                <!-- NFTMax Table Body -->
                <tbody class="nftmax-table__body text-start" id="table-tbody-registers">
                    @php
                        $formData = session('formData', []);
                            
                    @endphp

                    @if(empty($formData))
                        @php
                            
                            $details = $timeTracker->timeTrackerDetails->toArray();
                            $uniqueDates = array_unique(array_column( $details ,'date'));
                        @endphp

                        @foreach ($uniqueDates as $register)
                        <tr>

                            <td>{{ Carbon::parse($register)->format('d/m/Y'); }}</td>

                            @php
                            
                                $filteredRecords = array_filter($details, function($record) use ($register) {
                                    return $record['date'] === $register;
                                });

                                usort($filteredRecords, function($a, $b) {
                                    return $a['type_hour_id'] <=> $b['type_hour_id'];
                                });
                            
                            @endphp
                            
                            @foreach ($filteredRecords as $registerByHour )
                                <td>
                                    <input type="number" name="rows[{{ $loop->parent->index }}][hours][{{ $loop->index }}][value]" value="{{ $registerByHour['hours'] }}" min="0" style="width: 50px;" onchange="calculateTotalHours()">
                                </td>    
                            @endforeach
                            
                            <td class='nftmax-table__column-1 nftmax-table__data-1'><input type='number' class="total-row" value="0" readonly  style='width:50px;'></td>
                        
                        </tr>
                            
                        @endforeach

                        <tr>
                            <td class='nftmax-table__column-1 nftmax-table__data-1'>Total</td>
                            @foreach ($typeHours as $typeHour )
                                <td class='nftmax-table__column-1 nftmax-table__data-1'><input type='number' value="0" readonly style='width:50px;' class='column-total'></td>
                            @endforeach
                            <td class='nftmax-table__column-1 nftmax-table__data-1'><input type='number' value="0" readonly id='total-general' style='width:50px;'></td>

                        </tr>
                    
                    @else
                        @foreach ($formData as $row)
                        <tr>
                            <td>{{ $row['date'] }}</td>
                            @foreach ($row['hours'] as $hour)
                                <td>
                                    <input type="number" name="rows[{{ $loop->parent->index }}][hours][{{ $loop->index }}][value]" value="{{ $hour['value'] }}" min="0" style="width: 50px;" onchange="calculateTotalHours()">
                                </td>
                            @endforeach
                            <td class='nftmax-table__column-1 nftmax-table__data-1'><input type='number' class="total-row" value="0" readonly  style='width:50px;'></td>

                        </tr>
                    @endforeach

                    <tr>
                        <td class='nftmax-table__column-1 nftmax-table__data-1'>Total</td>
                        @foreach ($typeHours as $typeHour )
                            <td class='nftmax-table__column-1 nftmax-table__data-1'><input type='number' value="0" readonly style='width:50px;' class='column-total'></td>
                        @endforeach
                        <td class='nftmax-table__column-1 nftmax-table__data-1'><input type='number' value="0" readonly id='total-general' style='width:50px;'></td>

                    </tr>
                    
                    @endif
                        
                    

                </tbody>
            </table>
        </div>
        
        <textarea name="comment" id="comment" class="w-100" style="height: 100px;" cols="10" rows="10">{{ session('comment', $timeTracker->comment) }}</textarea>

        
        <div class="nftmax__item-button--group">
            <a href="{{ route('time_tracker.index') }}" class="nftmax__item-button--single nftmax__item-button--cancel">Cancel</a>
            @can('update-time_tracker')
            <button class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius nftmax-item__btn" id="btn-groups" type="submit">Update Now</button>
            @endcan
        </div>

        @can('delete-time_tracker')
        <div class="nftmax-ptabs__social mt-3">
            <h4 class="nftmax-ptabs__accounts-heading text-danger">Danger Zone </h4>
            
            <div class="nftmax-ptabs__verified">
                <div class="nftmax-ptabs__verified-content">
                    <h4 class="nftmax-ptabs__accounts-heading">Delete register </h4>
                    <p class="nftmax__item-fee-text">Delete this register forever </p>
                </div>
               
            
                <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $timeTracker->id }}').submit();" class="nftmax__item-button--single nftmax__item-button--cancel align-self-end">Delete</a>
            
            </div>
        </div>
        @endcan
    </div>

 

</form>

<form id="delete-form-{{ $timeTracker->id }}" action="{{ route('time_tracker.destroy', ['timeTracker' => $timeTracker->id]) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

@endsection

@section('scripts')

<script>
    const firstDate = document.getElementById('first-date');
    const secondDate = document.getElementById('second-date');
    const generateBtn = document.getElementById('generate-table-btn');
    const btnsGroup = document.getElementById('btn-groups');
    const submitBtn = document.querySelector('.nftmax__item-button--single[type="submit"]');
    let existingData = [];
    calculateTotalHours();


    firstDate.addEventListener('change', () => {
        secondDate.disabled = false; 
        secondDate.min = firstDate.value; 

        if (secondDate.value < firstDate.value) {
            secondDate.value = firstDate.value; 
        }

        generateBtn.disabled = false;
    });


    secondDate.addEventListener('change', () => {
        generateBtn.disabled = false;
    });

     // Variable para almacenar los datos existentes

    generateBtn.addEventListener('click', () => {
        if (firstDate.value && secondDate.value) {
            existingData = collectExistingData();

            let result = generateRows(firstDate.value, secondDate.value);
            document.getElementById('table-tbody-registers').innerHTML = result;
            btnsGroup.classList.remove('d-none');
            calculateTotalHours();
        }
    });

    // Función para recopilar los datos existentes en la tabla
    function collectExistingData() {
        const data = [];
        const rows = document.querySelectorAll('#table-tbody-registers tr'); // Obtener todas las filas

        rows.forEach(row => {
            const date = row.cells[0].textContent; // La primera celda es la fecha
            const hours = [];

            const inputs = row.querySelectorAll('input[type="number"]'); // Obtener todos los inputs de horas
            inputs.forEach(input => {
                hours.push({
                    value: parseFloat(input.value) || 0 // Obtener el valor del input
                });
            });

            data.push({
                date,
                hours
            }); // Guardar la fecha y las horas
        });

        return data; // Devolver los datos existentes
    }

    function generateRows(firstDate, secondDate) {
        const firstDateValue = new Date(firstDate);
        const secondDateValue = new Date(secondDate);
        const rows = [];


        while (firstDateValue <= secondDateValue) {

            firstDateValue.setDate(firstDateValue.getDate() + 1); // Avanzar al siguiente día
            const formattedDate = formatDate(firstDateValue);

            // Verificar si la fecha ya existe en existingData
            const existingRow = existingData.find(item => item.date === formattedDate);
            if (existingRow) {
                // Si existe, mantener los valores de esa fecha
                const existingTDs = existingRow.hours.map(hour => `<td class='nftmax-table__column-1 nftmax-table__data-1'>
                                                                        <input type='number' value="${hour.value}" min="0" style='width:50px;' onchange='calculateTotalHours()'>
                                                                    </td>`).join('');

                rows.push(`<tr>
                            <td>${formattedDate}</td>
                            ${existingTDs}
                          </tr>`);
            }else {
                // Si no existe, agregar nueva fila
                const newTDs = generateTDs(); 
                rows.push(`<tr>
                            <td>${formattedDate}</td>
                                ${newTDs}
                          </tr>`);
            }

        }

        let totalTDs = generateTotalTDs();


        rows.push(`<tr>${totalTDs}</tr>`);
        return rows.join('');
    }

    function formatDate(date) {
        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const year = date.getFullYear();
        return `${day}/${month}/${year}`; // Formato d/m/Y
    }

    function generateTotalTDs() {
        let tr = document.getElementById('tr-head-table');
        let ths = tr.querySelectorAll('th');
        let typeHours = ths.length - 2;

        let response = [];
        response.push(`<td class='nftmax-table__column-1 nftmax-table__data-1'>Total</td>`);

        for (let index = 0; index < typeHours; index++) {
            response.push(
                `<td class='nftmax-table__column-1 nftmax-table__data-1'><input type='number' value="0" readonly style='width:50px;' class='column-total'></td>`
                );
        }

        response.push(
            `<td class='nftmax-table__column-1 nftmax-table__data-1'><input type='number' value="0" readonly id='total-general' style='width:50px;'></td>`
            );
        return response.join('');
    }

    function generateTDs() {
        let tr = document.getElementById('tr-head-table');
        let ths = tr.querySelectorAll('th');
        let typeHours = ths.length - 2;

        let response = [];
        for (let index = 0; index < typeHours; index++) {
            response.push(`<td class='nftmax-table__column-1 nftmax-table__data-1'>
                            <input type='number' min="0" style='width:50px;' onchange='calculateTotalHours()'>
                           </td>`);
        }

        response.push(
            `<td class='nftmax-table__column-1 nftmax-table__data-1'><input type='number' value="0" readonly class='total-row' style='width:50px;'></td>`
            );
        return response.join('');
    }

    function calculateTotalHours() {
        const rows = document.querySelectorAll('#table-tbody-registers tr');
        if(rows.length == 0)
            return 0;

        
        const totalColumns = document.querySelectorAll('#tr-head-table th').length - 2;
        
        const columnSums = Array(totalColumns).fill(0);
        let totalGeneral = 0;

        

        rows.forEach(row => {
            const inputs = row.querySelectorAll('input[type="number"]:not([readonly])');
            let rowSum = 0;

            inputs.forEach((input, index) => {
                const value = parseFloat(input.value) || 0;
                rowSum += value;
                columnSums[index] += value; // Sumar a la columna correspondiente
            });

            const totalRowInput = row.querySelector('.total-row');
            if (totalRowInput) {
                totalRowInput.value = rowSum;
            }
        });

        // Actualizar totales por columna
        const columnTotalInputs = document.querySelectorAll('.column-total');
        columnTotalInputs.forEach((input, index) => {
            console.log(`Inspeccionando: ${columnSums} - ${input.value} - ${columnTotalInputs}`);
            input.value = columnSums[index];
        });

        console.log('Column totals:', [...columnTotalInputs].map(input => input.value));

        console.log(`Colum sum: ${columnSums}`)

        // Calcular total general
        const filteredArray = columnSums.filter(num => !isNaN(num));
        totalGeneral = filteredArray.reduce((acc, curr) => acc + curr, 0); 
        let totalGeneralInput = document.getElementById('total-general');
        console.log(totalGeneralInput, totalGeneral)

        if(totalGeneralInput != null)
            totalGeneralInput.value = totalGeneral;
    }

    function collectData() {
        const data = [];
        const rows = document.querySelectorAll('#table-tbody-registers tr:not(:last-child)'); // Excluye la fila de totales
        const typeHours = document.querySelectorAll('#tr-head-table th');
        const comment = document.getElementById('comment').value; // Obtener el valor del textarea

        // Iterar sobre cada fila para recopilar datos
        rows.forEach((row) => {
            const rowData = {};
            const date = row.cells[0].textContent; // La primera celda es la fecha

            rowData.date = date; // Añadir la fecha
            rowData.comment = comment; // Agregar el comentario al objeto
            rowData.hours = []; // Inicializar el array de horas

            for (let i = 1; i < typeHours.length - 1; i++) { // Excluye la columna de Total
                const input = row.cells[i].querySelector('input[type="number"]');
                const typeHourId = typeHours[i].getAttribute('data-id'); // Obtener el ID del tipo de hora

                if (input) {
                    rowData.hours.push({
                        typeHourId: typeHourId, 
                        value: parseFloat(input.value) || 0 
                    });
                }
            }

            data.push(rowData);
        });

        // Ajustar la estructura de hours para que contenga typeHourId y value en un solo array
        const formattedData = data.map((row) => ({
            date: row.date,
            hours: row.hours.map(hour => ({
                typeHourId: hour.typeHourId,
                value: hour.value
            }))
        }));

        console.log(formattedData); // Para verificar los datos

        return formattedData;
    }

    document.getElementById('register-form').addEventListener('submit', (event) => {
        const collectedData = collectData();
        
        // Agregar datos a campos ocultos
        collectedData.forEach((rowData, index) => {
            const dateInput = document.createElement('input');
            dateInput.type = 'hidden';
            dateInput.name = `rows[${index}][date]`;
            dateInput.value = rowData.date;
            document.getElementById('register-form').appendChild(dateInput);

            // Crear campos ocultos para hours
            rowData.hours.forEach((hour, hourIndex) => {
                const hourInput = document.createElement('input');
                hourInput.type = 'hidden';
                hourInput.name =
                `rows[${index}][hours][${hourIndex}][typeHourId]`; 
                hourInput.value = hour.typeHourId;
                document.getElementById('register-form').appendChild(hourInput);

                const valueInput = document.createElement('input');
                valueInput.type = 'hidden';
                valueInput.name =
                `rows[${index}][hours][${hourIndex}][value]`; 
                valueInput.value = hour.value;
                document.getElementById('register-form').appendChild(valueInput);
            });
        });

    });
</script>



@endsection
