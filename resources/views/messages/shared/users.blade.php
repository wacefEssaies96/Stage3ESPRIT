  <div class="card">
    <div class="card-header">Users</div>
      <div class="card-body">
        @if ($users->isEmpty())
          <p>No users</p>
        @else
          <ul class="list-group list-group-flush">
            @foreach ($users as $user)
                <a href="{{ route('messages.chat', [ 'ids' => auth()->user()->id  . '-' . $user->id ]) }}" class="list-group-item list-group-item-action">{{ $user->name }}</a>
            @endforeach
          </ul>
        @endif
    </div>
  </div>