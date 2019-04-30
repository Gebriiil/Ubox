<?php
/**
 * Created by PhpStorm.
 * User: mallahsoft
 * Date: 3/6/19
 * Time: 12:11 PM
 */

if (!function_exists('ValueOf')) {

    function ValueOf($object, $lang, $variable)
    {
        if (isset($object->translate('' . $lang->lang)->$variable)) {
            $newVar = $object->translate('' . $lang->lang)->$variable;
        } else {
            $newVar = "";
        }
        return $newVar;
    }
}

if (!function_exists('my_lang')){
	function my_lang($lang)
	{
		if ($lang=='en') {
			return 'English';
		}
		if ($lang=='ar') {
			return 'Arabic';
		}
	}
}
if (!function_exists('image_name')){
	function image_name($file)
	{
		return time() . '.' . $file->getClientOriginalExtension();
	}
}
if (!function_exists('image_upload')){
	function image_upload($file,$image_name)
	{
		 $file->move(public_path('upload'),$image_name);
		 return true;
	}
}
if (!function_exists('aurl')) {
	function aurl($link)
	{
		return url( App::getLocale() . '/admin-panel/' . $link);
	}
}

