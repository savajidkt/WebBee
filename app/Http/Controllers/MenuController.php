<?php


namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Routing\Controller as BaseController;

class MenuController extends BaseController
{
    /**
     * SAMPLE RESPONSE:
     *
     *
     */

    public function getMenuItems() {
        //throw new \Exception('implement in coding task 3');
    	$menuArray=array();
        $pmenu = DB::table('menu_items')where('parent_id', '=', 0)->get();
        foreach ($pmenu as $key => $menu) {
        	$menuArray[$key]['id']=$menu->id;
        	$menuArray[$key]['name']=$menu->name;
        	$menuArray[$key]['url']=$menu->url;
        	$menuArray[$key]['parent_id']=$menu->parent_id;
        	$menuArray[$key]['created_at']=$menu->created_at;
        	$menuArray[$key]['updated_at']=$menu->updated_at;
        	$submenu = DB::table('menu_items')where('parent_id', '=',$menu->id)->get();
        	$submenuArray=array();
        	foreach ($submenu as $key1 => $smenu) {
        		$submenuArray[$key1]['id']=$menu->id;
	        	$submenuArray[$key1]['name']=$menu->name;
	        	$submenuArray[$key1]['url']=$menu->url;
	        	$submenuArray[$key1]['parent_id']=$menu->parent_id;
	        	$submenuArray[$key1]['created_at']=$menu->created_at;
	        	$submenuArray[$key1]['updated_at']=$menu->updated_at;

        	}
			$menuArray[$key]['children']=$submenuArray;
        }

        return response()->json(['menu' =>$menuArray]);
    }
}
