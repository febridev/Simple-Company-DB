<html>
	<head>
		@include('layout.headuser')
	</head>
	<body style="background-color: #FFF">
		@include('layout.headeruser')
		
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom:20px">
					<a href="{{URL::to('categoryadd')}}"><button type="button" class="btn btn-default">Add Category Type</button></a>	

				</div>
			</div>	

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Name</th>
								<th>Description</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 0 ?>
							@foreach($categoryData as $datas)
								<?php $i++ ?>
								<tr>
									<td>{{$i}}</td>	
									<td>{{$datas->CategoryName}}</td>
									<td>{{$datas->CategoryDescription}}</td>
									<td>
										<a href="{{URL::to('/categorymodify')}}/{{$datas->CategoryID}}/{{$datas->CategoryName}}"><button type="button" class="btn btn-default">Modify</button></a>
										<a href="{{URL::to('/categoryremoves')}}/{{$datas->CategoryID}}/{{$datas->CategoryName}}"><button type="button" class="btn btn-default">Remove</button></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>