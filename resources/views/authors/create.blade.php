@extends('layouts.app')

@section('content')
<div class="w-2/3 bg-gray-300 mx-auto p-6 shadow">
    <form action="/authors" method="post" class="flex flex-col items-center">
        <!-- {{ dump($errors) }} -->
        @csrf
        <h1>Add a new author</h1>
        <div class="pt-4">
            <input type="text" placeholder="Full name" name="name" class="rounded px-4 py-2 w-64">
            @error('name')<p class="text-red-600">{{ $message }}</p> @enderror
        </div>
        <div class="pt-4">
            <input type="text" placeholder="Date of birth" name="dob" class="rounded px-4 py-2 w-64">
            @error('dob')<p class="text-red-600">{{ $message }}</p> @enderror            
        </div>
        <div class="pt-4">
            <button class="bg-gray-500 text-white rounded py-2 px-4">Add new author</button>
        </div>
    </form>
</div>
@endsection
