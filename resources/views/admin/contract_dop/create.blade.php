@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Добавить допсоглашение к контракту
        <small>приятные слова..</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
     {{Form::open([
     		'route'	=> 'contract_dop.store',
     		'files'	=>	true
     	])}}
        <div class="box-header with-border">
          <h3 class="box-title">Допсоглашения</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">

            <div class="form-group">
              <label for="exampleInputEmail1">Номер</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="number">
            </div>
            <div class="form-group">
                         <label>Контракт(номер)</label>
                         {{Form::select('contract_id',
                         	$contracts,
                         	null,
                         	['class' => 'form-control select2', 'placeholder'=>'Выберите контракт'])
                         }}
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Описание</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="note">
            </div>
             <div class="form-group">
               <label for="exampleInputFile">Допсоглашение</label>
               <input type="file" id="exampleInputFile" name="image">

               <p class="help-block">Какое-нибудь уведомление о форматах..</p>
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