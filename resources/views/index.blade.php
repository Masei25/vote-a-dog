@extends('layouts.app')

@section('content')
    <div>

        @if (session()->has('message'))
            <h4 class="text-green-600 flex justify-center mb-4"> {{ session()->get('message') }} </h4>
        @endif
    </div>

    <div class="flex flex-wrap">
        @foreach ($pictures as $picture)
            <div class="w-4/12 lg:w-3/12 p-2">
                <div class="rounded overflow-hidden bg-white border border-gray-200 p-4">
                    <img class="w-60 h-60" width="400px" src="{{ asset('storage/' . $picture->file_path) }}">
                    <p class="mt-2 text-gray-500">{{ $picture->name }}</p>
                    <div class="flex space-x-4 border-3 border-red-400">
                        <p class="mt-2 text-gray-500">{{ $picture->votes }} votes</p>
                        <form action="{{ route('pictures.upvote', $picture->id) }}" method="post">
                            @csrf

                            <button type="submit" onclick="return confirm('are you sure you want to vote this picture?')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-heart items-end inline-block align-bottom cursor-pointer hover:text-red-400"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
