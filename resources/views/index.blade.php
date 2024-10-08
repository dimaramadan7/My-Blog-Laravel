@extends('layouts.main')

@section('content')
    <div class="hero-bg-image flex flex-col items-center justify-center ">
        <h1 class="text-gray-100 text-5xl uppercase font-bold pb-10 text-center">Welecom to my blog</h1>
        <a href="/blog" class="bg-gray-100 text-gray-700 py-4 px-5 rounded-lg font-bold uppercase test-xl">Reading
            Post</a>
    </div>



    <div class="container mx-auto text-center py-15">
        <h2 class="font-bold text-5xl py-10">Recent Posts</h2>
        <p class="text-gray-400 leading-6 px-10 mb-10">
            {{ $lastpost->title }}
        </p>
    </div>

    <div class="sm:grid grid-cols-2 w-4/5 mx-auto my-30">
        <div class="flex bg-yellow-700 text-gray-100 pt-10">
            <div class="block m-auto pt-4 py-10000 w-4/5">

                <ul class="md:flex text-xs gap-2">

                    <li
                        class="bg-yellow-100 text-yellow-700 p-2 rounded inline-block my-1 md:my-0 hover:bg-yellow-500 hover:text-yellow-100 transition duration-300">
                        <a
                            href="/blog/Category/{{ Str::replace(' ', '-', $lastpost->Category->name) }}">{{ $lastpost->Category->name }}</a>
                    </li>

                </ul>
                <h3 class="text-l py-10 leading-6">{!! $lastpost->description !!}</h3>

                <a href="/"
                    class="mb-8 bg-transparent border-2 text-gray-100 py-4 px-5 rounded-lg font-bold uppercase text-l inline-block">Read
                    More</a>
            </div>

        </div>
        <div class="flex">
            <img class="object-cover" src="/images/{{ $lastpost->image_path }}" alt="se">
        </div>
    </div>
@endsection
