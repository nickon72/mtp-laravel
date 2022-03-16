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
            <li class="active">Контракты компании</li>
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
                   <h3 class="box-title">Листинг всех контрактов</h3>
                 </div>
                 <!-- /.box-header -->
                 <div class="box-body table-responsive">

                   <table id="example1" class="table table-bordered table-striped">
                     <thead>
                     <tr>
                       <th>Тип контракта</th>
                       <th>Номер</th>
                       <th>Дата</th>
                       <th>Срок</th>
                       <th>Компания</th>
                       <th>Цена контракта(грн.)</th>
                       <th>Контракт</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($contracts as $contract)
     					<tr>
     	                  <td>{{$contract->type}}</td>
     	                  <td>{{$contract->number}}<a href="{{route('contract_show', $contract->id)}}" class="fa fa-hand-o-right"></a></td>
     	                  <td>{{$contract->date}}</td>
     	                  <td>{{$contract->expiration}}</td>
     	                  <td>{{$contract->getCompanyTitle($contract->company_id)}}</td>
     	                  <td>{{$contract->price}}</td>
     	                  <td><a href={{$contract->getImage('contract')}} target="_blank"><img src="{{$contract->getImage('contract')}}"  width="100"></a></td>

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