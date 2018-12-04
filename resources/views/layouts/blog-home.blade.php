@include('includes.front_header')

<body>

    <!-- Navigation -->
    @include('includes.front_nav')

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <!-- First Blog Post -->
                @if($posts)
                    @foreach($posts as $post)
                        <h2>
                            <a href="{{route('posts.show', $post->slug)}}">{{$post->title}}</a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php">{{$post->user->name}}</a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>
                        <hr>
                        <img class="img-responsive" src="{{$post->photo ? $post->photo->file : $post->placeholderImage()}}" alt="">
                        <hr>
                        <p>{{str_limit($post->body, 300)}}</p>
                        <a class="btn btn-primary" href="{{route('posts.show', $post->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>
                    @endforeach
                @endif

                <div class="row">
                    <div class="col-sm-6 col-sm-offset-4">
                        {{$posts->render()}}
                    </div>
                </div>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            @include('includes.front_sidebar')

        </div>
        <!-- /.row -->

        <hr>

 @include('includes.front_footer')