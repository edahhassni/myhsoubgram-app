<div class="card">
    {{-- Header --}}
    <div class="card-header gap-2">
        <img src="{{ $post->owner->image }}" class="h-9 w-9 rounded-full" alt="">
        <a href="" class="font-bold">{{ $post->owner->username }}</a>
    </div>
    <div class="card-body">
        <div class="max-h-[35rem].overflow-hidden">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->description }}"
                class="object-cover h-auto w-full">
        </div>

        <div class="p-3">
            <a href="" class="font-bold">{{ $post->owner->username }}</a>
            {{ $post->description }}
        </div>

        @if ($post->comments->count() > 0)
            <a href="{{ route('posts.show', $post->slug) }}" class="p-3 font-bold text-sm text-gray-500">
                {{ __('View all ' . $post->comments->count() . ' comments') }}
            </a>
        @endif
        <div class="p-3 text-gray-400 uppercase text-xs">
            {{ $post->created_at->diffForhumans() }}
        </div>
    </div>
    <div class="card-footer">
        <form action="{{ route('store_comment', $post->slug) }}" method="POST">
            @csrf
            <div class="flex flex-row">
                <textarea name="body" id="comment_body"
                    class="grow h-5 resize-none overflow-hidden border-none bg-none p-0 placeholder-gray-400 outline-0 focus:ring-0"
                    placeholder="{{ __('Add a comment..') }}"></textarea>
                <button class="ltr:ml-5 rtl:mr-5 border-none bg-white text-blue-500">{{ __('Comment') }}</button>
            </div>
        </form>
    </div>
</div>
