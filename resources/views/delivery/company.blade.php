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
            <li class="active">Поставки по компаниям</li>
          </ol>
        </section>
      <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-5">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
     <!-- Default box -->
           <div class="box">
                 <div class="box-header">
                   <h3 class="box-title">Выбор поставок за период по компаниям</h3>
                 </div>
                 <!-- /.box-header -->

         	{{Form::open(['route'=>['delivery_company_show'],'method'=>'post'])}}

          <table  class="table table-bordered table-striped">
                 @foreach($companies as $company)
            <tr>
                 <td>
           <div class="form-group">
              <label>
                <input type="checkbox" class="minimal" name="company_id[]" value="{{$company->id}}">
              </label>
           </div>
                 </td>
                 <td>
              <label>
                 {{$company->title}}
              </label>
              </td>
            </tr>
                 @endforeach
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
                 <!-- /.box-body -->
                 <div class="box-footer">
                   <button class="btn btn-success pull-right">выбрать компании</button>
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

            <div class="col-md-7">



            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


@endsection