<div>
    <button wire:click="$set('isOpen', true)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        <i class="fas fa-plus"></i> Nuevo
    </button>
    <x-jet-dialog-modal wire:model='isOpen'>
        <x-slot name="title">
            Nuevo Post
        </x-slot>
        <x-slot name="content">
            @wire
            <x-form-input name="titulo" label="Titulo" placeholder="Titulo del Post" />
            <x-form-textarea name="contenido" placeholder="Contenido del Post" label="Contenido" />
            <x-form-group label="Estado del post" inline>
                <x-form-radio name="status" value="1" label="Borrador" />&nbsp;&nbsp;
                <x-form-radio name="status" value="2" label="Publicado" />
            </x-form-group>
            <x-form-errors name="status" />
            @endwire
            {{-- Comienzo input de Imagen --}}
            <div class="grid mt-2 grid-cols-2 gap-4">
                <div>
                    <div class="flex justify-center">
                        <div>
                            <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="formFile" wire:model="imagen" accept="image/*">
                            <x-jet-input-error for="imagen" />
                        </div>
                    </div>
                </div>
                <div>
                    {{-- Pintamos la imagen aqui tanto la defecto como la que mande el usuario --}}
                    @if ($imagen)
                    <img src="{{$imagen->temporaryUrl()}}" class="object-cover object-center w-80">
                    @else
                    <img src="{{Storage::url('noImage.jpg')}}" class="object-cover object-center w-80">
                    @endif
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <button wire:loading.attr="disabled" wire:click="guardar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-save"></i> Enviar
            </button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
