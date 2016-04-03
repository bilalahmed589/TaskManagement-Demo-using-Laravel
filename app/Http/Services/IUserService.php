<?php namespace TaskManagement\Http\Services;

use TaskManagement\User;

interface IUserService{
	
	public function getAllUsers();
	
	public function getAllUsersForSuggestion();

}
