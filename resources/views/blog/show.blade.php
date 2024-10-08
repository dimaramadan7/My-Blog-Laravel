@extends('layouts.main')

@section('content')
    @if (session()->has('massge'))
        <div id="mas" class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
            role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path
                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                    </svg></div>
                <div>
                    <p class="font-bold">post updated</p>
                </div>
            </div>
        </div>
    @endif
    <div class="container m-auto text-center pt-15 pb-5">
        <div class="mt-4">
            By:<span class="text-gray-500 italic">{{ $post->user->name }}</span><br>
            on <span class="text-gray-500 italic">{{ date('Y-M-d', strtotime($post->created_at)) }} </span>
        </div>
    </div>

    <div class="container m-auto text-center pt-15 pb-5">
        <div
            class="relative mb-12 flex flex-col overflow-hidden rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
            <img alt="nature" class=" w-full object-cover object-center" src="/images/{{ $post->image_path }}" />
        </div>


        <h2
            class="mb-2 block font-sans text-4xl font-semibold leading-[1.3] tracking-normal text-blue-gray-900 antialiased">
            {{ $post->title }}
        </h2>
        <div class="block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased">
            {!! $post->description !!}
        </div>

        @if (Auth::user() && Auth::user()->id == $post->user_id)
            <a href="{{ route('blog_edit', $post->slug) }}"
                class="bg-green-700 text-green-100 pt-4 pb-4 px-5 mt-6 inline-block rounded-lg font-bold text-l place-self-start ">
                Edit Post</a>

            <form action="/blog/{{ $post->id }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" id="delete"
                    class="inline-flex items-center pt-4 pb-4 px-5  mt-6 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>

                    Delete Post
                </button>
                {{-- <button type="submit"
                    class="bg-red-700 text-red-100
                py-4 px-5 mt-6 inline-block rounded-lg
                font-bold text-l
                place-self-start">Delete
                    post
                </button> --}}
            </form>
        @endif

    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/sweer.js') }}"></script>

    <script>
        $('#delete').on('click', function(e) {
            e.preventDefault();
            var form = $(this).parents('form');
            swal({
                icon: "warning",
                title: "Are you sure?",
                text: "Want To delete your post",
                buttons: true,
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {
                    form.submit();
                }
            });
            return false;
        });
    </script>
@endpush
