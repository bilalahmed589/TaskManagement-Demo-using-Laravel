@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Add Task</div>

				<div class="panel-body">
					
					
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					
					{!! Form::model($task, ['action' => 'TaskController@save']) !!}
					
					<div class="form-group">
						{!! Form::label('summary', 'Summary') !!}
						{!! Form::text('summary', '', ['class' => 'form-control']) !!}
					</div>

					<div class="form-group">
					  {!! Form::label('dueDate', 'Due Date') !!}
					  {!! Form::date('dueDate', '', ['class' => 'form-control']) !!}
					</div>
					
					<div class="form-group">
						{!! Form::label('assignee', 'Assignee') !!}
						{!! Form::select('assignee', $users); !!}
					</div>

					<button class="btn btn-success" type="submit">Add</button>
					
					{!! Form::close() !!}
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
