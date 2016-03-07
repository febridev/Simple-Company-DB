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
					{!! Form::open(array('route' => 'picessaved', 'method' => 'post')) !!}

						<select name="CompanyId" class="form-control-madeself" style="margin-bottom:20px">
							@foreach($companyData as $datas)
								<option value="{{ $datas->CompanyId }}">{{$datas->CompanyName}}</option>
							@endforeach
						</select>

						<input name="PICName" placeholder="PIC Name" type="text" class="form-control-madeself" style="margin-bottom:20px"/>

						<input name="PICPosition" placeholder="PIC Position" type="text" class="form-control-madeself" style="margin-bottom:20px"/>

						<input name="PICOfficeAddress" placeholder="PIC Office Address" type="text" class="form-control-madeself" style="margin-bottom:20px"/>
						
						<input name="PICOfficePhoneNumber" placeholder="PIC Office Phone Number" type="text" class="form-control-madeself" style="margin-bottom:20px"/>

						<input name="PICOfficeFax" placeholder="PIC Office Fax Number" type="text" class="form-control-madeself" style="margin-bottom:20px"/>

						<input name="PICPersonalPhoneNumber" placeholder="PIC Personal Phone Number" type="text" class="form-control-madeself" style="margin-bottom:20px"/>

						<input name="PICOfficeEmail" placeholder="PIC Office Email Address" type="text" class="form-control-madeself" style="margin-bottom:20px"/>

						<div style="display:table;width:100%;margin-top	:10px">	
							<button class="btn btn-default" type="submit" style="width:50%;">Submit</button>
							<button class="btn btn-default" type="reset" style="width:50%;" >Cancel</button>
						</div>

					{!! Form::close() !!}
					</div>
				</div>
			</div>


			</div>	
		</div>
	</body>
</html>