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
            <li><a href="#">Компании</a></li>
            <li class="active">Профиль компании</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-6">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
     <!-- Default box -->
           <div class="box">
                 <div class="box-header">
                   <h3 class="box-title">Листинг Компаний</h3>
                 </div>
                 <!-- /.box-header -->
                 <div class="box-body table-responsive">

                   <table id="example1" class="table table-bordered table-striped">
                     <thead>
                     <tr>
                       <th>ID</th>
                       <th>Название</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($companys as $company)
     					<tr>
     	                  <td>{{$company->id}}</td>
     	                  <td>{{$company->title}}<a href="company_show/<?=$company->id?>" class="fa fa-hand-o-right"></a></td>
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

            <div class="col-md-6">



            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


@endsection