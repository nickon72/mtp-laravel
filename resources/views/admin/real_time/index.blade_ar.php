@extends('admin.layout')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Привет! Это админка
        <small>приятные слова</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Текущие поставки
      </h3>
      </div>
      <div id="message"></div>
   <table class="table table-striped table-bordered">
        <thead>
         <tr>
          <th>Филия</th>
          <th>Материал</th>
          <th>Удалить</th>
         </tr>
        </thead>
        <tbody>
 {{$real_times[0]->getMaterialTitle($real_times[0]->materials_id)}}
        </tbody>
       </table>
       {{ csrf_field() }}
     </div>

<script>
$(document).ready(function(){

 fetch_data();

 function fetch_data()
 {
  $.ajax({
   url:"/admin/real_time/fetch_data",
   dataType:"json",
   success:function(data)
   {
    var html = '';
    html += '<tr>';
    html += '<td contenteditable id="filia_id"></td>';
    html += '<td contenteditable id="materials_id"></td>';
    html += '<td><button type="button" class="btn btn-success btn-xs" id="add">Add</button></td></tr>';



    for(var count=0; count < data.length; count++)
    {
     html +='<tr>';
     html +='<td contenteditable class="column_name" data-column_name="filia_id" data-id="'+data[count].id+'">'+data[count].filia_id+'</td>';
     html += '<td contenteditable class="column_name" data-column_name="materials_id" data-id="'+data[count].id+'">'+data[count].materials_id+'</td>';
     html += '<td><button type="button" class="btn btn-danger btn-xs delete" id="'+data[count].id+'">Delete</button></td></tr>';
    }
    $('tbody').html(html);
   }
  });
 }

 var _token = $('input[name="_token"]').val();

 $(document).on('click', '#add', function(){
  var filia_id = $('#filia_id').text();
  var materials_id = $('#materials_id').text();
  if(filia_id != '' && materials_id != '')
  {
   $.ajax({
    url:"{{ route('real_time.add_data') }}",
    method:"POST",
    data:{filia_id:filia_id, materials_id:materials_id, _token:_token},
    success:function(data)
    {
     $('#message').html(data);
     fetch_data();
    }
   });
  }
  else
  {
   $('#message').html("<div class='alert alert-danger'>Both Fields are required</div>");
  }
 });

 $(document).on('blur', '.column_name', function(){
  var column_name = $(this).data("column_name");
  var column_value = $(this).text();
  var id = $(this).data("id");

  if(column_value != '')
  {
   $.ajax({
    url:"{{ route('real_time.update_data') }}",
    method:"POST",
    data:{column_name:column_name, column_value:column_value, id:id, _token:_token},
    success:function(data)
    {
     $('#message').html(data);
    }
   })
  }
  else
  {
   $('#message').html("<div class='alert alert-danger'>Enter some value</div>");
  }
 });

 $(document).on('click', '.delete', function(){
  var id = $(this).attr("id");
  if(confirm("Are you sure you want to delete this records?"))
  {
   $.ajax({
    url:"{{ route('real_time.delete_data') }}",
    method:"POST",
    data:{id:id, _token:_token},
    success:function(data)
    {
     $('#message').html(data);
     fetch_data();
    }
   });
  }
 });


});
</script>
</section>
</div>

@endsection



