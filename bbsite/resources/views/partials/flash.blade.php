@if(Session::has('status'))
   <div class="alert alert-success">
   	  {{Session::get('status')}}
   </div>
@endif

@if(Session::has('warning'))
   <div class="alert alert-danger">
   	  {{Session::get('warning')}}
   </div>
@endif