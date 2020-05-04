@extends('layouts.app')

@section('content')
<div class="container">
    
       		<center><h1><b>Hospital Management</b></h1>
           <div class="row justify-content-center">
          <div class="col-md-10">
           <div class="top-right links">
          <a href="{{ route('students.staffs') }}" class="btn btn-primary">Update Hospital Staffs</a>&nbsp&nbsp&nbsp&nbsp
          <a href="{{ route('students.patients') }}" class="btn btn-primary">Display Patients</a>
          </div></center>

          <form action="{{ route('students.index') }}" method="get">
          <div class="form-group">
            <label> Select year level:</label>
            <select class="form-control mb-2" name="clinical_job">
              <option value="0"> Select Hospital Job</option>
              <option value="Physician/Doctors" @if($clinical_job=="Physician/Doctors") select @endif>Physician/Doctors</option>
              <option value="Nurse" @if($clinical_job=="Nurse") select @endif>Nurse</option>
              <option value="Techs" @if($clinical_job=="Techs") select @endif>Techs</option>
              <option value="Therapist" @if($clinical_job=="Therapist") select @endif>Therapist</option>
              <option value="Medical Assistant" @if($clinical_job=="Medical Assistant") select @endif>Medical Assistant</option>
              <option value="Pharmacist" @if($clinical_job=="Pharmacist") select @endif>Pharmacist</option>
              <option value="Medical Tech" @if($clinical_job=="Medical Tech") select @endif>Medical Tech</option>
              <option value="Dietitian" @if($clinical_job=="Dietitian") select @endif>Dietitian</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Filter</button>
          </form>
          <table class='table'>
       			<thead>
       				<tr>
       					<th>#</th>
       					<th>Name</th>
                <th>Job</th>
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
                      {{ $student->clinical_job}}
                    </th>
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


