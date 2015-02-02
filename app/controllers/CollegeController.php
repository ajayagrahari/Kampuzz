<?php

class CollegeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /college
	 *
	 * @return Response
	 */
	public function index($id, $slug = NULL)


	{

		//return $college_details=College::where('college_id', '=', $id)->with('courses')->get()->toArray();
		 $college_details = College::where('college_id', '=', $id)->first();
		 // $collegeCourse=self::CourseGroup($id,0);
		// echo "<pre>";
		// print_r($collegeCourse);
		// exit();
		  $i = 0;
        $collegeFeature = [] ;
        foreach ($college_details->features as $feature)
        {
            $collegeFeature[$i]['feature_title'] = isset($feature->feature_title) ? $feature->feature_title : NULL;
            $collegeFeature[$i]['feature_content'] = isset($feature->feature_content) ? $feature->feature_content : NULL;
           
            $i++;
        }

        $courseGroup = array();
        foreach ($college_details->courses as $item)
        {
        	if($item->parent_course_id!=0){
            $courseGroup[] = ['id' => $item->course_id, 'name' => $item->course_name, 'parent' => self::CourseGroupList($item->parent_course_id)];
        }
        else{
        	//$courseGroup[] = ['id' => $item->course_id, 'name' => $item->course_name];
        }
    }
  
$data=array();
$data1=array();
    foreach ($courseGroup as $key => $value) {
    	$data1[$value['parent']['id']]['child'][$value['id']]=$value['name'];
    	$data1[$value['parent']['id']]['name']=$value['parent']['name'];
    	foreach ($data1 as $key1 => $value1) {
    		
    	}
    	if(!isset($value['parent']['parent'])){
    		$data[$value['parent']['id']]=$data1;
    	}
    	else{
    		foreach ($data1 as $key1 => $value1) {
    			if ($key1==$value['parent']['id']) {
    				$data[$value['parent']['parent']['id']]['child'][$key1]=$value1;
    	$data[$value['parent']['parent']['id']]['name']=$value['parent']['parent']['name'];
    
    			}
    		}
    		
    	}
    	}
    	 
    // foreach ($courseGroup as $key1 => $value1) {
    // 	if(!isset($value1['parent']['parent'])){
    // 		$data[$value1['parent']['id']]=$data1;
    // 	}
    // 	else{
    // 		$data[$value1['parent']['parent']['id']]['child']=$data1;
    // 	$data[$value1['parent']['parent']['id']]['name']=$value1['parent']['parent']['name'];
    
    // 	}
    // }
    //  echo "<pre>";
    // print_r($data);
    // exit();
        // $j = 0;
        // $collegeCourse = [] ;
        // foreach ($college_details->courses as $course)
        // {
        //     $collegeCourse[$j]['course_id'] = isset($course->course_id) ? $course->course_id : NULL;
        //     $collegeCourse[$j]['course_name'] = isset($course->course_name) ? $course->course_name : NULL;
        //     $collegeCourse[$j]['course_duration'] = isset($course->course_duration) ? $course->course_duration : NULL;
           
        //     $j++;
        // }
        
		 return View::make('college.detail', compact('college_details','data','collegeFeature'));
	}

	
     public static function CourseGroupList($parent_id)
    {
        $items = Course::where('course_id', '=', $parent_id)->orderBy('sort', 'DESC')->get();
        $courseGroup = array();
        foreach ($items as $item)
        {
            if($item->parent_course_id!=0){
            $courseGroup = ['id' => $item->course_id, 'name' => $item->course_name, 'parent' => self::CourseGroupList($item->parent_course_id)];
        }
        else{
        	$courseGroup = ['id' => $item->course_id, 'name' => $item->course_name];
        }
    }

        return $courseGroup;
    }
	
	/**
	 * Show the form for creating a new resource.
	 * GET /college/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /college
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /college/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /college/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /college/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /college/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}