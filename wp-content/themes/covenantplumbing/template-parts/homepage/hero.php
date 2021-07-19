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
			<a class="button button--inverse" href="<?= $button_link; ?>"><?= $button_text; ?></a>
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
					appendDots: $('.hero__slider__pagination'),
					arrows: false,
					autoplay: true,
					autoplaySpeed: 4000,
					dots: true,
					rows: 0,
					slide: '.hero__slide',
					speed: 700,
				});
			});
		</script>
	</section>
<?php endif;