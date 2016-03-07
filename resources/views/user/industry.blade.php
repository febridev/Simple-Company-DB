<html>
	<head>
		@include('layout.headuser')
	</head>
	<body style="background-color: #FFF">
		@include('layout.headeruser')
		
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-9 col-md-9" style="margin-bottom:20px">
					<a href="{{URL::to('industryadd')}}"><button type="button" class="btn btn-default" style="background-color: rgb(31, 74, 70);color: white; text-shadow: unset;">Add Industry Type</button></a>	

				</div>
				<div class="col-xs-12 col-sm-3 col-md-3">
					{!! Form::open(array('route' => 'industrysearchroute', 'method' => 'post')) !!}
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
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Description</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							
							@foreach($industryTypeData as $datas)
							
								<tr>
									<td>{{$datas->IndustryId}} <sup><a href="{{URL::to('/industrymodify')}}/{{$datas->IndustryId}}/{{$datas->IndustryName}}"><span class="glyphicon glyphicon-pencil"></span></a></sup></td>	
									<td>{{$datas->IndustryName}}</td>
									<td>{{$datas->IndustryDescription}}</td>
									<td>

										<a href="{{URL::to('/industryremove')}}/{{$datas->IndustryId}}/{{$datas->IndustryName}}"><button type="button" class="btn btn-default" style="background-color: rgba(20, 96, 11, 0.7);color: white;text-shadow: unset;">Remove Industry</button></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>

					{!! $industryTypeData->links() !!}
				</div>
			</div>
		</div>
	</body>
</html>