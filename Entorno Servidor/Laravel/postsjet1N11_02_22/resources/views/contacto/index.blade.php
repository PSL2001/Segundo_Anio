<x-app-layout>
    <div class="mt-4 w-1/4 mx-auto sm:px-6 lg:px-8 bg-indigo-300 py-8">
        <x-form action="{{ route('contacto.procesar') }}">
            <x-form-input name="nombre" label="Escriba su nombre" placeholder="Nombre" />
            <x-form-textarea name="mensaje" label="Escriba su mensaje"  placeholder="Mensaje" />
            <div class="flex flex-row-reverse mt-2">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fa-solid fa-paper-plane"></i> Enviar
                </button>
            </div>
        </x-form>
    </div>
</x-app-layout>
