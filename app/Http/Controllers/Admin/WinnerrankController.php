<?php



namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;

use App\WinnerLength;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Auth;

use Session;

use Datatables;	

use DB;



class WinnerrankController extends Controller

{

    

	public function index()

    {
		
		$winners=WinnerLength::wherestatus(0)->orderby('team_length','asc')->get();

       return view('admin.winner_rank.index',compact('winners'));

    

    

    }

	

	public function datatable_content()

    { 

	 if (! Gate::allows('matches_access')) {

            return abort(401);

        }

	 $users = DB::table('winner_lengths')

	         
			 ->where('status', '=', 0)

			 ->get();

			 

	

						  

				

	return Datatables::of($users)

           ->addColumn('action', function ($users){return view('admin.button.winner_rank', compact('users'))->render();}) ->make(true);

		

		

    }
	
	public function create()
	{
	
	
	
	return view('admin.winner_rank.create');
	
	}
	
	
	public function rank(Request $request)
	{
		
	
	 $n_winner=$request->no_of_winner;
	
	return view('admin.winner_rank.rank_view',compact('n_winner')); 
	
	
	}
	
	
	public function store(Request $request)
	{
		
		$this->validate($request,[
    'team_length' => 'unique:winner_lengths',
    
]);
		
	
	
	$rank=json_encode($request->rank);
	$amount=json_encode($request->amount);
	$data=new WinnerLength;
	$data->team_length=$request->team_length;
	$data->position=$rank;
	$data->rank_amount=$amount;
	$data->status=0;
	$data->save();
	return redirect('admin/winner_rank');
	
	
	
	
	
	
	
	
	
	
	
	
	}
	
	public function edit($id)
	{
	
	$data=WinnerLength::findorfail($id);
	return view('admin.winner_rank.edit',compact('data'));
	
	
	}
	
	public function update(Request $request,$id)
	{
	$data=WinnerLength::findorfail($id);
	
	$rank=json_encode($request->rank);
	$amount=json_encode($request->amount);
	
	$data->team_length=$request->n_winners;
	$data->position=$rank;
	$data->rank_amount=$amount;
	$data->status=0;
	$data->save();
	return redirect('admin/winner_rank');
	
	
	
	}

	

	public function destroy($id)
	{
	
	$data=WinnerLength::findorfail($id);
	$data->status=1;
	$data->save();
	return back();
	
	}

	

}

