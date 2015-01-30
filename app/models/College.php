<?php

class College extends \Eloquent {
	protected $table="college_master";
	protected $primaryKey="college_id";
	protected $fillable = [];

	public function courses(){
		return $this->hasMany('Course');
	}

	public function recruiters()
	{
		return $this->hasMany('Recruiter');
	}
	public function features()
	{
		return $this->hasMany('CollegeFeature');
	}
}