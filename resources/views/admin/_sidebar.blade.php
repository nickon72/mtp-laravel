 <ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-dashboard"></i> <span>Админ-панель</span>
      </a>
    </li>
    <li><a href="{{route('company.index')}}"><i class="fa fa-sticky-note-o"></i> <span>Компании</span></a></li>
     <ul><li><a href="{{route('reference.index')}}"><i class="fa fa-sticky-note-o"></i> <span>Сотрудники</span></a></li></ul>
    <li><a href="{{route('contract.index')}}"><i class="fa fa-sticky-note-o"></i> <span>Контракты</span></a></li>
      <ul><li><a href="{{route('contract_dop.index')}}"><i class="fa fa-sticky-note-o"></i> <span>Допсоглашения</span></a></li></ul>

    <li><a href="{{route('filia.index')}}"><i class="fa fa-list-ul"></i> <span>Филии</span></a></li>
     <ul><li><a href="{{route('abz_drp.index')}}"><i class="fa fa-list-ul"></i> <span>АБЗ-ДРП</span></a></li></ul>
    <li><a href="{{route('materials.index')}}"><i class="fa fa-list-ul"></i> <span>Материалы</span></a></li>
    <li><a href="{{route('mera.index')}}"><i class="fa fa-list-ul"></i> <span>Мера</span></a></li>
    <li><a href="{{route('delivery.index')}}"><i class="fa fa-list-ul"></i> <span>Поставки</span></a></li>

    <li><a href="{{route('real_time.index')}}"><i class="fa fa-list-ul"></i> <span>Текущие Поставки</span></a></li>


    <li><a href="{{route('zayvka.index')}}"><i class="fa fa-list-ul"></i> <span>Заявки</span></a></li>

    <li><a href="{{route('users.index')}}"><i class="fa fa-users"></i> <span>Пользователи</span></a></li>

</ul>