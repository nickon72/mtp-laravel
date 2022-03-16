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
              <h3 class="box-title">Листинг Компании</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <div class="form-group">
                <a href="{{route('company.create')}}" class="btn btn-success">Добавить</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Название</th>
                  <th>ЕДРПОУ</th>
                  <th>Индекс</th>
                  <th>Город</th>
                  <th>Улица</th>
                  <th>Банк счет</th>
                  <th>Банк МФО</th>
                  <th>телефон</th>
                  <th>Email</th>
                  <th>Директор</th>
                  <th>Телефон директора</th>
                  <th>Примечание</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($companys as $company)
					<tr>
	                  <td>{{$company->id}}</td>
	                  <td>{{$company->title}}</td>
   	                  <td>{{$company->edrpou}}</td>
	                  <td>{{$company->address_index}}</td>
	                  <td>{{$company->address_sity}}</td>
	                  <td>{{$company->address_street}}</td>
	                  <td>{{$company->bank_account}}</td>
	                  <td>{{$company->bank_mfo}}</td>
	                  <td>{{$company->phone}}</td>
	                  <td>{{$company->email}}</td>
	                  <td>{{$company->director_name}}</td>
	                  <td>{{$company->director_phone}}</td>
	                  <td>{{$company->note}}</td>

	                  <td><a href="{{route('company.edit', $company->id)}}" class="fa fa-pencil"></a>

	                  {{Form::open(['route'=>['company.destroy', $company->id], 'method'=>'delete'])}}
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