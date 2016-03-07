
<html>
	<head>
		@include('layout.headuser')
	</head>
	<body style="background-color: #FFF">
		@include('layout.headeruser')
		<div class="container">
			<div class="row">
					<div class="container" >

			
			{{-- bagian form  -- belum di poles -- --}}
			
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
					
					<div class="header">
						<p style="font-size:30px;text-align:center;font-weight: bold;">CONTACT US</p>
					</div>
					@if(Session::has('error_msg'))
						<div class="alert alert-danger" role="alert">
							<p> {{ Session::get('error_msg') }}</p>
						</div>
					@elseif(Session::has('success_msg'))
						<div class="alert alert-success" role="alert" style="border-radius:4px !important">	
							<p align="center"> {{ Session::get('success_msg') }} </p>
						</div>
					@endif
					{!! Form::open(array('route' => 'sendemailcontact', 'method' => 'post' )) !!}
				
					<fieldset>
						<div class="layout">
							<div class="full">
								<div class="half" >
									<input type="text" class="form-control-madeself" required="required" placeholder="Nama Anda ?" name="username" />
								</div>
								<div class="half">
									<input type="text" class="form-control-madeself" required="required" placeholder="Alamat Email anda ?" name="useremail" />
								</div>
							</div>
							
						</div>
						<div class="fullarea">
							<textarea class="form-control-madeself heightextarea" required="required" placeholder="Pesan Anda ..." name="usermessage" style="height:247px !important"></textarea>
						</div>
					</fieldset>
					<div class="fullarea">
						<button class="btn btn-default button">KIRIM</button>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
			
		
		</div>
			</div>
		</div>
	</body>
</html>