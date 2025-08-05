<x-app-layout>
    <div class="card p-10">
        <h1 class="text-3xl mb-10">{{__('Create a new Post')}}</h1>
        <div class="flex flex-col justify-center items-center w-full">
            @if ($errors->any())
                <div class="w-full bg-red-50 text-red-700 p-5 mb-5">
                    <ul class="list-disc pl-4">
                        @foreach ($errors as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <form action="{{route('post_store')}}" class="w-ful" enctype="multipart/form-data" method="POST">
            @csrf
            <input class="w-full border border-gray-200 bg-gray-50 block focus:outline-non rounded-xl" name="image" id="file_input" type="file">
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-300" id="file_input-help">PNG, JPG or GIf</p>
            <textarea name="description"  class="mt-10 w-full border border-gray-200 rounded-xl" rows="10" placeholder="Write a description">

            </textarea>
            <x-primary-button class="mt-10">{{__('Create Post')}}</x-primary-button>
        </form>
    </div>
</x-app-layout>