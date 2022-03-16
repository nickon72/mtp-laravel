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
		'route'	=>	['delivery.update', $delivery->id],
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
                <label>Материалы</label>
                 {{Form::select('materials_id',
                       	$materials,
                       	$selectedMaterials,
                       	['class' => 'form-control select2'])
                          }}
                        </div>
                <div class="form-group">
                 <label for="exampleInputEmail1">Место поставки (Филия) </label>
                 {{Form::select('filia_id',
                              	$filia,
                              	$selectedFilia,
                              	['class' => 'form-control select2'])
                              }}
                          </div>

                <!-- Date -->
            <div class="form-group">
              <label>Дата поставки:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker" value="{{$delivery->getDate($delivery->date)}}" name="date">
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
                            <label for="exampleInputEmail1">Единица измерения</label>
                            {{Form::select('mera_id',
                                         	$mera,
                                         	$selectedMera,
                                         	['class' => 'form-control select2'])
                                         }}
                         </div>

            <div class="form-group">
                          <label>Контракт</label>
                          {{Form::select('contract_id',
                          	$contract,
                          	$selectedContract,
                          	['class' => 'form-control select2'])
                          }}
                        </div>

            <div class="form-group">
              <img src="{{$delivery->getImage('ttn')}}" alt="" class="img-responsive" width="200">
              <label for="exampleInputFile">ТТН</label>
              <input type="file" id="exampleInputFile" name="ttn">
              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
            </div>
            <div class="form-group">
              <img src="{{$delivery->getImage('vn')}}" alt="" class="img-responsive" width="200">
              <label for="exampleInputFile">ВН</label>
              <input type="file" id="exampleInputFile" name="vn">
              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
            </div>
            <div class="form-group">
               <img src="{{$delivery->getImage('invoice')}}" alt="" class="img-responsive" width="200">
               <label for="exampleInputFile">Счет</label>
               <input type="file" id="exampleInputFile" name="invoice">
               <p class="help-block">Какое-нибудь уведомление о форматах..</p>
             </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Цена за единицу товара</label>
              <input type="text"  name="price" id=""  class="form-control" value="{{$delivery->price}}">
          </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Количество товара</label>
              <input type="text"  name="unit" id=""  class="form-control" value="{{$delivery->unit}}">
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