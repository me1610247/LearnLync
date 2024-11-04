@extends('student.layout')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="display-4 text-center">Messages</h1>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-12">
                    <form action="{{ route('student.search') }}" method="GET" class="input-group">
                        <input type="text" name="email" id="search-email" placeholder="Search by email..." class="form-control" />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Display search results if they exist -->
            @if(isset($users) && $users->isNotEmpty())
                <div class="list-group mt-4">
                    <h5>Search Results:</h5>
                    @foreach($users as $user)
                        <a href="{{ route('student.chatForm', $user->id) }}" class="list-group-item list-group-item-action">
                            <h5 class="mb-1">{{ $user->name }}</h5>
                            <p class="mb-1">Email: {{ $user->email }}</p>
                            <small>Click to send a message</small>
                        </a>
                    @endforeach
                </div>
            @elseif(isset($users))
                <p class="list-group-item mt-4">No results found.</p>
            @endif

            <!-- Display recent messages -->
            <div class="list-group mt-4">
                <h5>Recent Messages:</h5>
                @foreach($recentMessages as $message)
                    @php
                        $otherUser = $message->sender_id == Auth::id() ? $message->receiver : $message->sender;
                    @endphp
                    <a href="{{ route('student.chatForm', $otherUser->id) }}" class="list-group-item list-group-item-action">
                        <h5 class="mb-1">To: {{ ucwords($otherUser->name) }}</h5>
                        <p class="mb-1">Message: {{ $message->message }}</p>
                        <small>{{ $message->created_at->diffForHumans() }}</small>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
