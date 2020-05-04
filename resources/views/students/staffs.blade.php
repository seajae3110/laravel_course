@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <h1><center>Hospital Management</center></h1>
       		<h2>Hospital Staff</h2>
               <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-student-modal">Add Staff</button>
       		@include('students.modals._add-student-modal')&nbsp&nbsp&nbsp&nbsp
           
            <a href="{{ route('students.check_attendance') }}" class="btn btn-primary">Check Today's Attendance</a>&nbsp&nbsp&nbsp&nbsp
            <a href="{{ route('students.attendance_report') }}" class="btn btn-primary">Attendance Report</a></center>
               <form action="{{ route('students.staffs') }}" method="get">
          <div class="form-group">
            <label></label>
            <select class="form-control mb-2" name="clinical_job"/>
              <option value="0"> Select Hospital Job</option>
              <option value="Physician/Doctors" @if($clinical_job==1) select @endif>Physician/Doctors</option>
              <option value="Nurse" @if($clinical_job==2) select @endif>Nurse</option>
              <option value="Techs" @if($clinical_job==3) select @endif>Techs</option>
              <option value="Therapist" @if($clinical_job==4) select @endif>Therapist</option>
              <option value="Medical Assistant" @if($clinical_job==5) select @endif>Medical Assistant</option>
              <option value="Pharmacist" @if($clinical_job==6) select @endif>Pharmacist</option>
              <option value="Medical Tech" @if($clinical_job==7) select @endif>Medical Tech</option>
              <option value="Dietitian" @if($clinical_job==8) select @endif>Dietitian</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Filter</button>
          </form>    
          <table class='table'>
       			<thead>
       				<tr>
       					<th>#</th>
       					<th>Name</th>
                <th>Salary</th>
                <th>Hospital Job</th>
                <th>Action</th>
       				</tr>
       			</thead>
       			<tbody>
              @foreach($students as $student)
           				<tr>
           					<td>{{ $loop->iteration}}</td>
           					<td>
                      {{ $student->first_name}} 
                      {{ $student->middle_name}} 
                      {{ $student->last_name}}
                    <th>
                      {{ $student->salary}}
                    </th>
                    <th>
                      {{ $student->clinical_job}}
                    </th>
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-student-modal-{{$student->id}}">Update</button>
                        @include('students.modals._edit-student-modal')

                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-student-modal-{{$student->id}}">Fire</button>
                        @include('students.modals._delete-student-modal')
                    </td>
           				</tr>
              @endforeach
       				</tbody>
       			</tbody>
       		</table>
        </div>
    </div>
</div>
@endsection