@extends('layouts.main')
<?php if ($course_name)
{
    $breadcrumb_t = $course_name->course_name;
} ?>

@section('content')

    <div class="row">
        <div class="col-md-9 ">
            <div class="rich_editor_text"></div>
            <div class="element_size_100">

                <header class="cs-heading-title">
                    <h2 class="cs-section-title float-left">View Courses</h2>
                </header>
                <div class="event eventlisting">

                    <?php
                    if(!empty($collegeList)){
                    for ($i = 0; $i < count($collegeList);$i++){
                    $detail_url = route('courses.detail', ['slug' => Str::slug($collegeList[$i]['college_name'] . '-' . $collegeList[$i]['course_name']), 'id' => $collegeList[$i]['course_id']]);
                    ?>

                    <article class="events type-events status-publish has-post-thumbnail hentry">
                        <figure>
                            <img src="<?php if ($collegeList[$i]['college_logo'] <> '')
                            {
                                echo $collegeList[$i]['college_logo'];
                            } else
                            {
                                echo asset('images/no-thumb.png');
                            }?>" width="78px" alt="<?php echo $collegeList[$i]['college_name']; ?>"
                                 title="<?php echo $collegeList[$i]['college_name']; ?>">

                        </figure>
                        <div class="text">
                            <div class="event-texttop">
                                <h2 class="cs-post-title">
                                    <a href="<?php echo $detail_url; ?>"
                                       class="colrhvr"><?php echo $collegeList[$i]['college_name']; ?></a>
                                </h2>
                                <h6><?php echo $collegeList[$i]['city_name']; ?>
                                </h6>
                                <ul class="post-categories">
                                    <li><a href="<?php echo $detail_url; ?>"
                                           rel="tag"><?php echo $collegeList[$i]['course_name']; ?></a></li>
                                    <li>
                                        <time><?php  echo General::giveStars($collegeList[$i]['college_rating']);?></time>
                                    </li>
                                </ul>
                            </div>
                            <div class="post-options">
                                <ul>
                                    <li>
                                        <i class="fa fa-clock-o"></i><strong>Duration:</strong><span> <?php if ($collegeList[$i]['duration'] <> '')
                                            {
                                                echo $collegeList[$i]['duration'];
                                            } else if ($collegeList[$i]['course_duration'] <> '')
                                            {
                                                echo $collegeList[$i]['course_duration'];
                                            }?></span></li>

                                    <?php if ($collegeList[$i]['exam_required'] <> '')
                                    {
                                        echo '<li><i class="fa fa-qrcode"></i><strong>Exam:</strong> <span>' . substr($collegeList[$i]['exam_required'], 0, 100) . ' </span></li>';
                                    } ?>
                                    <?php if ($collegeList[$i]['total_fee'] <> '')
                                    {
                                        echo '<li><i class="fa fa-money"></i><strong>Fee:</strong> <span><i class="fa fa-inr"></i>' . $collegeList[$i]['total_fee'] . ' </span></li>';
                                    } ?>
                                    <?php if ($collegeList[$i]['affiliation'] <> '')
                                    {
                                        echo '<li><i class="fa fa-paperclip"></i><strong>Affiliation:</strong> <span>' . strip_tags($collegeList[$i]['affiliation']) . ' </span></li>';
                                    } ?>


                                </ul>
                            </div>
                            <a href="<?php echo $detail_url; ?>" class="btn cs-bgcolr bgcolr view">Details</a>

                        </div>


                    </article>


                    <?php } } ?>


                </div>
                {{ $courseColleges->links() }}


            </div>
        </div>


        <aside class="col-md-3">
    <div class="widget">
        <div class="course_filters">
            <form action="">
            <h4>Location</h4>
            <?php
            $checked='';
            $checked1=array();
            
            
            
            foreach ($city as $key => $value) {
            if(!empty($_GET['location'])){
                if(in_array("all", $_GET['location'])) {
                    $checked="checked";
                    }
                 if(in_array($value->city_name, $_GET['location'])) {
                        $checked1[$value->city_name]="checked";
                 }
                 else{
                    $checked1[$value->city_name]='';
                 }
                }
                 else{
                    $checked1[$value->city_name]='';
                 }
            }
        
            

        
            ?>
            <ul class="category_filter">
                <li>
                    <input id="checkall" type="checkbox" <?php echo $checked; ?> class="bp-course-category-filter" name="location[]" value="all"> 
                    <label for="technology">All</label>
                </li>
               
                <?php
                foreach ($city as $c_key => $c_value) {
                    
            
                 ?>
                <li>
                    <input id="" type="checkbox" <?php echo $checked1[$c_value->city_name]; ?> class="chkbox bp-course-category-filter" name="location[]" value="<?php echo $c_value->city_name; ?>"> 
                    <label for="technology"><?php echo $c_value->city_name; ?></label>
                </li>
                <?php } ?>
                
            </ul>
            
            <h4>Total Fees(INR)</h4>
            <?php
            $radiochecked1='';
            $radiochecked2='';
            $radiochecked3='';
            if(!empty($_GET['fees'])) {
            
            if($_GET['fees']=='100000') {
                    $radiochecked1="checked";
            }
            if($_GET['fees']=='200000') {
                    $radiochecked2="checked";
            }
            if($_GET['fees']=='500000') {
                    $radiochecked3="checked";
            }
        }
        
            ?>
            <ul class="type_filter">
                <li>
                    <input id="all" type="radio" <?php echo $radiochecked1; ?> class="bp-course-free-filter" name="fees" value="100000"> 
                    <label for="all">Maximum 1 Lakh</label>
                </li>
                <li>
                    <input id="free" type="radio" <?php echo $radiochecked2; ?> class="bp-course-free-filter" name="fees" value="200000">
                     <label for="free">Maximum 2 Lakh</label>
                </li>
                <li>
                    <input id="paid" type="radio" <?php echo $radiochecked3; ?> class="bp-course-free-filter" name="fees" value="500000"> 
                    <label for="paid">Maximum 5 Lakh</label>
                </li>
            </ul>

            
            <input type="submit" id="submit_filters" name="submit_filters" value="Filter" class="btn btn-default" />
            </form>
        </div>
    </div>

    </div>
    <!-- Row End -->
       

@stop