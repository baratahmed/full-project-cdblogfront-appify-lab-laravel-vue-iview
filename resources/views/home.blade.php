@extends('layout.app')

@section('title','Home')

@section('maincontent')
    	<!-- BANNER -->
		<section class="banner_sec">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-10 col-lg-8">
						<div class="row">
							@if (count ($categories) > 0)
								@foreach ($categories as $category)
								<div class="col-12 col-md-4 col-lg-4">
									<a href="{{url('/category',[$category->categoryName,$category->id])}}">
										<div class="banner_box">
											<i class="fab fa-laravel"></i>
											<h3 class="banner_box_h3">{{$category->categoryName}}</h3>
										</div>
									</a>
								</div>
								@endforeach
							@endif
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- BANNER -->

		<!-- BODY -->
		<div class="home_body">
			<div class="container">
				<div class="latest_post">
					<div class="latest_post_top">
						<h1 class="latest_post_h1 brdr_line">Latest Blog</h1>
					</div>
					<div class="row">
						@if (count ($blogs) > 0)
							@foreach ($blogs as $blog)
							<div class="col-12 col-md-6 col-lg-4">
								<a href="blog_post.html">
									<div class="home_card">
										<div class="home_card_top">
											<img src="{{asset('/img/card4.jpg')}}" alt="image">
										</div>
										<div class="home_card_bottom">
											<div class="home_card_bottom_text">
												<ul class="home_card_bottom_text_ul">
													@foreach ($blog->categories as $category)
													<li>
														<a href="/category/{{ $category->categoryName }}/{{ $category->id }}">{{$category->categoryName}}</a>
														<span><i class="fas fa-angle-right"></i></span>
													</li>
													@endforeach
												</ul>
												<a href="/blog/{{$blog->slug}}">
													<h2 class="home_card_h2">{{$blog->title}}</h2>
												</a>
												<p class="post_p">
													{{$blog->post_excerpt}}
												</p>
												<div class="home_card_bottom_tym">
													<div class="home_card_btm_left">
														<img src="img/man1.jpg" alt="image">
													</div>
													<div class="home_card_btm_r8">
													<a href="contact_me.html"><p class="author_name">{{$blog->user->fullName}}</p></a>
														<ul class="home_card_btm_r8_ul">
															<li>Dec 4, 2019</li>
															<li><span class="dot"></span>3 Min Read</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								</a>
							</div>
							@endforeach
						@endif
					</div>
					<div class="text-center" >
						<button style="border-radius: 10px; "><a href="{{url('/blogs')}}" style="padding: 15px;">View All</a></button>
					</div>
				</div>
			</div>
			<!-- PAGINATION -->
			{{-- <div class="pagination">
				<ul class="pagination_ul d-flex">
					<li>
						<a href="">
							<i class="fas fa-chevron-left"></i>
						</a>
					</li>
					<li>
						<a href="">1</a>
					</li>
					<li>
						<a href="">2</a>
					</li>
					<li>
						<a href="">3</a>
					</li>
					<li>
						<a href="">
							<i class="fas fa-chevron-right"></i>
						</a>
					</li>
				</ul>
			</div> --}}
			<!-- PAGINATION -->
		</div>
		<!-- BODY -->


@endsection

