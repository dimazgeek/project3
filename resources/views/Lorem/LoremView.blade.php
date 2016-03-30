@extends('layouts.master')


@section('title')
 test    
@stop



@section('head')
    
@stop


@section('content')
     
    <div class="row">
        <div class="col-sm-6">
            <strong>Lorem Ipsum Generator</strong><br/><br/>

             @if($errors->get('noPara'))
                <ul>
                    @foreach($errors->get('noPara') as $error)
                        <li><div class="alert alert-warning">{{ $error }}</div></li>
                    @endforeach
                </ul>
            @endif

            <form method='POST' action='/loremipsum'>
                <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                <span class="label label-primary">put number</span>
                <input type='text' name='noPara'><br/><br/>
                <button type='submit' value='Submit' class="btn btn-primary">generate</button>
            </form>
        </div>

        
    </div>

    
@stop



