export default class Diagnosis{
	constructor(){
		// console.log('Diagnosis');
		this.answerArray = [];
	}
	
	init(){
		const totalQ = $('.questions li').length;
		$('.diagnosisStart').on({
			'click': (e) => {
				$('.diagnosisStartContainer').removeClass('active');
				$('.questionsContainer').addClass('active');
			}
		})
		$('.questions .answer').on({
			'click': (e) => {
				const q = $(e.currentTarget).closest('.question');
				const current = $('.questions li').index(q);
				$(q).removeClass('active');
				this.answerArray.push($(e.currentTarget).data('answer'));
				// console.log($(e.currentTarget).data('answer'));
				if(current == totalQ-1){
					this.loading();
					$('.questionsContainer').removeClass('active');
				}else{
					$(q).next().addClass('active');
				}
				
			}
		})
	}

	loading(){
		$('.loadingContainer').addClass('active');
		for(let i=0; i<this.answerArray.length; i++){
			const answer = $('.questions li').eq(i).find('[data-answer="'+this.answerArray[i]+'"]').text();
			$('.checkedAnswer ul').append('<li>'+answer+'</li>');
		}
		setTimeout(()=>{
			this.result();
		}, 6000)
	}
	result(){
		$('.loadingContainer').removeClass('active');
		$('.resultContainer').addClass('active');
		const resultStr = this.answerArray.join(',');
		switch(resultStr){
			//部分脱毛
			case '1,1,1,1':
			$('.resultContainer .resultA').addClass('active');
			break;

			case '1,1,1,2':
			$('.resultContainer .resultB').addClass('active');
			break;

			case '1,1,2,1':
			$('.resultContainer .resultC').addClass('active');
			break;

			case '1,1,2,2':
			$('.resultContainer .resultD').addClass('active');
			break;

			case '1,2,1,1':
			$('.resultContainer .resultE').addClass('active');
			break;

			case '1,2,1,2':
			$('.resultContainer .resultF').addClass('active');
			break;

			case '1,2,2,1':
			$('.resultContainer .resultG').addClass('active');
			break;

			case '1,2,2,2':
			$('.resultContainer .resultH').addClass('active');
			break;


			//全身脱毛
			case '2,1,1,1':
			$('.resultContainer .resultI').addClass('active');
			break;

			case '2,1,1,2':
			$('.resultContainer .resultJ').addClass('active');
			break;

			case '2,1,2,1':
			$('.resultContainer .resultK').addClass('active');
			break;

			case '2,1,2,2':
			$('.resultContainer .resultL').addClass('active');
			break;

			case '2,2,1,1':
			$('.resultContainer .resultM').addClass('active');
			break;

			case '2,2,1,2':
			$('.resultContainer .resultN').addClass('active');
			break;

			case '2,2,2,1':
			$('.resultContainer .resultO').addClass('active');
			break;

			case '2,2,2,2':
			$('.resultContainer .resultP').addClass('active');
			break;
		} 
	}

}