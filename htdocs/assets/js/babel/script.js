// import SmoothScroll from './smooth-scroll.polyfills.min';
// import Swiper from './swiper.min';
import $ from 'jquery';
const breakpoint = 780;
const bodyWidth = document.body.clientWidth;
const ua = window.navigator.userAgent.toLowerCase();

const test = () => {
	console.log("test"+$('.gHeader').width());
}

test();


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

//edgeとieはスムーススクロールなし　fixedの画像がガタつく対応
const noneSmooth = () => {
	if(ua.indexOf("edge") != -1 || ua.indexOf("trident") != -1 || ua.indexOf("msie") != -1) {
		console.log("edge or ie");
		document.addEventListener("mousewheel", (event) => {
			 event.preventDefault();
			 const wd = event.wheelDelta;
			 const csp = window.pageYOffset;
			 window.scrollTo(0, csp - wd);
		});
	}
}


//電話番号にリンク
if(ua.indexOf("iphone") != -1 || ua.indexOf("android") != -1){
	const $phonecall = document.querySelectorAll('.phonecall');
	for (let i = 0; i < $phonecall.length; i++){
		const regExp = new RegExp( "-", "g" );
		const number = $phonecall[i].textContent.replace(regExp, "" );
		$phonecall[i].outerHTML = '<a href="tel:'+number+'">'+ $phonecall[i].outerHTML +'</a>';
	}
}


//グレーディング事例
// const $gradesample = document.querySelectorAll('.gradeSample__image');
// if($gradesample.length > 0){
// 	for (let i = 0; i < $gradesample.length; i++){
// 		console.log(i);
// 		const $images = $gradesample[i].querySelectorAll('.gradeSample__imageMain li');
// 		const $thumbs = $gradesample[i].querySelectorAll('.gradeSample__imageThumb li');
// 		for (let n = 0; n < $thumbs.length; n++){
// 			$thumbs[n].addEventListener( 'click', ( event ) => {
// 				Array.prototype.forEach.call($images, ( $image ) => {
// 					$image.classList.remove('active');
// 				});
// 				Array.prototype.forEach.call($thumbs, ( $thumb ) => {
// 					$thumb.classList.remove('active');
// 				});
				
// 				$images[n].classList.add('active');
// 				event.currentTarget.classList.add('active');
// 			});
// 		}
// 	}
// }



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


