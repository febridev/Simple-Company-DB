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
					{!! Form::open(array('route' => 'categorymodifysaved', 'method' => 'post')) !!}
						{!! Form::hidden('CategoryType',$categoryData->CategoryID) !!}
						<input name="CategoryName" placeholder="Category Name" type="text" class="form-control-madeself" style="margin-bottom:20px" value="{{$categoryData->CategoryName}}"/>
						
						<textarea name="CategoryDescription" placeholder="Category Description" class="form-control" style="height: 247px !important;">{{$categoryData->CategoryDescription}}</textarea>

						<div style="display:table;width:100%;margin-top	:10px">	
							<button class="btn btn-default" type="submit" style="width:50%;">Submit</button>
							<button class="btn btn-default" type="reset" style="width:50%;" >Reset</button>
						</div>
					{!! Form::close() !!}
					</div>
				</div>
			</div>


			</div>	
		</div>
	</body>
</html>