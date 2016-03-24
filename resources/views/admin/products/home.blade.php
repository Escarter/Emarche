@extends('app')

@section('content')
<div class="container">
  <h1>Manage Products</h1>

    @if (count($products) > 0)
      <p>
      <a href="{{ route('admin.products.create') }}" class="btn btn-success">Create a Product</a>
      </p>
   <div class="panel">
      <table class="table  table-bordered table-hover">
      <thead>
      <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($products as $product)

        <tr>
          <td>
            <a href="{{ URL::route('admin.products.edit', $product->id) }}">{{ $product->name }}</a>
          </td>
          <td>
            ${{ $product->price }}
          </td>
          <td>
            {!! Form::open(array('route' => array('admin.products.destroy', $product->id), 'method' => 'delete')) !!}
              <button type="submit" class="btn  btn-sm btn-danger" href="{{ URL::route('admin.products.destroy', $product->id) }}" title="Delete Product">
              Delete
              </button>
            {!! Form::close() !!}
          </td>
        </tr>

      @endforeach
      </tbody>
      </table>

    </div>
    @else
     <p>
      You haven't created any products. <a href="/admin/products/create">Create a Product</a>
    </p>
    @endif
</div>
@endsection