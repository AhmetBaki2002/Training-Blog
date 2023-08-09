@auth
<x-panel>

    <form method="POST" action="/posts/{{$post->slug}}/comments">
        @csrf

        <header class="flex items-center">
            <img src="https: //i.pravatar.cc/60?id={{auth()->id()}}" alt="" width="40" height="40" class="full-rounded">

            <h2 class="ml-3">wamt</h2>
        </header>

        <div class="mt-6">
            <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5" placeholder="Quick, think of somthing to say!" required></textarea>

        </div>

        <div class="flex justify-end mt-1 border-t border-gray-200 pt-3">
            <x-form.button>Post</x-form.button>
        </div>
    </form>
</x-panel>

@else
<p class="font-semibold">
    <a href="/register" class="hover:underline"> Register</a> OR <a href="/login" class="hover:underline">Login</a> to leave a comment
</p>
@endauth