@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Добавить филию
        <small>приятные слова..</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Меняем филию</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
        {{Form::open(['route'=>['filia.update',$filia->id], 'method'=>'put'])}}
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Название</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="" value="{{$filia->title}}">
            </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Адрес</label>
                      <input type="text" class="form-control"  placeholder="" name="address_sity" value="{{$filia->address}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">ФИО Директора</label>
                      <input type="text" class="form-control"  placeholder="" name="director" value="{{$filia->director}}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Телефон директора</label>
                      <input type="text" class="form-control"  placeholder="" name="phone" value="{{$filia->phone}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" class="form-control"  placeholder="" name="email" value="{{$filia->email}}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Примечание</label>
                      <input type="text" class="form-control"  placeholder="" name="note" value="{{$filia->note}}">
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