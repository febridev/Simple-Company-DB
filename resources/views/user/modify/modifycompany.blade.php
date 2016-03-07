<html>
	<head>
		@include('layout.headuser')
	</head>
	<body style="background-color: #FFF">
		@include('layout.headeruser')
		
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					
						{!! Form::open(array('route' => 'companymodifysave', 'method' => 'post')) !!}
							{!! Form::hidden('Company',$companyData->CompanyId) !!}
							
							<div class="col-xs-12 col-sm-6 col-md-6" style="padding:unset; padding-right:10px">
							<label>Industry</label>
							<select name="IndustryType" class="form-control-madeself" style="margin-bottom:20px">
								@foreach($industryData as $datas)
									@if($companyData->IndustryID == $datas->IndustryId)
										<option value="{{ $datas->IndustryId }}" selected="selected">{{$datas->IndustryName}}</option>
									@else
										<option value="{{ $datas->IndustryId }}">{{$datas->IndustryName}}</option>
									@endif
								@endforeach
							</select>
							<label>Company</label>
							<input name="CompanyName" placeholder="Company Name" type="text" class="form-control-madeself" style="margin-bottom:20px" value="{{$companyData->CompanyName}}" />
							<label>Company Website</label>
							<input name="CompanyWebsite" placeholder="Company Website" type="text" class="form-control-madeself" style="margin-bottom:20px" value="{{$companyData->CompanyWebsite}}"/>
							
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6" style="padding:unset; padding-right:10px">
							<label>Company Phone Number</label>
							<input name="CompanyPhoneNumber" placeholder="Company Phone Number" type="text" class="form-control-madeself" style="margin-bottom:20px" value="{{$companyData->CompanyPhoneNumber}}"/>
							<label>Company Address</label>
							<textarea name="CompanyAddress" placeholder="Company Address" type="text" class="form-control-madeself" style="margin-bottom:20px;height:155px">{{$companyData->CompanyAddress}}</textarea>  
							</div>
							<div class="layout">
							<div class="full">
								<div class="half">
									<button class="btn btn-default" type="submit" style="background-color:rgb(31, 74, 70);color:white;text-shadow:unset;width:100%">Submit</button>						
								</div>
								<div class="half">
								<a href="{{URL::to('companies')}}">
									<button class="btn btn-default" type="button" style="background-color:rgb(31, 74, 70);color:white;text-shadow:unset;width:100%" >Cancel</button>				
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