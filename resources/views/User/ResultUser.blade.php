@extends('layouts.master')



@section('topic')
    
@stop
@section('content')
	
	 <div class="row">
       <div class="col-sm-9">
	@for($i = 0; $i < $num; $i++)
		<ul>
        
		<li>{{$names[$i]}}</li>
        
		@if($birthdays)
        <div class="col-xs-8 col-sm-6">
			<li>{{$birthdays[$i]}}</li>
        </div>
		@endif
		@if($profiles)
            <div class="col-xs-4 col-sm-6">
			<li>{{$profiles[$i]}}</li>
            </div>
		@endif
		<hr/>
		</ul>
	@endfor
    </div>
	</div>
	
@stop
@section('home')
    <a href="/" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-home"></span> Home</a>
@stop