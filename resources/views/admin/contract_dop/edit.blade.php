@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Изменить Допсоглашение Контракта
        <small>приятные слова..</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Меняем допсоглашение контракта</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
        {{Form::open(['route'=>['contract_dop.update',$contract_dop->id],
         'files' => true,
         'method'=>'put'])}}
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Номер допсоглашения</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="number" placeholder="" value="{{$contract_dop->number}}">
            </div>
                      <div class="form-group">
                                  <label>Контракт</label>
                                  {{Form::select('contract_id',
                                  	$contracts,
                                  	$contract_dop->contract_id,
                                  	['class' => 'form-control select2'])
                                  }}
                       </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Описание допсоглашения</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="note" placeholder="" value="{{$contract_dop->note}}">
            </div>
             <div class="form-group">
               <img src="{{$contract_dop->getImage()}}" alt="" class="img-responsive" width="200">
               <label for="exampleInputFile">Допсоглашение</label>
               <input type="file" id="exampleInputFile" name="image">
               <p class="help-block">Какое-нибудь уведомление о форматах..</p>
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