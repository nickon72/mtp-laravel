 @extends('layout')

 @section('content')

 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Профиль поставок
          </h1>
          <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i>Главная</a></li>
            <li><a href="/contract">Заявки</a></li>
            <li class="active">Заявки за период</li>
          </ol>
        </section>

        <!-- Main content -->
         <section class="content">

                 <div class="row">
                   <div class="col-md-11">

                     <!-- Profile Image -->
                     <div class="box box-primary">
                       <div class="box-body box-profile">
            <!-- Default box -->
                  <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Листинг всех заявок</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">

                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Номер</th>
                              <th>Дата</th>
                              <th>Компания</th>
                              <th>Филия</th>
                              <th>Заявка</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($zayvkas as $zayvka)
            					<tr>
            	                  <td>{{$zayvka->number}}</td>
            	                  <td>{{$zayvka->date}}</td>
            	                  <td>{{$zayvka->getCompanyTitle($zayvka->company_id)}}</td>
            	                  <td>{{$zayvka->getFiliaTitle($zayvka->filia_id)}}</td>
            	                  <td><a href={{$zayvka->getImage('image')}} target="_blank"><img src="{{$zayvka->getImage('image')}}"  width="100"></a></td>

            	                </tr>
                            @endforeach

                            </tfoot>
                          </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                  <!-- /.box -->
                       </div><!-- /.box-body -->
                     </div><!-- /.box -->

                     <!-- About Me Box -->

                   </div><!-- /.col -->

                   <div class="col-md-1">



                   </div><!-- /.col -->
                 </div><!-- /.row -->

               </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


@endsection