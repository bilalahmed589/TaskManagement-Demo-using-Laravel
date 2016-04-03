<?php namespace TaskManagement\Http\Services;

use TaskManagement\Task;

interface ITaskService{
	
	public function addTask(Task $task);
	
	public function updateTask(Task $task);
	
	public function findTask($id);
	
	public function deleteTask($id);
	
	public function getAllTasks();
	
	public function findTaskByUser($userId);
}
