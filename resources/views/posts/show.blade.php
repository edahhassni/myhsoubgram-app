<x-app-layout>
    <div class="h-screen md:flex md:flex-row">
        {{-- Left side --}}
        <div class="flex items-center overflow-hidden bg-black md:w-7/12">
            <img src="{{asset("storage/" . $post->image)}}" alt="{{$post->description}}" class="object-cover w-full">
        </div>
        {{-- Right side --}}
        <div class="flex w-full flex-col bg-white md:w-5/12">
            {{-- Top --}}
            <div class="border-b-2">
                <div class="flex items-center p-5 gap-0">
                    <img src="{{asset("storage/".$post->owner->image)}}" 
                    alt="{{$post->owner->username}}" class="mr-5 h-10 w-10 rounded-full">
                    <div class="grow">
                        <a href="" class="font-bold">
                            {{$post->owner->username}}
                        </a>
                    </div>
                </div>
            </div>
            {{-- Middle --}}
            <div class="grow">
                <div class="flex items-start px-5 py-2 gap-3">
                    <img src="{{asset("storage/".$post->owner->image)}}" 
                    alt="{{$post->owner->username}}" class="ltr:mr-5 rtl:m-5 h-10 w-10 rounded-full">
                    <div class="flex flex-col">
                        <div>
                            <a href="" class="font-bold">
                                {{$post->owner->username}}
                            </a>
                            <span class="inline">{{$post->description}}</span>
                        </div>
                        <div class="mt-1 text-sm text-fray-400">
                            {{$post->created_at->diffForHumans(null,true,true)}}
                        </div>
                    </div>
                </div>
                {{-- Comments --}}
                @foreach ($post->comments as $comment)
                    <div class="flex items-start px-5 py-2 gap-2">
                        <img src="{{asset("storage/".$comment->owner->image)}}" class="h-10 w-10 rounded-full ltr:mr-5 rtl:ml-5" alt="">
                        <div class="flex flex-col">
                            <div>
                                <a href="" class="font-bold mr-2 inline-block">{{$comment->owner->username}}</a>
                                <span class="inline">{{$comment->body}}</span>
                            </div>
                            <div class="mt-1 text-sm text-gray-400">
                                {{$comment->created_at->diffForHumans(null,true,true)}}

                            </div>
                        </div>
                    </div>
                @endforeach

                
            </div>
            <div class="border-t p-5">
                <form action="/post/{{$post->slug}}/comment" method="POST">
                    @csrf
                    @if ($errors->has('body'))
                    <div class="text-red-500 text-sm mb-2">
                        {{$errors->first('body')}}
                    </div>
                    @endif
                    <div class="flex flex-row">
                        <textarea name="body" id="comment_body" placeholder="{{__('Add a comment..')}}" 
                        class="h-5 grow resize-none overflow-hidden border-none bg-none p-0 placeholder-gray-400 outline-0 focus:ring-0">
                        </textarea>
                        <button type="submit" class="ltr:ml-5 rtl:mr-5 border--none bg-white text-blue-500">
                            {{__('Comment')}}
                        </button>
                    </div>
                </form>
            </div>      
        </div>
    </div>
</x-app-layout>