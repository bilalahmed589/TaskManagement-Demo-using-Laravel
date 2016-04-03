<?php namespace TaskManagement\Http\Controllers;

use TaskManagement\Http\Services\ITaskService;
use TaskManagement\Http\Services\IUserService;
use TaskManagement\Task;
use Illuminate\Http\Request;

class TaskController extends Controller {

	private $taskService;
	private $userService;

	/**
	 * Create a task controller instance.
	 * Inject TaskService and User Service
	 * @return void
	 */
	public function __construct(ITaskService $taskService,IUserService $userService)
	{
		$this->taskService = $taskService;
		$this->userService = $userService;
		$this->middleware('guest');
	}

	/**
	 * This method list all tasks
	 *
	 * @return Response
	 */
	public function index()
	{
		$tasks = $this->taskService->getAllTasks();
		return view('task.tasklist',['tasks' => $tasks]);
	}
	
	public function add()
	{
		$task = new Task();
		//Load all user and pass to view for assignee drop downs
		$users = $this->userService->getAllUsersForSuggestion();
		return view('task.add',['task' => $task,'users' => $users]);
	}

	/**
	 * This method validates all inputs and save a task
	 *
	 * @return Response
	 */	
	public function save(Request $request)
	{
		 $this->validate($request, [
			'summary' => 'required',
			'dueDate' => 'required',
			'assignee' => 'required'
		]);
		
		$task = new Task();
		// populate the model with the form data
		$task->summary = $request->summary;
		$task->dueDate = $request->dueDate;
		$task->assigneeId = $request->assignee;
		$tasks = $this->taskService->addTask($task);
		
		if($tasks){
			return redirect()->action("TaskController@index")->with('message', 'Task assigned successflly!');
		}else{
			return view('task.add',['task' => $task,'users' => $this->userService->getAllUsersForSuggestion(), 'error',"User already have enough assignments!"]);
		}
		
	}

}
