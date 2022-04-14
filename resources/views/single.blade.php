@extends('layouts.frontend')

@section('content')


<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">{{ $post->title }}</h1>

    </div>
</div>


<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            <div class="col-lg-10 col-lg-offset-1">
                <article class="hentry post post-standard-details">

                    <div class="post-thumb">
                        <img src="{{ $post->featured }}" alt="{{ $post->title }}">
                    </div>

                    <div class="post__content">


                        <div class="post-additional-info">

                            {{-- <div class="post__author author vcard">
                                Автор:


                                <div class="post__author-name fn">
                                    <a href="#" class="post__author-link">адмін</a>
                                </div>

                            </div> --}}

                            <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2020-03-03 12:00:00">
                                    {{$post->created_at->toFormattedDateString() }}
                                </time>

                            </span>

                            <span class="category">
                                <i class="seoicon-tags"></i>
                                <a href="{{ route('category.single',['id'=>$post->category->id]) }}">{{ $post->category->name}}</a>
                              
                            </span>

                        </div>

                        <div class="post__content-info">
                               

                               {!! $post->body !!}

                               <b></b>     
                               <ul class="menu-horiz">                  
                                    @foreach($post->downloads as $download)
                                    
                                    <li>
                                         <img src="https://img.icons8.com/plasticine/100/000000/file.png"/>

                                         <a href="{{ route('download',['id'=>$download->id]) }}" >Завантажити {{$download->title}}</a>
                                    </li>
                                    @endforeach
                                </ul>

                           <div class="widget w-tags">

                                <div class="tags-wrap">
                                	@foreach($post->tags as $tag)
                                    <a href="{{ route('tag.single',['id'=>$tag->id]) }}" class="w-tags-item">{{$tag->tag}}</a>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>

                    <div >
                       </div></div>
                    </div>
                   

                </article>

                <div class="blog-details-author">

                    <div class="blog-details-author-thumb">
                        <img src="{{ asset($post->user->avatar) }}" alt="Author">
                    </div>

                    <div class="blog-details-author-content">
                        <div class="author-info">
                            <h5 class="author-name">{{$post->user->name}}</h5>
                            
                        </div>
                        <p class="text">{{$post->user->about}}
                        </p>
                        <div class="socials">

                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e64d6ab7fd04a35"></script> <div class="addthis_inline_share_toolbox"></div></div>

                        </div>
                    </div>
                </div>

                <div class="pagination-arrow">

                              @if($prev)
                                    <a href="{{ route('post.single', ['slug' => $prev->slug ]) }}" class="btn-next-wrap">
                                          <div class="btn-content">
                                          <div class="btn-content-title">Наступна стаття</div>
                                          <p class="btn-content-subtitle">{{ $prev->title }}</p>
                                          </div>
                                          <svg class="btn-next">
                                          <use xlink:href="#arrow-right"></use>
                                          </svg>
                                    </a>
                              @endif

                              @if($next)
                                    <a href="{{ route('post.single', ['slug' => $next->slug ]) }}" class="btn-prev-wrap">
                                          <svg class="btn-prev">
                                          <use xlink:href="#arrow-left"></use>
                                          </svg>
                                          <div class="btn-content">
                                          <div class="btn-content-title">Попередня стаття</div>
                                          <p class="btn-content-subtitle">{{ $next->title }}</p>
                                          </div>
                                    </a>
                              @endif

                        </div>


                <div class="comments">

                    <div class="heading text-center">
                        <h4 class="h1 heading-title">Коментарі</h4>
                        <div class="heading-line">
                            <span class="short-line"></span>
                            <span class="long-line"></span>
                        </div>
                    </div>

                    @include('includes.disqus')
                </div>

                <div class="row">

                </div>


            </div>

            <!-- End Post Details -->

            <!-- Sidebar-->

            <div class="col-lg-12">
                <aside aria-label="sidebar" class="sidebar sidebar-right">
                    <div  class="widget w-tags">
                        <div class="heading text-center">
                            <h4> </h4>
                            <h4 class="heading-title">ВСІ ТЕГИ БЛОГУ</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>

                        <div class="tags-wrap">

                        	@foreach($post->tags as $tag)
                                    <a href="{{ route('tag.single',['id'=>$tag->id]) }}" class="w-tags-item">{{$tag->tag}}</a>
                            @endforeach
                            
                        </div>
                    </div>
                </aside>
            </div>
            <!-- End Sidebar-->

        </main>
    </div>
</div>
<!-- form-->

@endsection()