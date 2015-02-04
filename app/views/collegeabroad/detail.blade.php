<?php $breadcrumb_t = isset($collegeabroad_details->university_name) ? $collegeabroad_details->university_name : NULL;
// $breadcrumb_p = $course->college->college_name . ', ' . $course->college->city_name; 
//$college_detail_url=route('college',['slug' => Str::slug($course->college->college_name . '-' . $course->college->city_name),'id'=>$course->college->college_id]);
?>

@extends('layouts.main')
@section('content')
<!-- Row Start -->
<?php
if(isset($collegeabroad_details)){
 ?>
            <div class="row">
			 <!--Left Sidebar Starts-->
						<!--Left Sidebar End-->
            <div class="col-md-12">
				<div class="element_size_100">

                        <div class="course-detail">
                            <article>

                            	   <figure class="detail_figure">
                            	   	<div class="fadein">
								<img  src="{{ URL::asset('uploads/2014/01/01-stat-fort-uni-980x408.jpg') }}">
								<!-- <img  src="http://sevillespain.info/wp-content/uploads/2012/02/Casa-De-Carmona-Hotel-Seville-casa_de_carmona_galeria_mr_1200-500x332.jpg"> -->
								<img  src="{{ URL::asset('uploads/2014/01/02-stat-fort-uni-980x408.jpg') }}">
                <img  src="{{ URL::asset('uploads/2014/01/03-stat-fort-uni-980x408.jpg') }}">
                <img  src="{{ URL::asset('uploads/2014/01/06-stat-fort-uni-980x408.jpg') }}">
							
								
							</div>
                            	       
                            	   </figure>
                                 
                                

                               
                                	<div class="col-md-8 panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Courses Offered
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <?php $i=1; foreach ($data as $key => $value) { ?>
            
<div class="top">
  <div class="panel-group" id="accordionCourse" role="tablist" aria-multiselectable="true">
            <h4> <?php echo $value['name']; ?> </h4>
                         <ul><?php  foreach ($value['child'] as $key1 => $value1) {

                          ?>
                          
                         <li>
                          <div class="panel panel-default">
  
    <div class="panel-heading" role="tab" id="headingCourse<?php echo ++$i; ?>">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordionCourse" href="#collapseCourse<?php echo $i; ?>" aria-expanded="false" aria-controls="collapseCourse<?php echo $i; ?>">
          

    <b><?php echo $value1['name']." (".count($value1['child']).")"; ?> </b>  
        </a>
      </h4>
    </div>
    <div id="collapseCourse<?php echo $i; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingCourse<?php echo $i; ?>">
      <div class="panel-body">
       
       <div class="scrollable"> <ul>
       <?php foreach ($value1['child'] as $key2 => $value2) { ?>
                              <li><?php echo "=> ".$value2; ?></li>
                              <?php } ?>
        </ul>
      </div>
      </div>
    </div>


  </div>

                         
                         </li>

                         <?php } ?>
                       </ul>
                      
         </div>
        </div>
         <?php   } ?>         
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          

    University highlights   
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        <?php if(isset($collegeabroad_details->university_highlights)){ echo $collegeabroad_details->university_highlights; } ?>
      </div>
    </div>
  </div>
  <?php if(!empty($univ_campuses)){ ?>
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="univ_campus">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          University Campuses  
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="univ_campus">
      <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-striped table-bordered"><tr class="heading"><th width="80%">Campus Name</th><th>Address</th><th>URL</th></tr>
        <?php  
        foreach ($univ_campuses as $key_campus => $value_campus) {
         echo "<tr>";
         echo "<td>".$value_campus['campus_name']."</td>";
         echo "<td>".$value_campus['address']."</td>";
          echo "<td>".$value_campus['url']."</td>";
          echo "</tr>";
        }

        ?>
      </table>
    </div>
      </div>
    </div>
  </div>
 <?php } ?>
 

 
</div>
<div class="col-md-4">

  <div class="addmition-info">
       <h2 class="header">Contact Info</h2>
          <div class="text">
              <strong> Email : </strong>
              <span><?php echo $collegeabroad_details->email; ?> </span></br>
              <strong>Address : </strong>
              <span><?php echo $collegeabroad_details->address; ?> </span></br>
              <strong>Phone : </strong>
              <span><?php echo $collegeabroad_details->contact_no; ?> </span></br> 
              <strong>Website : </strong>
              <span><?php echo $collegeabroad_details->intl_website; ?> </span></br>                       
          </div>
   </div>
  <iframe src="https://www.google.com/maps/embed?pb=india" style="width:px;height:380px;" frameborder="0" style="border:0"></iframe>

</div>
                               
                                
                            </article>
                                                        <!-- Post tags Section -->
                           
                            <!-- Post tags Section Close -->
                            <!-- Comments Section Start -->
                                                        <!-- Comments Section Ends -->
                        </div>
                   </div>
             </div>
           
        </div>



<script>
$(function(){
  $('.fadein img:gt(0)').hide();
  setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 3000);
});
</script>
<?php }else{ echo "oops.... page does not exist"; } ?>
        @stop

