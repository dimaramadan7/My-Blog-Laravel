@extends('layouts.main')

@section('content')
    <!-- Container for demo purpose -->
    <div class="container my-24 mx-auto md:px-6">
        <!-- Section: Design Block -->
        <section class="mb-32 text-center">
            <h2 class="mb-12 pb-4 text-center text-3xl font-bold">
                Category:<span
                    class="bg-yellow-100 text-yellow-700 p-2 rounded inline-block my-1 md:my-0 hover:bg-yellow-500 hover:text-yellow-100 transition duration-300">{{ $name }}</span>
            </h2>
            <div class="grid gap-6 lg:grid-cols-3 xl:gap-x-12">

                {{-- POST LIST CARD --}}
                @foreach ($Posts as $post)
                    <div class="mb-6 lg:mb-0">
                        <div
                            class="relative block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                            <div class="flex">
                                {{-- iMAGE DIV --}}
                                <div class="  w-128 h-96 relative mx-4 -mt-4 overflow-hidden rounded-lg bg-cover bg-no-repeat shadow-lg dark:shadow-black/20"
                                    data-te-ripple-init data-te-ripple-color="light">
                                    <img src="/images/{{ $post->image_path }}" class="object-cover" />
                                    <a href="#!">
                                        <div
                                            class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100 bg-[hsla(0,0%,98.4%,.15)]">
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="p-6">
                                {{-- Categoury Tag --}}
                                <ul class="md:flex text-xs gap-2">
                                    <li
                                        class="bg-yellow-100 text-yellow-700 p-2 rounded inline-block my-1 md:my-0 hover:bg-yellow-500 hover:text-yellow-100 transition duration-300">
                                        <a
                                            href="/blog/Category/{{ Str::replace(' ', '-', $post->Category->name) }}">{{ $post->Category->name }}</a>
                                    </li>
                                </ul>

                                <h5 class="mb-3 text-lg font-bold">{{ $post->title }}</h5>
                                <p class="mb-4 text-neutral-500 dark:text-neutral-300">
                                    <small>Published <u> {{ date('Y-M-d', strtotime($post->created_at)) }}</u> by
                                        <a href="#!">{{ $post->user->name }}</a></small>
                                </p>
                                <p class="mb-4 pb-2 max-h-8 overflow-hidden">
                                    {{ $post->description }}
                                </p>
                                <a href="{{ route('blog_show', $post->slug) }}" data-te-ripple-init
                                    data-te-ripple-color="light"
                                    class="inline-block rounded-full bg-primary px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] bg-gray-700">Read
                                    more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <!-- Section: Design Block -->
    </div>
    <!-- Container for demo purpose -->
@endsection
