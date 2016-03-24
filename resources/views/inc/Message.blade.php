@if(Session::has('info'))
  <div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  	{{Session::get('info')}}
  </div>
 @elseif(Session::has('er')) 
 	<div class="alert alert-info">
 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  	 {{Session::get('er')}}
    </div>
 @endif
