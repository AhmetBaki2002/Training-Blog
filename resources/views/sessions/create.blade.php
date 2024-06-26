<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-300 border border-gray-400 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Log In</h1>
            <form method="POST" action="/sessions" class="mt-10">
                @csrf

                <div class="mb-6">

                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email"> email</label>

                    <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="email" value="{{ old('email') }}" required>
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror</input>

                </div>
                <div class="mb-6">

                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password"> password</label>

                    <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password" required>
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror</input></input>

                </div>

                <div class="mb-6">

                    <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" type="submit"> Log In</button>

                </div>

                @if ($errors->any())

                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="text-red-500 text-xs"> {{$error}}</li>

                    @endforeach
                </ul>
                @endif
            </form>

        </main>

    </section>

</x-layout>