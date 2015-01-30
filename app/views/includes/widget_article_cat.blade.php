 
<?php

$items = ArticleCat::where('show_nav','=',1)->where('parent_id','=',0)->get() ;

?>

<ul>
     <?php foreach($items as $key=>$cat) { 
     	$article_url = route('article',['id' => $cat->cat_id] );
      ?>

          <li class="cat-item">
               <a href="<?php echo $article_url; ?>">
                    <?php echo $cat->cat_name  ?>
               </a>
          </li>
     <?php } ?>
</ul>