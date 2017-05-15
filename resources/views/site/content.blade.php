@if(isset($pages))
    @foreach($pages as $k => $page)
        @if($k%2 == 0)
            <!--Hero_Section-->
            <section id="{{$page->alias}}" class="top_cont_outer">
                <div class="hero_wrapper">
                    <div class="container">
                        <div class="hero_section">
                            <div class="row">
                                <div class="col-lg-5 col-sm-7">
                                    <div class="top_left_cont zoomIn wow animated">
                                        {!! $page->caption !!}
                                        {!! $page->text !!}
                                        <a href="{{route('page', ['alias'=>$page->alias])}}" class="read_more2">Read more</a>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-sm-5">
                                {!! Html::image('/img/' . $page->images,'', ['class'=>'zoomIn wow animated']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Hero_Section-->
        @else
            <section id="{{$page->alias}}"><!--Aboutus-->
                <div class="inner_wrapper">
                    <div class="container">
                        <h2>{{$page->title}}</h2>
                        <div class="inner_section">
                            <div class="row">
                                <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right"><img src="{{ asset('img/'. $page->images) }}" class="img-circle delay-03s animated wow zoomIn" alt=""></div>
                                <div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
                                    <div class=" delay-01s animated fadeInDown wow animated">
                                        {!! $page->caption !!}
                                        {!! $page->text !!}
                                    </div>
                                    <div class="work_bottom"> <span>Want to know more..</span> <a href="{{ route('page', ['alias'=>$page->alias] ) }}" class="contact_btn">Read more...</a> </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </section>
            <!--Aboutus-->
        @endif
    @endforeach
@endif



@if(isset($services))

    <!--Service-->
    <section  id="services">
        <div class="container">
            <h2>Services</h2>
            <div class="service_wrapper">
                @foreach($services as $k => $service)
                    @if($k == 0 || $k % 3 == 0)
                        <div class="row {{ ($k != 0) ? ' borderTop' : '' }} ">
                    @endif

                    <div class="col-lg-4 {{ ($k%3 > 0) ? ' borderLeft ' : '' }} {{ $k > 2 ? ' mrgTop ' : '' }}">
                        <div class="service_block">
                            <div class="service_icon delay-03s animated wow  zoomIn"> <span><i class="fa {{ $service->icon }}"></i></span> </div>
                            <h3 class="animated fadeInUp wow">{{ $service->caption }}</h3>
                            <p class="animated fadeInDown wow">{{ $service->text }}</p>
                        </div>
                    </div>
                    @if( ($k + 1) % 3 == 0)
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </section>
    <!--Service-->

@endif



@if(isset($portfolios))
<!-- Portfolio -->
    <section id="portfolio" class="content">

    <!-- Container -->
    <div class="container portfolio_title">

        <!-- Title -->
        <div class="section-title">
            <h2>Portfolio</h2>
        </div>
        <!--/Title -->

    </div>
    <!-- Container -->

    <div class="portfolio-top"></div>

    <!-- Portfolio Filters -->
    <div class="portfolio">

    @if(isset($tags))
        <div id="filters" class="sixteen columns">
            <ul class="clearfix">
                <li><a id="all" href="#" data-filter="*" class="active">
                        <h5>All</h5>
                </a></li>

                @foreach($tags as $tag)
                    <li><a class="" href="#" data-filter=".{{$tag}}">
                            <h5>{{ $tag }}</h5>
                    </a></li>
                @endforeach
            </ul>
        </div>
    @endif
    <!--/Portfolio Filters -->

        <!-- Portfolio Wrapper -->
        <div class="isotope fadeInLeft animated wow" style="position: relative; overflow: hidden; height: 480px;" id="portfolio_wrapper">

            @foreach($portfolios as $portfolio)
                <!-- Portfolio Item -->
                    <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four {{ $portfolio->filter }} isotope-item">
                        <div class="portfolio_img"> <img src="{{ asset('img/'.$portfolio->images) }}"  alt="Portfolio 1"> </div>
                        <div class="item_overlay">
                            <div class="item_info">
                                <h4 class="project_name">{{ $portfolio->caption }}</h4>
                            </div>
                        </div>
                    </div>
                    <!--/Portfolio Item -->
            @endforeach

        </div>
        <!--/Portfolio Wrapper -->

    </div>
    <!--/Portfolio Filters -->

    <div class="portfolio_btm"></div>


    <div id="project_container">
        <div class="clear"></div>
        <div id="project_data"></div>
    </div>


</section>
<!--/Portfolio -->
@endif

@if(isset($employees))
    <section class="page_section team" id="team"><!--main-section team-start-->
    <div class="container">
        <h2>Team</h2>
        <h6>Lorem ipsum dolor sit amet, consectetur adipiscing.</h6>
        <div class="team_section clearfix">
            @foreach($employees as $k => $employee)
                <div class="team_area">
                    <div class="team_box wow fadeInDown delay-0{{ ($k+1)*3 }}s">
                        <div class="team_box_shadow"><a href="javascript:void(0)"></a></div>
                        <img src="{{ asset('img/'. $employee->images) }}" alt="">
                        <ul>
                            <li><a href="javascript:void(0)" class="fa fa-twitter"></a></li>
                            <li><a href="javascript:void(0)" class="fa fa-facebook"></a></li>
                            <li><a href="javascript:void(0)" class="fa fa-pinterest"></a></li>
                            <li><a href="javascript:void(0)" class="fa fa-google-plus"></a></li>
                        </ul>
                    </div>
                    <h3 class="wow fadeInDown delay-0{{ ($k+1)*3 }}s">{{ $employee->name }}</h3>
                    <span class="wow fadeInDown delay-0{{ ($k+1)*3 }}s">{{ $employee->position }}</span>
                    <p class="wow fadeInDown delay-0{{ ($k+1)*3 }}s">{{ $employee->text }}</p>
                </div>
            @endforeach

        </div>
    </div>
</section>
<!--/Team-->
@endif


<!--Footer-->
<footer class="footer_wrapper">
    <div class="container">
        <section class="page_section contact" id="contact">
            <div class="contact_section">
                <h2>Contact Us</h2>
                <div class="row">
                    <div class="col-lg-4">

                    </div>
                    <div class="col-lg-4">

                    </div>
                    <div class="col-lg-4">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 wow fadeInLeft">
                    <div class="contact_info">
                        <div class="detail">
                            <h4>UNIQUE Infoway</h4>
                            <p>104, Some street, NewYork, USA</p>
                        </div>
                        <div class="detail">
                            <h4>call us</h4>
                            <p>+1 234 567890</p>
                        </div>
                        <div class="detail">
                            <h4>Email us</h4>
                            <p>support@sitename.com</p>
                        </div>
                    </div>



                    <ul class="social_links">
                        <li class="twitter animated bounceIn wow delay-02s"><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                        <li class="facebook animated bounceIn wow delay-03s"><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
                        <li class="pinterest animated bounceIn wow delay-04s"><a href="javascript:void(0)"><i class="fa fa-pinterest"></i></a></li>
                        <li class="gplus animated bounceIn wow delay-05s"><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-8 wow fadeInLeft delay-06s">
                    <div class="form">
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if( count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul class="showErrors">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('home') }}" method="post">
                            <input class="input-text" type="text" name="name" value="{{ old('name') }}" placeholder="Your Name *" required>
                            <input class="input-text" type="text" name="email" value="{{old('email') }}" placeholder="Your E-mail *" required>
                            <textarea class="input-text text-area" name="message" cols="0" rows="0" placeholder="Your Message *" required>{{ old('message') }}</textarea>
                            <input class="input-btn" type="submit" value="send message">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <div class="footer_bottom"><span>Copyright © 2014-{{date('Y')}},    Template by <a href="http://webthemez.com">WebThemez.com</a>. </span> </div>
    </div>
</footer>