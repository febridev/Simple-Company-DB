@if(Auth::user()->hasRole('User'))
			<div class="header">
				<nav class="navbar navbar-default" style="background-color:#fff">
				  <div class="container">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="#" style="color:rgba(0,0,0,1)" ><strong>CDC</strong></a>
				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      <ul class="nav navbar-nav">
				        <li><a href="{{ asset('/home') }}" style="color:rgba(0,0,0,1)">Home</a></li>
				        <li><a href="{{ asset('/industry') }}" style="color:rgba(0,0,0,1)">Industry</a></li>
				        <li><a href="{{ asset('/companies') }}" style="color:rgba(0,0,0,1)">PIC</a></li>
				    </ul>
				    <ul class="nav navbar-nav navbar-right">     
				       {{--  <li><a href="{{ asset('/contactus') }}" style="color:rgba(0,0,0,1)">Contact Us</a></li> --}}
				        <li><a href="{{ asset('/logout') }}" style="color:rgba(0,0,0,1)">Log Out</a></li>
					</ul>      
			</div>
		</nav>
	</div>
@endif