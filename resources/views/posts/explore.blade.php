<x-app-layout>
    <div class="grid grid-cols-3 gap-1 md:gap-5 mt-5">
        @foreach ($posts as $post)
            <div>
                <a href="{{ route('posts.show',$post->slug) }}">
                    <img src="{{ asset('storage/'.$post->image) }}" alt="" class="w-full h-64 object-cover rounded">
                </a>
            </div>
        @endforeach
    </div>
    <div class="mt-5">
        {{ $posts->links() }}
    </div>
</x-app-layout>