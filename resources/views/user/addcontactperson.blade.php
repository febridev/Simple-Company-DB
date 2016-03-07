<html>
	<head>
		@include('layout.headuser')
		<meta name="csrf-token" content="{{ Session::token() }}" />
	</head>
	<body style="background-color: #FFF">
		@include('layout.headeruser')
		
		<div class="container">
			<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 ">
				{!! Form::open(array('route' => 'companiessaved', 'method' => 'post')) !!}
				<div></div>
				<input id="idpicid" name="pic_total" value="1" type="hidden"  />
				<div id="divcompany">
					<div class="col-xs-12 col-sm-6 col-md-6" style="padding: unset;padding-right: 10px;">
						<label>Industry</label>
						<select id="IndustryType" name="IndustryType" class="form-control-madeself" style="margin-bottom:20px">
							@foreach($industryData as $datas)
								<option value="{{ $datas->IndustryId }}">{{$datas->IndustryName}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6" style="padding: unset;padding-left: 10px;" id="selectCompanies">
						<label>Company</label>
						<select id="CompanyType" name="CompanyName" class="form-control-madeself" style="margin-bottom:20px" disabled="true">
						
						</select>
					</div>
				</div>
				<div class="row" style="margin:unset"> 
					<div style="margin-bottom:20px;padding:unset" class="col-xs-12 col-sm-3 col-md-3">
						<button type="button" class="form-control" id="addpicbutton" style="background-color:rgb(31, 74, 70);color:white;text-shadow:unset">Add Another Contact Person</button>
					</div>							
				</div>
				<div id="divpicfull">
					<div id="divpic0" class="row" style="margin-right: 0px;margin-left: 0px;">
						<hr class="style18">
							<div >
								<div class="col-xs-12 col-sm-6 col-md-6" style="padding:unset; padding-right:10px">	
									<label>Contact Person Name</label>
									<input name="PICName[0]" placeholder="PIC Name or at least CP1" type="text" class="form-control-madeself" style="margin-bottom:20px"/>
									<label>Contact Person Position</label>
									<input name="PICPosition[0]" placeholder="PIC Position" type="text" class="form-control-madeself" style="margin-bottom:20px"/>
									<label>Contact Person Office Address</label>
									<textarea name="PICOfficeAddress[0]" placeholder="PIC Office Address" type="text" class="form-control-madeself" style="margin-bottom:20px;height:155px"></textarea>
									</div>
								<div class="col-xs-12 col-sm-6 col-md-6" style="padding:unset;padding-left:10px">
									<label>Contact Person Office Number</label>
									<input name="PICOfficePhoneNumber[0]" placeholder="PIC Office Phone Number" type="text" class="form-control-madeself" style="margin-bottom:20px"/>
									<label>Contact Person Office Fax</label>
									<input name="PICOfficeFax[0]" placeholder="PIC Office Fax Number" type="text" class="form-control-madeself" style="margin-bottom:20px"/>
									<label>Contact Person HP</label>
									<input name="PICPersonalPhoneNumber[0]" placeholder="PIC Personal Phone Number" type="text" class="form-control-madeself" style="margin-bottom:20px"/>
									<label>Contact Person Office Email</label>
									<input name="PICOfficeEmail[0]" placeholder="PIC Office Email Address" type="text" class="form-control-madeself" style="margin-bottom:20px"/>
								</div>
							</div>
					</div>

						</div>


						<div style="display:table;width:100%;margin-top	:10px">	
							<div class="layout" >
								<div class="full" >
									<div class="half" style="padding: unset;padding-right: 10px;">
										<button class="btn btn-default" type="submit" style="background-color:rgb(31, 74, 70);color:white;text-shadow:unset;width:100%">Submit</button>
									</div>
									<div class="half" style="padding: unset;padding-left: 10px;">
										<a href="{{URL::to('companies')}}">
											<button class="btn btn-default" type="button" style="background-color:rgb(31, 74, 70);color:white;text-shadow:unset;width:100%">Cancel</button>
										</a>
									</div>
								</div>
							</div>
						</div>

					{!! Form::close() !!}
				
				
			</div>
			</div>	
		</div>

		<script type="text/javascript">
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				        }
			});


			$(document).ready(function() {	
				$("#addpicbutton").click(function(){
					var tempId = parseInt($("#idpicid").val());
					var jumlahid = tempId + 1;
					$("#idpicid").val(jumlahid);
					var divPICString = '<div id="divpic'+tempId+'" class="row" style="margin-right: 0px;margin-left: 0px;"><hr class="style18"><div ><div class="col-xs-12 col-sm-6 col-md-6" style="padding:unset; padding-right:10px"><label>Contact Person Name</label><input name="PICName['+tempId+']" placeholder="PIC Name" type="text" class="form-control-madeself" style="margin-bottom:20px"/><label>Contact Person Position</label><input name="PICPosition['+tempId+']" placeholder="PIC Position" type="text" class="form-control-madeself" style="margin-bottom:20px"/><label>Contact Person Office Address</label><textarea name="PICOfficeAddress['+tempId+']" placeholder="PIC Office Address" type="text" class="form-control-madeself" style="margin-bottom:20px;height:155px"></textarea></div><div class="col-xs-12 col-sm-6 col-md-6" style="padding:unset;padding-left:10px"><label>Contact Person Office Number</label><input name="PICOfficePhoneNumber['+tempId+']" placeholder="PIC Office Phone Number" type="text" class="form-control-madeself" style="margin-bottom:20px"/><label>Contact Person Office Fax</label><input name="PICOfficeFax['+tempId+']" placeholder="PIC Office Fax Number" type="text" class="form-control-madeself" style="margin-bottom:20px"/><label>Contact Person HP</label><input name="PICPersonalPhoneNumber['+tempId+']" placeholder="PIC Personal Phone Number" type="text" class="form-control-madeself" style="margin-bottom:20px"/><label>Contact Person Office Email</label><input name="PICOfficeEmail['+tempId+']" placeholder="PIC Office Email Address" type="text" class="form-control-madeself" style="margin-bottom:20px"/></div></div></div>';
					$("#divpicfull").append(divPICString);
				});
				
			
				$("#IndustryType").change(function () {
					var industryID = $("#IndustryType").val();
					var datastring = "IndustryType="+industryID ;
					 $.ajax({
						
						url: "{{URL::to('getcompanytoaddcontactperson')}}",
						type: "POST",
						data: datastring,
						success : function(data) {
							//console.log(data);
							var items = JSON.parse(data);
							$("#CompanyType").empty();
							$.each(items,function(i,item)
							{
								$("#CompanyType").append($('<option>',{
									value:item.CompanyName,
									text:item.CompanyName
								}));

							});
							$("#CompanyType").prop("disabled",false);
					}});
				});






			});
		</script>
	</body>
</html>