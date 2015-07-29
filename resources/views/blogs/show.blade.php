@extends('master')
@section('title', 'View a blog')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <div class="content">
                <h1 class="header text-primary">{!! $blog->title !!}</h1>
                <p class="lead"> {!! $blog->content !!} </p>
                <span class="label label-info pull-right">Posted by: {{ $blog->user->name }}</span><br/>
                <span class="label label-success pull-right"><strong>Date Posted: </strong>{{ $blog->created_at }}</span><br/>
                <span class="label label-danger pull-right"><strong>Date Updated: </strong>{{ $blog->updated_at }}</span>
            </div>
            @if ($blog->user->id == Auth::user()->id)
            <a href="{!! action('BlogsController@edit', $blog->slug) !!}" class="btn btn-info">Edit</a>
            <form method="post" action="{!! action('BlogsController@destroy', $blog->slug) !!}" class="pull-left">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <div>
                        <button type="submit" class="btn btn-warning">Delete</button>
                    </div>
                </div>
            </form>
            @endif
            <div class="clearfix"></div>
        </div>
    </div>

@endsection
