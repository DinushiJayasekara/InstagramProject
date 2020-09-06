@extends('layouts.app')
@section('content')

    <div class="alert alert-success alert-dismissible fade show mx-5" role="alert">
        <h4 class="alert-heading">Welcome {{ auth()->user()->name }}!</h4>
        <p>Thank you so much for joining Bookworms. </p>
        <hr>
        <p class="mb-0">You should check out some of these profiles and start following someone. Your feed will be filled
            with amazing content!</p>
        <strong>Have fun checking out the latest books!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="container my-5 text-center">
        @for ($i = 0; $i < count($users) - 1; $i += 3)
            <div class="row">
                <div class="col-sm">
                    <a href="/profile/{{ $users[$i]->id }}" target="_blank" class="mb-5">
                        <img src="{{ $users[$i]->profile->profileImage() }}" alt="{{ $users[$i]->username }}'s name"
                            width="55%" class="rounded-circle">

                        <div class="mt-3">
                            <h4 class="font-bold italic text-sm">{{ '@' . $users[$i]->name }}</h4>
                        </div>
                    </a>
                </div>
                <div class="col-sm">
                    <a href="/profile/{{ $users[$i + 1]->id }}" target="_blank" class="mb-5">
                        <img src="{{ $users[$i + 1]->profile->profileImage() }}" alt="{{ $users[$i + 1]->username }}'s name"
                            width="55%" class="rounded-circle">

                        <div class="mt-3">
                            <h4 class="font-bold italic text-sm">{{ '@' . $users[$i + 1]->name }}</h4>
                        </div>
                    </a>
                </div>
                <div class="col-sm">
                    @if ($i != count($users) - 2)
                        <a href="/profile/{{ $users[$i + 2]->id }}" target="_blank" class="mb-5">
                            <img src="{{ $users[$i + 2]->profile->profileImage() }}"
                                alt="{{ $users[$i + 2]->username }}'s name" width="55%" class="rounded-circle">

                            <div class="mt-3">
                                <h4 class="font-bold italic text-sm">{{ '@' . $users[$i + 2]->name }}</h4>
                            </div>
                        </a>
                    @endif
                </div>
            </div>
        @endfor
    </div>

    {{-- <div>
        @for ($i = 0; $i < count($users); $i += 2)
            <div class="flex mb-4">
                @if (auth()->user()->id != $users[$i]->id)
                    <div class="w-1/2 h-12 mt-3">
                        <a href="" class="flex items-center mb-5">
                            <img src="{{ $users[$i]->profile->profileImage() }}" alt="{{ $users[$i]->username }}'s name"
                                width="60" class="mr-4 rounded">

                            <div>
                                <h4 class="font-bold italic text-sm">{{ '@' . $users[$i]->name }}</h4>
                            </div>
                        </a>
                    </div>
                @endif

                @if (auth()->user()->id != $users[$i + 1]->id)
                    <div class="w-1/2 h-12 mt-3">
                        <a href="" class="flex items-center mb-5">
                            <img src="{{ $users[$i + 1]->profile->profileImage() }}"
                                alt="{{ $users[$i + 1]->username }}'s name" width="60" class="mr-4 rounded">

                            <div>
                                <h4 class="font-bold italic text-sm">{{ '@' . $users[$i + 1]->name }}</h4>
                            </div>
                        </a>
                    </div>
                @endif
        @endfor
        {{ $users->links() }}
    </div> --}}

@endsection
