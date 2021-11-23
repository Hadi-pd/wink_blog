@extends('layouts.master')
@section('content')

    <h1>Users: </h1>
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th scope="col">UserName</th>
                <th scope="col">Email</th>
                <th class="text-center" scope="col">Registration time</th>
                <th class="text-center" scope="col">Tools</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @if ($user->suspend != 1 && ! $user->role->contains('name', 'admin'))

                    <tr>
                        <th scope="row">{{ $user->name }}</th>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td class="text-center">{{ $user->created_at }}</td>
                        <td class="text-center">
                            <div class="d-flex text-center">
                                <form method="POST" action="{{ route('users.update', $user) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="suspend" value="1">
                                    <button type="submit" class="btn btn-outline-warning">
                                        <svg style="width:28px;" class="w-6 h-6" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 7a4 4 0 11-8 0 4 4 0 018 0zM9 14a6 6 0 00-6 6v1h12v-1a6 6 0 00-6-6zM21 12h-6">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('users.destroy', $user) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">
                                        <svg style="width:28px;" class="w-6 h-6" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @endif

            @endforeach
        </tbody>
    </table>
    @if ($user->suspend == 1)
        <h1>Suspend Users: </h1>
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th scope="col">UserName</th>
                    <th scope="col">Email</th>
                    <th class="text-center" scope="col">Registration time</th>
                    <th class="text-center" scope="col">Tools</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @if ($user->suspend == 1)
                        <tr>
                            <th scope="row">{{ $user->name }}</th>
                            <td>{{ $user->email }}</td>
                            <td class="text-center">{{ $user->created_at }}</td>
                            <td class="text-center">
                                <div class="d-flex text-center">
                                    <form method="POST" action="{{ route('users.update', $user) }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="suspend" value="0">
                                        <button type="submit" class="btn btn-outline-success">
                                            <svg style="width:28px;" class="w-6 h-6" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('users.destroy', $user) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">
                                            <svg style="width:28px;" class="w-6 h-6" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
