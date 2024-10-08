@extends('layouts.main')

@section('content')
    <div class="container m-auto text-center pt-15 pb-5">
        <h1 class="text-6xl font-bold">Edit Post</h1>

    </div>

    <div class="container m-auto text-center pt-15 pb-5">
        <form action="{{ route('blog_update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <input type="text" name="title" placeholder="Title" value="{{ $post->title }}"
                class=" border-gray-200 w-full h-20 text-5xl rounded-lg shadow-lg boeder-b p-10 mb-10">

            <textarea id="rtextarea" name="description" placeholder="description"
                class="ckeditor border-gray-200 w-full h-60 text-2xl rounded-lg border-b p-15 mb-10">{{ $post->description }}</textarea>

            <label class="flex justify-start mt-4 mb-2">Category</label>
            <select name="category" id='cat'
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
                    <input type="hidden" name="old_path" value="{{ $post->image_path }}">
                    <span>Select an image to upload</span>
                    <input type="file" name="image" class="hidden">
                </label>
            </div>
            <div class=" flex justify-center mx-4">
                <img class="sm:rounded-lg" src="/images/{{ $post->image_path }}" alt="">
            </div>
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
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js"
        integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>

    <script src="{{ asset('ckeditor5-build-classic/ckeditor.js') }}"></script>
    <script>
        var t = "{{ $post->category_id }}";
        $('#cat').val(t);
        //$('#se option[value="soon"]').prop('selected', true)
    </script>
@endpush
