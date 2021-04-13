@extends('cms.adminlte')

@section('h1', 'Дашборд')

@section('content')
    
<div class="row">
    <div class="col-lg-6">
        <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$tasksCount}}</h3>
              <p>Новых заданий</p>
            </div>
            <div class="icon">
                <i class="fas fa-clipboard-list"></i>
            </div>
            <a href="{{ route('tasks.index') }}" class="small-box-footer">
                К разделу заданий <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
                    
      <div class="card">
        <div class="card-header border-0">
          <h3 class="card-title">Пользователи</h3>
          <div class="card-tools">
            <a href="#" class="btn btn-tool btn-sm">
              <i class="fas fa-download"></i>
            </a>
            <a href="#" class="btn btn-tool btn-sm">
              <i class="fas fa-bars"></i>
            </a>
          </div>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-striped table-valign-middle">
            <thead>
            <tr>
              <th>Пользователь</th>
              <th>Цена последнего заказа</th>
              <th>Рейтинг</th>
              <th>More</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>
                        <i class="mr-2 fas fa-user-alt"></i>
                        {{$user->firstname}} {{$user->lastname}}
                      </td>
                      <td>$0 USD</td>
                      <td>
                        <small class="text-success mr-1">
                          <i class="fas fa-arrow-up"></i>
                          {{$user->rate}}
                        </small>
                      </td>
                      <td>
                        <a href="#" class="text-muted">
                          <i class="fas fa-search"></i>
                        </a>
                      </td>
                </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col-md-6 -->
    <div class="col-lg-6">
        <div class="small-box bg-gradient-success">
            <div class="inner">
              <h3>{{$usersCount}}</h3>
              <p>Новых пользователей</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-plus"></i>
            </div>
            <a href="{{ route('users.index') }}" class="small-box-footer">
              К разделу пользователей <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
          
          

      <div class="card">
        <div class="card-header border-0">
          <h3 class="card-title">Общая статистика</h3>
          <div class="card-tools">
            <a href="#" class="btn btn-sm btn-tool">
              <i class="fas fa-download"></i>
            </a>
            <a href="#" class="btn btn-sm btn-tool">
              <i class="fas fa-bars"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
            <p class="text-success text-xl">
                <i class="fas fa-clipboard-list"></i>
            </p>
            <p class="d-flex flex-column text-right">
              <span class="font-weight-bold">
                <i class="fas fa-arrow-up text-success"></i> 86%
              </span>
              <span class="text-muted">Процент выполнения заказов</span>
            </p>
          </div>
          <!-- /.d-flex -->
          <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
            <p class="text-warning text-xl">
                <i class="fas fa-user-tie"></i>
            </p>
            <p class="d-flex flex-column text-right">
              <span class="font-weight-bold">
                <i class="fas fa-arrow-up text-warning"></i> 31%
              </span>
              <span class="text-muted">Нашли исполнителя в течение недели</span>
            </p>
          </div>
          <!-- /.d-flex -->
          <div class="d-flex justify-content-between align-items-center mb-0">
            <p class="text-danger text-xl">
                <i class="fas fa-user-plus"></i>
            </p>
            <p class="d-flex flex-column text-right">
              <span class="font-weight-bold">
                <i class="fas fa-arrow-down text-danger"></i> 1%
              </span>
              <span class="text-muted">Новых пользователей за неделю</span>
            </p>
          </div>
          <!-- /.d-flex -->
        </div>
      </div>
    </div>
    <!-- /.col-md-6 -->
  </div>
  <!-- /.row -->

@endsection
