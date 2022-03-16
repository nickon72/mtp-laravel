@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Изменить поставку
        <small>приятные слова..</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
	{{Form::open([
		'route'	=>	['real_time.update', $real_time->id],
		'files'	=>	true,
		'method'	=>	'put'
	])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Обновляем поставку </h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
              <div class="form-group">
                 <label for="exampleInputEmail1">Место поставки (Филия) </label>
                 {{Form::select('filia_id',
                              	$filia,
                              	$selectedFilia,
                              	['class' => 'form-control select2'])
                              }}
              </div>
            <div class="form-group">
                <label>Материалы</label>
                 {{Form::select('materials_id',
                       	$materials,
                       	$selectedMaterials,
                       	['class' => 'form-control select2'])
                          }}
                        </div>
         <div class="form-group">
              <label for="exampleInputEmail1">Количество товара</label>
              <input type="text"  name="quantity" id=""  class="form-control" value="{{$real_time->quantity}}">
          </div>
                <!-- Date -->
            <div class="form-group">
              <label>Дата поставки:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker" value="{{$real_time->getDate($real_time->date)}}" name="date">
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