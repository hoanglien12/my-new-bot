<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SiteConfig;
use App\Models\Order;
use App\Http\Requests\AdminSiteConfigRequest;
use App\Http\Requests\AdminEditSiteConfigRequest;



class SiteConfigController extends Controller
{
    function __construct()
    {
    	$this->config             = new SiteConfig();
        view()->share('orders_waiting',count(Order::where('status',1)->get()));
        

    }
    public function index(Request $request)
    {
        $request->flash();
        $label          = $request->input('label');
        $type           = $request->input('type');
        $begin_date     = $request->input('begin_date');
        $end_date       = $request->input('end_date');
        $configs        = $this->config->getAllConfigs($label,$type, $begin_date, $end_date)->get();
        $count_configs  = count($configs);
    	// dd($configs);
    	return view('admin.site-config.index',compact('configs','count_configs','type','orders_waiting'));
    }

    public function add()
    {
    	return view('admin.site-config.create',compact('orders_waiting'));
    }

    public function store(AdminSiteConfigRequest $request){
    	// dd($request->type);
        $store    		= SiteConfig::create([
            'label'     => $request->label,
            'value' 	=> $request->value,
            'type'		=> $request->type	
        ]);
        // dd($store);
        if (!$store) {
            $request->session()->flash('warning','Insert ' .$request->label. ' fail');
        }
        else
        {
            $request->session()->flash('success','Insert ' .$request->label. ' successfully');
        }
        return redirect()->route('site_config.index');
    }

    public function edit($id){
        $site_config = SiteConfig::findOrFail($id);
        $type 		 = $site_config->type;
                // dd($site_config->type);
        return view('admin.site-config.edit', compact('site_config','type','orders_waiting'));
    }

    public function update(AdminEditSiteConfigRequest $request,$id){
        $request->flash();
        $update      = SiteConfig::findOrFail($id);
        $update->update([
            'label'     => $request->label,
            'value' 	=> $request->value,
            'type'		=> $request->type
        ]);
        if(!$update){
            $request->session()->flash('warning','Update fail');
        }
        else{
            $request->session()->flash('success','Update ' .$request->label. ' successfully');
        }
        return redirect()->route('site_config.index');
    }

    public function delete(Request $request,$id){
        $request->flash();
        $site_config       = SiteConfig::where('id', $id)->get();
        $countSite_config  = count($site_config);
        // dd($countDogs);
        $delete = SiteConfig::findOrFail($id);
        $delete->delete();
        if (!$delete) {
            // dd(1);
            $request->session()->flash('warning', 'Delete fail');
        }
        else
        {
            $request->session()->flash('success', 'Delete ' .$delete->label. ' successfully!');
        }
        
        return redirect()->route('site_config.index');
    }
}
