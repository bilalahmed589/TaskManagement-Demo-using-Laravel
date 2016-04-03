<?php namespace TaskManagement;

use \Esensi\Model\Model;

class Task extends Model {

	/**
	 * Many to ony association
	 *
	 * return Association
	 */
	public function user()
    {
        return $this->belongsTo('TaskManagement\User','assigneeId');
    }
	
}
