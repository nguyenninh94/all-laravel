<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbr-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-colapse-1" aria-expanded="false">
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			</button>
			<a href="{{url('/')}}" class="navbar-brand">Brand</a> 
			<ul class="nav navbar-nav" style="color:red;font-weight: bold;margin-top: 15px;">
				<select id="languageSwitcher">
					<option value="vi" <?php echo (Session::get('locale') == 'vi' ? 'selected': '') ?>>Vietnamese</option>
					<option value="en" <?php echo (Session::get('locale') == 'en' ? 'selected': '') ?>>English</option>
				</select>
			</ul> 
		</div>

		<div class="collapse navbar-collapse" id="bs=<example-navbar-collapse-1></example-navbar-collapse-1>">
			<ul class="nav navbar-nav navbar-right">
				<li>
				   <a href="">Paypal</a>
				   <a href="{{ url('/map-maker') }}">{{ trans('app.Map') }}</a>
				   <a href="{{ url('/tags') }}">{{ trans('app.Tag') }}</a>
				   <a href="{{ url('/comment') }}">{{ trans('app.Comment') }}</a>
				   <a href="{{ url('/importExport') }}">{{ trans('app.Import') }}</a>
			    </li>
			    <li>
			    	<a href="{{url('/shopping-cart')}}">
			    		<i class="fa fa-shopping-cart" aria-hidden="true"></i>{{ trans('app.ShoppingCart') }}
			    		<span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
			    	</a>
			    </li>

			    @if(Auth::guest())
                   <li><a href="{{url('/user/profile')}}">{{ trans('app.Profile') }}</a></li>
                   <li><a href="{{url('/user/sign-in')}}">{{ trans('app.Signin') }}</a></li>
                   <li><a href="{{url('/user/sign-up')}}">{{ trans('app.Signup') }}</a></li>
			    @else
			       <li class="dropdown">
			       	  <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
			       	  	 {{ trans('app.Hello') }} {{Auth::user()->name}}
			       	  	 <span class="caret"></span>
			       	  </a>

			       	  <ul class="dropdown-menu" role="menu">
			       	  	 <li>
			       	  	 	<a href="{{url('/user/logout')}}" onclick="event.preventDefault();
			       	  	 	    document.getElementById('logout-form').submit();">{{ trans('app.Logout') }}
			       	  	    </a>
			       	  	    <a href="{{url('/user/profile')}}">
			       	  	    	{{ trans('app.Profile') }}
			       	  	    </a>

			       	  	    <form id="logout-form" action="{{url('/user/logout')}}" class="logout-form" method="POST" style="display:none;">
			       	  	    	{{csrf_field()}}
			       	  	    </form>
			       	  	 </li>
			       	  </ul>
			       </li>
			    @endif   
			</ul>
		</div>
	</div>
</nav>