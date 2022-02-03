<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
    <div class="my-2 flex">
        <div class="flex-1 w-80">
            <x-jet-input type="search" placeholder="Buscar..." wire:model="search" /><i class="fas fa-search"></i>
        </div>
        <div>
            Boton crear
        </div>
    </div>
    @if ($posts->count())
        <x-tabla>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="cursor-pointer whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID <i class="fas fa-sort"></i>
                        </th>
                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Título <i class="fas fa-sort"></i>
                        </th>
                        <th scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Contenido <i class="fas fa-sort"></i>
                        </th>
                        <th scope="col" colspan="2">
                            Role
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($posts as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $item->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
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
                            <td class="px-6 py-4 whitespace-nowrap">
                                Editar
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Borrar
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
</div>
