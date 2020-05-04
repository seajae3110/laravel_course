@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
       		<h1>Check Attendance {{ date('m-d-Y', strtotime($todaysDate)) }}</h1>
          
          <table class='table'>
       			<thead>
       				<tr>
       					<th>#</th>
       					<th>Name</th>
                <th>is Present</th>
                <th>Action</th>
       				</tr>
       			</thead>
       			<tbody>
              @foreach($students as $student)
           				<tr>
           					<td>{{ $loop->iteration}}</td>
           					<td>
                      {{ $student->first_name }} 
                      {{ $student->middle_name }} 
                      {{ $student->last_name }}
                    </td>
                    <td>@if($student->is_present($todaysDate)) Present @else Absent @endif</td>
                    <td>
                        @if(!$student->is_present($todaysDate))
                          <form action="{{ route('students.attendance-present', array('id'=>$student->id)) }}" method="POST">
                            @csrf
                               <input type="hidden" value="{{ $todaysDate }}"  name="todays_date"/>
                               <button type="submit" class="btn btn-warning">Present</button>
                          </form>
                        @else
                             <form action="{{ route('students.attendance-absent', array('id'=>$student->id)) }}" method="POST">
                            @csrf
                              <input type="hidden" value="{{ $todaysDate }}"  name="todays_date"/>
                             <button type="submit" class="btn btn-danger">Absent</button>
                          </form>
                        @endif
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


