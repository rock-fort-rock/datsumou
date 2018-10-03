// import SmoothScroll from './smooth-scroll.polyfills.min';
// import Swiper from './swiper.min';
import $ from 'jquery';
import Chart from 'chart.js';
const breakpoint = 780;
const bodyWidth = document.body.clientWidth;
const ua = window.navigator.userAgent.toLowerCase();


//共通
$(() => {
	$('.hamburger').on({
		'click': () => {
			$('.gNavi').addClass('active');
		}
	})

	$('.gNaviClose, .gNaviBg').on({
		'click': () => {
			$('.gNavi').removeClass('active');
		}
	})

	//page top
	const pageTopHeight = $('.pageTop').height();
	const pageTopBottom = 150;
	$(window).scroll(() => {
		const gNaviHeight = $('.gNavi').height();
		if($(window).scrollTop() > gNaviHeight - $(window).height() + pageTopHeight + pageTopBottom && !$('.pageTopContainer').hasClass('active')){
			$('.pageTopContainer').addClass('active');
		}
		if($(window).scrollTop() <= gNaviHeight - $(window).height() + pageTopHeight + pageTopBottom && $('.pageTopContainer').hasClass('active')){
			$('.pageTopContainer').removeClass('active');
		}
	})

	//smooth scroll
	$('a.scroll').on({
		"click":(e) => {
			const target = ($($(e.currentTarget).attr("href")).length > 0)?$($(e.currentTarget).attr("href")).offset().top:0;
			const headerPos = $('.gHeader').css('position');
			let margin = 0;
			if(headerPos == 'fixed'){
				margin = $('.gHeader').height();
			}
			$('html, body').animate({ scrollTop: target - margin}, 800);
			return false;
		}
	})
})

//サロン情報
$(() => {
	const ele = $('.salonInfo');
	if(ele.length < 1)return;

	ele.each((index, element) => {
		const ctx = $(element).find('.radarChart');
		const total = ctx.data('total');
		const price = ctx.data('price');
		const service = ctx.data('service');
		const reserve = ctx.data('reserve');
		const care = ctx.data('care');
		
		const myChart = new Chart(ctx, {
			type: 'radar',
			data: {
			    labels: ['', '価格', '接客・雰囲気', '予約のしやすさ', 'アフターケア'],
			    datasets: [{
			    	backgroundColor: 'rgba(255, 102, 153, 0.4)',
			    	borderWidth: 1,
			    	borderColor: 'rgba(255, 102, 153, 0.8)',
			    	pointBorderColor: "rgba(255, 102, 153, 1)",
			    	pointBorderWidth: 2,
			    	pointBackgroundColor: "rgba(255, 102, 153, 1)",
			        data: [total, price, service, reserve, care]
			    }]
			},
			options: {
				animation:false,
				showTooltips: false,
				legend: { 
					display: false,
				},
				title: {
					display: true,
					fontSize:15,
					fontColor:'#0fb0f8',
					padding: -10,
					lineHeight: 1,
					text: ['', '総合評価']
				},

				scale: {
					display: true,
					pointLabels: {
						fontSize: 11,
						// fontStyle: "bold",
						fontColor: '#0fb0f8',
					},
					ticks: {
						display: false,
						// fontSize: 12,
						stepSize: 1,
						min: 0,
						max: 5,
						beginAtZero: true
					},
					gridLines: {
						display: true,
					}
				}
			}
			// options: {
			//     scale: {
			//     	display: false
			//     }
			// }
		})

	})
});

//スマホのみ適用
// export default class onlySp{
// 	constructor(){
// 		this.current = 0;
// 	}
// 	init(){
// 		console.log(this.current);
// 	}
// }

/*
const onlySp = () => {
	//スマホナビゲーション
	const $menu = document.querySelector( '.gHeader__gNavi__menu' );
	$menu.addEventListener( 'click', ( event ) => {
		const $parent = event.currentTarget.parentNode;
		// console.log($parent);
		$parent.classList.toggle('active');
		if($parent.classList.contains('active')){
			$menu.querySelector('.icon').classList.remove('icon-menu');
			$menu.querySelector('.icon').classList.add('icon-close');
		}else{
			$menu.querySelector('.icon').classList.remove('icon-close');
			$menu.querySelector('.icon').classList.add('icon-menu');
		}
	});

	//サブメニュー
	const $hasSubmenu = document.querySelectorAll('.gHeader__gNavi .hasSubmenu');
	for (let i = 0; i < $hasSubmenu.length; i++){
		$hasSubmenu[i].addEventListener( 'click', ( event ) => {
			const currentParent = event.currentTarget.parentNode;
			Array.prototype.forEach.call($hasSubmenu, ( $submenu ) => {
				if($submenu.parentNode != currentParent){
					$submenu.parentNode.classList.remove('active');
				}
			});

			
			currentParent.classList.toggle('active');
			event.preventDefault();
		});
	}
}


//スムーススクロール
const scroll = new SmoothScroll('a[href*="#"]', {
	header: '.gHeader',
	speed: 1000,
	updateURL: false,
});


//電話番号にリンク
if(ua.indexOf("iphone") != -1 || ua.indexOf("android") != -1){
	const $phonecall = document.querySelectorAll('.phonecall');
	for (let i = 0; i < $phonecall.length; i++){
		const regExp = new RegExp( "-", "g" );
		const number = $phonecall[i].textContent.replace(regExp, "" );
		$phonecall[i].outerHTML = '<a href="tel:'+number+'">'+ $phonecall[i].outerHTML +'</a>';
	}
}



//サムネイルありswiper設定
const setSwiperThumb = (ele) =>{
	for (let i = 0; i < ele.length; i++){
		const $main = ele[i].querySelector('.swiper-main');
		const $thumbs = ele[i].querySelectorAll('.swiper-thumb li');

		let swiperMain = new Swiper ($main, {
		    loop: true,
		    speed: 600,
		    slidesPerView: 1,
		    spaceBetween: 0,
		    direction: 'horizontal',
		    effect: 'slide',
		});

		for (let n = 0; n < $thumbs.length; n++){
			$thumbs[n].addEventListener( 'click', ( event ) => {
				swiperMain.slideTo(n+1);
			});
			if(n==0){
				$thumbs[n].classList.add('active');
			}
		}
		swiperMain.on('slideChangeTransitionEnd', () => {
			setPosition(swiperMain.realIndex, $thumbs);
		});
	}
	const setPosition = (n, thumbs) =>{
		Array.prototype.forEach.call(thumbs, ( $thumb ) => {
			$thumb.classList.remove('active');
		});
		thumbs[n].classList.add('active');
	}
}
const $swiperThumb = document.querySelectorAll( '.swiper-withT' );
if($swiperThumb.length > 0){
	setSwiperThumb($swiperThumb);
}




//swiper設定（TOP以外）
const setSwiper = (ele) =>{
	for (let i = 0; i < ele.length; i++){
		const thumb = ele[i].parentNode.classList.contains('swiper-withT');
		const slides = ele[i].querySelectorAll('.swiper-slide');
		console.log(slides.length);
		if(!thumb){//サムネイルなしのswiperのみ

			if(slides.length > 1){//スライドが1つ以上あるとき
				let swiper = new Swiper (ele[i], {
					paginationClickable: true,
				    loop: true,
				    speed: 600,
				    slidesPerView: 1,
				    spaceBetween: 0,
				    direction: 'horizontal',
				    effect: 'slide',
				 
				    // スライダーの自動再生
				    autoplay: {
				      delay: 6000,
				      stopOnLast: false,
				      disableOnInteraction: false
				    },
				 
				    pagination: {
				      el: '.swiper-pagination',
				      clickable: true,
				      type: 'fraction',
				    },
				    navigation: {
						nextEl: '.swiper-button-next',
						prevEl: '.swiper-button-prev',
					},
				});
			}else{
				ele[i].removeChild(ele[i].querySelector('.swiper-pagination'));
				ele[i].removeChild(ele[i].querySelector('.swiper-button-prev'));
				ele[i].removeChild(ele[i].querySelector('.swiper-button-next'));
			}
		}
    }
}


//FAQ
const setFaq = (ele) =>{
	for (let i = 0; i < ele.length; i++){
		const $q = ele[i].querySelectorAll('li .faqSet__question');
		for (let n = 0; n < $q.length; n++){
			$q[n].addEventListener( 'click', ( event ) => {
				const parent = event.currentTarget.parentNode;
				parent.classList.toggle('active');
			});
		}
	}
}
const $faq = document.querySelectorAll( '.faq' );
if($faq.length > 0){
	setFaq($faq);
}


//お問い合わせ
const $contact = document.querySelectorAll( '.contactForm' );
if($contact.length > 0){
	jQuery(function( $ ) {
	    jQuery( 'input[name="zipcode[data][1]"]' ).keyup( function( e ) {
	    	// console.log('keyup');
	        AjaxZip3.zip2addr('zipcode[data][0]','zipcode[data][1]','address1','address2','address3');
	    } )
	} );
}


//HOME
const $home = document.querySelector( '#home' );
if($home){
	// console.log('home');
	const homeState = {
		startSlide: false,
		existVideo: false,
		LoadedVide: false,
		playVideo: false,
	};

	noneSmooth();

	const video = (bodyWidth > breakpoint)?document.querySelector( '.video video.visible-pc'):document.querySelector( '.video video.visible-sp');
	if(video){
		homeState.existVideo = true;
	}

	let swiper = new Swiper ('.swiper-container', {
	    loop: true,
	    speed: 1000,
	    slidesPerView: 1,
	    spaceBetween: 0,
	    direction: 'horizontal',
	    effect: 'fade',
	 
	    // スライダーの自動再生
	    autoplay: {
	      delay: 6000,
	      stopOnLast: false,
	      disableOnInteraction: false
	    },
	    pagination: {
	      el: '.swiper-pagination',
	      clickable: true,
	    },

	 //    breakpoints: {
		//     breakpoint: {
		//       effect: 'slide',
		//     }
		// }
	});


	//動画があるとき
	if(homeState.existVideo){
		//autoplayにしておかないとモバイルで動作しないので
		video.pause();
		video.addEventListener('canplay', (event) => {
		    console.log('再生可能');
		    document.querySelector( '.video').classList.add('loaded');
		    if(!homeState.playVideo){
		    	event.currentTarget.play();
		    	homeState.playVideo = true;
		    }
		    homeState.LoadedVide = true;
		}, false);


		swiper.autoplay.stop();
		const scrollElement = (ua.indexOf("trident") != -1)?document.documentElement:document.body;//IE対策
		// document.body.onscroll = () =>{
		scrollElement.onscroll = () =>{
			const $slider = document.querySelector( '#home .heroPanel' );
			const $videoOverlay = document.querySelector( '.video__overlay' );
			const rect = $slider.getBoundingClientRect();
			// const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
			if(window.innerHeight > (rect.top + 300) && !homeState.startSlide){
				homeState.startSlide = true;
				swiper.autoplay.start();
			}

			const videoBottom = document.querySelector( '.gHeader').clientHeight + document.querySelector( '.video').clientHeight;
			if(rect.top > 0){
				let opa =  Math.round(((videoBottom - rect.top)/videoBottom)*100)/100;
				// console.log(opa);
				$videoOverlay.style.opacity = opa;
				if(!homeState.playVideo && homeState.LoadedVide){
					video.play();
				}
			}else{//動画が隠れた時
				video.pause();
				homeState.playVideo = false;
			}
		}
	}else{
		swiper.autoplay.start();
	}

	
//HOME以外のページ
}else{
	const $containers = document.querySelectorAll( '.swiper-container' );
	if($containers.length > 0){
		setSwiper($containers);
	}
}

if(bodyWidth <= breakpoint){
	onlySp();
}
*/


