  
  @for($i=0;$i<$n_winner;$i++)
  <div class="row">

                <div class="col-xs-6 form-group">

                    {!! Form::label('rank', 'Rank*', ['class' => 'control-label']) !!}

                    {!! Form::text('rank[]',$i+1, ['class' => 'form-control ','readonly'=>'readonly', 'placeholder' =>' ']) !!}

                    <p class="help-block"></p>

                    @if($errors->has('rank'))

                        <p class="help-block">

                            {{ $errors->first('rank') }}

                        </p>

                    @endif

                </div>   
				
				<div class="col-xs-6 form-group">

                    {!! Form::label('amount', 'Amount percentage*', ['class' => 'control-label']) !!}

                    {!! Form::text('amount[]', old('amount'), ['class' => 'form-control','id'=>'amt','placeholder' =>' ']) !!}

                    <p class="help-block"></p>

                    @if($errors->has('amount'))

                        <p class="help-block">

                            {{ $errors->first('amount') }}

                        </p>

                    @endif

                </div>

            </div>
			
			@endfor
			
			
			
			
			
			
			