@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
       		<h1>Hospital Staffs</h1>
        

          <table class='table'>
       			<thead>
       				<tr>
       					<th>#</th>
       					<th>Employees</th>

                @foreach($dates as $date)
                    <th>{{ $date }}</th>
                @endforeach
       				</tr>
       			</thead>
       			<tbody>
                @foreach($students as $student)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->full_name }}</td>

                    @foreach($dates as $date)
                      <td>@if($student->is_present($date))<i class="fa fa-check"></i>@else<i class="fa fa-times"></i>@endif</td>
                    @endforeach
                    <tr>
                @endforeach
       			</tbody>
       			</tbody>
       		</table>
        </div>
    </div>
</div>
@endsection


