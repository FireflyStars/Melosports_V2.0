  <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped datatable">
                <thead>
                    <tr>
                        <th>S No</th>
                        <th>Contest</th>
                        <th>Prize Amount</th>
                        <th>Enterenece Amount</th>
                        <th>Team Length</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <div class="delete-content">
                <tbody id="refresh">
              <?php $i=1; ?>
                        @foreach ($particular as $match_list)
						  <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $match_list->name }}</td>
                                <td>{{ $match_list->winning_pirze }}</td>
                                <td>{{ $match_list->enterence_amount }}</td>
                                <td>{{ $match_list->contest_team_length }}</td>
                                <td>
								 
								
								
								  <i  id="<?php echo $match_list->id ; ?>" class="fa fa-trash trash "></i>
                                </td>
                            </tr>
                        @endforeach
                  
                </tbody>
            </table>
        </div>
		</div>
    </div>
	
	
	
	
<script type="text/javascript">
	$(".trash").click(function(e){
   var del_id = $(this).attr('id');
   var rowElement = $(this).parent().parent(); //grab the row
   var whichtr = $(this).closest("tr");

  //  alert('worked'); // Alert does not work
    whichtr.remove(); 
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   $.ajax({
            type:'POST',
            url:'delete-customize-contest',
           // data: {delete_id : del_id},
			data: {
        "_token": "{{ csrf_token() }}",
        "delete_id" : del_id
        },
            success:function(data) {
              //  if ( data.status === 'success' ) {
              //  toastr.success( msg.msg );
               //$('#refresh').load(document.URL +  ' #refresh');
				
          //  }
            }
    });
    });
	</script>