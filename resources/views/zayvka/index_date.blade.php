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