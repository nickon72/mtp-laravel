@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Изменить сотрудников компании
        <small>приятные слова..</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Меняем сотрудников компании</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
        {{Form::open(['route'=>['reference.update',$references->id], 'method'=>'put'])}}
          <div class="col-md-6">
                       <div class="form-group">
                          <label>Компания</label>
                          {{$references->getCompanyTitle($references->company_id)}}
                       </div>
            <div class="form-group">
              <label for="exampleInputEmail1">ФИО</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="fio" placeholder="" value="{{$references->fio}}">
            </div>
             <div class="form-group">
              <label for="exampleInputEmail1">Должность</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="position" placeholder="" value="{{$references->position}}">
             </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Телефон</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="phone" placeholder="" value="{{$references->phone}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="" value="{{$references->email}}">
            </div>

               </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default">Назад</button>
          <button class="btn btn-warning pull-right">Изменить</button>
        </div>
        <!-- /.box-footer-->
        {{Form::close()}}
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection