@extends('layout')


@section('content')
!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Авторизация
            <small>пользователя</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i>Главная</a></li>
            <li class="active">Панель авторизации</li>
          </ol>
        </section>

<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="leave-comment mr0"><!--leave comment-->
                    @if(session('status'))
                        <div class="alert alert-danger">
                            {{session('status')}}
                        </div>
                    @endif
                    <h3 class="text-uppercase">Login</h3>
                    @include('admin.errors')
                    <br>
                    <form class="form-horizontal contact-form" role="form" method="post" action="/login">
                    {{csrf_field()}}
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}"
                                       placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="password">
                            </div>
                        </div>
                        <button type="submit" class="btn send-btn">Login</button>

                    </form>
                </div><!--end leave comment-->
            </div>

        </div>
    </div>
</div>
<!-- end main content-->
</div>

@endsection