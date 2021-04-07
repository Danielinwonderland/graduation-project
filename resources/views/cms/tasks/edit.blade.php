@extends('cms.adminlte')

@section('css_additional')
    <!-- Select2 -->
    {!! Html::style('/adminlte/plugins/select2/css/select2.min.css') !!}
@endsection

@section('js_additional')
    <!-- Select2 -->
    {!! Html::script('/adminlte/plugins/select2/js/select2.full.min.js') !!}
@endsection

@section('h1', 'Редактирование статьи')

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <!-- form start -->
        {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'patch', 'files' => true]) !!}
        <div class="card-body">
            <div class="form-group">
                {!! Form::label('head', 'Заголовок') !!}
                {!! Form::text('head', old('head'), ['class' => 'form-control']) !!}
                @if($errors->has('head'))
                    <span class="text-danger">{{ $errors->first('head') }}</span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('descn', 'Описание') !!}
                {!! Form::textarea('descn', old('descn'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('customer', 'Заказчик') !!}
                {!! Form::text('customer', old('customer'), array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('executor', 'Исполнитель') !!}
                {!! Form::text('executor', old('executor'), array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('price', 'Цена') !!}
                {!! Form::text('price', old('price'), array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {{ Form::label('category', 'Категория') }}
                {!! Form::select('category', $categories, old('category'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {{ Form::label('image_input', 'Изображение') }}
                <div class="custom-file">
                    {!! Form::file('image_input', ['class' => 'custom-file-input', 'accept' => 'image/jpeg, image/png']) !!}
                    {{ Form::label('image_input', 'Выбрать файл', ['class' => 'custom-file-label']) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('status', 'Статус') }}
                {!! Form::select('status', array('new' => 'Новая', 'progress' => 'В работе', 'done' => 'Выполненая'), old('status'), ['class' => 'form-control']) !!}
            </div>
        </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('tasks.index') }}" class="btn btn-default">Отмена</a>
                {!! Form::submit('Сохранить', ['class' => 'btn btn-primary float-right']) !!}
            </div>
            <!-- /.card-footer -->
        {!! Form::close() !!}
    </div>
@endsection
