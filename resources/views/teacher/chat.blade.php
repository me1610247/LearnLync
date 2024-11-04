@extends('teacher.layout')

@section('content')
<div class="content-wrapper d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f0f2f5;">
    <div class="container chat-container" style="max-width: 500px; width: 100%; background: #fff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
        <div class="chat-header p-3" style="border-bottom: 1px solid #e0e0e0;">
            <h5 class="mb-0" style="color: #333;">Chat with {{ $recipient->name }}</h5>
        </div>

        <div class="chat-box p-3" id="chat-box" style="height: 400px; overflow-y: auto;">
            @foreach ($messages as $message)
                <div class="d-flex mb-2 {{ $message->sender_id == auth()->guard('teacher')->id() ? 'justify-content-end' : 'justify-content-start' }}">
                    <div class="message-bubble px-3 py-2" style="max-width: 75%; border-radius: 15px; 
                    {{ $message->sender_id == auth()->guard('teacher')->id() ? 'background-color: #0084ff; color: #fff;' : 'background-color: #e4e6eb; color: #333;' }}">
                        <p class="message-text mb-1" style="margin: 0;">{{ $message->message }}</p>
                        <small class="timestamp" style="font-size: 0.8em; color: {{ $message->sender_id == auth()->guard('teacher')->id() ? '#fff' : '#aaa' }};">{{ $message->created_at->format('h:i A') }}</small>
                    </div>
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
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function scrollToBottom() {
        $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
    }

    // Initial scroll to bottom
    scrollToBottom();

    $('#chat-form').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission
        const messageContent = $('#message-input').val().trim(); // Get the message content
        if (messageContent === '') return; // Do not send empty messages

        // Append the message to chat box immediately for instant feedback
        const messageHtml = `
            <div class="d-flex mb-2 justify-content-end">
                <div class="message-bubble px-3 py-2" style="max-width: 75%; border-radius: 15px; background-color: #0084ff; color: #fff; text-align: right;">
                    <p class="message-text mb-1" style="margin: 0;">${messageContent}</p>
                    <small class="timestamp" style="font-size: 0.8em; color: #fff;">${new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}</small>
                </div>
            </div>
        `;
        $('#chat-box').append(messageHtml);
        scrollToBottom(); // Scroll to the bottom after appending

        // AJAX request to send the message
        $.ajax({
            url: "{{ route('sendMessage', $recipient->id) }}",
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                message: messageContent
            },
            success: function(response) {
                if (response.success) {
                    $('#message-input').val(''); // Clear the input field after success
                }
            },
            error: function(xhr) {
                console.error('Error sending message:', xhr.responseText);
                alert('Could not send message. Please try again.');
            }
        });
    });

    // Pusher setup for real-time chat updates
    const pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
        cluster: '{{ config('broadcasting.connections.pusher.options.cluster') }}',
        encrypted: true
    });

    const channel = pusher.subscribe("private-chat.{{ auth()->guard('teacher')->id() }}");
    channel.bind('chatMessage', function(data) {
        const isSentByUser = data.sender_id === {{ auth()->guard('teacher')->id() }};
        const messageHtml = `
            <div class="d-flex mb-2 ${isSentByUser ? 'justify-content-end' : 'justify-content-start'}">
                <div class="message-bubble px-3 py-2" style="max-width: 75%; border-radius: 15px; ${isSentByUser ? 'background-color: #0084ff; color: #fff;' : 'background-color: #e4e6eb; color: #333;'}">
                    <p class="message-text mb-1" style="margin: 0;">${data.message}</p>
                    <small class="timestamp" style="font-size: 0.8em; color: ${isSentByUser ? '#fff' : '#aaa'};">${new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}</small>
                </div>
            </div>
        `;
        $('#chat-box').append(messageHtml); // Append the received message
        scrollToBottom(); // Scroll to the bottom to show the new message
    });
</script>
@endsection