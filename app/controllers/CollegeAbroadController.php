<?php

class CollegeAbroadController extends \BaseController {

    /**
     * Display a listing of the resource.
     * GET /college
     *
     * @return Response
     */
    public function index($id, $slug = NULL)


    {

        //return $college_details=College::where('college_id', '=', $id)->with('courses')->get()->toArray();
         $collegeabroad_details = AbroadUniversity::where('univ_id', '=', $id)->first();
            $univ_campuses = array() ;
            $courseGroup = array();

            $data=array();
            $data1=array();
            if($collegeabroad_details){
          $i = 0;
        
        foreach ($collegeabroad_details->campuses as $campuse)
        {
            $univ_campuses[$i]['campus_name'] = isset($campuse->campus_name) ? $campuse->campus_name : NULL;
            $univ_campuses[$i]['address'] = isset($campuse->address) ? $campuse->address : NULL;
            $univ_campuses[$i]['url'] = isset($campuse->url) ? $campuse->url : NULL;
           
            $i++;
        }
       
        
        foreach ($collegeabroad_details->courses as $item)
        {
            if($item->parent_course_id!=0){
            $courseGroup[] = ['id' => $item->course_id, 'name' => $item->course_name, 'parent' => self::CourseGroupList($item->parent_course_id)];
        }
        else{
            //$courseGroup[] = ['id' => $item->course_id, 'name' => $item->course_name];
        }
    }

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
        }
        
         return View::make('collegeabroad.detail', compact('collegeabroad_details','data','univ_campuses'));
}
    
     public static function CourseGroupList($parent_id)
    {
        $items = AbroadCourse::where('course_id', '=', $parent_id)->orderBy('sort', 'DESC')->get();
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