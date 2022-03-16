 @extends('layout')

 @section('content')

 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Профиль компании
          </h1>
          <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i>Главная</a></li>
            <li><a href="/contract">Контракты</a></li>
            <li class="active">Выбор Контрактов по материалам</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-7">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
     <!-- Default box -->
           <div class="box">
                 <div class="box-header">
                   <h3 class="box-title">Выбор контрактов по материалам</h3>
                 </div>
                 <!-- /.box-header -->

         	{{Form::open([
         		'route'	=> 'contract_materials'
                 	])}}
               <!-- Default box -->
               <div class="box">
                 <div class="box-header with-border">
                   <h3 class="box-title">Выбираем материал(материалы)</h3>
                   @include('admin.errors')
                 </div>

                     </div>
                     <div class="form-group">
                       <label>Материалы</label>
                       {{Form::select('material_id[]',
                       	$materials,
                       	null,
                       	['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите материал(ы)'])
                       }}
                     </div>

                 </div>
               </div>
                 <!-- /.box-body -->
                 <div class="box-footer">
                   <button class="btn btn-success pull-right">Отобразить контракты по выбранным материалам</button>
                 </div>
                 <!-- /.box-footer-->
               </div>
               <!-- /.box -->
         	{{Form::close()}}

                 <!-- /.box-body -->
               </div>
           <!-- /.box -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- About Me Box -->

            </div><!-- /.col -->

            <div class="col-md-5">



            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


@endsection