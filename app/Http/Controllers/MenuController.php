<?php


namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
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
        $pmenu = DB::table('menu_items')->where('parent_id', '=',NULL)->get();
        foreach ($pmenu as $key => $menu) {
        	$menuArray[$key]['id']=$menu->id;
        	$menuArray[$key]['name']=$menu->name;
        	$menuArray[$key]['url']=$menu->url;
        	$menuArray[$key]['parent_id']=$menu->parent_id;
        	$menuArray[$key]['created_at']=$menu->created_at;
        	$menuArray[$key]['updated_at']=$menu->updated_at;
        	$submenu = DB::table('menu_items')->where('parent_id', '=',$menu->id)->get();
        	$submenuArray=array();
        	foreach ($submenu as $key1 => $smenu) {
        		$submenuArray[$key1]['id']=$smenu->id;
	        	$submenuArray[$key1]['name']=$smenu->name;
	        	$submenuArray[$key1]['url']=$smenu->url;
	        	$submenuArray[$key1]['parent_id']=$smenu->parent_id;
	        	$submenuArray[$key1]['created_at']=$smenu->created_at;
	        	$submenuArray[$key1]['updated_at']=$smenu->updated_at;

        	}
			$menuArray[$key]['children']=$submenuArray;
        }

        return response()->json($menuArray);
    }
}
