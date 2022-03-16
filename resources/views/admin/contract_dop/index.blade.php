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
              <h3 class="box-title">Листинг Допсоглашений к контрактам</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <div class="form-group">
                <a href="{{route('contract_dop.create')}}" class="btn btn-success">Добавить</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                     <th>ID</th>
                     <th>Номер допсоглашения</th>
                     <th>Номер Контракта</th>
                     <th>Описание допсоглашения</th>
                     <th>допсоглашение</th>
                     <th>Действия</th>
                </tr
                </thead>
                <tbody>
                @foreach($contract_dops as $contract_dop)
					<tr>
	                  <td>{{$contract_dop->id}}</td>
	                  <td>{{$contract_dop->number}}</td>
                      <td>{{$contract_dop->getContractNumber($contract_dop->contract_id)}}</td>
                      <td>{{$contract_dop->note}}</td>
                      <td>
                          <img src="{{$contract_dop->getImage('image')}}" alt="" width="100">
                      </td>

	                  <td><a href="{{route('contract_dop.edit', $contract_dop->id)}}" class="fa fa-pencil"></a>

	                  {{Form::open(['route'=>['contract_dop.destroy', $contract_dop->id], 'method'=>'delete'])}}
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