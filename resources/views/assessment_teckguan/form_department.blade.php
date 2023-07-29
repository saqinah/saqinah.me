@extends('layouts/contentNavbarLayout')

@section('title', 'New Department')

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
	<span class="text-muted fw-light">New /</span> Department Information
</h4>

<div class="row">
	<div class="col-md-12">
		<div class="card mb-4">
			<h5 class="card-header">List of Department</h5>
			<hr>

			<div class="card-body">
				<div class="table-responsive text-nowrap">
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Department Name</th>
								<th>Display Name</th>
								<th>Registered On</th>
							</tr>
						</thead>
						<tbody class="table-border-bottom-0">
							@if(count($departments) > 0)
								@foreach($departments as $department)
									<tr>
										<td> {{ $department->id }} </td>
										<td> {{ $department->dept_name}} </td>
										<td> {{ $department->display_name}} </td>
										<td> {{ $department->created_at}} </td>
									</tr>
								@endforeach
							@else
								<tr>
									<td colspan="4">No Data</td>
								</tr>
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="card mb-4">
			<form action="{{ route('StoreDepartment') }}" method="POST" class="form-horizontal" autocomplete="off">
			@csrf
				<h5 class="card-header">Department Information</h5>
				<hr>

				<div class="card-body">
					<div class="row">
						<div class="col-md-12 mb-1">
							<label for="defaultFormControlInput" class="form-label">Department Name</label>
							<input type="text" class="form-control" name="dept_name" id="dept_name" placeholder="Testing Department">
						</div>

						<div class="col-md-12 mb-1">
							<label for="defaultFormControlInput" class="form-label">Department Name</label>
							<input type="text" class="form-control" name="display_name" id="display_name">
						</div>
					</div>
				</div>

				<div class="card-footer">
					<button type="submit" class="btn btn-success float-end mb-2">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('script')
<script>
	
</script>
@endsection