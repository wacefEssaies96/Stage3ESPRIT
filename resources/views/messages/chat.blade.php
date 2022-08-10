@extends('messages.messages')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        @include('messages.shared.users')
      </div>
      <div class="col-md-9">
      <chat-component :auth-user="{{ auth()->user() }}" :other-user="{{ $otherUser }}"></chat-component>

      </div>
    </div>
  </div>
@endsection
