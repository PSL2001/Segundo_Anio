@component('mail::message')
# Hola Admin
<br>
<p>
    Has recibido un mensaje  del formulario de contacto
</p>

*Nombre:* {{$datosMensaje['nombre']}}

*Email:* {{$datosMensaje['email']}}

**Información**


{{$datosMensaje['contenido']}}
@endcomponent
