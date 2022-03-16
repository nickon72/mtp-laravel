 @extends('layout')

 @section('content')

 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Профиль заявки
          </h1>
          <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i>Главная</a></li>
            <li><a href="/zayvka">Заявки</a></li>
            <li class="active">Заявки по дате</li>
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
                   <h3 class="box-title">Листинг всех заявок за период</h3>
                 </div>
                 {{Form::open(['route'=>['zayvka_date'], 'method'=>'post'])}}
   <!-- Date -->
                          <div class="form-group">
                            <label>Дата с:</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text"  id="datepicker" name="date" value="{{old('date')}}">
                            </div>
                            <!-- /.input group -->
                          </div>
               <!-- Date -->
                          <div class="form-group">
                            <label>Дата по:</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text"  id="datepicker1" name="expiration" value="{{old('expiration')}}">
                            </div>
                            <!-- /.input group -->
                          </div>
                                     <div class="box-footer">
                                         <button class="btn btn-success pull-left">отобразить заявки за период</button>
                                      </div>
                                      {{Form::close()}}
                 <!-- /.box-header -->
                 <div class="box-body table-responsive">

                   <table id="example1" class="table table-bordered table-striped">
                     <thead>
                     <tr>
                       <th>Данные по заявкам за период с {{$date}} по {{$exp}}</th>
                     </tr>
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
                          <td>{{$zayvka_class->getCompanyTitle($zayvka->company_id)}}</td>
                          <td>{{$zayvka_class->getFiliaTitle($zayvka->filia_id)}}</td>
                          <td><a href={{$zayvka_class->getImage('image')}} target="_blank"><img src="{{$zayvka_class->getImage('image')}}"  width="100"></a></td>

                        </tr>
                       @endforeach

                     </tbody>
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