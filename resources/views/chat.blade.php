@extends('layouts.default')
@section('content')
    <script src="{{ asset('/js/chat.js') }}" defer></script>
    <h1>Chat</h1>
    <div class="col-md-6 offset-md-3" id="app">
        <div class="mb-2">
            <chat-form v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-form>
        </div>
        <chat-messages :messages="messages"></chat-messages>
    </div>
@endsection
