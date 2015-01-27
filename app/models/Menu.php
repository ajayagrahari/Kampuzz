<?php

class Menu {

    public static $countries = [
        ['name' => 'USA', 'code' => 'us'],
        ['name' => 'UK', 'code' => 'uk'],
        ['name' => 'Canada', 'code' => 'ca'],
        ['name' => 'Australia', 'code' => 'au'],
        ['name' => 'Germany', 'code' => 'ga'],
        ['name' => 'Singapore', 'code' => 'sg'],
        ['name' => 'New Zealand', 'code' => 'nz']
    ];

    public static function getMenu()
    {
        $menu[] = ['name' => 'Home', 'link' => '/'];
        $menu[] = array('name' => 'All Courses', 'link' => 'courses', 'child' => self::subsubMenu(0));
        $menu[] = array('name' => 'Management', 'link' => 'courses/management-104', 'child' => self::subMenu(104));
        $menu[] = array('name' => 'Engineering', 'link' => 'courses/science-engineering-1', 'child' => self::subMenu(1));
        $menu[] = array('name' => 'Study Abroad', 'link' => 'courses/abroad/USA', 'child' => self::subMenuAbroad());

        return $menu;
    }

    public static function subMenu($parent_id)
    {
        $items = Course::where('parent_course_id', '=', $parent_id)->orderBy('sort', 'DESC')->get();
        $submenu = array();
        foreach ($items as $item)
        {
            $submenu[] = ['id' => $item->course_id, 'name' => $item->course_name];
        }

        return $submenu;
    }

    public static function subsubMenu($parent_id)
    {
        $items = Course::where('parent_course_id', '=', $parent_id)->orderBy('sort', 'DESC')->get();
        $submenu = array();
        foreach ($items as $item)
        {
            $submenu[] = ['id' => $item->course_id, 'name' => $item->course_name, 'child' => self::subMenu($item->course_id)];
        }

        return $submenu;
    }

    public static function subMenuAbroad()
    {
        $submenu = array();
        $countries = self::$countries;
        foreach ($countries as $country)
        {
            $submenu[] = ['name' => $country['name'], 'is_abroad' => true, 'child' => self::subMenuAbroadItems()];
        }

        return $submenu;
    }

    public static function subMenuAbroadItems($id=0)
    {
        $items = AbroadCourse::where('parent_course_id', '=', $id)->orderBy('course_id', 'ASC')->get();
        $submenu = array();

        foreach ($items as $item)
        {
            $submenu[] = ['id' => $item->course_id, 'name' => $item->course_name, 'is_abroad' => true, 'child'=>self::subsubMenuAbroadItems($item->course_id)];
        }

        return $submenu;
    }

    public static function subsubMenuAbroadItems($id=0)
    {
        $items = AbroadCourse::where('parent_course_id', '=', $id)->orderBy('course_id', 'ASC')->get();
        $submenu = array();

        foreach ($items as $item)
        {
            $submenu[] = ['id' => $item->course_id, 'name' => $item->course_name, 'is_abroad' => true];
        }

        return $submenu;
    }
    public static function menuSlug($str)
    {
        return Str::slug(str_replace('All Courses', '', $str));
    }

}