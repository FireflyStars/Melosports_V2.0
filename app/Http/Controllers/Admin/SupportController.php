<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use DB;
use Datatables;
use App\Support;
use Session;

class SupportController extends Controller
{
	
	
public function contact_us()
{
	
		
		 $contact_us = Support::wherename('contact_us')->first();

        return view('admin.support.contactus', compact('contact_us'));
	
}


public function contact_us_update(Request $request)
{
	 
		$this->validate($request, [
       
        'meta_title' => 'required',
        'meta_keywords' => 'required',
        'meta_description' => 'required',
     
        
    ]);
		$input=$request->all(); 
	
	$update=DB::table('supports')->wherename('contact_us')->update([
	
	'page_info'=>$input['page_info'],
	'meta_title'=>$input['meta_title'],
	'meta_keywords'=>$input['meta_keywords'],
	'meta_description'=>$input['meta_description'],
	 'updated_by' => Auth::user()->id,
	 'created_by' => Auth::user()->id
	]);
	 if($update)
	 {
		 session::flash('success','Information Updated Successfully!!!');
	 }
	 else{
		 		 session::flash('warning','No Change in Content!!!');
	 }
	
        return back(); 
	
}



public function about_us()
{
	
		
		 $about_us = Support::wherename('about_us')->first();

        return view('admin.support.aboutus', compact('about_us'));
	
}


public function about_us_update(Request $request)
{
	 
		$this->validate($request, [
       
        'meta_title' => 'required',
        'meta_keywords' => 'required',
        'meta_description' => 'required',
     
        
    ]);
		$input=$request->all(); 
	
	$update=DB::table('supports')->wherename('about_us')->update([
	
	'page_info'=>$input['page_info'],
	'meta_title'=>$input['meta_title'],
	'meta_keywords'=>$input['meta_keywords'],
	'meta_description'=>$input['meta_description'],
	 'updated_by' => Auth::user()->id,
	 'created_by' => Auth::user()->id
	]);
	 if($update)
	 {
		 session::flash('success','Information Updated Successfully!!!');
	 }
	 else{
		 		 session::flash('warning','No Change in Content!!!');
	 }
	
        return back(); 
	
}

public function index()
    {
       return view('admin.enquiry.index');
    
    
    }
	
	public function datatable_content()
    { 
	 if (! Gate::allows('matches_access')) {
            return abort(401);
        }
	 $users =DB::table('fantasy_enquiry')->get();
						  
						  
	return Datatables::of($users)
           ->addColumn('action', function ($users){return view('admin.button.enquiry', compact('users'))->render();}) ->make(true);
		
		
    }
	
	public function show($id)
    {
        $matches=DB::table('fantasy_enquiry')
		         ->whereid($id)
			     ->first();
         return view('admin.enquiry.show',compact('matches'));
    }



}
