@extends('app')

@section('content')
<div class="container">
		<h1>CleBea Ecommerce Platform Administration Console</h1>

		<ul>
			<li>{!! link_to_route('admin.orders.index', 'Manage Orders') !!}</li>
			<li>{!! link_to_route('admin.products.index', 'Manage Products') !!}</li>
		</ul>
</div>
@endsection