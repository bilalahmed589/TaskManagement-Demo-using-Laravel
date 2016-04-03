<?php namespace TaskManagement\Http\Services\impl;

use TaskManagement\Http\Services\IUserService;
use TaskManagement\User;

class UserService implements IUserService{

	/**
	 * Return all the application users
	 *
	 * @return User Collection
	 */
	public function getAllUsers()
	{
		return  User::all();
	}
	
	/**
	 * Return all the application users with two fields userName,id will be used for assignee and suggestions i.e. 
	 *
	 * @return User Collection
	 */	
	public function getAllUsersForSuggestion()
	{
		return User::lists('userName', 'id');
	}
	

}
