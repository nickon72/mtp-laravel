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
              <h3 class="box-title">Листинг контрактов</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <div class="form-group">
                <a href="{{route('contract.create')}}" class="btn btn-success">Добавить</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Тип договора</th>
                  <th>Номер договора</th>
                  <th>Дата</th>
                  <th>Срок договора</th>
                  <th>Компания</th>
                  <th>Материал</th>
                  <th>Единица измерения</th>
                  <th>Цена договора</th>
                  <th>Количество товара</th>
                  <th>Сертификат</th>
                  <th>Паспорт</th>
                  <th>Контракт</th>
                  <th>Примечание</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contracts as $contract)
                <tr>
                  <td>{{$contract->id}}</td>
                  <td>{{$contract->type}}</td>
                  <td>{{$contract->number}}</td>
                  <td>{{$contract->date}}</td>
                  <td>{{$contract->expiration}}</td>
                  <td>{{$contract->getCompanyTitle($contract->company_id)}}</td>
                  <td>{{$contract->getMaterialTitle()}}<a href="{{route('materials_children.edit', $contract->id)}}" class="fa fa-pencil" ></a></td>
                  <td>{{$contract->getMera()}}</td>
                  <td>{{$contract->price}}</td>
                  <td>{{$contract->quantity_full}}</td>
                  <td>
                    <img src="{{$contract->getImage('sertificat')}}" alt="" width="100">
                  </td>
                  <td>
                    <img src="{{$contract->getImage('pasport')}}" alt="" width="100">
                  </td>
                  <td>
                    <img src="{{$contract->getImage('contract')}}" alt="" width="100">
                  </td>
                   <td>{{$contract->note}}</td>
                  <td>
                  <a href="{{route('contract.edit', $contract->id)}}" class="fa fa-pencil"></a>

                  {{Form::open(['route'=>['contract.destroy', $contract->id], 'method'=>'delete'])}}
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