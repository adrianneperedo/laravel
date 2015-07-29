@extends('master')
@section('title', 'Blog')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2> Blog </h2>
            </div>
            <div class="container-fluid">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif

                @if ($blogs->isEmpty())
                    <p> There is no blog yet.</p>
                @else
                    @foreach ($blogs as $blog)
                        <div class="row">
                            <div class="col-md-12">
                                <h1><a href="{{ url('blog', $blog->slug) }}">{{ $blog->title }}</a></h1>
                                <p class="lead">{{ str_limit($blog->content, 50) }}</p>
                                <span class="label label-info pull-right">Posted by: {{ $blog->user->name }}</span><br/>
                                <span class="label label-success pull-right"><strong>Date Posted: </strong>{{ $blog->created_at }}</span><br/>
                                <span class="label label-danger pull-right"><strong>Date Updated: </strong>{{ $blog->updated_at }}</span><br/>
                            </div>
                        </div>
                    @endforeach
                @endif

                {!! $blogs->render() !!}
            </div>

        </div>
    </div>
@endsection

