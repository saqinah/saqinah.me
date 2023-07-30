@extends('layouts/contentNavbarLayout')

@section('title', 'Employee List')

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
	<span class="text-muted fw-light">List /</span> Employee Information
</h4>

<div class="row">
	<div class="col-md-12">
		<div class="card mb-4">
			<h5 class="card-header">List of Employee</h5>
			<hr>

			<div class="card-body">
				<div class="table-responsive text-nowrap">
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Position</th>
								<th>Department</th>
								<th>Reporting Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody class="table-border-bottom-0">
							@if(count($employees) > 0)
								@foreach($employees as $employee)
									<tr>
										<td> {{ $employee->id }} </td>
										<td> {{ $employee->employee_name}} </td>
										<td> {{ $employee->employee_email}} </td>
										<td> {{ $employee->employee_position}} </td>
										<td>{{ $employee->getDisplayName() }}</td>
										<td> {{ $employee->created_at}} </td>
										<td>
											<div class="dropdown">
												<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="{{ route('EditEmployee',['id' => $employee->id]) }}">
														<i class="bx bx-edit-alt me-2"></i> 
														Edit
													</a>
													<form id="deleteForm{{ $employee->id }}" action="{{ route('DeleteEmployee', ['id' => $employee->id]) }}" method="POST">
														@csrf
												</form>
												<a class="dropdown-item" href="javascript:void(0);" onclick="deleteEmployee({{ $employee->id }})">
													<i class="bx bx-trash me-2"></i> 
													Delete
											</a>
												</div>
											</div>
										</td>
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
</div>
@endsection

@section('script')
<script>
	function deleteEmployee(id) {
			if (confirm('Confirm deletion?')) {
					document.getElementById('deleteForm' + id).submit();
			}
	}
</script>
@endsection