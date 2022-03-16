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
              <h3 class="box-title">Листинг текущих поставок</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <div class="form-group">
                <a href="{{route('real_time.create')}}" class="btn btn-success">Добавить</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Филия поставки</th>
                  <th>Материал</th>
                  <th>Количество</th>
                  <th>дата поставки</th>
                  <th>Компания</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($real_times as $real_time)
                <tr>
                  <td>{{$real_time->id}}</td>
                  <td>{{$real_time->getFiliaTitle($real_time->filia_id)}}</td>
                  <td>{{$real_time->getMaterialTitle($real_time->materials_id)}}</td>
                  <td>{{$real_time->quantity}}</td>
                  <td>{{$real_time->date}}</td>
                  <td>{{$real_time->getCompanyTitle($real_time->company_id)}}</td>

                  <td>
                  <a href="{{route('real_time.edit', $real_time->id)}}" class="fa fa-pencil"></a>

                  {{Form::open(['route'=>['real_time.destroy', $real_time->id], 'method'=>'delete'])}}
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

