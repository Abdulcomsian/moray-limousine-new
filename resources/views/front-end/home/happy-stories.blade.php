@extends('layouts.app')
@section('title','Happy Stories')
@section('content')
    <div class="blog-banner">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Blog Columns 3 Columns</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{url('/home')}}">Home</a></li>
                    <li class="active">Blog Columns 3 Columns</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="blog-body content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 ">
                    <div class="thumbnail blog-box-2 clearfix">
                        <div class="blog-photo">
                            <img src="front-end/img/blog/blog-1.jpg" alt="blog-1" class="img-responsive">
                        </div>
                        <div class="post-meta">
                            <ul>
                                <li class="profile-user">
                                    <img src="front-end/img/avatar/avatar-1.jpg" alt="user-blog">
                                </li>
                                <li><span>John Doe</span></li>
                                <li><i class="fa fa-calendar"></i></li>
                                <li><i class="fa fa-comments"></i></li>
                            </ul>
                        </div>
                        <!-- Detail -->
                        <div class="caption detail">
                            <h4><a href="blog-classic-fullwidth.html">Buying a Home</a></h4>
                            <!-- paragraph -->
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                            <div class="clearfix"></div>
                            <!-- Btn -->
                            <a href="blog-classic-fullwidth.html" class="read-more">Read More...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="thumbnail blog-box-2 clearfix">
                        <div class="blog-photo">
                            <img src="front-end/img/blog/blog-2.jpg" alt="blog-2" class="img-responsive">
                        </div>
                        <div class="post-meta">
                            <ul>
                                <li class="profile-user">
                                    <img src="front-end/img/avatar/avatar-4.jpg" alt="user-blog">
                                </li>
                                <li><span>Karen Paran</span></li>
                                <li><i class="fa fa-calendar"></i></li>
                                <li><i class="fa fa-comments"></i></li>
                            </ul>
                        </div>
                        <!-- Detail -->
                        <div class="caption detail">
                            <h4><a href="blog-single-sidebar-right.html">Why Live in New York</a></h4>
                            <!-- paragraph -->
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                            <div class="clearfix"></div>
                            <!-- Btn -->
                            <a href="blog-single-sidebar-right.html" class="read-more">Read More...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="thumbnail blog-box-2 clearfix">
                        <div class="blog-photo">
                            <img src="front-end/img/blog/blog-3.jpg" alt="blog-3" class="img-responsive">
                        </div>
                        <div class="post-meta">
                            <ul>
                                <li class="profile-user">
                                    <img src="front-end/img/avatar/avatar-3.jpg" alt="user-blog">
                                </li>
                                <li><span>John Antony</span></li>
                                <li><i class="fa fa-calendar"></i></li>
                                <li><i class="fa fa-comments"></i></li>
                            </ul>
                        </div>
                        <!-- Detail -->
                        <div class="caption detail">
                            <h4><a href="blog-single-sidebar-right.html">Selling Your Home</a></h4>
                            <!-- paragraph -->
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                            <div class="clearfix"></div>
                            <!-- Btn -->
                            <a href="blog-single-sidebar-right.html" class="read-more">Read More...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="thumbnail blog-box-2 clearfix">
                        <div class="blog-photo">
                            <img src="front-end/img/blog/blog-2.jpg" alt="blog-2" class="img-responsive">
                        </div>
                        <div class="post-meta">
                            <ul>
                                <li class="profile-user">
                                    <img src="front-end/img/avatar/avatar-4.jpg" alt="user-blog">
                                </li>
                                <li><span>Karen Paran</span></li>
                                <li><i class="fa fa-calendar"></i></li>
                                <li><i class="fa fa-comments"></i></li>
                            </ul>
                        </div>
                        <!-- Detail -->
                        <div class="caption detail">
                            <h4><a href="blog-single-sidebar-right.html">Why Live in New York</a></h4>
                            <!-- paragraph -->
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                            <div class="clearfix"></div>
                            <!-- Btn -->
                            <a href="blog-single-sidebar-right.html" class="read-more">Read More...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="thumbnail blog-box-2 clearfix">
                        <div class="blog-photo">
                            <img src="front-end/img/blog/blog-3.jpg" alt="blog-3" class="img-responsive">
                        </div>
                        <div class="post-meta">
                            <ul>
                                <li class="profile-user">
                                    <img src="front-end/img/avatar/avatar-3.jpg" alt="user-blog">
                                </li>
                                <li><span>John Antony</span></li>
                                <li><i class="fa fa-calendar"></i></li>
                                <li><i class="fa fa-comments"></i></li>
                            </ul>
                        </div>
                        <!-- Detail -->
                        <div class="caption detail">
                            <h4><a href="blog-single-sidebar-right.html">Selling Your Home</a></h4>
                            <!-- paragraph -->
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                            <div class="clearfix"></div>
                            <!-- Btn -->
                            <a href="blog-single-sidebar-right.html" class="read-more">Read More...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="thumbnail blog-box-2 clearfix">
                        <div class="blog-photo">
                            <img src="front-end/img/blog/blog-1.jpg" alt="blog-1" class="img-responsive">
                        </div>
                        <div class="post-meta">
                            <ul>
                                <li class="profile-user">
                                    <img src="front-end/img/avatar/avatar-1.jpg" alt="user-blog">
                                </li>
                                <li><span>John Doe</span></li>
                                <li><i class="fa fa-calendar"></i></li>
                                <li><i class="fa fa-comments"></i></li>
                            </ul>
                        </div>
                        <!-- Detail -->
                        <div class="caption detail">
                            <h4><a href="blog-single-sidebar-right.html">Buying a Home</a></h4>
                            <!-- paragraph -->
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                            <div class="clearfix"></div>
                            <!-- Btn -->
                            <a href="blog-single-sidebar-right.html" class="read-more">Read More...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 ">
                    <div class="thumbnail blog-box-2 clearfix">
                        <div class="blog-photo">
                            <img src="front-end/img/blog/blog-1.jpg" alt="blog-1" class="img-responsive">
                        </div>
                        <div class="post-meta">
                            <ul>
                                <li class="profile-user">
                                    <img src="front-end/img/avatar/avatar-1.jpg" alt="user-blog">
                                </li>
                                <li><span>John Doe</span></li>
                                <li><i class="fa fa-calendar"></i></li>
                                <li><i class="fa fa-comments"></i></li>
                            </ul>
                        </div>
                        <!-- Detail -->
                        <div class="caption detail">
                            <h4><a href="blog-single-sidebar-right.html">Buying a Home</a></h4>
                            <!-- paragraph -->
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                            <div class="clearfix"></div>
                            <!-- Btn -->
                            <a href="blog-single-sidebar-right.html" class="read-more">Read More...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="thumbnail blog-box-2 clearfix">
                        <div class="blog-photo">
                            <img src="front-end/img/blog/blog-2.jpg" alt="blog-2" class="img-responsive">
                        </div>
                        <div class="post-meta">
                            <ul>
                                <li class="profile-user">
                                    <img src="front-end/img/avatar/avatar-4.jpg" alt="user-blog">
                                </li>
                                <li><span>Karen Paran</span></li>
                                <li><i class="fa fa-calendar"></i></li>
                                <li><i class="fa fa-comments"></i></li>
                            </ul>
                        </div>
                        <!-- Detail -->
                        <div class="caption detail">
                            <h4><a href="blog-single-sidebar-right.html">Why Live in New York</a></h4>
                            <!-- paragraph -->
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                            <div class="clearfix"></div>
                            <!-- Btn -->
                            <a href="blog-single-sidebar-right.html" class="read-more">Read More...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="thumbnail blog-box-2 clearfix">
                        <div class="blog-photo">
                            <img src="front-end/img/blog/blog-3.jpg" alt="blog-3" class="img-responsive">
                        </div>
                        <div class="post-meta">
                            <ul>
                                <li class="profile-user">
                                    <img src="front-end/img/avatar/avatar-3.jpg" alt="user-blog">
                                </li>
                                <li><span>John Antony</span></li>
                                <li><i class="fa fa-calendar"></i></li>
                                <li><i class="fa fa-comments"></i></li>
                            </ul>
                        </div>
                        <!-- Detail -->
                        <div class="caption detail">
                            <h4><a href="blog-single-sidebar-right.html">Selling Your Home</a></h4>
                            <!-- paragraph -->
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                            <div class="clearfix"></div>
                            <!-- Btn -->
                            <a href="blog-single-sidebar-right.html" class="read-more">Read More...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <!-- Page navigation start -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>
                            <li><a href="blog-columns-2col.html">1 <span class="sr-only">(current)</span></a></li>
                            <li class="active"><a href="blog-columns-3col.html">2</a></li>
                            <li><a href="blog-columns-3col.html">3</a></li>
                            <li>
                                <a href="blog-columns-3col.html" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- Page navigation end -->
                </div>
            </div>
        </div>
    </div>

    <div class="partners-block">
        <div class="container">
            <h3>Brands & Partners</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="carousel our-partners slide" id="ourPartners">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-xs-12 col-sm-6 col-md-3 partner-box">
                                    <a href="#">
                                        <img src="front-end/img/brand/partner.png" alt="partner">
                                    </a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-xs-12 col-sm-6 col-md-3 partner-box">
                                    <a href="#">
                                        <img src="front-end/img/brand/partner-2.png" alt="partner-2">
                                    </a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-xs-12 col-sm-6 col-md-3 partner-box">
                                    <a href="#">
                                        <img src="front-end/img/brand/partner-3.png" alt="partner-3">
                                    </a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-xs-12 col-sm-6 col-md-3 partner-box">
                                    <a href="#">
                                        <img src="front-end/img/brand/partner-4.png" alt="partner-4">
                                    </a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-xs-12 col-sm-6 col-md-3 partner-box">
                                    <a href="#">
                                        <img src="front-end/img/brand/partner-5.png" alt="partner-5">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a class="left carousel-control" href="#ourPartners" data-slide="prev"><i class="fa fa-chevron-left icon-prev"></i></a>
                        <a class="right carousel-control" href="#ourPartners" data-slide="next"><i class="fa fa-chevron-right icon-next"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
