document.addEventListener('DOMContentLoaded', () => {

	let swiperThubmnails = new Swiper(".thumbnail-swiper", {
		spaceBetween: 10,
		slidesPerView: 4,
		freeMode: true,
		watchSlidesProgress: true,
	});

	let swiperFeatured = new Swiper(".featured-swiper", {
		autoplay: {
			delay: 5000,
		},
		spaceBetween: 10,
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
		thumbs: {
			swiper: swiperThubmnails,
		},
	});

});