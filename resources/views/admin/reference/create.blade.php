@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Добавить сотрудников компании
        <small>приятные слова..</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
      {!! Form::open(['route' => 'reference.store']) !!}
        <div class="box-header with-border">
          <h3 class="box-title">сотрудники компании</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">

                       <div class="form-group">
                         <label>Компания</label>
                         {{Form::select('company_id',
                         	$company,
                         	null,
                         	['class' => 'form-control select2'])
                         }}
                       </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">ФИО</label>
                         <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="fio">
                       </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Должность</label>
                         <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="position">
                       </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Телефон</label>
                         <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="phone">
                       </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                         <input type="email" class="form-control" id="exampleInputEmail1" placeholder="" name="email">
                       </div>
         </div>
         </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default">Назад</button>
          <button class="btn btn-success pull-right">Добавить</button>
        </div>
        <!-- /.box-footer-->
        {!! Form::close() !!}
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection