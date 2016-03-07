<html>
	<head>
		@include('layout.headuser')
	</head>
	<body style="background-color: #FFF">
		@include('layout.headeruser')
		
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12  col-md-12">
					{!! Form::open(array('route' => 'picmodifysaved', 'method' => 'post')) !!}
										
					{!! Form::hidden('PIC',$picData->PICID) !!}
						<div class="col-xs-12 col-sm-6 col-md-6" style="padding: unset;padding-right:10px">
							<label>Company</label>
							<select name="CompanyId" class="form-control-madeself" style="margin-bottom:20px">
								@foreach($companyData as $datas)
									@if($datas->CompanyId == $picData->CompanyID)
										<option value="{{ $datas->CompanyId }}" selected="selected">{{$datas->CompanyName}}</option>
									@else
										<option value="{{ $datas->CompanyId }}">{{$datas->CompanyName}}</option>
									@endif
								@endforeach
							</select>
							<label>Contact Person Name</label>
							<input name="PICName" placeholder="PIC Name" type="text" class="form-control-madeself" style="margin-bottom:20px" value="{{ $picData->PICName }}" />
							<label>Contact Person Position</label>
							<input name="PICPosition" placeholder="PIC Position" type="text" class="form-control-madeself" style="margin-bottom:20px"  value="{{ $picData->PICPosition }}"/>
							<label>Contact Person Office Address</label>
							<input name="PICOfficeAddress" placeholder="PIC Office Address" type="text" class="form-control-madeself" style="margin-bottom:20px"  value="{{ $picData->PICOfficeAddress }}"/>	
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6" style="padding: unset;padding-left:10px">
							<label>Contact Person Office Number</label>
							<input name="PICOfficePhoneNumber" placeholder="PIC Office Phone Number" type="text" class="form-control-madeself" style="margin-bottom:20px"  value="{{ $picData->PICOfficeNumber }}"/>
							<label>Contact Person Office Fax</label>
							<input name="PICOfficeFax" placeholder="PIC Office Fax Number" type="text" class="form-control-madeself" style="margin-bottom:20px"  value="{{ $picData->PICFax }}"/>
							<label>Contact Person HP</label>
							<input name="PICPersonalPhoneNumber" placeholder="PIC Personal Phone Number" type="text" class="form-control-madeself" style="margin-bottom:20px"  value="{{ $picData->PICPhoneNumber }}"/>
							<label>Contact Person Office Email</label>
							<input name="PICOfficeEmail" placeholder="PIC Office Email Address" type="text" class="form-control-madeself" style="margin-bottom:20px"  value="{{ $picData->PICEmail }}"/>
						</div>
						
	

						<div class="layout">
							<div class="full">
								<div class="half" style="padding: unset;padding-right:10px">
									<button class="btn btn-default" type="submit" style="width:100%;background-color: rgb(31, 74, 70);color: white;text-shadow: unset;">Submit</button>	
								</div>
								<div class="half" style="padding: unset;padding-left:10px">
									<a href="{{URL::to('companies')}}">
										<button class="btn btn-default" type="button" style="width:100%;background-color: rgb(31, 74, 70);color: white;text-shadow: unset;" >Cancel</button>
									</a>
								</div>
							</div>	


						</div>

					{!! Form::close() !!}
				</div>
			</div>	
		</div>
	</body>
</html>