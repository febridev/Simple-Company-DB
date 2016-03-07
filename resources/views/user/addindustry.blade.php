<html>
	<head>
		@include('layout.headuser')
	</head>
	<body style="background-color: #FFF">
		@include('layout.headeruser')
		
		<div class="container">
			<div class="row">
			<div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6">
				<div class="panel-default">
					<div class="panel-body">
					{!! Form::open(array('route' => 'industrysaved', 'method' => 'post')) !!}
						<label>Industry Name</label>
						<input name="IndustryName" placeholder="Industry Name" type="text" class="form-control-madeself" style="margin-bottom:20px"/>
						<label>Industry Description</label>
						<textarea name="IndustryDescription" placeholder="Industry Description" class="form-control" style="height: 247px !important;"></textarea>
						<div style="display:table;width:100%;margin-top	:10px">	
							<div class="layout">
								<div class="full">
									<div class="half" style="padding:0px 0px;">
										<button class="btn btn-default" type="submit" style="width:100%;background-color: rgb(31, 74, 70);	color: white;text-shadow:unset;">Submit</button>
									</div>
									<div class="half" style="padding:0px 0px;">
										<button class="btn btn-default" type="reset" style="width:100%;background-color: rgb(31, 74, 70);color: white;text-shadow:unset;">Cancel</button>
									</div>
								</div>
							</div>
							
							
						</div>
					{!! Form::close() !!}
					</div>
				</div>
			</div>


			</div>	
		</div>
	</body>
</html>