@extends('cms.adminlte')

@section('css_additional')
    <!-- Select2 -->
    {!! Html::style('/adminlte/plugins/select2/css/select2.min.css') !!}
@endsection

@section('js_additional')
    <!-- Select2 -->
    {!! Html::script('/adminlte/plugins/select2/js/select2.full.min.js') !!}
@endsection

@section('h1', 'Добавление статьи')

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
        @if(isset($user))
        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}
    @else
        {!! Form::open(['method' => 'POST', 'route' => 'users.store']) !!}
    @endif
        <div class="card-body">

            <div class="form-group">
                {!! Form::label('firstname', 'Имя') !!}
                {!! Form::text('firstname', old('firstname'), ['class' => 'form-control']) !!}
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('firstname') }}</span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('lastname', 'Фамилия') !!}
                {!! Form::text('lastname', old('lastname'), ['class' => 'form-control']) !!}
                @if($errors->has('lastname'))
                    <span class="text-danger">{{ $errors->first('lastname') }}</span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Электронная почта') !!}
                {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Пароль') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="{{ route('users.index') }}" class="btn btn-default">Отмена</a>
            {!! Form::submit('Сохранить', ['class' => 'btn btn-primary float-right']) !!}
        </div>
        <!-- /.card-footer -->
    {!! Form::close() !!}
    </div>
@endsection
