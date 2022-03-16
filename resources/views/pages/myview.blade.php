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

	<title>Laravel jqGrid Tutorial</title>

	<a href="#page-container" class="sr-only">Skip to content</a>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header pull-left">
	      <a class="navbar-brand" target="_blank" href="http://localhost:8080/open-source-development/laravel-jqgrid/documentation">Laravel jqGrid Package</a>
	    </div>
			<div class="navbar-header pull-right">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
			</div>
		</div>
	</nav>
	<div id='page-container' class="container" role="main" data-current-page-width="">
	<div class="row">
		<div class="col-lg-offset-2 col-md-offset-1 col-lg-8 col-md-10">
			{{ Form::hidden('selectedInvoiceId', '', array('id'=>'selectedInvoiceId')) }}
			{{ Form::button('<i class="fa fa-spinner fa-spin fa-lg"></i> Loading', array('id' => 'app-loader', 'class' => 'btn btn-warning btn-disable btn-lg app-loader hidden', 'disabled' => 'disabled')) }}

		</div>
	</div>
	</div>

<!-- end main content-->
</div>

@endsection