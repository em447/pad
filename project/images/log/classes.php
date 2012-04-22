<?php

class Course
{
	private $courseTitle;
	private $startTime;
	private $endTime;
	private $classDay;
	
	function __construct($title, $sTime, $eTime, $day){
		global $courseTitle, $startTime, $endTime, $classDay;
		$courseTitle = $title;
		$startTime = $sTime;
		$endTime = $eTime;
		$classDay = $day;
	}
	
	public function getTitle(){
		global $courseTitle;
		return $courseTitle ."is the title";
	}
	
	public function getStartTime(){
		global $startTime;
		return $startTime ."is the start Time";
	}
	
	public function getEndTime(){
		global $endTime;
		return $endTime ."is the end Time";
	}
	
	public function getDay(){
		global $classDay;
		return $classDay ."is the day";
	}
}


class Schedule
{
	private $classes = array();
	
	public function addClass($course){
		global classes;
		classes[] = $course;
	}
}
?>