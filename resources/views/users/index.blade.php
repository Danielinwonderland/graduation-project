@extends('layouts.default')
@section('content')
    <h1>Пользователи</h1>
    @foreach ($users as $user)

    <article>
        <h2>{{ $user->firstname }} {{ $user->lastname }}</h2>
    </article>

    @endforeach

@endsection
