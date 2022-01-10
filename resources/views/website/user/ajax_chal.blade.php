<div class="form-group">
					  <label class="col-md-3 control-label">Select Contest</label>  
					  <div class="col-md-9 inputGroupContainer">
					  <div class="input-group">
					<select name="contest_id" class="form-control">
					<option value="">Select Contest </option>
					@foreach($contest_category as $c_cat)
					<option value="{{$c_cat->id}}">{{$c_cat->name}} </option>@endforeach
					
					
					</select>
					
						
						</div>
					  </div>
					</div>