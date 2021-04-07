@extends('cms.adminlte')

@section('h1', 'Статьи')

@section('css_additional')
    <!-- Toastr -->
    {!! Html::style('/adminlte/plugins/toastr/toastr.min.css') !!}
@endsection

@section('js_additional')
    <!-- Toastr -->
    {!! Html::script('/adminlte/plugins/toastr/toastr.min.js') !!}
    @if(Session::has('success'))
        <script>
            toastr.success('{{ Session::get('success') }}');
        </script>
    @endif
@endsection

@section('content')




    <div class="row mb-3 mt-n5">
        <div class="col col-sm-12">
            <a href="{!! route('tasks.create') !!}" class="btn btn-info float-right"><i class="fas fa-plus"></i> добавить статью</a>
        </div>
    </div>

    @if($tasks->count() === 0)
    <div class="alert alert-info">
        <i class="icon fas fa-info"></i> Статей нет!
    </div>
    @else
    <div class="card">
        <div class="card-body p-0">
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 10px">ID</th>
                    <th>Заголовок</th>
                    <th>Описание</th>
                    <th>Цена</th>
                    <th>Заказчик</th>
                    <th>Исполнитель</th>
                    <th>Категория</th>
                    <th>Статус</th>
                    <th style="width: 230px"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->head }}</td>
                    <td>{{ $task->descn }}</td>
                    <td>{{ $task->price }}</td>
                    <td>{{ $task->customer }}</td>
                    <td>{{ $task->executor }}</td>
                    <td>{{ $task->category }}</td>
                    <td>{{ $task->status }}</td>
                    <td class="text-right">
                        <form method="post" action="{!! route('tasks.destroy', [$task->id]) !!}">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button class="btn btn-xs btn-danger float-right delete-btn" type="submit" data-toggle="modal" data-target="#modal-delete-item" data-message="Удалить статью <b>{{ $task->title }}</b> [{{ $task->id }}]?"><i class="fas fa-trash"></i> удалить</button>
                        </form>
                        <a class="btn btn-default btn-xs float-right mr-2" href="{!! route('tasks.edit', [$task->id]) !!}"><i class="fas fa-pencil-alt"></i> редактировать</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <div class="modal fade" id="modal-delete-item">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Удалить статью?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="modal-delete-item-text">Удалить статью?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                    <button type="button" class="btn btn-primary confirm_action">Удалить</button>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
