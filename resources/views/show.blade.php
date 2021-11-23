@extends('layouts.master')
@section('content')
        <div class="post">
            {{-- 
                "id" => "2b0e99f1-7a53-4ece-9ca1-883f1483aeaf"
                "slug" => "second-post-in-wink"
                "title" => "Second Post in Wink"
                "excerpt" => "This is The Excpert"
                "body" => "Hi This is my second post in wink for test this app and enjoy it"
                "published" => 1
                "publish_date" => "2021-11-20 11:28:00"
                "featured_image" => null
                "featured_image_caption" => ""
                "author_id" => "ed01bb06-bcfa-4f4b-a5ea-dacacc8cfc99"
                "created_at" => "2021-11-20 11:29:46"
                "updated_at" => "2021-11-20 11:57:34"
                "meta" => "{"meta_description":null,"opengraph_title":null,"opengraph_description":null,"opengraph_image":null,"opengraph_image_width":null,"opengraph_image_height":null," ▶"
                "markdown" => 1 
                --}}
              <a href="{{ url('post-'.$post->slug) }}">
                <h1>{{ $post->title }}</h1>
            </a>
            <p>{!! $post->body !!}</p>
            <span class="post-data">{{ $post->updated_at }} from 
            <a href="{{ url($author->slug) }}"> {{ $author->name }}</a>
            </span>
        </div>
    
@endsection
