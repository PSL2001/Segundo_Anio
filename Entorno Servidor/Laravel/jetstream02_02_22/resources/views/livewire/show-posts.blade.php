@if (session('correo'))
<script>
    Swal.fire({
    icon: 'success',
    title: "{{session('correo')}}",
    showConfirmButton: false,
    timer: 1500
})
</script>
@endif
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
    <div class="my-2 flex">
        <div class="flex-1 w-80">
            <x-jet-input type="search" placeholder="Buscar..." wire:model="search" /><i class="fas fa-search"></i>
        </div>
        <div>
            @livewire('create-post')
        </div>
    </div>
    @if ($posts->count())
        <x-tabla>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" wire:click="ordenar('id')"
                            class="cursor-pointer whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID <i class="fas fa-sort"></i>
                        </th>
                        <th scope="col" wire:click="ordenar('titulo')"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Título <i class="fas fa-sort"></i>
                        </th>
                        <th scope="col" wire:click="ordenar('contenido')"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Contenido <i class="fas fa-sort"></i>
                        </th>
                        <th scope="col" colspan="2">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($posts as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $item->id }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="{{ Storage::url($item->imagen) }}"
                                            alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $item->titulo }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->contenido }}
                            </td>
                            <td class="px-6 py-4 w-16">
                                <button wire:click="mostrarEdit({{$item}})" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                            <td class="px-6 py-4 w-16">
                                <button wire:click="borrar({{$item}})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    <!-- More people... -->
                </tbody>
            </table>
        </x-tabla>
    @else
        <div class="mt-2 text-bold">No se encontró ningún post.</div>
    @endif
    <div class="mt-2">
        {{ $posts->links() }}
    </div>
    <!-- Ventana modal para editar un registro -->
    <x-jet-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            Editar Post
        </x-slot>
        <x-slot name="content">
            <x-jet-label value="Titulo del Post" />
            <x-jet-input type="text" placeholder="Titulo" class="mt-2 mb-4 w-full" wire:model.defer="post.titulo" />
            <x-jet-input-error for="post.titulo" />
            <x-jet-label value="Contenido del Post" />
            <textarea wire:model.defer="post.contenido" class="w-full mt-2 mb-4  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" placeholder="Contenido del Post"></textarea>
            <x-jet-input-error for="post.contenido" />
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
                    <img src="{{Storage::url($post->imagen)}}" class="object-cover object-center w-80">
                    @endif
                </div>
            </div>
            {{-- Fin input Imagen --}}
        </x-slot>
        <x-slot name="footer">
            <button wire:click="update" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-edit"></i> Editar
            </button>
        </x-slot>
    </x-jet-dialog-modal>
    <!-- Fin Ventana Modal -->
</div>
