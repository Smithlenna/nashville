@extends('frontend.layouts.main')
@section('content')
<!-- HERO-7
			============================================= -->
<section id="hero-7" class="hero-section">


	<!-- HERO TEXT -->
	<div class="bg-scroll hero-7-txt division">
		<div class="container white-color">
			<div id="hero-7-content" class="row">
				<div class="col-lg-10 offset-lg-1 hero-txt text-center">
					@if($header_image)
					<!-- Title -->
					<h4 class="h4-xs"> {{ $header_image->first }} </h4>
					<h2>{{ $header_image->second }}</h2>

					<!-- Text -->
					<p class="p-md">{{ $header_image->third }}
					</p>

					<!-- HERO LINKS -->
					<div class="hero-links icon-xs text-center white-color clearfix">
						<h5 class="h5-sm"><span class="flaticon-375-checked"></span> {{ $header_image->status }}</h5>
					</div>
					@endif
				</div>
			</div>
		</div> <!-- End container -->
	</div> <!-- END HERO TEXT -->
	@if ($countries->count()>0)
	<!-- HERO COUNTRIES CAROUSEL -->
	<div class="hero-7-countries division">
		<div class="container">
			<div class="col-md-12">
				<div class="owl-carousel owl-theme hero-coutries-carousel">
					@foreach($countries as $country)

					<!-- COUNTRY BOX -->
					<div class="hbox-1">
						<a href="#">

							<!-- Image -->
							<div class="hover-overlay">
								<img class="img-fluid" src="{{ Storage::url(@$flag->cover) }}" alt="country-image" />
								<div class="item-overlay"></div>
							</div>

							<!-- Title -->
							<div class="hbox-1-content">
								<div class="hbox-1-txt">
									<img src="{{ Storage::url(@$country->flag) }}" alt="flag-icon" />
									<h5 class="h5-sm">{{ $country->title }}}</h5>
								</div>
							</div>

						</a>
					</div>
					@endforeach

				</div> <!-- End tab-carousel -->

			</div>
		</div> <!-- End container -->
	</div> <!-- END HERO COUNTRIES CAROUSEL -->

	@endif
</section> <!-- END HERO-7 -->




<!-- SERVICES-5
			============================================= -->
<section id="services-5" class="bg-tra-map bg-lightgrey services-section division">
	<div class="container">
		<div class="row d-flex align-items-center">


			<!-- SERVICES TEXT -->
			<div class="col-lg-5">
				<div class="services-5-txt">

					<!-- Section ID -->
					<span class="section-id id-color">Quality Strategy</span>

					<!-- Title -->
					<h3 class="h3-lg">We provide top consulting services</h3>

					<!-- Text -->
					<p>The blandit nullam tempor sapien gravida donec enim ipsum porta justo integer odio
						velna a vitae auctor integer congue a magna pretium at purus pretium ligula
					</p>

				</div>
			</div>


			<!-- SERVICE BOXES -->
			<div class="col-lg-7">
				<div class="row">


					<!-- SERVICE BOX #1 -->
					<div class="col-md-6">
						<div class="sbox-5 icon-xs">
							<a href="visa-details.html">

								<!-- Icon -->
								<div class="sbox-5-icon primary-color"><span class="flaticon-431-bank"></span></div>

								<!-- Text -->
								<div class="sbox-5-txt">
									<h5 class="h5-md">Education Visa</h5>
									<p class="p-sm">Porta semper lacus cursus, feugiat primis ultrice dolor</p>
								</div>

							</a>
						</div>
					</div>


					<!-- SERVICE BOX #2 -->
					<div class="col-md-6">
						<div class="sbox-5 icon-xs">
							<a href="visa-details.html">

								<!-- Icon -->
								<div class="sbox-5-icon primary-color"><span class="flaticon-033-user-2"></span></div>

								<!-- Text -->
								<div class="sbox-5-txt">
									<h5 class="h5-md">Working Visa</h5>
									<p class="p-sm">Porta semper lacus cursus, feugiat primis ultrice dolor</p>
								</div>

							</a>
						</div>
					</div>


					<!-- SERVICE BOX #3 -->
					<div class="col-md-6">
						<div class="sbox-5 icon-xs">
							<a href="visa-details.html">

								<!-- Icon -->
								<div class="sbox-5-icon primary-color"><span class="flaticon-397-briefcase"></span> </div>

								<!-- Text -->
								<div class="sbox-5-txt">
									<h5 class="h5-md">Business Visa</h5>
									<p class="p-sm">Porta semper lacus cursus, feugiat primis ultrice dolor</p>
								</div>

							</a>
						</div>
					</div>


					<!-- SERVICE BOX #4 -->
					<div class="col-md-6">
						<div class="sbox-5 icon-xs">
							<a href="visa-details.html">

								<!-- Icon -->
								<div class="sbox-5-icon primary-color"><span class="flaticon-285-internet-2"></span></div>

								<!-- Text -->
								<div class="sbox-5-txt">
									<h5 class="h5-md">Travel Visa</h5>
									<p class="p-sm">Porta semper lacus cursus, feugiat primis ultrice dolor</p>
								</div>

							</a>
						</div>
					</div>


				</div>
			</div> <!-- END SERVICE BOXES -->


		</div> <!-- End row -->
	</div> <!-- End container -->
</section> <!-- END SERVICES-5 -->


<!-- HORIZONTAL GREY LINE -->
<div class="section-divider">
	<div class="container">
		<div class="row">
			<div class="grey-border"></div>
		</div>
	</div>
</div>


<!-- TESTIMONIALS-1
			============================================= -->
<section id="reviews-1" class="bg-tra-city bg-lightgrey wide-100 reviews-section division">
	<div class="container">


		<!-- SECTION TITLE -->
		<div class="row">
			<div class="col-md-12 section-title center">

				<!-- Title -->
				<h2 class="h2-xs">Our Success Stories...</h2>

				<!-- Text -->
				<p class="p-md">Cursus porta, feugiat primis in ultrice ligula risus auctor tempus dolor feugiat,
					felis lacinia risus interdum auctor id viverra dolor iaculis luctus placerat and massa
				</p>

			</div>
		</div> <!-- END SECTION TITLE -->


		<!-- TESTIMONIALS CONTENT -->
		<div class="row">
			<div class="col-md-12">
				<div class="owl-carousel owl-theme reviews-holder">
					@if ($testomonials->count()>0)
					@foreach($testomonials as $testomonial)

					<!-- TESTIMONIAL #1 -->
					<div class="review-1">

						<!-- Testimonial Author -->
						<div class="author-data clearfix">

							<!-- Author Avatar -->
							<div class="testimonial-avatar">
								<img src="{{ Storage::url(@$testomonial->image) }}" alt="testimonial-avatar">
							</div>

							<!-- Author Data -->
							<div class="review-author">
								<h5 class="h5-sm">{{ $testomonial->name }}</h5>
								<span>{{ $testomonial->position }}</span>
							</div>

						</div> <!-- End Testimonial Author -->

						<!-- Testimonial Text -->
						<p>{{ $testomonial->opinion }}
						</p>

					</div>
					@endforeach

					@endif

				</div>
			</div>
		</div> <!-- END TESTIMONIALS CONTENT -->


	</div> <!-- End container -->
</section> <!-- END TESTIMONIALS-1 -->




<!-- FAQs-1
			============================================= -->
<section id="faqs-1" class="wide-100 faqs-section division">
	<div class="container">


		<!-- SECTION TITLE -->
		<div class="row">
			<div class="col-md-12 section-title center">

				<!-- Title -->
				<h2 class="h2-xs">Have Questions? Look Here</h2>

				<!-- Text -->
				<p class="p-md">Cursus porta, feugiat primis in ultrice ligula risus auctor tempus dolor feugiat,
					felis lacinia risus interdum auctor id viverra dolor iaculis luctus placerat and massa
				</p>

			</div>
		</div> <!-- END SECTION TITLE -->


		<!-- QUESTIONS HOLDER -->
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div id="accordion" role="tablist">


					<!-- QUESTION #1 -->
					<div class="card">

						<!-- Question -->
						<div class="card-header" role="tab" id="headingOne">
							<h5 class="h5-sm">
								<a data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">
									<span>1.</span> Which payment methods do you accept?
								</a>
							</h5>
						</div>

						<!-- Answer -->
						<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
							<div class="card-body">

								<!-- INFO BOX #1 -->
								<div class="box-list">
									<div class="box-list-icon"><i class="fas fa-genderless"></i></div>
									<p>An magnis nulla dolor sapien augue erat iaculis purus tempor magna ipsum vitae purus
										primis pretium ligula rutrum luctus blandit porta justo integer. Feugiat a primis ultrice
										ligula risus auctor rhoncus purus ipsum primis
									</p>
								</div>

								<!-- INFO BOX #2 -->
								<div class="box-list">
									<div class="box-list-icon"><i class="fas fa-genderless"></i></div>
									<p>Nemo ipsam egestas volute turpis dolores ut aliquam quaerat sodales sapien undo pretium
										purus ligula tempus ipsum undo auctor a mauris lectus ipsum blandit porta justo integer
									</p>
								</div>

							</div>
						</div>


					</div> <!-- END QUESTION #1 -->


					<!-- QUESTION #2 -->
					<div class="card">

						<!-- Question -->
						<div class="card-header" role="tab" id="headingTwo">
							<h5 class="h5-sm">
								<a class="collapsed" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">
									<span>2.</span> What is the registration process?
								</a>
							</h5>
						</div>

						<!-- Answer -->
						<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
							<div class="card-body">

								<p>Maecenas gravida porttitor nunc, quis vehicula magna luctus tempor. Quisque vel laoreet
									turpis. Urna augue, viverra a augue eget, dictum tempor diam. Sed pulvinar consectetur
									nibh, vel imperdiet dui varius viverra. Pellentesque ac massa lorem. Fusce eu cursus est.
									Fusce non nulla vitae massa placerat vulputate vel a purus
								</p>

							</div>
						</div>

					</div> <!-- END QUESTION #2 -->


					<!-- QUESTION #3 -->
					<div class="card">

						<!-- Question -->
						<div class="card-header" role="tab" id="headingThree">
							<h5 class="h5-sm">
								<a class="collapsed" data-toggle="collapse" href="#collapseThree" role="button" aria-expanded="false" aria-controls="collapseThree">
									<span>3.</span> How can I update or cancel my personal information?
								</a>
							</h5>
						</div>

						<!-- Answer -->
						<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
							<div class="card-body">

								<!-- Text -->
								<p>Nullam rutrum eget nunc varius etiam mollis risus congue aliquam etiam sapien egestas,
									congue gestas posuere cubilia congue ipsum mauris lectus laoreet gestas neque vitae
									auctor eros dolor luctus odio placerat magna cursus
								</p>

								<!-- INFO BOX #1 -->
								<div class="box-list">
									<div class="box-list-icon"><i class="fas fa-genderless"></i></div>
									<p>An magnis nulla dolor sapien augue erat iaculis purus tempor magna ipsum vitae purus
										primis pretium ligula rutrum luctus blandit porta justo integer. Feugiat a primis ultrice
										ligula risus auctor rhoncus purus ipsum primis
									</p>
								</div>

								<!-- INFO BOX #2 -->
								<div class="box-list">
									<div class="box-list-icon"><i class="fas fa-genderless"></i></div>
									<p>Quaerat sodales sapien undo euismod purus blandit laoreet augue an augue egestas. Augue
										iaculis purus tempor congue magna egestas magna ligula rutrum luctus risus ultrice undo
										luctus integer congue magna at pretium
									</p>
								</div>

							</div>
						</div>

					</div> <!-- END QUESTION #3 -->


					<!-- QUESTION #4 -->
					<div class="card">

						<!-- Question -->
						<div class="card-header" role="tab" id="headingFour">
							<h5 class="h5-sm">
								<a class="collapsed" data-toggle="collapse" href="#collapseFour" role="button" aria-expanded="false" aria-controls="collapseFour">
									<span>4.</span> Does your immigration firm offer a money-back guarantee?
								</a>
							</h5>
						</div>

						<!-- Answer -->
						<div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" data-parent="#accordion">
							<div class="card-body">

								<!-- Text -->
								<p>Curabitur ac dapibus libero. Quisque eu tristique neque. Phasellus blandit tristique justo
									ut aliquam. Aliquam vitae molestie nunc. Quisque sapien justo, aliquet non molestie sed purus,
									venenatis nec. Aliquam eget lacinia elit. Vestibulum tincidunt tincidunt massa, et porttitor
								</p>

							</div>
						</div>

					</div> <!-- END QUESTION #4 -->


					<!-- QUESTION #5 -->
					<div class="card">

						<!-- Question -->
						<div class="card-header" role="tab" id="headingFive">
							<h5 class="h5-sm">
								<a class="collapsed" data-toggle="collapse" href="#collapseFive" role="button" aria-expanded="false" aria-controls="collapseFive">
									<span>5.</span> How long does it take to get a travel visa to Singapore?
								</a>
							</h5>
						</div>

						<!-- Answer -->
						<div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive" data-parent="#accordion">
							<div class="card-body">

								<!-- INFO BOX #1 -->
								<div class="box-list">
									<div class="box-list-icon"><i class="fas fa-genderless"></i></div>
									<p>An magnis nulla dolor sapien augue erat iaculis purus tempor magna ipsum vitae purus
										primis pretium ligula rutrum luctus blandit porta justo integer. Feugiat a primis ultrice
										ligula risus auctor rhoncus purus ipsum primis
									</p>
								</div>

								<!-- INFO BOX #2 -->
								<div class="box-list">
									<div class="box-list-icon"><i class="fas fa-genderless"></i></div>
									<p>Quaerat sodales sapien undo euismod purus blandit laoreet augue an augue egestas. Augue
										iaculis purus tempor congue magna egestas magna ligula rutrum luctus risus ultrice undo
										luctus integer
									</p>
								</div>

							</div>
						</div>

					</div> <!-- END QUESTION #5 -->


				</div> <!-- END ACCORDION -->
			</div> <!-- End col-x -->
		</div> <!-- END QUESTIONS HOLDER -->


		<!-- MORE QUESTIONS BUTTON -->
		<div class="row">
			<div class="col-md-12 text-center more-questions">
				<h5 class="h5-md">Still have a question? <a href="faqs.html" class="darkblue-color">Ask your question here</a></h5>
			</div>
		</div>


	</div> <!-- End container -->
</section> <!-- END FAQs-1 -->




<!-- HORIZONTAL GREY LINE -->
<div class="section-divider">
	<div class="container">
		<div class="row">
			<div class="grey-border"></div>
		</div>
	</div>
</div>




<!-- BLOG-1
			============================================= -->
<section id="blog-1" class="wide-60 blog-section division">
	<div class="container">


		<!-- SECTION TITLE -->
		<div class="row">
			<div class="col-md-12 section-title center">

				<!-- Title -->
				<h2 class="h2-xs">Our Stories & Latest News</h2>

				<!-- Text -->
				<p class="p-md">Cursus porta, feugiat primis in ultrice ligula risus auctor tempus dolor feugiat,
					felis lacinia risus interdum auctor id viverra dolor iaculis luctus placerat and massa
				</p>

			</div>
		</div> <!-- END SECTION TITLE -->
		@if ($blogs->count())


		<!-- BLOG POSTS HOLDER -->
		<div class="row">
			@foreach($blogs as $blog)

			<!-- BLOG POST #1 -->
			<div class="col-md-6 col-lg-4">
				<div class="blog-post">


					<!-- BLOG POST IMAGE -->
					<div class="blog-post-img mb-30">
						<img class="img-fluid" src="{{ Storage::url(@$dealer->image) }}" alt="blog-post-image" />
					</div>

					<!-- BLOG POST TEXT -->
					<div class="blog-post-txt">

						<!-- Post Meta -->
						<!-- <p class="post-meta"><a href="#" class="grey-color">Immigration Visa</a> - 12 min read</p> -->

						<!-- Title -->
						<h5 class="h5-lg"><a href="single-post.html" class="darkblue-color">
								{{ $blog->title}}</a>
						</h5>

						<!-- Text -->
						<p>{{ $blog->summary}}
						</p>

						<!-- Post Data -->
						<p class="post-data">By <a href="#">Sean McMarthy</a> - 18 hours ago</p>

					</div>


				</div>
			</div> <!-- END  BLOG POST #1 -->

			@endforeach
		</div> <!-- END BLOG POSTS HOLDER -->
		@endif

	</div> <!-- End container -->
</section> <!-- END BLOG-1 -->
@endsection