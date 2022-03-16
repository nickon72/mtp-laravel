@extends('admin.layout')

@section('content')
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

<div id="message"></div>
	<div class="container">

    <h1>Список поставок</h1>

    <div class='row'>

    <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#addArticle">

    Добавить статью

    </button>

    </div>

    <br />

    <div class='row @if(count($postavki)!= 0) show @else hidden @endif' id='articles-wrap'>

    <table class="table table-striped ">

    <thead>

    <tr>

    <th>ID</th>
    <th>Филия</th>
    <th>Материал</th>
    <th>Количество</th>
    <th>Дата поставки</th>
    <th>Компания</th>

    <th></th>

    </tr>

    </thead>

    <tbody>

    @foreach($postavki as $postavka)

    <tr>

    <td>{{ $postavka->id }}</td>


                 <td><a href="{{ route('real_time.show', ['id' => $postavka->id]) }}">
                 {{ $postavka->getFiliaTitle($postavka->filia_id) }} </a>
                 </td>
                 <td>  {{ $postavka->getMaterialTitle($postavka->materials_id) }}</td>
                 <td>  {{ $postavka->quantity }}</td>
                 <td>  {{ $postavka->date }}</td>
                 <td>  {{ $postavka->getCompanyTitle($postavka->company_id) }}</td>
            </a>


    <td><a href="" class="delete" data-href=" {{ route('real_time.destroy',$postavka->id) }} ">Удалить</a></td>

    </tr>

    @endforeach

    </tbody>

    </table>

    </div>

    <div class="row">

    <div class="alert alert-warning @if(count($postavki) != 0) hidden @else show @endif" role="alert"> Записей нет</div>

    </div>

    </div>

    <!-- Modal -->

    <div class="modal fade" id="addArticle" tabindex="-1" role="dialog" aria-labelledby="addArticleLabel">

    <div class="modal-dialog" role="document">

    <div class="modal-content">

    <div class="modal-header">

    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

    <h4 class="modal-title" id="addArticleLabel">Добавление поставки</h4>

    </div>

         <div class="modal-body">

             <div class="form-group">

                <label for="filia_id">Филия</label>

                <input type="text" class="form-control" id="filia_id">

              </div>

          </div>

          <div class="modal-body">

              <div class="form-group">

                  <label for="materials_id">Материл</label>

                  <textarea class="form-control" id="materials_id"></textarea>

           </div>

    </div>

           <div class="modal-footer">

               <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>

               <button type="button" class="btn btn-primary" id="save" data-dismiss="modal">Сохранить</button>

            </div>

    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    </div>

    </div>

    <!-- End Modal -->

    </section>
        <!-- /.content -->
  </div>
  <script>

     $(function() {
                     $('#save').on('click',function(){
                      var filia_id = $('#filia_id').val();
                     var materials_id = $('#materials_id').val();

         $.ajax({
            url: '{{ route('real_time.store') }}',
           method: "POST",
           data: {filia_id:filia_id,materials_id:materials_id},

       headers: {
           'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    },

          success: function (data) {
            $('#addArticle').modal('hide');
            $('#articles-wrap').removeClass('hidden').addClass('show');
            $('.alert').removeClass('show').addClass('hidden');

             var str = '<tr><td>'+data['id']+

            '</td><td><a href="/real_time/'+data['id']+'">'+data['filia_id']+'</a>'+

            '</td><td><a href="/real_time/'+data['id']+'" class="delete" data-delete="'+data['id']+'">Удалить</a></td></tr>';

          $('.table > tbody:last').append(str);

                                     },

            error: function (msg) {
            alert('Ошибка');
                                    }

                    });  // end ajax

  });

  })

  </script>
@endsection



