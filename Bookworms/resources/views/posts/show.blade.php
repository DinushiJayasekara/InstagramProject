@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="/storage/{{ $post->image }}" class="w-100 rounded">
            </div>
            <div class="col-4">
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->profileImage() }}" class="w-100 rounded-circle"
                            style="max-width: 45px;">
                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark pr-1">{{ $post->user->username }}</span>
                            </a>
                            |
                            <a href="/profile/{{ $post->user->id }}" class="pl-1">Follow</a>
                        </div>
                    </div>
                    <div>
                    </div>
                </div>

                <hr>

                <div style="display: -webkit-inline-box;">
                    <p class="flex">
                        <span class="font-weight-bold">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                        </span>
                        {{ $post->caption }}

                        @if ($post->isReactedBy(auth()->user()))
                            <form action="/post/{{ $post->id }}/react" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit" style="display: contents;">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        style="{{ $post->isReactedBy(auth()->user()) ? 'fill: darkred' : 'fill: gray' }}"
                                        width="7%" class="mb-1 ml-2">
                                        <path
                                            d="M10 3.22l-.61-.6a5.5 5.5 0 0 0-7.78 7.77L10 18.78l8.39-8.4a5.5 5.5 0 0 0-7.78-7.77l-.61.61z">
                                        </path>
                                    </svg>

                                    <span style="color: gray;">
                                        {{ $post->reacts ?: 0 }}
                                    </span>
                                </button>
                            </form>

                        @endif
                        @if (!$post->isReactedBy(auth()->user()))
                            <form action="/post/{{ $post->id }}/react" method="post">
                                @csrf

                                <button type="submit" style="display: contents;">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        style="{{ $post->isReactedBy(auth()->user()) ? 'fill: darkred' : 'fill: gray' }}"
                                        width="7%" class="mb-1 ml-2">
                                        <path
                                            d="M10 3.22l-.61-.6a5.5 5.5 0 0 0-7.78 7.77L10 18.78l8.39-8.4a5.5 5.5 0 0 0-7.78-7.77l-.61.61z">
                                        </path>
                                    </svg>

                                    <span style="color: gray;">
                                        {{ $post->reacts ?: 0 }}
                                    </span>
                                </button>
                            </form>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
