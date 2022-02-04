<div>
    <button wire:click="$set('isOpen', true)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        <i class="fas fa-plus"></i> Post
    </button>
    <x-jet-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            Nuevo Post
        </x-slot>
        <x-slot name="content">
            <x-jet-label value="Titulo del Post" />
            <x-jet-input type="text" placeholder="Titulo" class="mt-2 mb-4 w-full" />
            <x-jet-label value="Contenido del Post" />
            <textarea class="w-full mt-2 mb-4  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" placeholder="Contenido del Post"></textarea>
            {{-- Comienzo input de Imagen --}}
            <div class="grid mt-2 grid-cols-2 gap-4">
                <div>
                    <div class="flex justify-center">
                        <div>
                            <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="formFile" wire:model="imagen" accept="image/*">
                        </div>
                    </div>
                </div>
                <div>
                    {{-- Pintamos la imagen aqui tanto la defecto como la que mande el usuario --}}
                    @if ($imagen)
                    <img src="{{$imagen->temporaryUrl()}}" class="object-cover object-center w-80">
                    @else
                    <img src="{{Storage::url('logo/noImage.jpg')}}" class="object-cover object-center w-80">
                    @endif
                </div>
            </div>
            {{-- Fin input Imagen --}}
        </x-slot>
        <x-slot name="footer">
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-save"></i> Enviar
            </button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
