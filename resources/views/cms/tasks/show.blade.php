@extends('cms.adminlte')

@section('h1', 'Просмотр статьи')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $task->title }}</h3>
            <div class="card-tools">
                Created At: {{ date('M j, Y h:ia', strtotime($task->created_at)) }},
                Last Updated: {{ date('M j, Y h:ia', strtotime($task->updated_at)) }}
            </div>
        </div>
        <div class="card-body">
            {{ $task->content }}
            @if(!empty($task->category))
                <p>Category: {{ $task->category->name }}</p>
                {{-- <p>Parent Category: {{ $task->category->parent()->first()->name ?? '' }}</p> --}}
            @endif
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'DELETE']) !!}
            {!! Form::submit('Удалить', ['class' => 'btn btn-danger float-right']) !!}
            {!! Form::close() !!}
            {{ Html::linkRoute('tasks.index', '<< Вернуться в список статей', array(), ['class' => 'btn btn-default']) }}
        </div>
        <!-- /.card-footer-->
    </div>
@endsection
