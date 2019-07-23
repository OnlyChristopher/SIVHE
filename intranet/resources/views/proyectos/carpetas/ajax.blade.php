<option value="">--- Seleccionar Carpeta ---</option>
@if(!empty($carpetasSecundarias))
    @foreach($carpetasSecundarias as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
@endif