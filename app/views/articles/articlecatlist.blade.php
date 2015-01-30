

<div class="widget widget_categories">
	<header class="cs-heading-title">
		<h2 class="cs-section-title">Government Jobs</h2>
	</header>    

	<ul>
	<?php foreach($catlist as $key=>$cat) { 
		$article_url = route('article',['id' => $cat->cat_id] );
	 ?>

  		<li class="cat-item">
  			<a href="<?php echo $article_url ; ?>">
  				<?php echo $cat->cat_name  ?>
  			</a>
  		</li>
  	<?php } ?>
	</ul>

</div>
