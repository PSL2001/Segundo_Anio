@component('mail::message')
# Formulario de Contacto

## Nombre

{{$datos['nombre']}}

## Correo

__{{$email}}__

## Mensaje

{{$datos['mensaje']}}

@endcomponent
