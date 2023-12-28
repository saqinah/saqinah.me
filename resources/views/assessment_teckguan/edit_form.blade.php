@extends('layouts/contentNavbarLayout')

@section('title', 'Basic Inputs - Forms')

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
	<span class="text-muted fw-light">New /</span> Employee Information
</h4>

<div class="row">
	<div class="col-md-12">
		<div class="card mb-4">
			<form action="{{ route('UpdateEmployee', ['id' => $employee->id]) }}" method="POST" class="form-horizontal" autocomplete="off">
				@csrf

				<div class="card-body">
					<div class="row">
						<div class="col-md-12 mb-1">
							<label class="form-label">Employee Name</label>
							<input type="text" class="form-control" id="employee_name" name="employee_name" value="{{ $employee->employee_name }}" required>
						</div>

						<div class="col-md-6 mb-1">
							<label class="form-label">Email</label>
							<input type="email" class="form-control" id="employee_email" name="employee_email" value="{{ $employee->employee_email }}" required>
						</div>

						<div class="col-md-6 mb-1">
							<label class="form-label">Position</label>
							<select class="form-select" id="employee_position" name="employee_position">
								<option value="" hidden>Position</option>
								@foreach($positions as $position)
								<option value="{{ $position }}" {{ $employee->employee_position == $position ? 'selected' : '' }}>
									{{ $position }}
								</option>
								@endforeach
							</select>
						</div>

						<div class="col-md-12 mb-1">
							<label class="form-label">Department</label>
							<select class="form-select" id="department_id" name="department_id">
								<option value="" hidden>Department</option>
								@foreach($departments as $department)
								<option value="{{ $department->id }}" {{ $department->id == $employee->department_id ? 'selected' : ''}}>
									{{ $department->display_name }}
								</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>

				<div class="card-footer">
					<button type="submit" class="btn btn-success float-end mb-2">Update Employee</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection