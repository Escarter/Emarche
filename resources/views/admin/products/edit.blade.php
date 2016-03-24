@extends('app')

@section('content')
<div class="container">
        <p>
        <a href="{{ route('admin.products.index') }}">&laquo; Return to Products</a>
        </p>
     <div class="panel">        
    

                <div class="panel-head">
                    <h1>Edit {{ $product->name }}</h1>
                </div>
                <div class="panel-body">
                    <div class="row">
                      <div class="col-md-6">
                      <h4><span class="glyphicon glyphicon-picture"></span></h4>
                    {!! Form::model($product, array('route' => ['admin.products.update','product'=>$product->id], 'class' => 'form', 'novalidate' => 'novalidate', 'files' => true)) !!}  
                         @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                There were some problems with your input.<br />
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                  <div class="form-group">
                                        {!! Form::label('name', 'Product Name') !!}
                                        {!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'Product Name')) !!}
                                    </div>
                            </div>
                             <div class="col-md-6">
                                      <div class="form-group">
                                            {!! Form::label('sku', 'Product SKU') !!}
                                            {!! Form::text('sku', null, array('required', 'class'=>'form-control', 'placeholder'=>'CLEBEA-1234')) !!}
                                        </div>
                            </div>
                        </div><div class="row">
                             <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('price', 'Price') !!}
                                        <div class="input-group">
                                          <span class="input-group-addon">$</span>
                                            {!! Form::text('price', null, array('required', 'class'=>'form-control', 'placeholder'=>'9.99')) !!}
                                        </div>
                                    </div>
                            </div>
                             <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('image', 'Product Image') !!}
                                        {!! Form::file('image', null, array('required', 'class'=>'form-control')) !!}
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                 <div class="form-group">
                                        {!! Form::label('description', 'Product Description') !!}
                                        {!! Form::textarea('description', null, array('class'=>'form-control', 'placeholder'=>'Enter a short description' ,'rows'=>'3')) !!}
                                    </div>
                            </div>
                        </div>
                       <div class="row">
                              <div class="col-md-4">
                                   <div class="form-group">
                                        <div class="checkbox">
                                            <label for="is_downloadable">    
                                                {!! Form::checkbox('is_downloadable', true, null, array('id'=>'downloadable')) !!}
                                                Downloadable?
                                            </label>
                                        </div>   
                                    </div>
                              </div>
                       
                            <div class="col-md-8">
                                <div class="form-group">
                                    {!! Form::label('download', 'Product Download (if downloadable product)') !!}
                                    {!! Form::file('download', null, array('class'=>'form-control')) !!}
                                </div>
                            </div>
                        </div>
                          {!! Form::submit('Edit Product!', array('class'=>'btn btn-primary')) !!}

                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-6">
                        @if(file_exists(public_path()."/imgs/products/".$product->sku.".png")) 
                          <img src="/imgs/products/{{ $product->sku }}.png" class="img-thumbnail"  />
                        @else
                          Could not find file
                        @endif
                  </div>
             </div> 
         </div>
   </div>
</div>
@endsection
