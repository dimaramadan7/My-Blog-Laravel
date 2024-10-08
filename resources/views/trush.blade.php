old nav

{{-- <header class="bg-blue-900 py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    <a class="no-underline hover:underline" href="{{ route('blog_index') }}">Blog</a>

                    @guest
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <a class="no-underline hover:underline" href="/profile">{{ Auth::user()->name }}</a>

                        <a href="{{ route('logout') }}" class="no-underline hover:underline"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header> --}}


----------old post list--------------

                    {{-- <div class="container sm:grid grid-cols-2 gap-15 mx-auto pt-10 pb-10 px-5 border-b border-gray-300">
            <div class="flex h-100 w-100">
                <img class="object-cover" src="/images/{{ $post->image_path }}" alt="regeg">
            </div>

            <div class="pl-5">
                <h2 class="text-gray-700 font-bold text-4xl pt-5 pb-5 ">
                    {{ $post->title }}
                </h2>
                <div>
                    By:<span class="text-gray-500 italic">{{ $post->user->name }}</span>
                    <div class="text-gray-500 italic"> <span>on</span> {{ date('Y-M-d', strtotime($post->created_at)) }}
                    </div>
                    <p class="text-l text-gray-700 pt-8 pb-8 lading-6">
                        {{ $post->description }}
                    </p>
                    <a href="{{ route('blog_show', $post->slug) }}"
                        class="bg-gray-700 text-gray-100 pt-4 pb-4 px-5 rounded-lg font-bold text-l place-self-start ">Read
                        more</a>
                </div>
            </div>

        </div> --}}



        
