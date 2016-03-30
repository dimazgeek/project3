@extends('layouts.master')




@section('topic')
    
@stop


@section('content')
    <div class="row">
        <div class="col-sm-6">
            <strong>Generate User</strong><br/><br/>

             @if($errors->get('num'))
                <ul>
                    @foreach($errors->get('num') as $error)
                        <li><div class="alert alert-warning">{{ $error }}</div></li>
                    @endforeach
                </ul>
            @endif
	<form method="post" action="/people">
		<table>
		<tr>
			<td><label for="num">Number of People:</label>(max 10)
			<td><input type="text" name="num"></td>
                
		</tr>
		<tr>
			<td><label for="birthday">Include Birthday?</label></td>
			<td><input type="checkbox" name="birthday"/></td>
		</tr>
		<tr>
			<td><label for="profile">Include Profile?</label></td>
			<td><input type="checkbox" name="profile"/></td>
		</tr>
		</table>
		<button type="submit" class="btn btn-primary" value="Generate!"/>generate</button>
		<input type="hidden" name="_token" value="{{csrf_token()}}"/>
	</form>
        </div>
    </div>
@stop


