@extends('app')

@section('content')
<div class="container">
<div class="row">
	<div class="col-md-6">
		 <img class="pull-left img-thumbnail" src="/imgs/products/{{ $product->sku }}.png"  />
	</div>
	<div class="col-md-6">
		<h1>{{ $product->name }}</h1>

		{!! Form::open(array('url' => '/checkout')) !!}
		{!! Form::hidden('product_id', $product->id) !!}
                   <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="{{env('STRIPE_API_PUBLIC')}}"
						data-name="CleBeaInc.com"
						data-billingAddress=true
						data-shippingAddress=true
						data-label="Buy ${{ $product->price }}"
						data-description="{{ $product->name }}"
						data-amount="{{ $product->priceToCents() }}">
						</script>
		{!! Form::close() !!}
		<p>
		{{ $product->description }}
		</p>
	</div>
</div>
</div>
@endsection