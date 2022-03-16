@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Изменить заявку
        <small>приятные слова..</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
	{{Form::open([
		'route'	=>	['zayvka.update', $zayvka->id],
		'files'	=>	true,
		'method'	=>	'put'
	])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Обновляем заявку</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
           <div class="form-group">
              <label for="exampleInputEmail1">Номер заявки</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="number" value="{{$zayvka->number}}">
            </div>
                <!-- Date -->
            <div class="form-group">
              <label>Дата заявки:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker" value="{{$zayvka->getDate($zayvka->date)}}" name="date">
              </div>
              <!-- /.input group -->
            </div>
            <div class="form-group">
              <label>Компания</label>
              {{Form::select('company_id',
              	$company,
              	$selectedCompany,
              	['class' => 'form-control select2'])
              }}
            </div>
                 <div class="form-group">
                 <label>Филия</label>
                 {{Form::select('filia_id',
                 	$filia,
                 	$selectedFilia,
                 	['class' => 'form-control select2'])
                 }}
                        </div>
            <div class="form-group">
              <img src="{{$zayvka->getImage()}}" alt="" class="img-responsive" width="200">
              <label for="exampleInputFile">сканкопия</label>
              <input type="file" id="exampleInputFile" name="image">
              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
            </div>



          </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-warning pull-right">Изменить</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
	{{Form::close()}}
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection