<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="my-2 flex flex-row-reverse">
        @livewire("create-post")
    </div>
    @if ($posts->count())
    <x-tabla>
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Info</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer whitespace-nowrap" wire:click="ordenarPor('id')">Id <i class="fas fa-sort"></i></th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" wire:click="ordenarPor('titulo')">Titulo <i class="fas fa-sort"></i></th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" wire:click="ordenarPor('status')">Estado <i class="fas fa-sort"></i></th>
              <th scope="col" class="relative px-6 py-3" colspan="2">
                Acciones
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
              @foreach ($posts as $item)
              <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <button wire:click="show({{$item}})" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><i class='fas fa-info'></i>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$item->id}}</td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full" src="{{Storage::url($item->imagen)}}" alt="">
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">{{$item->titulo}}</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span wire:click="cambiarStatus({{$item}})" class="cursor-pointer px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                    @if($item->status==1) bg-red-100 text-red-800 @else bg-green-100 text-green-800 @endif">@if($item->status == 1) Borrador @else Activo @endif </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <button wire:click="editar({{$item}})" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                          <i class="fas fa-edit"></i>
                      </button>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" wire:click="borrar({{$item}})">
                        <i class="fas fa-trash"></i>
                        </button>
                    </td>

                </tr>

              @endforeach
            <!-- More people... -->
          </tbody>
        </table>
  </x-tabla>
  <div class="mt-2">
      {{ $posts->links() }}
  </div>
    @else
    <p class="py-2 px-2 font-bold bg-teal-200 italic text-gray-400">
        Todavia no tienes ningun post, aprovecha y crea el primer post
    </p>
    @endif
    <!-- Ventana modal para Editar -->
    <x-jet-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            Editar Post
        </x-slot>
        <x-slot name="content">
            @wire
            <x-form-input name="post.titulo" label="Titulo" />
            <x-form-textarea name="post.contenido" label="Contenido" />
            <x-form-group label="Estado del Post" inline>
                <x-form-radio name="post.status" value="1" label="Borrador" />&nbsp;&nbsp;
                <x-form-radio name="post.status" value="2" label="Publicado" />
            </x-form-group>
            <x-form-errors name="post.status" />
            @endwire
            <!-- Campo Imagen -->
            <div class="mt-2 grid grid-cols-2 gap-2 w-full">
                <div class="w-1/2">
                    <input type="file" wire:model='imagen' accept="image/*" class="form-input border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" />
                </div>
                <div class="w-1/2">
                    @if($imagen && !$errors->has('imagen'))
                    <img src="{{$imagen->temporaryUrl()}}" alt="" class="object-cover object-center">
                    @else
                    <img src="{{Storage::url($post->imagen)}}" alt="" class="object-cover object-center">
                    @endif
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <button wire:click="update" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-edit"></i> Editar</button>
        </x-slot>
    </x-jet-dialog-modal>
    <!-- Fin Ventana Modal -->
    <!-- Ventana modal para Detalles -->
    <x-jet-dialog-modal wire:model="isOpenShow">
        <x-slot name="title">
            <img src="{{{Storage::url($post->imagen)}}}" class="object-cover object-center w-full h-full">
        </x-slot>
        <x-slot name="content">
         <div class="mx-auto text-indigo-700 font-bold w-full p-2 text-xxl">
             {{$post->titulo}}
         </div>
         <div class="mt-2 italic text-gray-500 text-lg">
             {{$post->contenido}}
         </div>
         <div class="mt-4">
             <p><span class="font-bold">Creado:</span> {{$post->created_at}}</p>
         </div>
         <div class="mt-4">
             @if (isset($post->user->email))
             <p><span class="font-bold">Creado por:</span> {{ $post->user->email }}</p>
             @endif
         </div>
         <div class="mt-4">
             <p><span class="font-bold">Estado: </span>
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full text-white
                      @if ($post->status == 1) bg-red-500 @else bg-green-500 @endif">
                                    @if ($post->status == 1)
                                    Borrador @else Publicado
                                    @endif
            </span></p>
        </div>

        </x-slot>
        <x-slot name="footer">
            <button wire:click="$set('isOpenShow', false)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fa-solid fa-xmark"></i> Cerrar</button>
        </x-slot>

    </x-jet-dialog-modal>
    <!-- Fin Vetana modal de detalle -->
</div>
