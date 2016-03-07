
<html>
	<head>
		@include('layout.headuser')
		<meta name="csrf-token" content="{{ Session::token() }}" /> 
		
	</head>
	<body style="background-color: #FFF">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4" style="margin-top:70px">
					@if(Session::has('error_msg_flash'))
						<div class="alert alert-danger" role="alert">
							{{ Session::get('error_msg_flash') }}
						</div>
					@endif
					<div class="panel panel-default" style="border-color:white">
						<div class="panel-heading" style="background-color: white;">
							<div>
								<img class="img-responsive" align="middle" alt="logo" src="{{ asset('externalresources/images/logo.png') }}">	
							</div>
						</div>
						<div class="panel-body">
							{!! Form::open(array('route' => 'postLogin', 'method' => 'post' )) !!}
								<div style="margin-bottom: 20px;">
									<input type="text" name="username" class="form-control-madeself" placeholder="username( NIM )" 
									value="{{ old('username') }}">
								</div>
								<div style="margin-bottom: 20px;">
									<input type="password" name="password" class="form-control-madeself" placeholder="password ( Ex: 1992-04-16)" 
									value="{{ old('password') }}">
								</div>

								{{-- <div class="form-group">
									<label for="sel1">Choose Page</label>
									<select class="form-control" id="sel1" name="pages">
										<option value="borrow" selected="selected">Borrow</option>
										<option value="returnextend">Return/Extend</option>
										<option value="administration">Administration</option>
									</select>
								</div> --}}
								<div style="margin-bottom:20px;">
									<input type="submit" value="Submit" id="buttonsubmit" class="btn btn-default" style="width:100%;background-color:rgba(148, 189, 225, 1);color:#FFF;text-shadow: 0px 0px 0px rgba(255, 255, 255, 0);">
								</div>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>


	
	

	</body>
</html>
