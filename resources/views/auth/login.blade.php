@extends('app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel">
					<div class="panel-body">
					<div class="panel-head">
						 <h1>Sign In!</h1>
					</div>
 						@if(count($errors) == 0)
						  @else
                             <div class="alert alert-danger">
		                           @foreach($errors->all() as $error)
		                             	{{$error }} <br>
		                           @endforeach
                              </div>
                           @endif  
						<form action="{{ route('auth.login')}}" method="POST">
							<div class="form-group">
								<input type="text" name="username" placeholder="Username" class="form-control" />
							</div>
							<div class="form-group">
								<input type="password" name="password" placeholder="Password" class="form-control" />
							</div>
							<div class="form-group">
								<div class="checkbox">
								    <label>
								      <input type="checkbox" name="remember"> Remember me
								    </label>
								 </div>
							</div>
						
							<div class="form-group">
								<input type="submit" name="register" value="Create a free account!" class="btn btn-primary btn-block" />
							</div>
							<input type="hidden" name="_token" value="{{ Session::token()}}">
						</form>
						<a href="#" class="pull-left">Need an account?</a>
						<a href="#" class="pull-right">Forgotten password?</a>
					</div>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
@stop