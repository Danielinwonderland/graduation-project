@extends('layouts.default')
@section('content')
    <h1>Tasks</h1>
    @foreach ($tasks as $task)

    <article>
        <h2>{{ $task->head }}</h2>
        <div class="body">{{ $task->descn }}</div>
        @if(!empty($task->category))
        <p>Раздел {{ $task->categoryM->name }}</p>
            @if(!empty($task->categoryM->parent()->first()))
            <p>Категория: {{ $task->categoryM->parent()->first()->name ?? '' }}</p>
            @endif
        @endif

    </article>

    @endforeach

@endsection
