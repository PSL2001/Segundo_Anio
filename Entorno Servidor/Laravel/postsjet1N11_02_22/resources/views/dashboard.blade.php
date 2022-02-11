<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                @foreach ($posts as $item)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) lg:col-span-2 @endif"
                style="background-image: url({{Storage::url($item->imagen)}})">
                <div class="flex flex-col justify-center w-full h-full">
                    <div>
                        <h1 class="px-2 text-xl text-white font-bold">{{$item->titulo}}</h1>
                    </div>
                    <div class="mt-2 px-2 font-bold text-gray-200 items-center">
                        ( {{$item->user->email}} )
                    </div>
                </div>
                </article>
                @endforeach
            </div>
            <div class="mt-2">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
