<?php namespace TaskManagement\Http\Services\impl;

use TaskManagement\Http\Services\ITaskService;
use TaskManagement\Task;

class TaskService implements ITaskService{

	/**
	 * This method first check the total assignments for user return error if user has 3 assignments
	 * input : Task
	 * @return Task if success else return FALSE
	 */
	public function addTask(Task $task)
	{
	    try{
			//Writing a business logic for just demonstration
			//if a user has already assgined 3 tasks show error message
			$total = $this->getTotalUserAssignments($task->assigneeId);
			if($total > 3){
				return FALSE;	
			}
			return $task->save(); 
		}
		catch(Exception $e){
			return FALSE;
		}
		
	}
	
	/**
	 * Get all tasks
	 *
	 * @return Collection
	 */
	public function getAllTasks()
	{
		$tasks = Task::all();
		return $tasks;
	}
	
	/**
	 * This method return total assignment for a user
	 * input : assigneeIs (userId)
	 * @return Integer
	 */
	private function getTotalUserAssignments($assigneeId){
		return Task::where('assigneeId', '=', $assigneeId)->count();
	}
	
	public function updateTask(Task $task)
	{
		$task = $task->update($task);
		return $task;
	}
	
	public function findTask($id)
	{
		$task = $task->find($id);
		return $task;		
	}
	
	public function deleteTask($id)
	{
		$task = $task->find(1);
		$task->delete();
	}
	
	public function findTaskByUser($userId)
	{
		//TODO
	}
}
