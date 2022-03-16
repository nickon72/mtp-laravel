 @extends('layout')

 @section('content')

 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Контракт полная иформация
          </h1>
          <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/contract">Контракты</a></li>
            <li class="active">Инф-я</li>
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
                   <h3 class="box-title">Листинг активных(действующих) контрактов</h3>
                 </div>
                 <!-- /.box-header -->
                 <div class="box-body table-responsive">

                   <table id="example1" class="table table-bordered table-striped">
                     <thead>
                     <tr>
                       <th>Компания</th>
                       <th>Номер контракта</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($contracts as $contract)
     					<tr>
     	                  <td>{{$contract->getCompanyTitle($contract->company_id)}}</td>
     	                  <td>{{$contract->number}}<a href="{{route('contract_active_show', $contract->id)}}" class="fa fa-hand-o-right"></a></td>
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

            <div class="col-md-7">
             @include('contract/panel')


            </div><!-- /.col -->


          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


@endsection