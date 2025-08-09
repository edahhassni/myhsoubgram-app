<div>
    @if (isset($post) && $post->image)
        <div class="mb-4">
            <img src="{{ asset('storage/' . $post->image) }}" alt="" class="h-32w-32 object-cover rounded-xl ">
        </div>
    @endif
    <input class="w-full border border-gray-200 bg-gray-50 block focus:outline-non rounded-xl" name="image"
        id="file_input" type="file">
    <p class="mt-2 text-sm text-gray-500 dark:text-gray-300" id="file_input-help">PNG, JPG or GIf</p>
    <textarea name="description" class="mt-10 w-full border border-gray-200 rounded-xl" rows="10"
        placeholder="Write a description">
        {{ old('description', $post->description ?? '') }}
    </textarea>
</div>
