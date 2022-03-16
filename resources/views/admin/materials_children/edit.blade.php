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
          <h3 class="box-title">Меняем материал для контракта №{{$contract_number->number}}</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
        {{Form::open(['route'=>['materials_children.update',$id], 'method'=>'put'])}}

         @foreach($contracts as $contract)
           <div class="col-md-6">
               <div class="form-group">
                   <label for="exampleInputEmail1">Товар</label>
                   <input type="text" class="form-control" id="exampleInputEmail1" name="id_child[]" placeholder="" value="{{$contract->id}}">
               </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Материал</label>
                      <input type="text" class="form-control"  placeholder="" name="material_id[]" value="{{$contract->getMaterialTitle($contract->material_id)}}">
                    </div>
                   <div class="form-group">
                      <label for="exampleInputEmail1">Единица измерения</label>
                      {{Form::select('mera_id[]',
                                   	$meras,
                                   	null,
                                   	['class' => 'form-control select2'])
                                   }}
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Цена за единицу</label>
                      <input type="text" class="form-control"  placeholder="" name="price_for_one[]" value="{{$contract->price_for_one}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Цена за единицу с доставкой</label>
                      <input type="text" class="form-control"  placeholder="" name="price_dostavka[]" value="{{$contract->price_dostavka}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Количество материала</label>
                      <input type="text" class="form-control"  placeholder="" name="materials_unit[]" value="{{$contract->materials_unit}}">
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