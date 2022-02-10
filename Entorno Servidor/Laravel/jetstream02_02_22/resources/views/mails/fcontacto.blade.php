@component('mail::message')
# Formulario de Contacto

## Nombre

{{$datos['nombre']}}

## Email

{{$email}}

## Mensaje

{{$datos['mensaje']}}
@endcomponent
