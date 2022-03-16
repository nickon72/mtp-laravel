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
            <li><a href="/"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li><a href="/company"></a>Компании</li>
            <li class="active">Профиль компании</li>
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
     	                  <td>{{$company->title}}<a href="{{route('company_show', $company->id)}}" class="fa fa-hand-o-right"></a></td>
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
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab" clas=""><b>Информация о компании</b></a></li>
                  <li><a href="#timeline" data-toggle="tab"><b>Сотрудники</b></a></li>
                  <li><a href="#settings" data-toggle="tab"><b>Контракты</b></a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                   <table class="table table-striped">
                     <thead>
                       <tr>
                         <th>Название компании</th>
                         <th>{{$info_company->title}}</th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr>

                         <td>ЕДРПОУ</td>
                         <td>{{$info_company->edrpou}}</td>
                       </tr>
                       <tr>

                         <td>Адрес</td>
                         <td>{{$info_company->address_index}},
                             {{$info_company->address_sity}},
                             {{$info_company->address_street}}
                         </td>
                       </tr>
                       <tr>
                         <td>Расчётный счет</td>
                         <td>{{$info_company->bank_account}}</td>
                       </tr>
                       <tr>
                         <td>МФО</td>
                         <td>{{$info_company->bank_mfo}}</td>
                       </tr>
                        <tr>
                         <td>Телефон/факс</td>
                         <td>{{$info_company->phone}}</td>
                       </tr>
                       <tr>
                         <td>Електронный адрес</td>
                         <td>{{$info_company->email}}</td>
                       </tr>
                       <tr>
                         <td>Директор ФИО</td>
                         <td>{{$info_company->director_name}}</td>
                       </tr>
                       <tr>
                         <td>Телефон директора</td>
                         <td>{{$info_company->director_phone}}</td>
                       </tr>
                       <tr>
                         <td>Примечание</td>
                         <td>{{$info_company->note}}</td>
                       </tr>
                     </tbody>
                   </table>


                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>ФИО</th>
                        <th>Должность</th>
                        <th>Телефон</th>
                        <th>Email</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($references as $reference)
                      <tr>
                        <td>{{$reference->fio}}</td>
                        <td>{{$reference->position}}</td>
                        <td>{{$reference->phone}}</td>
                        <td>{{$reference->email}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
           <div class="box box-primary">
                          <div class="box-body box-profile">
               <!-- Default box -->
                     <div class="box">
                           <div class="box-header">
                             <h3 class="box-title">Контракты компании</h3>
                           </div>
                           <!-- /.box-header -->
                           <div class="box-body table-responsive">

                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Тип контракта</th>
                        <th>Номер</th>
                        <th>Дата</th>
                        <th>Срок до</th>
                        <th>Цена Контракта</th>
                        <th>Кол-во товара</th>
                        <th>Контракт</th>
                        <th>Сертификат</th>
                        <th>Паспорт</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($contracts as $contract)
                      <tr>
                        <td>{{$contract->type}}</td>
                        <td>{{$contract->number}}</td>
                        <td>{{$contract->date}}</td>
                        <td>{{$contract->expiration}}</td>
                        <td>{{$contract->price}}</td>
                        <td>{{$contract->quantity_full}}</td>
                        <td><a href={{$contract->getImage('contract')}} target="_blank"><img src="{{$contract->getImage('contract')}}"  width="100"></a></td>
                        <td><a href={{$contract->getImage('sertificat')}} target="_blank"><img src="{{$contract->getImage('sertificat')}}"  width="100"></a></td>
                        <td><a href={{$contract->getImage('pasport')}} target="_blank"><img src="{{$contract->getImage('pasport')}}"  width="100"></a></td>

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
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->


            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


@endsection