@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
   <link rel="stylesheet" href="table/style.css" type="text/css" media="screen">
   		<link rel="stylesheet" href="table/responsive.css" type="text/css" media="screen">

           <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
   		<link rel="stylesheet" href="table/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css" media="screen">

     	<div id="message"></div>
     		<div id="wrap">
     		<h1>EditableGrid Demo - Database Link</h1>

     			<!-- Feedback message zone -->


                 <div id="toolbar">
                   <input type="text" id="filter" name="filter" placeholder="Filter :type any text here"  />
                   <a id="showaddformbutton" class="button green"><i class="fa fa-plus"></i> Add new row</a>
                 </div>
     			<!-- Grid contents -->
     			<div id="tablecontent"></div>

     			<!-- Paginator control -->
     			<div id="paginator"></div>


     		</div>


     		<script src="table/editablegrid-2.1.0-49.js"></script>
             <!-- EditableGrid test if jQuery UI is present. If present, a datepicker is automatically used for date type -->
             <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
     		<script src="table/demo.js" ></script>

     		<script type="text/javascript">
                 var datagrid;

                 window.onload = function() {
                   datagrid = new DatabaseGrid();



                     // key typed in the filter field
                     $("#filter").keyup(function() {
                       datagrid.editableGrid.filter( $(this).val());

                         // To filter on some columns, you can set an array of column index
                         //datagrid.editableGrid.filter( $(this).val(), [0,3,5]);
                       });

                     $("#showaddformbutton").click( function()  {
                       showAddForm();
                     });
                     $("#cancelbutton").click( function() {
                       showAddForm();
                     });

                     $("#addbutton").click(function() {
                       datagrid.addRow();
                     });






     	}

     $(function () {

         });

     		</script>





             <!-- simple form, used to add a new row -->
             <div id="addform">

                 <div class="row">
                     <input type="text" id="name" name="name" placeholder="name" />
                 </div>

                  <div class="row">
                     <input type="text" id="firstname" name="firstname" placeholder="firstname" />
                 </div>

                 <div class="row tright">
                   <a id="addbutton" class="button green" ><i class="fa fa-save"></i> Apply</a>
                   <a id="cancelbutton" class="button delete">Cancel</a>
                 </div>
             </div>
@endsection



