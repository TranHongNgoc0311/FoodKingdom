<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	public function index()
	{
		return view('Backend.index');
	}

	public function file()
	{
		return view('Backend.file');
	}

	public function iframeUrlSetting(Request $request){
		$url = "https://www.facebook.com/plugins/page.php?href=".$request->url."&tabs&width=340&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=243290366622732";
		config(['url.iframeUrl' => $url]);
		$fp = fopen(base_path() .'/config/url.php' , 'w');
		fwrite($fp, '<?php return ' . var_export(config('url'), true) . ';');
		fclose($fp);
		return back()->with('success','Thiết lập thành công.');
	}
}
