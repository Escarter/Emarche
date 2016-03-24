@extends('app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-header">
						
					</div>
					<div class="panel-body">
					<div class="panel-head">
						 <h1>Create a free account!</h1>
					</div>
					  @if(count($errors) == 0)
						  @else
                             <div class="alert alert-danger">
		                           @foreach($errors->all() as $error)
		                             	{{$error }} <br>
		                           @endforeach
                              </div>
                           @endif  
						<form action="{{ route('auth.register')}}" method="POST">
						<div class="row">
							<div class="col-md-8">
								<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="first_name" placeholder="First Name" class="form-control" value="{{ old('first_name')}}" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="last_name" placeholder="Last Name" class="form-control" value="{{ old('last_name')}}"/>
									</div>
								</div>
							</div><div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="email" placeholder="Email" class="form-control" value="{{ old('email')}}"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="username" placeholder="Username" class="form-control" value="{{ old('username')}}" />
									</div>
								</div>
							</div><div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="password" name="password" placeholder="Password" class="form-control" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="password" name="password_confirmation" placeholder="Confirm password" class="form-control" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="address" placeholder="Address" class="form-control" 
										value="{{ old('address')}}" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="city" placeholder="City" class="form-control" value="{{ old('city')}}" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="state" placeholder="State" class="form-control"
										value="{{ old('state')}}" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="zip" placeholder="Zip" class="form-control" value="{{ old('zip')}}" />
									</div>
								</div>
							</div>
							</div>
							<div class="col-md-4">
								 <div class="form-group">
				                    <div class="row">
				                        <div class="col-xs-12">
				                            <label for="card-number" class="control-label">Credit Card Number</label>
				                        </div>
				                        <div class="col-md-12">
				                            <input type="text" class="form-control" id="card-number" placeholder="Valid Card Number" required autofocus data-stripe="number" value="{{ App::environment() == 'local' ? '4242424242424242' : '' }}">
				                        </div>
				                    </div>
				                </div>
				                  <div class="form-group">
				                    <div class="row">
				                        <div class="col-md-6">
				                            <label for="card-month">Expiration Date</label>
				                        </div>
				                        <div class="col-md-6">
				                            <label for="card-cvc">Security Code</label>
				                        </div>
				                    </div>
							  </div>
							  <div class="row">
		                        <div class="col-md-4">
		                            <input type="text" size="3" class="form-control" name="exp_month" data-stripe="exp-month" placeholder="MM" id="card-month" value="{{ App::environment() == 'local' ? '12' : '' }}" required>
		                        </div>
		                        <div class="col-md-4">
		                            <input type="text" size="4" class="form-control" name="exp_year" data-stripe="exp-year" placeholder="YYYY" id="card-year" value="{{ App::environment() == 'local' ? '2016' : '' }}" required>
		                        </div>
		                        <div class="col-md-4">
		                            <input type="text" class="form-control" id="card-cvc" placeholder="" size="6" value="{{ App::environment() == 'local' ? '111' : '' }}">
		                        </div>
		                    </div>
						</div>
						<div class="form-group ">
							<input type="submit" name="register" value="Create a free account!" class="btn btn-primary " />
						</div>
					<input type="hidden" name="_token" value="{{Session::token()}}" />
						</form>
						  <a href="#" class="pull-right">Have an account?</a>
						  <div style="clear: both;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop