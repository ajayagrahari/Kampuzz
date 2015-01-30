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
		 $college_details = College::where('college_id', '=', $id)->first();
		
		  $i = 0;
        $collegeFeature = [] ;
        foreach ($college_details->features as $feature)
        {
            $collegeFeature[$i]['feature_title'] = isset($feature->feature_title) ? $feature->feature_title : NULL;
            $collegeFeature[$i]['feature_content'] = isset($feature->feature_content) ? $feature->feature_content : NULL;
           
            $i++;
        }
        $j = 0;
        $collegeCourse = [] ;
        foreach ($college_details->courses as $course)
        {
            $collegeCourse[$j]['course_id'] = isset($course->course_id) ? $course->course_id : NULL;
            $collegeCourse[$j]['course_name'] = isset($course->course_name) ? $course->course_name : NULL;
            $collegeCourse[$j]['course_duration'] = isset($course->course_duration) ? $course->course_duration : NULL;
           
            $j++;
        }
        // echo "<pre>";
        // print_r($collegeCourse);
        // exit();
		 return View::make('college.detail', compact('college_details','collegeCourse','collegeFeature'));
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