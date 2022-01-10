<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Session;
use Datatables;
use DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('user_access')) {
            return abort(401);
        }
		
     return view('admin.news.index');
    }
	
  public function datatable_content()
    { 
	 if (! Gate::allows('user_access')) {
            return abort(401);
        }
	 $users =DB::table('fantasy_news')->where('is_delete',0)->get();
	
	    return Datatables::of($users)
           ->addColumn('action', function ($users){return view('admin.button.news', compact('users'))->render();}) ->make(true);
		  /*  ->addColumn('id',function ($user)  {
            return ''; 
        })  */
		
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('user_create')) {
            return abort(404);
        }
       
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('user_create')) {
            return abort(401);
        }
		
		/* $this->validate($request, [
    'name' => 'required|unique:fantasy_news',
    'news_team_length' => 'required',
    'is_recommended' => 'required',
    'is_multi_entry' => 'required',
    'is_confirm_news' => 'required',
    'is_practise_news' => 'required',
   
]); */
	

 
	$news =New News;
	$news->title =$request->title;
	$news->description =$request->description;
	$news->created_by =Auth::user()->id;
	$news->is_active =1;
	$news->is_delete =0;
	$news->save();
	
	if($news)
	{
		Session::flash('success','News Created Successfully');
	}
	else{
		Session::flash('error','Something Went Wrong');
	    }
	 
     return redirect()->route('admin.news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       if (! Gate::allows('user_view')) {
            return abort(401);
        }
		$news=DB::table('fantasy_news')
			->whereis_delete(0)
            ->first();
		
      /* $news=news::whereid($id)->first();
      $category=newsCategory::whereid($id)->first(); */
	  
		
         return view('admin.news.show',compact('news'));
    }

		
      /* $news=news::whereid($id)->first();
		
         return view('admin.news.show',compact('news'));
    } */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }
		
		
			
			/* print_r($news);
		    exit; */
		$news=News::whereid($id)->first();
		
         return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }
			/* $this->validate($request, [
    'name' => 'required',
    'news_team_length' => 'required',
    'is_recommended' => 'required',
    'is_multi_entry' => 'required',
    'is_confirm_news' => 'required',
    'is_practise_news' => 'required',
   
]); */
	

    $news =News::findorFail($id);
	$news->title =$request->title;
	$news->description =$request->description;
	$news->updated_by =Auth::user()->id;
	$news->is_active =1;
	$news->is_delete =0;
	$news->save();
	
	if($news)
	{
		Session::flash('success','News Updated Successfully');
	}
	else{
		Session::flash('error','Something Went Wrong');
	    }
		 return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
	
	public function news_delete(Request $request)
	{
	 $id=$request->delete_id;
		
		$delete=News::whereid($id)->update([
		'is_delete' =>1,
		'is_active' =>0,
		'deleted_by' =>Auth::user()->id,
		]);
		if($delete)
		
	{
		Session::flash('success','News Deleted Successfully');
		
	}
	else
	{
		Session::flash('error','Something Went Wrong');
		
	}	
			return back();
	}
	
public function news_active(Request $request)
	{
	 $id=$request->active_id;
		$exist=News::whereid($id)->first();
		if(	$exist->is_active==1)
		{
		$active=News::whereid($id)->update([
		'is_active' =>0,
		'updated_by' =>Auth::user()->id,
		]);
		Session::flash('info','News Deactived Successfully');
		}
		else
		{
			$active=News::whereid($id)->update([
		'is_active' =>1,
		'updated_by' =>Auth::user()->id,
		]);
		Session::flash('success','News Actived Successfully');
		}
		
			return back();
	}
}
