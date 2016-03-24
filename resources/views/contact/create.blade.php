@extends('app')
@section('content')
 <div class="container">
 <div class="row">
 <div class="col-md-3"></div>
 <div class="col-md-6">
 	<div class="panel">
 		<div class="panel-head">
 			<h1 class="center">
 				Contact CleBea Inc
 			</h1>
 		</div>
 		<div class="panel-body">

 			@if(count($errors)>0)
 			<div class="alert alert-danger">
 				Please correct the following errors: <br>
 				<ul>
 					@foreach($errors->all() as $error)
 					<li>{{ $error }}</li>
 					@endforeach
 				</ul>
 			</div>
 			@endif

 			{!! Form::open(['route'=>'contact_store','class'=>'form'])!!}
 			<div class="form-group">
 				{!! Form::text('name',null,['required','class'=>'form-control','placeholder'=>'Your Name']) !!}
 			</div>
 			<div class="form-group">
 				{!! Form::text('email',null,['required','class'=>'form-control','placeholder'=>'Your Email Address']) !!}
 			</div><div class="form-group">
 				{!! Form::textarea('message',null,['required','class'=>'form-control','placeholder'=>'Your Message']) !!}
 			</div>
 			<div class="from-group">
 				{!! Form::submit('Contact Us',['class'=>'btn btn-primary']) !!}
 			</div>
 			{!! Form::close() !!}
 		</div>
 	</div>
  </div>
 </div>
 </div>
@stop