<div class="sidebar sidebar-sticky col-xl-4 col-lg-12 col-md-12 ">
    <div class="sidebar__block">
        <input type="search" name="search" placeholder="Axtar..." />
    </div>
    <div class="sidebar__block">
        <p>Son bloqlar</p>
        <div class="sidebar__popular-posts-wrapper">
            @foreach($latestBlogs as $latestBlog)
            <a class="sidebar__related-post" href="{{ route('front.blog.single',['slug'=>$latestBlog->{'slug_'.app()->getLocale()}]) }}" >
                <figure>
                    <img src="{{ asset('files/blogs/'.$latestBlog->src) }}" srcset="{{ asset('files/blogs/'.$latestBlog->src) }}" alt="">
                    <div class="sidebar__related-post-content">
                        <p class="title">{{ $latestBlog->{'title_'.app()->getLocale()} }}</p>
                        <p class="date">{{ \Carbon\Carbon::parse($latestBlog->created_at)->format('Y') }}</p>
                    </div>
                </figure>
            </a>
            @endforeach
        </div>
    </div>
    <div class="sidebar__block">
        <p>Ən çox oxunan bloqlar</p>
        <div class="sidebar__popular-posts-wrapper">
        @foreach($moreHitsBlogs as $moreHitsBlog)
            <a class="sidebar__related-post" href="{{ route('front.blog.single',['slug'=>$moreHitsBlog->{'slug_'.app()->getLocale()}]) }}" >
                <figure>
                    <img src="{{ asset('files/blogs/'.$moreHitsBlog->src) }}" srcset="{{ asset('files/blogs/'.$moreHitsBlog->src) }}" alt="">
                    <div class="sidebar__related-post-content">
                        <p class="title">{{ $moreHitsBlog->{'title_'.app()->getLocale()} }}</p>
                        <p class="date">{{ \Carbon\Carbon::parse($moreHitsBlog->created_at)->format('Y') }}</p>
                    </div>
                </figure>
            </a>
        @endforeach
        </div>
    </div>

</div>
