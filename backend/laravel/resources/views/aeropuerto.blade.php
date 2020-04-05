@foreach ($aeropuerto as $aeropuertoitem)

<p> {{ $aeropuertoitem->nombre }}, {{ $aeropuertoitem->descripcion }}, {{ $aeropuertoitem->latitud }}, {{ $aeropuertoitem->longitud }} </p>

@endforeach