<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-1/2 p-4 bg-teal-300 shadow rounded mx-auto">
                <x-form action="{{route('contacto.procesar')}}">
                    <x-form-input name="nombre" label="Nombre" placeholder="Su Nombre" />
                    <x-form-textarea name="mensaje" placeholder="Su Mensaje" label="Mensaje" />
                    <x-form-submit><i class="fa-solid fa-paper-plane"></i> Enviar</x-form-submit>
                </x-form>
            </div>
        </div>
    </div>
</x-app-layout>
