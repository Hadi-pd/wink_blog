@extends('layouts.master')
@section('content')
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($posts as $post)
            
            {{-- "id" => "eea5a60a-5d8b-411d-9590-78b84a85db57"
          "slug" => "my-post-by-wink"
          "title" => "My Post by wink"
          "excerpt" => "This excerpt for first post in wink blog"
          "body" => "<p>I love Laravel</p><div class="embedded_image" data-layout="default" contenteditable="false"><img alt="" src="/storage/wink/images/mIcefweCgfAFnZwdfUUEMpz2pSZ ▶"
          "published" => 1
          "publish_date" => "2021-11-20 08:21:00"
          "featured_image" => null
          "featured_image_caption" => ""
          "author_id" => "ed01bb06-bcfa-4f4b-a5ea-dacacc8cfc99"
          "created_at" => "2021-11-20 08:21:43"
          "updated_at" => "2021-11-20 20:53:00"
          "meta" => "{"meta_description":null,"opengraph_title":null,"opengraph_description":null,"opengraph_image":null,"opengraph_image_width":null,"opengraph_image_height":null," ▶"
          "markdown" => 0 --}}
                <a href="{{ url('post-' . $post->slug) }}">
                    <div class="col">
                        <div class="card h-100">                       
                            <img src="https://puducherry-dt.gov.in/wp-content/themes/district-theme-2/images/blank.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->excerpt }}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">{{ $post->updated_at }}</small>
                            </div>
                        </div>
                    </div>
                </a>
        @endforeach
    </div>
@endsection
