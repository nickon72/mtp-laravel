@extends('admin.layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Добавить поставку
        <small>приятные слова..</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
	{{Form::open([
		'route'	=> 'delivery.store',
		'files'	=>	true
	])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Добавляем поставку</h3>
          @include('admin.errors')
        </div>

        <div class="box-body">
          <div class="col-md-6">
             <div class="form-group">
               <label>Материалы</label>
               {{Form::select('materials_id',
               	$materials,
               	null,
               	['class' => 'form-control select2', 'placeholder'=>'Выберите материал'])
               }}
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">Место поставки (Филия) </label>
                 {{Form::select('filia_id',
                              	$filia,
                              	null,
                              	['class' => 'form-control select2', 'placeholder'=>'Выберите место поставки'])
                              }}
                          </div>
<!-- Date -->
            <div class="form-group">
              <label>Дата поставки товара:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker" name="date" value="{{old('date')}}">
              </div>
              <!-- /.input group -->
            </div>
           <div class="form-group">
              <label>Компания</label>
              {{Form::select('company_id',
              	$companies,
              	null,
              	['class' => 'form-control select2', 'placeholder'=>'Выберите поставщика'])
              }}
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Единица измерения</label>
                {{Form::select('mera_id',
                             	$meras,
                             	null,
                             	['class' => 'form-control select2', 'placeholder'=>'Выберите меру материала'])
                             }}
             </div>
            <div class="form-group">
              <label>Контракт</label>
              {{Form::select('contract_id',
              	$contracts,
              	null,
              	['class' => 'form-control select2', 'placeholder'=>'Наберите номер контракта'])
              }}
            </div>
             <div class="form-group">
                <label for="exampleInputFile">Товаро-транспортная накладная</label>
                <input type="file" id="exampleInputFile" name="ttn">
                  <p class="help-block">Какое-нибудь уведомление о форматах..</p>
             </div>
            <div class="form-group">
              <label for="exampleInputFile">Налоговая накладная</label>
              <input type="file" id="exampleInputFile" name="vn">

              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
            </div>
           <div class="form-group">
              <label for="exampleInputFile">Счет</label>
              <input type="file" id="exampleInputFile" name="invoce">

              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
            </div>
  <div class="form-group">
              <label for="exampleInputEmail1">Цена за единицу товара</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="price" value="{{old('price')}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Количество товара</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="unit" value="{{old('unit')}}">
            </div>


        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default">Назад</button>
          <button class="btn btn-success pull-right">Добавить</button>
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