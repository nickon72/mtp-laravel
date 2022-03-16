@extends('admin.layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Добавить контракт
        <small>приятные слова..</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
	{{Form::open([
		'route'	=> 'contract.store',
		'files'	=>	true
	])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Добавляем контракт</h3>
          @include('admin.errors')
        </div>

        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label>Тип контракта</label>
                {{Form::select('type', ['tender' => 'Тендер', 'direct' => 'Прямой контракт'],
                 null,
                ['class' => 'form-control select2'])
                }}
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Номер контаркта</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="number" value="{{old('number')}}">
            </div>
 <!-- Date -->
            <div class="form-group">
              <label>Дата договора:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker" name="date" value="{{old('date')}}">
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
                <input type="text" class="form-control pull-right" id="datepicker" name="expiration" value="{{old('expiration')}}">
              </div>
              <!-- /.input group -->
            </div>
            <div class="form-group">
              <label>Компания</label>
              {{Form::select('company_id',
              	$companies,
              	null, 
              	['class' => 'form-control select2'])
              }}
            </div>
            <div class="form-group">
              <label>Материалы</label>
              {{Form::select('material_id[]',
              	$materials,
              	null, 
              	['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите материал(ы)'])
              }}
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Цена контракта</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="price" value="{{old('price')}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Количество товара</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="quantity_full" value="{{old('quantity_full')}}">
            </div>
           <div class="form-group">
                       <label for="exampleInputFile">Сертификат</label>
                       <input type="file" id="exampleInputFile" name="sertificat">

                       <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                     </div>
            <div class="form-group">
              <label for="exampleInputFile">Паспорт</label>
              <input type="file" id="exampleInputFile" name="pasport">

              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
            </div>
           <div class="form-group">
              <label for="exampleInputFile">Контракт</label>
              <input type="file" id="exampleInputFile" name="contract">

              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
            </div>

          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Описание</label>
              <textarea name="note" id="" cols="30" rows="10" class="form-control" >{{old('note')}}</textarea>
             </div>
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