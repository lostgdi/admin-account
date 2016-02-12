@extends('Admin::app')



@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="/vendor/lostgdi/admin_account/js/admin_account.js"></script>

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
				<div class="panel-heading">Account Manager</div>

				<div class="panel-body">
					
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div id="search_container">

					<div style="width:100px;float:right;margin-left:5px;">
						<div class="btn-group">
							<button type="button" class="btn btn-default" onclick="button_add_show()">New</button>
						</div>
					</div>

					

					</div>
					
				

					<table class="table" id="data_table">
						<thead>
						<tr>
							<th>Account</th>
							<th>Name</th>
							<th>Functions</th>
						</tr>
						</thead>
						<tbody>
						@foreach ($users as $user)
						<tr>
							
							<td>{{ $user->username }}</td>
							<td>{{ $user->real_name }}</td>
							<td>
								<button type="button" class="btn btn-primary btn-xs" onclick="button_modify_show(this,'{{$user->id}}')">Modify</button>
								<button type="button" class="btn btn-primary btn-xs" onclick="button_remove('{{ $user->id }}')">Delete</button>
							</td>
						</tr>
						@endforeach
						</tbody>
					</table>
					{!! $users->render() !!}
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="myModal_modify" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Modify</h4>
			</div>
			<input type="hidden" name="id" value="">
			
			<div class="modal-body" id="login_input_area">
				<div class="myModal_row">
					<div class="input-group input-group">
						<span class="input-group-addon"></span>
						<input type="text" class="form-control" name="username" placeholder="Account" readonly="true">
					</div>
				</div>
				<div class="myModal_row">
					<div class="input-group input-group">
						<span class="input-group-addon"></span>
						<input type="text" class="form-control" name="real_name" placeholder="Name(call)">
					</div>
				</div>
				<div class="myModal_row">
					<div class="input-group input-group">
						<span class="input-group-addon"></span>
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
				</div>
				<div class="myModal_row">
					<div class="input-group input-group">
						<span class="input-group-addon"></span>
						<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
					</div>
				</div>
				<div class="myModal_row">
					<div class="btn-group">
						<button type="button" class="btn btn-default" onclick="button_modify()">Modify</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="myModal_add" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">New</h4>
			</div>
			<input type="hidden" name="id" value="">
			
			<div class="modal-body" id="login_input_area">
				<div class="myModal_row">
					<div class="input-group input-group">
						<span class="input-group-addon"></span>
						<input type="text" class="form-control" name="username" placeholder="Account">
					</div>
				</div>
				<div class="myModal_row">
					<div class="input-group input-group">
						<span class="input-group-addon"></span>
						<input type="text" class="form-control" name="real_name" placeholder="Name(Call)">
					</div>
				</div>
				<div class="myModal_row">
					<div class="input-group input-group">
						<span class="input-group-addon"></span>
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
				</div>
				<div class="myModal_row">
					<div class="input-group input-group">
						<span class="input-group-addon"></span>
						<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
					</div>
				</div>
				<div class="myModal_row">
					<div class="btn-group">
						<button type="button" class="btn btn-default" onclick="button_add()">Add</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection
