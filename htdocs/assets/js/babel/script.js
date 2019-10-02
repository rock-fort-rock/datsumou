// import SmoothScroll from './smooth-scroll.polyfills.min';
// import Swiper from './swiper.min';

// import $ from 'jquery';//webpack.configで読み込み
import Chart from 'chart.js';
// import echo from 'echo-js';//NG
// import echo from '../../lib/echo.min';
// import cookie from '../../lib/jquery.cookie';

const breakpoint = 780;
const bodyWidth = document.body.clientWidth;
const ua = window.navigator.userAgent.toLowerCase();

import Diagnosis from './diagnosis';//診断チャートクラス

//共通
$(() => {
	$('.hamburger').on({
		'click': () => {
			$('.gNavi').addClass('active');

			if($('.newsNavi').hasClass('active')){
				$('.newsNavi').removeClass('active');
			}
		}
	})

	$('.gNaviClose, .gNaviBg').on({
		'click': () => {
			$('.gNavi').removeClass('active');
		}
	})

	$('.newsInfo').on({
		'click': () => {
			$('.newsNavi').toggleClass('active');
			$('.hamburger').addClass('hide');
			if($('.gNavi').hasClass('active')){
				$('.gNavi').removeClass('active');
			}
		}
	})
	$('.newsNaviClose').on({
		'click': () => {
			$('.newsNavi').removeClass('active');
			$('.hamburger').removeClass('hide');
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

	const url = $(location).attr('href');
	if (url.indexOf("#") !== -1) {
		$("html, body").stop().scrollTop(0);
		const id = url.slice(url.indexOf("#"));
		const pos = $(id).offset().top;
		const headerPos = $('.gHeader').css('position');
		let margin = 0;
		if(headerPos == 'fixed'){
			margin = $('.gHeader').height();
		}
		// console.log(pos);
		$("html, body").animate({scrollTop: pos - margin}, 800);
	}



	if($('.footerBanner').length > 0 && $('.footerBanner').css('display') != 'none' ){
		const h = $('.footerBanner').height();
		$('.gFooter').css('marginBottom', h);
	}

	echo.init({
		offset: 400,
		debounce: false,
		callback: function (element, op) {
	      element.classList.add('loaded');
	    }
	});
})

//診断チャート
$(() => {
	const ele = $('.diagnosisChart');
	if(ele.length < 1)return;
	const diagnosis = new Diagnosis();
	diagnosis.init();
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

	//口コミ（管理者投稿の
	$('.salonReview .review').each(function(){
		if($(this).next('.viewMore.-managed').length > 0){
			$(this).next('.viewMore.-managed').on({
				'click': function(){
					$(this).fadeOut(300);
					$(this).next('.reviewMore').slideToggle(500);
				}
			})
		}
	})


	//口コミ
	if($('.allReviewInner').length > 0){
		$('.review').clone().appendTo('.allReviewInner');
		if(location.hash == '#comment'){
			// const target = $('#review').offset().top;
			// const headerPos = $('.gHeader').css('position');
			// let margin = 0;
			// if(headerPos == 'fixed'){
			// 	margin = $('.gHeader').height();
			// }
			// $('html, body').animate({ scrollTop: target - margin}, 400);

			$('.allReview').addClass('active');
		}
	}

	$('.viewTrigger').on({
		'click': (e) => {
			$('.allReview').addClass('active');
		}
	});

	$('.reviewAgeTab li').on({
		'click': (e) => {
			const target = $(e.currentTarget).data('age');
			// console.log(target);
			$('.allReviewInner .review').empty();
			if(target == 'all'){
				$('.review li').clone().appendTo('.allReviewInner .review');
			}else{
				$('.review li.age'+target).clone().appendTo('.allReviewInner .review');
			}

			$('.reviewAgeTab li').removeClass('active');
			$(e.currentTarget).addClass('active');
		}
	});

	$('.allReview .bg').on({
		'click': (e) => {
			$('.allReview').removeClass('active');
		}
	});

	$('.comment-reply-title').on({
		'click': (e) => {
		$(e.currentTarget).next('form').slideToggle(400);
		}
	});

});

//コラム目次
$(() => {
	const ele = $('.tableofcontents');
	if(ele.length < 1)return;

	let hide = false;//テキスト非表示
	$('.displayToggle').on({
		'click': (e) => {
			$(e.currentTarget).next('ul').slideToggle(400);
			hide = !hide;
			let str;
			if(hide){
				str = '[非表示]';
			}else{
				str = '[表示]';
			}
			$(e.currentTarget).text(str);
		}
	})
})

//施術箇所一覧
$(() => {
	const ele = $('.treatmentParts');
	if(ele.length < 1)return;
	$('.otherBtn li').on({
		'click': (e) => {
			// ele.find('input').prop("checked", false);
			const $target = $("#"+$(e.currentTarget).data('target'));
			console.log($target);
			$target.prop("checked", true);
		}
	})
})


//用語集
// $(() => {
// 	const ele = $('.glossaryList');
// 	if(ele.length < 1)return;
//
// 	ele.find('.word').each(function(){
// 		$(this).on({
// 			'click': function(){
// 				$(this).toggleClass('active');
// 				$(this).next().toggleClass('active');
// 			}
// 		})
// 	})
// })


//cookie
// $(() => {
// 	const ele = $('#columnDetail');
// 	if(ele.length < 1)return;
//
//
// 	// $.cookie("read", "", {expires: -1, path:'/'});
//
// 	const postid = $('.mainContents').data('id');
// 	let postidStr = '';
// 	let postidArray = [];
//
// 	//cookieあり
// 	if($.cookie('read')){
// 		postidStr = $.cookie('read');
// 		postidArray = postidStr.split(',');
// 		if (postidArray.indexOf(postid) == -1){
// 		  postidStr += ',' + postid;
// 			// console.log(postidStr);
// 		}
//
// 	//cookieなし
// 	}else{
// 		postidStr = postid;
// 	}
//
// 	$.cookie('read',postidStr,{expires:30, path:'/'});
// 	console.log($.cookie('read'));
// })
