@extends('Admin::app')



@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<style>
#search_container
{
	margin-left:0px;
	width:100%;
	height: 36px;
}
.myModal_row{
	width:95%;
	margin-bottom:10px;
}
</style>

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Welcome</div>

				<div class="panel-body">
					
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div id="search_container">
					@if ( Auth::user()->level==0 )
					<p>You are Manager</p>
					@else
					<p>This is a common account , for login purpose only. </p>
					@endif
					

					

					</div>
					
				

					
				</div>
			</div>
		</div>
	</div>
</div>




@endsection
