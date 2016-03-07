<html>
	<head>
		@include('layout.headuser')

		<script type="text/javascript" src="{{  asset('externalresources/jquery/tableshiddenshow.js')  }}"></script>
		<script type="text/javascript">
		
		$(document).ready(function(){l
				First_Do_PIC();
				Data_PIC();
			});
		</script>

	</head>
	<body style="background-color: #FFF">
		@include('layout.headeruser')
		
		<div class="container">


			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div><center><h3>Search Area</h3></center></div>
					{!! Form::open(array('route' => 'picsearch', 'method' => 'post')) !!}
						<div class="layout">
							<div class="full">	
								<div class="thirtypercent" >
									<input name="PICName" placeholder="PIC Name" type="text" class="form-control" style="margin-bottom:20px;" />
								</div>									
								<div class="thirtypercent">
									<input name="PICOfficeAddress" placeholder="PIC Office Address" type="text" class="form-control" style="margin-bottom:20px;" />
								</div>
								<div class="thirtypercent">
									<input name="PICPosition" placeholder="PIC Position" type="text" class="form-control" style="margin-bottom:20px;" />
								</div>

							</div>
						</div>
						<button class="btn btn-default" type="submit" style="width:100%">Submit</button>
					{!! Form::close() !!}
				</div>
			</div>

				<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div>
						<center><h4>Click Me</h4></center>
					</div>
					<div>
						<table class="table">
							<tr>
								<td><input type="checkbox" id="CompanyNameID" value="Company Name">Company Name</td>
								<td><input type="checkbox" id="PICNameID" value="PIC Name">PIC Name</td>
								<td><input type="checkbox" id="PICPositionID" value="PIC Position">PIC Position</td>
								<td><input type="checkbox" id="PICOfficeAddressID" value="PIC Office Address">PIC Office Address</td>
							</tr>
							<tr>
								
								<td><input type="checkbox" id="PICOfficeNumberID" value="PIC Office Number">PIC Office Number</td>
								<td><input type="checkbox" id="PICFaxID" value="PIC Fax">PIC Fax</td>
								<td><input type="checkbox" id="PICHPID" value="PIC HP">PIC HP</td>
								<td><input type="checkbox" id="PICEmailID" value="PIC Email">PIC Email</td>

							</tr>
						</table>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<a href="{{URL::to('picesadd')}}"><button type="button" class="btn btn-default" style="margin-bottom:20px">Add Contact Person</button></a>	

				</div>
			</div>	

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<table class="table table-bordered table-hover" id="datatables" >
						<thead>
							<tr>
								<th>ID</th>
								<th>Company Name</th>
								<th>PIC Name</th>
								<th>PIC Position</th>
								<th>PIC Office Address</th>
								<th>PIC Office Number</th>
								<th>PIC HP</th>
								<th>PIC Fax Number</th>
								<th>PIC Email</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							@foreach($picData as $PIC)
								
								<tr>
									<td>{{$PIC->PICID}}</td>
									<td>{{$PIC->Company->CompanyName}}</td>	
									<td>{{$PIC->PICName}}</td>
									<td>{{$PIC->PICPosition}}</td>
									<td>{{$PIC->PICOfficeAddress}}</td>
									<td>{{$PIC->PICOfficeNumber}}</td>
									<td>{{$PIC->PICPhoneNumber}}</td>
									<td>{{$PIC->PICFax}}</td>
									<td>{{$PIC->PICEmail}}</td>
									<td><a href="{{URL::to('picmodify')}}/{{$PIC->PICID}}/{{$PIC->PICName}}"><button type="button" class="btn btn-default">Modify</button></a>
									<a href="{{URL::to('picremove')}}/{{$PIC->PICID}}/{{$PIC->PICName}}"><button type="button" class="btn btn-default">Remove</button></a></td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				{!! $picData->render() !!}
			</div>
		</div>
	</body>
</html>