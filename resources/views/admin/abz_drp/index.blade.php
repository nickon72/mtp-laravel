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
              <h3 class="box-title">Листинг АБЗ или ДРП Филий</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <div class="form-group">
                <a href="{{route('abz_drp.create')}}" class="btn btn-success">Добавить</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                     <th>ID</th>
                     <th>Название</th>
                     <th>Филия</th>
                     <th>Действия</th>
                </tr
                </thead>
                <tbody>
                @foreach($abz_drps as $abz_drp)
					<tr>
	                  <td>{{$abz_drp->id}}</td>
	                  <td>{{$abz_drp->title}}</td>
                      <td>{{$abz_drp->getFiliaTitle($abz_drp->filia_id)}}</td>

	                  <td><a href="{{route('abz_drp.edit', $abz_drp->id)}}" class="fa fa-pencil"></a>

	                  {{Form::open(['route'=>['abz_drp.destroy', $abz_drp->id], 'method'=>'delete'])}}
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