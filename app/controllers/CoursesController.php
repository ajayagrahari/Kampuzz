<?php
use \Input ;
class CoursesController extends BaseController {

    public function __construct()
    {
        parent::__construct();
    }

    public function index($id, $slug = NULL, $parent_cat_id = NULL)
    {
        $location = Input::get('location') ;
        $fees = Input::get('fees') ;
        //$selected_city=isset($location)?$location:NULL;

        $course_name = Course::where('course_id', '=', $id)->first();
        if ((int)$parent_cat_id > 0)
        {
            $child_courses = Course::where('parent_course_id', '=', $parent_cat_id)->get()->toArray();
        } else
        {
            $child_courses = Course::where('course_id', '=', $id)->get()->toArray();
        }
        foreach ($child_courses as $child_course)
        {
            $arr[] = $child_course['course_id'];
        }

          $query = Course::whereIn('courses.parent_course_id', $arr)
                            ->join('college_master','college_master.college_id','=','courses.college_id') 
                            ->join('course_details','course_details.course_id','=','courses.course_id');
        
        if($location) {
            
            $query->whereIn('college_master.city_name', $location) ;
        }
        if($fees){
           
            $query->where('course_details.total_fee','<=',$fees) ;
        }
        
        $courseColleges  = $query->groupBy('courses.college_id')
                                 ->paginate(Config::get('view.results_per_page'));

            
            
        $i = 0;
        foreach ($courseColleges as $courseCollege)
        {
            $collegeList[$i]['course_id'] = isset($courseCollege->course_id) ? $courseCollege->course_id : NULL;
            $collegeList[$i]['course_name'] = isset($courseCollege->course_name) ? $courseCollege->course_name : NULL;
            $collegeList[$i]['has_detail'] = isset($courseCollege->has_detail) ? $courseCollege->has_detail : NULL;
            $collegeList[$i]['course_duration'] = isset($courseCollege->detail->course_duration) ? $courseCollege->detail->course_duration : NULL;
            $collegeList[$i]['duration'] = isset($courseCollege->duration) ? $courseCollege->duration : NULL;
            $collegeList[$i]['college_id'] = isset($courseCollege->college->college_id) ? $courseCollege->college->college_id : NULL;
            $collegeList[$i]['college_logo'] = isset($courseCollege->college->college_logo) ? $courseCollege->college->college_logo : NULL;
            $collegeList[$i]['college_name'] = isset($courseCollege->college->college_name) ? $courseCollege->college->college_name : NULL;
            $collegeList[$i]['college_rating'] = isset($courseCollege->college->college_rating) ? $courseCollege->college->college_rating : NULL;
            $collegeList[$i]['college_address'] = isset($courseCollege->college->college_address) ? $courseCollege->college->college_address : NULL;
            $collegeList[$i]['city_name'] = isset($courseCollege->college->city_name) ? $courseCollege->college->city_name : NULL;
            $collegeList[$i]['exam_required'] = isset($courseCollege->detail->exam_required) ? $courseCollege->detail->exam_required : NULL;
            $collegeList[$i]['total_fee'] = isset($courseCollege->detail->total_fee) ? $courseCollege->detail->total_fee : NULL;
            $collegeList[$i]['affiliation'] = isset($courseCollege->detail->affiliation) ? $courseCollege->detail->affiliation : NULL;
            $i++;
        }
        
       
        $city=City::take(5)->get();
        return View::make('courses.index', compact('courseColleges', 'collegeList', 'course_name','city'));
    }


    public function detail($id, $slug = NULL)
    {
        $course = Course::where('course_id', '=', $id)->first();

        return View::make('courses.detail', compact('course'));
    }


}
