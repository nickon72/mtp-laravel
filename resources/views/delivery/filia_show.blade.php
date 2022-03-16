  @extends('layout')

  @section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
         <!-- Content Header (Page header) -->
         <section class="content-header">
           <h1>
             Поставки
           </h1>
           <ol class="breadcrumb">
             <li><a href="/"><i class="fa fa-dashboard"></i>Главная</a></li>
             <li><a href="/delivery">Поставки</a></li>
             <li class="active">Поставки материалов по филиям</li>
           </ol>
         </section>
       <!-- Main content -->
         <section class="content">

           <div class="row">
             <div class="col-md-3">

               <!-- Profile Image -->
               <div class="box box-primary">
                 <div class="box-body box-profile">
      <!-- Default box -->
            <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Выбор филий</h3>
                  </div>
                  <!-- /.box-header -->
     @include('admin.errors')
          	{{Form::open(['route'=>['delivery_filia_show'], 'method'=>'post'])}}
           <table  class="table table-bordered table-striped">
                  @foreach($filias as $filia)
             <tr>
                  <td>
            <div class="form-group">
               <label>
                 <input type="checkbox" class="minimal" name="filia_id[]" value="{{$filia->id}}">
               </label>
            </div>
                  </td>
                  <td>
               <label>
                  {{$filia->title}}
               </label>
               </td>
             </tr>
                  @endforeach
                  <!-- /.box-body -->
                      <!-- Date -->
                          <div class="form-group">
                            <label>Дата с:</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="datepicker" name="date" value="{{old('date')}}">
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
                              <input type="text" class="form-control pull-right" id="datepicker1" name="expiration" value="{{old('expiration')}}">
                            </div>
                            <!-- /.input group -->
                          </div>
                  <div class="box-footer">

                    <button class="btn btn-success pull-right">отобразить данные</button>
                  </div>
                  <!-- /.box-footer-->
                </div>
            </table>
                <!-- /.box -->
          	{{Form::close()}}

                  <!-- /.box-body -->
                </div>
            <!-- /.box -->
                 </div><!-- /.box-body -->
               </div><!-- /.box -->

               <!-- About Me Box -->

             </div><!-- /.col -->

             <div class="col-md-9">
                   <table class="table table-striped" border="1">
                    <thead>
                      <tr>
                        <th>Данные по поставкам за период с {{$date}} по {{$exp}}</th>
                      </tr>
                      <tr>
                        <th>Филия</th>
                        <th>Материал</th>
                        <th>Количество</th>
                        <th>Мера</th>
                        <th>Стоимость(грн.)</th>
                      </tr>
                    </thead>
                    <tbody>

                     <?php $marker = "";?>
                    @foreach($deliveries as $delivery)
                      <tr>
                         <?php if ($marker ==$delivery->filia_id):?>
                          <td>--</td>
                          <?php else:?>
                        <td>{{$filia->getFiliaTitle($delivery->filia_id)}}</td>
                          <?php endif;?>
                        <td>{{$materials[0]->getMaterialsTitle($delivery->materials_id)}}</td>
                        <td>{{$delivery->sum_unit}}</td>
                        <td>{{\App\Mera::getMeraTitle($delivery->mera_id)}}</td>
                        <td>{{$delivery->price_itog}}</td>
                         <?php $marker = $delivery->filia_id;?>
                      </tr>
                    @endforeach

                    </tbody>
                  </table>


             </div><!-- /.col -->
           </div><!-- /.row -->

         </section><!-- /.content -->
       </div><!-- /.content-wrapper -->


 @endsection