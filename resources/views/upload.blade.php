@extends('layouts.app')

@section('content')
    <div class="bg-white p-4 w-2/3 mx-auto">
        <h2 class="text-center text-2xl">Upload your dog!</h2>

        <div class="container flex justify-center my-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Add A New Item') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">

                                    <div class="col-md-6">
                                        <input id="picture" type="file"
                                            class="form-control border rounded border-gray-300 @error('picture') is-invalid @enderror"
                                            name="picture" value="{{ old('picture') }}" required autofocus>

                                        <div>
                                            @error('picture')
                                                <span class="invalid-feedback text-red-400 text-sm" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Picture Name / Discription') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control border border-gray-300 rounded w-full p-1 @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" required autofocus>

                                        <div>
                                            @error('name')
                                                <span class="invalid-feedback text-red-400 text-sm" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit"
                                            class="p-2 text-xs font-semibold rounded bg-blue-600 border text-white border-black hover:bg-blue-400 px-4 cursor-pointer">
                                            {{ __('Add') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
