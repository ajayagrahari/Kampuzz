<?php
echo '<ul>';
$items = Menu::subMenu(0);
foreach ($items as $item)
{
    echo '<li class="cat-item"> <a href="';
    echo route('courses', ['slug' => Menu::menuSlug($item['name']), 'id' => $item['id']]) . '">' . $item['name'];
    echo '</a></li>';
}
echo '</ul>';