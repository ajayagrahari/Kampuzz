<?php

$citylist = City::groupBy('city_group')->orderBy('k_city_id')->take(10)->skip(0)->get() ;
	
?>
	<div class="widget">
		<div class="course_filters">
			<header class="cs-heading-title">
				<h2 class="cs-section-title">Filters</h2>
			</header>
			<form action="">
			<h4>Location</h4>
			<?php
            $checked='';
            $checked1=array();
            
            
            
            foreach ($citylist as $key => $value) {
            if(!empty($_GET['location'])){
                if(in_array("all", $_GET['location'])) {
                    $checked="checked";
                    }
                 if(in_array($value->city_group, $_GET['location'])) {
                        $checked1[$value->city_group]="checked";
                 }
                 else{
                    $checked1[$value->city_group]='';
                 }
                }
                 else{
                    $checked1[$value->city_group]='';
                 }
            }
        
            

        
            ?>
			<ul class="category_filter">
				<li>
					<input id="checkall" type="checkbox" <?php echo $checked; ?> class="bp-course-category-filter" name="location" value="all"> 
					<label for="technology">All</label>
				</li>
				
				<?php
					foreach($citylist as $key=>$city) {
				?>
				<li>
					<input id="city_<?php echo $key ?>" type="checkbox" <?php echo $checked1[$city->city_group]; ?> class="chkbox bp-course-category-filter" name="location[]" value="<?php echo $city->city_group ?>"> 
					<label for="technology"><?php echo $city->city_group ?></label>
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
            if($_GET['fees']=='300000') {
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
					<input id="paid" type="radio" <?php echo $radiochecked3; ?> class="bp-course-free-filter" name="fees" value="300000"> 
					<label for="paid">Maximum 3 Lakh</label>
				</li>
			</ul>


			<h4>Specialization</h4>
			<ul class="type_filter">
				<li>
					<input id="all" type="radio" class="bp-course-free-filter" name="specialization" value=""> 
					<label for="all">Any</label>
				</li>
				<?php foreach($specialization_filter as $key=>$specialization) { ?>
				
				<li>
					<input 	id="specialization_<?php echo $key ?>" 
							type="radio" 
							class="bp-course-free-filter" 
							name="specialization" 
							value="<?php echo $specialization['specialization_name'] ?>">
					 <label for="specialization_<?php echo $key ?>" >
					 	<?php echo $specialization['specialization_name'] ?>
					 </label>
				</li>
				<?php } ?>
			</ul>

			<input type="submit" id="submit_filters" name="submit_filters" value="Filter" class="btn btn-info btn-btn-sm" />
		    </form>
		</div>
	</div>

 <script>
            
                $("#checkall").on('click',function() {
                    $('.chkbox').prop('checked', this.checked);
                });
            
        </script>