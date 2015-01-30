<?php

class MenuHelper {


    public static function getMenuHTML()
    {
        $items = Menu::getMenu();
        $html = '<ul id="menus">';
        foreach ($items as $item)
        {
            $html .= '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a href="';
            $html .= url($item['link']) . '">' . $item['name'];
            $html .= '</a>';
            if (isset($item['child']) && (is_array($item['child'])))
            {
                $html .= '<ul class="sub-menu">';

                foreach ($item['child'] as $child)
                {
                    $html .= '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"> <a href="';
                    if ((isset($child['is_abroad']) && ($child['is_abroad'] === true)))
                    {
                        $html .= route('courses.abroad', ['country' => $child['name']]) . '">' . $child['name'];
                    } else
                    {
                        if ((isset($child['child']) && (count($child['child'])>0))){
                            $html .= route('courses', ['slug' => Menu::menuSlug($item['name'] . '-' . $child['name']), 'id' => $child['id'], 'parent_cat_id' => $child['id']]) . '">' . $child['name'];
                        } else {
                            $html .= route('courses', ['slug' => Menu::menuSlug($item['name'] . '-' . $child['name']), 'id' => $child['id']]) . '">' . $child['name'];

                        }

                    }
                    $html .= '</a>';
                    if (isset($child['child']) && (is_array($child['child'])))
                    {
                        $html .= '<ul class="sub-menu">';

                        foreach ($child['child'] as $subchild)
                        {
                            $html .= '<li class="menu-item menu-item-type-post_type menu-item-object-page"> <a href="';

                            if ((isset($subchild['is_abroad']) && ($subchild['is_abroad'] === true)))
                            {
                                $html .= route('courses.abroad', ['country' => $child['name'], 'id' => $subchild['id'], 'slug' => Str::slug($subchild['name'])]) . '">' . $subchild['name'];
                            } else
                            {
                                $html .= route('courses', ['id' => $subchild['id'], 'slug' => Menu::menuSlug($item['name'] . '-' . $child['name'] . '-' . $subchild['name'])]) . '">' . $subchild['name'];
                            }
                            $html .= '</a>';

                            if (isset($subchild['child']) && (is_array($subchild['child'])))
                            {
                                $html .= '<ul class="sub-menu">';
                                foreach ($subchild['child'] as $subsubchild){
                                    $html .= '<li class="menu-item menu-item-type-post_type menu-item-object-page"> <a href="';
                                    $html .= route('courses.abroad', ['country' => $child['name'], 'id' => $subchild['id'],'parent_cat_id' => $subsubchild['id'], 'slug' => Str::slug($subchild['name'] .'-'. $subsubchild['name'])]) . '">' . $subsubchild['name'];
                                    $html .= '</a></li>';
                                }
                                $html .= '</ul>';
                            }

                            $html .= '</li>';
                        }
                        $html .= '</ul>';
                    }
                    $html .= '</li>';
                }
                $html .= '</ul>';
            }
            $html .= '</li>';
        }
        $html .= '</ul>';

        return $html;
    }


}