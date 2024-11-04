<!-- resources/views/teacher/messages.blade.php -->
@extends('teacher.layout')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="display-4 text-center">Messages</h1>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="list-group">
                        @foreach($recentMessages as $message)
                            @php
                                $otherUser = $message->sender_id == Auth::guard('teacher')->user()->id ? $message->receiver : $message->sender;
                            @endphp
                            <a href="{{ route('teacher.chatForm', $otherUser->id) }}" class="list-group-item list-group-item-action">
                                <h5 class="mb-1">{{ $otherUser->name }}</h5>
                                <p class="mb-1">{{ $message->message }}</p>
                                <small>{{ $message->created_at->diffForHumans() }}</small>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
c