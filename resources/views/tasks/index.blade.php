@extends('layouts.default')
@section('content')
    <h1>Tasks</h1>
    @foreach ($tasks as $task)

    <article>
        <h2>{{ $task->head }}</h2>
        <div class="body">{{ $task->descn }}</div>
        @if(!empty($task->category))
        <p>Category: {{ $task->category }}</p>
        {{-- <p>Parent Category: {{ $article->category->parent()->first()->name ?? '' }}</p> --}}
        @endif

    </article>

    @endforeach

@endsection
