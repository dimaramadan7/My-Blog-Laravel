@extends('layouts.main')

@section('content')
    <div class="container m-auto text-center pt-15 pb-5">
        <h1 class="text-6xl font-bold">Add new Post</h1>

    </div>

    <div class="container m-auto text-center pt-15 pb-5">
        <form action="/blog/store" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($errors->has('title'))
                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs ml-1">
                    {{ $errors->first('title') }}
                </span>
            @endif

            <input type="text" name="title" placeholder="Title" value="{{ old('title') }}"
                class=" border-gray-200 w-full h-20 text-5xl rounded-lg shadow-lg boeder-b p-10 mb-10">

            @if ($errors->has('description'))
                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs ml-1">
                    {{ $errors->first('description') }}
                </span>
            @endif
            <textarea id="rtextarea" name="description" placeholder="description"
                class=" border-gray-200 w-full h-60 text-l rounded-lg border-b p-15 mb-10">{{ old('description') }}</textarea>
            <label class="flex justify-start mt-4 mb-2">Category</label>
            <select name="category"
                class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <div class="pt-10 pb-10">

                <label
                    class="bg-gray-200 hover:bg-gray-700
                text-gray-700 hover:text-gray-100
                transition duration-300 
                cursor-pointer 
                p-5 rounded-lg 
                font-bold 
                ">

                    <span>Select an image to upload</span>

                    <input type="file" name="image" class="hidden">
                </label>
            </div>
            @if ($errors->has('image'))
                <span class="flex items-center font-medium  text-red-500 text-xs ml-1">
                    {{ $errors->first('image') }}
                </span>
            @endif

            <button type="submit"
                class=" bg-green-700 
                hover:bg-green-100
                text-gray-200 hover:text-gray-700
                transition duration-300 
                cursor-pointer 
                p-5 rounded-lg 
                font-bold uppercase">Submit</button>
        </form>
    </div>
@endsection

@push('js')
    <script src="{{ asset('ckeditor5-build-classic/ckeditor.js') }}"></script>
@endpush
