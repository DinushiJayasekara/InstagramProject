@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row my-3">
            <div class="col-2 bg-gray">
                <a class="dropdown-item" href="/">
                    <strong>
                        Home
                    </strong>
                </a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="{{ route('profile.show', auth()->user()->id) }}">
                    {{ auth()->user()->name }}
                </a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="/post/create">
                    Publish a Post
                </a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="{{ route('profile.edit', auth()->user()->id) }}">
                    Edit Profile
                </a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            <div class="col-10">
                @for ($i = 0; $i < count($posts); $i += 2)
                    <div class="row ml-1">
                        <div class="col-5">
                            <a href="/post/{{ $posts[$i]->id }}"><img src="/storage/{{ $posts[$i]->image }}"
                                    class="w-100 rounded"></a>
                            <p class="pt-2 pb-4">
                                <span class="font-weight-bold">
                                    <a href="/profile/{{ $posts[$i]->user->id }}">
                                        <span class="text-dark">{{ $posts[$i]->user->username }}</span>
                                    </a>
                                </span>
                                {{ $posts[$i]->caption }}
                            </p>
                        </div>
                        <div class="col-5">
                            @if ($i != count($posts) - 1)
                                <a href="/post/{{ $posts[$i + 1]->id }}"><img src="/storage/{{ $posts[$i + 1]->image }}"
                                        class="w-100 rounded"></a>
                                <p class="pt-2 pb-4">
                                    <span class="font-weight-bold">
                                        <a href="/profile/{{ $posts[$i + 1]->user->id }}">
                                            <span class="text-dark">{{ $posts[$i + 1]->user->username }}</span>
                                        </a>
                                    </span>
                                    {{ $posts[$i + 1]->caption }}
                                </p>
                            @endif
                        </div>
                @endfor
            </div>
        </div>
        {{-- <div class="col-4"></div> --}}
    </div>
    </div>

    <div class="container">
        {{-- @foreach ($posts as $post)
            <div class="row">
                <div class="col-6 offset-3">
                    <!-- /profile/{{ $post->user->id }} -->
                    <a href="/post/{{ $post->id }}"><img src="/storage/{{ $post->image }}" class="w-100 rounded"></a>
                </div>
            </div>
            <div class="row pt-2 pb-4">
                <div class="col-6 offset-3">
                    <p>
                        <span class="font-weight-bold">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                        </span>
                        {{ $post->caption }}
                    </p>
                </div>
            </div>
        @endforeach --}}

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>

@endsection
