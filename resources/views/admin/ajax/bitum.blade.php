@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Изменить материал
        <small>приятные слова..</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Меняем материал для контракта}}</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
        {{Form::open(['route'=>['ajax.update',$bitums[0]->id], 'method'=>'put'])}}

         @foreach($bitums as $bitum)
           <div class="col-md-6">
                   <div class="form-group">
                      <label for="exampleInputEmail1">Филия</label>
                      <input type="text" class="form-control"  placeholder="" name="title" value="{{$bitum->title}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">день</label>
                      <input type="text" class="form-control"  placeholder="" name="day1" value="{{$bitum->day1}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">день</label>
                      <input type="text" class="form-control"  placeholder="" name="day2" value="{{$bitum->day2}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">день</label>
                      <input type="text" class="form-control"  placeholder="" name="day3" value="{{$bitum->day3}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">день</label>
                      <input type="text" class="form-control"  placeholder="" name="day4" value="{{$bitum->day4}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">день</label>
                      <input type="text" class="form-control"  placeholder="" name="day5" value="{{$bitum->day5}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">день</label>
                      <input type="text" class="form-control"  placeholder="" name="day6" value="{{$bitum->day6}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">день</label>
                      <input type="text" class="form-control"  placeholder="" name="day7" value="{{$bitum->day7}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">день</label>
                      <input type="text" class="form-control"  placeholder="" name="day8" value="{{$bitum->day8}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">день</label>
                      <input type="text" class="form-control"  placeholder="" name="day9" value="{{$bitum->day9}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">день</label>
                      <input type="text" class="form-control"  placeholder="" name="day10" value="{{$bitum->day10}}">
                    </div>

             </div>
             @endforeach
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