@extends('app')

@section('content')
<div class="container">
  <h1>Product Catalog</h1>

  @if (count($products) > 0)

  @foreach ($products as $product)


        <div class="product">
         <div class="product-content">
              @if(!file_exists(public_path('/imgs/products/'. $product->sku.'png')))
                <img class="" src="/imgs/products/.png"  />
              @else
                 <img class="" src="/imgs/products/{{ $product->sku }}.png"  />
              @endif      
                <h3>
                    {!! link_to_route('products.show', $product->name, [$product->id]) !!}
                </h3>
                <p>
                    <strong>${{ $product->price }}</strong><br />
                    {{ $product->description }}
              </p>
              </div>
          </div>
    
  @endforeach

  @else
  <p>
    The product catalog is currently offline.
  </p>
  @endif
  </div>
@endsection