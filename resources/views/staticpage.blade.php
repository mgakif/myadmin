@extends('base')

@section('title') - {{ $page->name }} @stop
@section('head')
@if($page->css)
<style>
{{ $page->css }}
</style>
@endif
@stop


@section('content')

    <section id="content">

        <section class="page-header page-header-color page-header-primary page-header-more-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>{{ $page->name }}</h1>
                                <ul class="breadcrumb breadcrumb-valign-mid">
                                    <li><a href="/">Ana Sayfa</a></li>
                                    <li class="active">{{ $page->name }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

            <div class="content-wrap">

                <div class="container clearfix">

                    <!-- Post Content
                    ============================================= -->
                    <div class="postcontent nobottommargin clearfix">

                        <!-- Posts
                        ============================================= -->
                        <div id="posts">

                            <div class="entry clearfix">
                            
                                <div class="entry-content">
                                    <p>{!! $page->description !!}</p>
                                </div>
                            </div>


                        </div><!-- #posts end -->


                    </div><!-- .postcontent end -->

                    <!-- Sidebar
                    ============================================= -->
                   

                </div>

            </div>

        </section><!-- #content end -->
@stop
@section('javascript')
@if($page->js)

{!! $page->js !!}

@endif
@stop