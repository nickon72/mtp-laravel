@extends('admin.layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Листинг поставок</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <div class="form-group">
                <a href="{{route('delivery.create')}}" class="btn btn-success">Добавить</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Материал</th>
                  <th>мера</th>
                  <th>дата поставки</th>
                  <th>Компания</th>
                  <th>Контракт</th>
                  <th>ТТН</th>
                  <th>ВН</th>
                  <th>Счет</th>
                  <th>Филия поставки</th>
                  <th>Цена за единицу</th>
                  <th>Количество товара</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($deliverys as $delivery)
                <tr>
                  <td>{{$delivery->id}}</td>
                  <td>{{$delivery->getMaterialTitle($delivery->materials_id)}}</td>
                  <td>{{$delivery->getMera($delivery->mera_id)}}</td>
                  <td>{{$delivery->date}}</td>
                  <td>{{$delivery->getCompanyTitle($delivery->company_id)}}</td>
                  <td>{{$delivery->getContract($delivery->contract_id)}}</td>
                  <td>
                    <img src="{{$delivery->getImage('ttn')}}" alt="" width="100">
                  </td>
                  <td>
                    <img src="{{$delivery->getImage('vn')}}" alt="" width="100">
                  </td>
                  <td>
                    <img src="{{$delivery->getImage('invoce')}}" alt="" width="100">
                  </td>
                  <td>{{$delivery->getFiliaTitle($delivery->filia_id)}}</td>
                  <td>{{$delivery->price}}</td>
                  <td>{{$delivery->unit}}</td>

                  <td>
                  <a href="{{route('delivery.edit', $delivery->id)}}" class="fa fa-pencil"></a>

                  {{Form::open(['route'=>['delivery.destroy', $delivery->id], 'method'=>'delete'])}}
	                  <button onclick="return confirm('are you sure?')" type="submit" class="delete">
	                   <i class="fa fa-remove"></i>
	                  </button>

	                   {{Form::close()}}
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection