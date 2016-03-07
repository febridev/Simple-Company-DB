<html>
	<head>
		@include('layout.headuser')
	
		<script type="text/javascript" src="{{  asset('externalresources/jquery/tableshiddenshow.js')  }}"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				Fist_Do_Company();
				Data_Company();
			});
		</script>
	</head>
	<body style="background-color: #FFF">
		@include('layout.headeruser')
		
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div>
						<center><h4>Click For Show Me</h4></center>
					</div>
					<div>
						<table class="table">
							<tr>
								<td><input type="checkbox" id="IndustryID" value="Industry">Industry</td>
								<td><input type="checkbox" id="CompanyNameID" value="Company Name">Company Name</td>
								<td><input type="checkbox" id="CompanyAddressID" value="Company Address">Company Address</td>
								<td><input type="checkbox" id="CompanyWebsiteID" value="Company Website">Company Website</td>
							</tr>
							<tr>
								<td><input type="checkbox" id="CompanyPhoneNumberID" value="Company Phone Number">Company Phone Number</td>
								<td><input type="checkbox" id="PICNameID" value="PIC Name">PIC Name</td>
								<td><input type="checkbox" id="PICPositionID" value="PIC Position">PIC Position</td>
								<td><input type="checkbox" id="PICOfficeAddressID" value="PIC Office Address">PIC Office Address</td>
							</tr>
							<tr>
								<td><input type="checkbox" id="PICOfficeNumberID" value="PIC Office Number">PIC Office Number</td>
								<td><input type="checkbox" id="PICHPID" value="PIC HP">PIC HP</td>
								<td><input type="checkbox" id="PICFaxID" value="PIC Fax">PIC Fax</td>
								<td><input type="checkbox" id="PICEmailID" value="PIC Email">PIC Email</td>
							</tr>
						</table>
					</div>
				</div>
			</div>

			@if(Session::has('success_flash'))
				<div class="alert alert-success" role="alert">
					{{ Session::get('success_flash') }}
				</div>
			@elseif (Session::has('error_flash'))
				<div class="alert alert-danger" role="alert">
					{{ Session::get('error_flash') }}
				</div>
			@endif

			<div class="row">
				<hr class="style18">
				<div class="col-xs-12 col-sm-6 col-md-6" style="margin-bottom:20px">
					<a href="{{URL::to('companiesadd')}}"><button type="button" class="btn btn-default" style="background-color: rgb(31, 74, 70);color: white;text-shadow: unset;">Add Company</button></a>	
					<a href="{{URL::to('addcontactpersontocompany')}}"><button type="button" class="btn btn-default" style="background-color: rgb(31, 74, 70);color: white;text-shadow: unset;">Add Contact Person</button></a>
				</div>
				<div class="col-xs-12 col-sm-3 col-md-3">
					
					<a href="{{URL::to('hometoexcel')}}/{{$SearchName}}">
						<button class="btn btn-default" class="form-control" type="button" style="background-color: rgb(31, 74, 70);color: white;text-shadow: unset;width:100%">Export To Excel</button>
					</a>
				</div>
				<div class="col-xs-12 col-sm-3 col-md-3">
					{!! Form::open(array('route' => 'picsearchroute', 'method' => 'post')) !!}
						<div class="input-group">
					    	<input type="text" class="form-control" placeholder="Search for..." name="SearchName">
					    	<span class="input-group-btn">
					        	<button class="btn btn-default" type="submit" style="background-color: rgb(31, 74, 70);color: white;text-shadow: unset;">Go!</button>
					      	</span>
					    </div>
					{!! Form::close() !!}
				</div>
			</div>	

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
				
					<table id="datatables" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th style="display:none">Industry</th>
								<th style="display:none">Company Name</th>
								<th style="display:none">Company Address</th>
								<th style="display:none">Company Website</th>
								<th style="display:none">Company Phone Number</th>
								<th style="display:none">PIC Name</th>
								<th style="display:none">PIC Position</th>
								<th style="display:none">PIC Office Address</th>
								<th style="display:none">PIC Office Number</th>
								<th style="display:none">PIC HP</th>
								<th style="display:none">PIC Fax Number</th>
								<th style="display:none">PIC Email</th>
								<th>Modify</th>
							</tr>
						</thead>
						<tbody>
						
						@foreach($picData as $datas)
						
							<tr>
								<td>{{$datas->PICID}} </td>
								<td style="display:none">{{$datas->Company->Industry->IndustryName}}</td>
								<td style="display:none">{{$datas->Company->CompanyName}} <sup><a href="{{URL::to('/companymodify')}}/{{$datas->Company->CompanyId}}/{{$datas->Company->CompanyName}}"><span class="glyphicon glyphicon-pencil"></span></a></sup></td>
								<td style="display:none">{{$datas->Company->CompanyAddress}}</td>
								<td style="display:none">{{$datas->Company->CompanyWebsite}}</td>
								<td style="display:none">{{$datas->Company->CompanyPhoneNumber}}</td>
								<td style="display:none">{{$datas->PICName}} <sup><a href="{{URL::to('/picmodify')}}/{{$datas->PICID}}/{{$datas->PICName}}"><span class="glyphicon glyphicon-pencil"></span></a></sup></td>
								<td style="display:none">{{$datas->PICPosition}}</td>
								<td style="display:none">{{$datas->PICOfficeAddress}}</td>
								<td style="display:none">{{$datas->PICOfficeNumber}}</td>
								<td style="display:none">{{$datas->PICPhoneNumber}}</td>
								<td style="display:none">{{$datas->PICFax}}</td>
								<td style="display:none">{{$datas->PICEmail}}</td>
								<td >
								<a href="{{URL::to('companyremove')}}/{{$datas->Company->CompanyId}}/{{$datas->Company->CompanyName}}"><button type="button" class="btn btn-default" style="background-color: rgba(20, 96, 11, 0.7);color: white;text-shadow: unset;">Remove Company</button></a>
								<a href="{{URL::to('picremove')}}/{{$datas->PICID}}/{{$datas->PICName}}"><button type="button" class="btn btn-default" style="background-color: rgba(20, 96, 11, 0.7);color: white;text-shadow: unset;">Remove PIC</button></a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
		
					{!! $picData->links() !!}
				</div>
			</div>
		</div>
	</body>
</html>