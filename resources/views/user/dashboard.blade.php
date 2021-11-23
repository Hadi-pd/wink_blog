@extends('layouts.master')
@section('content')

    <div class="row border-bottom pb-5">
        <h5>Receved Messages:</h5>
        @foreach ($messages as $message)
            @if (Auth::user()->id == $message->receiver_id)
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sent to {{ $message->receiver_id }}</h5>
                            <p class="card-text">{{ $message->message }}</p>

                            <a href="delete/{{ $message->id }}" class="btn btn-danger float-end">
                                <svg style="width:28px;" class="w-6 h-6" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                            </a>

                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <div class="row mt-3">
        <h5>Sent Messages:</h5>
        @foreach ($messages as $message)
            @if (Auth::user()->id == $message->sender_id)
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sent to {{ $message->receiver_id }}</h5>
                            <p class="card-text">{{ $message->message }}</p>
                            <a href="delete/{{ $message->id }}" class="btn btn-danger float-end">
                                <svg style="width:28px;" class="w-6 h-6" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

    </div>
    <div class="row border-top mt-5">
        <div class="col">
            <h3>Users: </h3>
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th scope="col">UserName</th>
                        <th class="text-center" scope="col">Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @if (Auth::user()->name != $user->name && !$user->role->contains('name', 'admin'))
                            <tr>
                                <th scope="row">{{ $user->name }}
                                </th>
                                <td class="text-center d-flex">
                                    <a href="{{ $user->id }}" type="button" class="btn btn-outline-light"
                                        target="_blank">
                                        <svg style="width:28px;" class="w-6 h-6" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                            </path>
                                        </svg>
                                    </a>
                                    <form action="{{ url('block') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="blocker_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="blocked_id" value="{{ $user->id }}">
                                        <button type="submit" class="btn btn-outline-warning">
                                            <svg style="width:28px;" class="w-6 h-6" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 7a4 4 0 11-8 0 4 4 0 018 0zM9 14a6 6 0 00-6 6v1h12v-1a6 6 0 00-6-6zM21 12h-6">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col">
            <h3>Suspend Users: </h3>
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th scope="col">UserName</th>
                        <th class="text-center" scope="col">Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blocked_users as $blocked_user)
                        <tr>
                            <th scope="row">{{ $blocked_user->name }}</th>
                            <td class="text-center">
                                <a href="remove_block/{{ $blocked_user->id }}" type="button" class="btn btn-outline-success">
                                    <svg style="width:28px;" class="w-6 h-6" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                                        </path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
