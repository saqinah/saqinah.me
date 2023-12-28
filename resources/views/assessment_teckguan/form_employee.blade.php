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
			<form action="{{ route('StoreEmployee') }}" method="POST" class="form-horizontal" autocomplete="off">
			@csrf
				<h5 class="card-header">Employee Information</h5>
				<hr>

				<div class="card-body">
					<div class="row">
						<div class="col-md-12 mb-1">
							<label class="form-label">Employee Name</label>
							<input type="text" class="form-control" name="employee_name" id="employee_name">
						</div>

						<div class="col-md-6 mb-1">
							<label class="form-label">Email</label>
							<input type="text" class="form-control" name="employee_email" id="employee_email">
						</div>

            <div class="col-md-6 mb-1">
              <label class="form-label">Position</label>
              <select class="form-select" id="employee_position" name="employee_position">
                <option value="" hidden>Position</option>
                @foreach($positions as $position)
                    <option value="{{ $position }}">{{ $position }}</option>
                @endforeach
              </select>
						</div>

            <div class="col-md-12 mb-1">
							<label class="form-label">Department</label>
							<select class="form-select" id="department_id" name="department_id">
                <option value="" hidden>Department</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->display_name }}</option>
                @endforeach
              </select>
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
