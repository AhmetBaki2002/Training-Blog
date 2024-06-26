@props(['name', 'type' => 'text'])


<x-form.field>

    <x-form.label name="{{$name}}" />

    <input class="border border-gray-400 p-2 w-full" type="{{$type}}" name="{{$name}}" id="{{$name}}" required value="{{ old($name)}}">


    @error($name)
    <p class="text-red-500 text-xs mt-2"> {{$message}}</p>
    @enderror
    </input>
</x-form.field>