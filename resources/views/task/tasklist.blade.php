@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Task List</div>

				<div class="alert alert-success">
					@if (Session::has('message'))
						<li>{{ Session::get('message') }}</li>
					@endif
				</div>
				<table border=1>
					<thead>
					<tr>
						<td>Summary:</td>
						<td>Assignee:</td>
						<td>Due Date:</td>
					</tr>	
					</thead>
					@foreach ($tasks as $task)
					<tr>
						<td> {{ $task->summary }}</td>
						<td> {{ $task->user->userName }}</td>
						<td> {{ $task->dueDate }}</td>
					 </tr> 
					@endforeach
				</table>
				
			</div>
		</div>
	</div>
</div>
@endsection
