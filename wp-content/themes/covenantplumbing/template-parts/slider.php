<?php 
$hero_title = get_field('hero_title');
$hero_subtitle = get_field('hero_subtitle');
$hero_excerpt = get_field('hero_excerpt');
$button = get_field('button');

$button_text = $button['button_text'];
$button_link = $button['button_link'];

if( have_rows('slides') ) :
	?>
	<section id="hero-slider-wrapper" class="hero">
		<div class="hero__content abs-center">
			<h1 class="hero__content__title"><?= $hero_title; ?></h1>
			<p class="hero__content__subtitle"><strong><?= $hero_subtitle; ?></strong></p>
			<p class="hero__content__excerpt"><?= $hero_excerpt; ?></p>
			<a class="button" href="<?= $button_link; ?>"><?= $button_text; ?></a>
		</div>
		<div class="hero__slider">
			<?php 
			while ( have_rows('slides') ) :
				the_row('slides');
				
				$slide_desktop = get_sub_field('slide_desktop_image');
				$slide_responsive = get_sub_field('slide_responsive_image');

				$desktop_image_url = $slide_desktop['url'];
				$responsive_image_url = $slide_responsive ? $slide_responsive['url'] : $slide_desktop['url'];
				$responsive_image_alt = $slide_responsive ? $slide_responsive['alt'] : $slide_desktop['alt'];
					?>
					<div class="hero__slide">
						<!-- <picture class="hero__slide__picture desktop-hide">
							<img class="hero__slide__image--responsive" src="<?= $responsive_image_url; ?>" alt="<?= $responsive_image_alt; ?>">
						</picture> -->

						<div class="hero__slide__bg-image abs-center bg-image full" style="background-image: url(<?= $desktop_image_url; ?>);"></div>
					</div>
					<?php
			endwhile;
			?>
			<div class="hero__slider__pagination"></div>
		</div>
		<script>
			jQuery(window).load(function() {
				jQuery(".hero__slider").slick({
					//accessibility: true,
					//adaptiveHeight: false,
					//appendArrows: $(element),
					appendDots: $('.hero__slider__pagination'),
					arrows: false,
					//asNavFor: $(element)
					autoplay: false,
					//autoplay: 3000,
					//centerMode: false,
					//centerPadding: '50px',
					//cssEase: 'ease',
					//customPaging: function(slider, i) {
					//    return '<button type="button" data-role="none">' + (i + 1) + '</button>';
					//},
					dots: true,
					//dotsClass: 'slick-dots',
					//draggable: true,
					//easing: 'linear',
					//edgeFriction: 0.15,
					//fade: false,
					//focusOnSelect: false,
					//focusOnChange: false,
					//infinite: true,
					//initialSlide: 0,
					//lazyLoad: 'ondemand',
					//mobileFirst: false,
					//nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="next">Next</button>',
					//pauseOnDotsHover: false,
					//pauseOnFocus: true,
					//pauseOnHover: true,
					//prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="previous">Previous</button>',
					//respondTo: 'window',
					//responsive: [
					//	{
					//	  breakpoint: 767,
					//	  settings: {
					//		arrows: false
					//	  }
					//	}
						// You can unslick at a given breakpoint now by adding:
						// settings: "unslick"
						// instead of a settings object
					//  ],
					rows: 0, //Setting this to 1 adds more divs that will require style changes, and setting this to more than 1 initializes grid mode. Use slidesPerRow to set how many slides should be in each row.
					//rtl: false,
					slide: '.hero__slide',
					//slidesPerRow: 1,
					//slidesToScroll: 1,
					//slidesToShow: 1,
					//speed: 300,
					//swipe: true,
					//swipeToSlide: false,
					//touchMove: true,
					//touchThreshold: 5,
					//useCSS: true,
					//useTransform: true,
					//variableWidth: false,
					//vertical: false,
					//verticalSwiping: false,
					//waitForAnimate: true
					//zIndex: 1000
				});
			});
		</script>
	</section>
<?php endif;