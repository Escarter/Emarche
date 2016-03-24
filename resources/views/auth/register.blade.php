@extends('app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="panel">
					<div class="panel-header">
						
					</div>
					<div class="panel-body">
					<div class="panel-head">
						 <h1>Create a free account!</h1>
					</div>
					<div class="payment-errors alert alert-danger" style="display: none;"></div>
					  @if(count($errors) == 0)
						  @else
                             <div class="alert alert-danger">
		                           @foreach($errors->all() as $error)
		                             	{{$error }} <br>
		                           @endforeach
                              </div>
                           @endif  
						<form action="{{ route('auth.register')}}" method="POST" id="register-form">
							<div class="form-group">
							<label class="label-control">Select Plan</label>
								<select class="form-control" name="plan">
								      <option >Select Plan</option>
									  <option value="free">Free</option>
									  <option value="gold"> Gold $99 </option>
									  <option value="platinum">Platinum $245</option>
									  <option value="diamond">Diamond $499</option>
									</select>
							</div>
							
							<div class="form-group">
							<label class="label-control">Email</label>
								<input type="text" name="email" placeholder="example@domain.com" class="form-control" value="{{ old('email')}}"/>
							</div>
							<div class="form-group">
							<label class="label-control">Username</label>
								<input type="text" name="username" placeholder="Username" class="form-control" value="{{ old('username')}}" />
							</div>
							<div class="form-group">
							<label class="labl-control">Password</label>
								<input type="password" name="password" placeholder="Password" class="form-control" />
							</div>
							<div class="form-group">
							<label class="label-control">Confirm password</label>
								<input type="password" name="password_confirmation" placeholder="Confirm password" class="form-control" />
							</div>
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
				                        <div class="col-md-8">
				                            <label for="card-month">Expiration Date</label>
				                        </div>
				                        <div class="col-md-4">
				                            <label for="card-cvc">Security Code</label>
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
							<div class="form-group">
								<button type="submit" name="register" value="!" class="btn btn-primary btn-block submit-button" >Create a free account</button>
							</div>
							<input type="hidden" name="_token" value="{{Session::token()}}" />
						</form>
						  <a href="#" class="pull-right">Have an account?</a>
						  <div style="clear: both;"></div>
					</div>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>

@stop
@section('footer_js')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        Stripe.setPublishableKey('{{ env('STRIPE_API_PUBLIC') }}');

        jQuery(function($) {
            $("#card-number").focusout(function() {
                var el = $(this);
                if ( ! Stripe.validateCardNumber(el.val())) {
                    el.closest(".form-group").addClass("has-error");
                } else {
                    el.closest(".form-group").removeClass("has-error");
                }
            });
            $("#card-cvc").focusout(function() {
                var el = $(this);
                if ( ! Stripe.validateCVC(el.val())) {
                    el.closest("div").addClass("has-error");
                } else {
                    el.closest("div").removeClass("has-error");
                }
            });
            $('#register-form').submit(function(e) {
                $('.submit-button').prop('disabled', true);
                var $form = $(this);
                $form.find('.payment-errors').hide()
                Stripe.card.createToken({
                    number: $form.find('#card-number').val(),
                    cvc: $form.find('#card-cvc').val(),
                    exp_month: $form.find('#card-month').val(),
                    exp_year: $form.find('#card-year').val()
                }, stripeResponseHandler);

                return false;
            });
        });

        var stripeResponseHandler = function(status, response) {
            var $form = $('#register-form');
            var $errors = $('.payment-errors');
            // Reset any errors
            $errors.text("");

            if (response.error) {
                $errors.text(response.error.message).show();
                $form.find('button').prop('disabled', false);
            } else {
                var token = response.id;
                $form.append($('<input type="hidden" name="stripe_token" />').val(token));
                $form.get(0).submit();
                $form.find('button').html('Processing...');
            }
        };
    </script>
@stop