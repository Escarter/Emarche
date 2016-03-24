@extends('app')

@section('intro')
<div class="container">
  <div class="intro">
    <div class="container">
      <h1>Choose your subscription plan!</h1>
      <p>Let the professionals at CleBea make your life easier!.</p>
    </div>
  </div>
 </div>
@endsection

@section('content')
<div class="container">
<div class="row">
        <div class="col-md-3">
            <div class="panel">
                <div class="panel-head">
                   <center><h2><span class="glyphicon glyphicon-queen"></span></h2></center>
                    <h2>Gold  Account</h2>
                </div>
                <div class="panel-body">
                 <div class="option-content">
                   <p>Free Chatting</p>
                   <p>Unlimited Broing</p>
                   <p>Lorem Ipsum</p>
                   <p>Unlimited Dolor</p>
                </div>
                 <div class="text-center"><a class="btn btn-primary" href="/plans/subscribe/gold">Upgrade Gold $99</a></div>   
                </div>
            </div>
        </div>
        <div class="col-md-4">
        <div class="panel">
                <div class="panel-head">
                   <center><h2><span class="glyphicon glyphicon-king"></span></h2></center>
                    <h2>Platinum Account</h2>
                </div>
                <div class="panel-body">
                <div class="option-content">
                   <p>Free Chatting</p>
                   <p>Unlimited Broing</p>
                   <p>Lorem Ipsum</p>
                   <p>Unlimited Dolor</p>
                </div>
               <div class="text-center"><a class="btn btn-primary" href="/plans/subscribe/platinum">Upgrade Platinum $249</a></div>    
                </div>
            </div>
            
        </div>
        <div class="col-md-5">
        <div class="panel success">
                <div class="panel-head">
                   <center><h2><span class="glyphicon glyphicon-knight"></span></h2></center>
                    <h2>Diamond Plan</h2>
                </div>
                <div class="panel-body">
                 <div class="option-content">
                   <p>Unlimited Everything</p>
                   <p>Unlimited Broing</p>
                   <p>Lorem Ipsum</p>
                   <p>Unlimited Dolor</p>
                </div>
                   <div class="text-center"><a class="btn btn-primary" href="/plans/subscribe/diamond">Upgrade Diamond plan $499</a></div> 
                </div>
            </div>
            
        </div>
	
	</div>
</div>
@endsection
