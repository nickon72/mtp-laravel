@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Изменить статью
        <small>приятные слова..</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
	{{Form::open([
		'route'	=>	['contract.update', $contract->id],
		'files'	=>	true,
		'method'	=>	'put'
	])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Обновляем контракт {{$contract->number}}</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label>Тип контракта</label>
                 {{Form::select('type',
                  ['tender' => 'Тендер', 'direct' => 'Прямой контракт'],
                  $selectedContract,
                 ['class' => 'form-control select2'])
                 }}
            </div>
           <div class="form-group">
              <label for="exampleInputEmail1">Номер контаркта</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="number" value="{{$contract->number}}">
            </div>
                <!-- Date -->
            <div class="form-group">
              <label>Дата:</label>

              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker" value="{{$contract->getDate($contract->date)}}" name="date">
              </div>
              <!-- /.input group -->
            </div>
                  <!-- Date -->
            <div class="form-group">
              <label>Срок договора:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker" name="expiration" value="{{$contract->getExpiration($contract->expiration)}}">
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
               <label for="exampleInputEmail1">Цена контаркта</label>
               <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="price" value="{{$contract->price}}">
             </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Количество товара</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="quantity_full" value="{{$contract->quantity_full}}">
            </div>
            <div class="form-group">
              <img src="{{$contract->getImage('sertificat')}}" alt="" class="img-responsive" width="200">
              <label for="exampleInputFile">Сертифткат</label>
              <input type="file" id="exampleInputFile" name="sertificat">
              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
            </div>
            <div class="form-group">
              <img src="{{$contract->getImage('pasport')}}" alt="" class="img-responsive" width="200">
              <label for="exampleInputFile">Паспорт</label>
              <input type="file" id="exampleInputFile" name="pasport">
              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
            </div>
            <div class="form-group">
               <img src="{{$contract->getImage('contract')}}" alt="" class="img-responsive" width="200">
               <label for="exampleInputFile">Контракт</label>
               <input type="file" id="exampleInputFile" name="contract">
               <p class="help-block">Какое-нибудь уведомление о форматах..</p>
             </div>
            <div class="form-group">
              <label>Материалы</label>
              {{Form::select('material_id[]',
              	$materials,
              	$selectedMaterials,
              	['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите теги'])
              }}
            </div>

          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Полный текст</label>
              <textarea name="content" id="" cols="30" rows="10" class="form-control">{{$contract->note}}</textarea>
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