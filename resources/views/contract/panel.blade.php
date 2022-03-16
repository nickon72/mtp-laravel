   <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab" clas=""><b>Информация о контракте</b></a></li>
                  <li><a href="#timeline" data-toggle="tab"><b>Допсоглашения</b></a></li>
                  <li><a href="#settings" data-toggle="tab"><b>Поставки по Контракту</b></a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                   <table class="table table-striped">
                     <thead>
                       <tr>
                         <th>Тип контракта</th>
                         <th>{{$contract_info->type}}</th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr>

                         <td>Номер конракта</td>
                         <td>{{$contract_info->number}}</td>
                       </tr>
                       <tr>
                         <td>Дата</td>
                         <td>{{$contract_info->date}}
                         </td>
                       </tr>
                       <tr>
                         <td>Срок действия</td>
                         <td>{{$contract_info->expiration}}</td>
                       </tr>
                       <tr>
                         <td>Компания</td>
                         <td>{{$contract_info->getCompanyTitle($contract_info->company_id)}}</td>
                       </tr>
                        <tr>
                         <td>Цена контракта</td>
                         <td>{{$contract_info->price}}</td>
                       </tr>
                       <tr>
                         <td>Количество товара</td>
                         <td>{{$contract_info->quantity_full}}</td>
                       </tr>
                       <tr>
                           <td><b>Номенклатура товара:</b></td>
                           <td></td>
                       </tr>
                       <tr>
                         <td><b>Название</b></td>
                         <td><b>К-во</b></td>
                         <td><b>Ед.изм.</b></td>
                         <td><b>Цена за ед.</b></td>
                         <td><b>Цена за ед. с доставкой</b></td>
                        </tr>
                        @foreach($materials_childs as $materials_child)
                       <tr>
                         <td>{{$materials_child->getMaterialTitle($materials_child->material_id)}}</td>
                         <td>{{$materials_child->materials_unit}}</td>
                         <td>{{$materials_child->getMeraTitle($materials_child->mera_id)}}</td>
                         <td>{{$materials_child->price_for_one}}</td>
                         <td>{{$materials_child->price_dostavka}}</td>
                       </tr>
                       @endforeach
                       <tr>
                         <td>Контракт</td>
                           <td><a href={{$contract_info->getImage('contract')}} target="_blank"><img src="{{$contract_info->getImage('contract')}}"  width="100"></a></td>
                       </tr>
                       <tr>
                         <td>Сертифікат</td>
                           <td><a href={{$contract_info->getImage('sertificat')}} target="_blank"><img src="{{$contract_info->getImage('sertificat')}}"  width="100"></a></td>
                       </tr>
                       <tr>
                         <td>Паспорт</td>
                           <td><a href={{$contract_info->getImage('pasport')}} target="_blank"><img src="{{$contract_info->getImage('pasport')}}"  width="100"></a></td>
                       </tr>
                     </tbody>
                   </table>


                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Номер</th>
                        <th>Описание</th>
                        <th>Допсоглашение</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($contract_dops as $contract_dop)
                      <tr>
                        <td>{{$contract_dop->number}}</td>
                        <td>{{$contract_dop->note}}</td>
                        <td><a href={{$contract_dop->getImage('image')}} target="_blank"><img src="{{$contract_dop->getImage('image')}}"  width="100"></a></td>
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
                             <h3 class="box-title">Поставки материалов по контракту</h3>
                           </div>
                           <!-- /.box-header -->
                           <div class="box-body table-responsive">

                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Материал</th>
                        <th>Количество</th>
                        <th>цена(грн.)</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($deliveries as $delivery)
                      <tr>
                        <td>{{$materials_child->getMaterialTitle($delivery->materials_id)}}</td>
                        <td>{{$delivery->sum_unit}}</td>
                        <td>{{$delivery->price_itog}}</td>
                      </tr>
                    @endforeach
                    @foreach($deliveries_itog as $delivery_itog)
                     <tr>
                         <td><b>ИТОГО</b></td>
                         <td>{{$delivery_itog->sum_unit}}</td>
                         <td>{{$delivery_itog->price_itog}}</td>
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