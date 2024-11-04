@extends('student.layout')  <!-- Assuming you have a student layout -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script src="/js/app.js"></script> <!-- Make sure this script is compiled with Echo -->
@section('content')
<div class="content-wrapper d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f0f2f5;">
    <div class="container chat-container" style="max-width: 500px; width: 100%; background: #fff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
        <div class="chat-header p-3" style="border-bottom: 1px solid #e0e0e0;">
            <h5 class="mb-0" style="color: #333;">Chat with {{ $recipient->name }}</h5>
        </div>

        <div class="chat-box p-3" id="chat-box" style="height: 400px; overflow-y: auto;">
            @foreach($messages as $message)
                <div class="d-flex mb-2">
                    @if ($message->sender_id == auth()->id())
                        <div class="ml-auto" style="max-width: 75%;">
                            <div class="message-bubble px-3 py-2" style="border-radius: 15px; background-color: #0084ff; color: #fff; text-align: right;">
                                <p class="message-text mb-1" style="margin: 0;">{{ $message->message }}</p>
                                <small class="timestamp" style="font-size: 0.8em; color: #fff;">{{ $message->created_at->format('h:i A') }}</small>
                            </div>
                        </div>
                    @else
                        <div style="max-width: 75%;">
                            <div class="message-bubble px-3 py-2" style="border-radius: 15px; background-color: #e4e6eb; color: #333;">
                                <p class="message-text mb-1" style="margin: 0;">{{ $message->message }}</p>
                                <small class="timestamp" style="font-size: 0.8em; color: #aaa;">{{ $message->created_at->format('h:i A') }}</small>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        <form id="chat-form" method="POST" class="p-3" style="border-top: 1px solid #e0e0e0;">
            @csrf
            <div class="input-group">
                <input id="message-input" name="message" class="form-control" placeholder="Type your message..." required style="border-radius: 30px; padding-left: 15px; height: 40px;">
                <button type="submit" class="btn btn-primary" style="border-radius: 50%; height: 40px; width: 40px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-paper-plane" style="font-size: 16px; color: white;"></i>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')


<script>
    var userId = {{ auth()->id() }}; // Get authenticated user ID
    const pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
        cluster: '{{ config('broadcasting.connections.pusher.cluster') }}',
    });
    const channel = pusher.subscribe('public');

    channel.bind('chatMessage', function(data) { // Update to match broadcastAs()
        $('#chat-box').append(`
            <div class="d-flex mb-2">
                <div style="max-width: 75%;">
                    <div class="message-bubble px-3 py-2" style="border-radius: 15px; background-color: #e4e6eb; color: #333;">
                        <p class="message-text mb-1" style="margin: 0;">${data.message}</p>
                        <small class="timestamp" style="font-size: 0.8em; color: #aaa;">Now</small>
                    </div>
                </div>
            </div>
        `);
    });
</script>


@endsection
