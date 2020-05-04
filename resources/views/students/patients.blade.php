@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <center><h1><b>Hospital Management</b></h1>
        </center>
          <h4>List of Patients</h4>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#patient-add-modal">Add Patient</button>
          @include('students.modals._patient-add-modal')
          
          <form action="{{ route('students.patients') }}" method="get">
          <div class="form-group">
            <label></label>
            <select class="form-control mb-2" name="senior">
              <option> Senior Citizen or Average?</option>
              <option value="Senior(22% Off)" @if($senior=="Yes") select @endif>Senior Citizen</option>
              <option value="Average(0% Off)" @if($senior=="No") select @endif>Average</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Filter</button>
          </form>    
          <table class='table'>
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th> 
                <th>Senior Citizen or Average</th>
                <th>Reason</th>
                <th>Bill</th>
              </tr>
            </thead>
            <tbody>
              @foreach($patients as $patient)
                  <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td><center>
                      {{ $patient->first_name}} 
                      {{ $patient->middle_name}} 
                      {{ $patient->last_name}}
                    <th>
                      {{ $patient->senior}}
                    </th>
                    <th>{{ $patient->reasons}}
                    </th>
                    <th>{{ $patient->total_reason}}
                    </th>
                    </center>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#patient-edit-modal-{{$patient->id}}">Update.</button>
                        @include('students.modals._patient-edit-modal')

                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#patient-delete-modal-{{$patient->id}}">Discharge.</button>
                        @include('students.modals._patient-delete-modal')
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