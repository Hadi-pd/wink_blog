@extends('layouts.master')
@section('content')

<form action="{{ url('send') }}" method="POST">
    @csrf
        <input type="hidden" name="sender_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="receiver_id" value="{{$user->id}}">
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Massage to {{$user->name}}</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
