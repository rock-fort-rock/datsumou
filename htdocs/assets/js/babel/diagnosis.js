import imagesLoaded from 'imagesloaded';

export default class Diagnosis{
	constructor(){
		// console.log('Diagnosis');
		this.testMode = true;
		this.answerArray = [];
	}

	init(){
		imagesLoaded('.diagnosisChart', { background: true }, () => {
			console.log('loaded');
			this.start();
		});
	}

	start(){
		$('.diagnosisChart').addClass('start');
		$('.diagnosisStartContainer').addClass('active');

		const totalQ = $('.questionsContainer .question').length;
		$('.diagnosisStart').on({
			'click': (e) => {
				// $('.diagnosisStartContainer').removeClass('active');
				$('.diagnosisStartContainer').addClass('deactive');
				$('.questionsContainer .question').eq(0).addClass('active');
				$('.diagnosisChart').addClass('started');
			}
		})
		$('.question .answer').on({
			'click': (e) => {
				const q = $(e.currentTarget).closest('.question');
				const current = $(q).data('question');
				$(q).addClass('deactive');
				this.answerArray.push($(e.currentTarget).data('answer'));
				console.log($(e.currentTarget).data('answer'));
				if(current == totalQ){
					if(this.testMode){
						this.result();
					}else{
						this.loading();
					}
				}else{
					$(q).next().addClass('active');
				}

			}
		})
	}

	loading(){
		$('.loadingContainer').addClass('active');
		$('.loadingContainer .comment2').addClass('delay'+Number(this.answerArray.length+2));
		for(let i=0; i<this.answerArray.length; i++){
			const answer = $('.questionsContainer .question').eq(i).find('[data-answer="'+this.answerArray[i]+'"]').text();
			$('.checkedAnswer ul').append('<li class="delay delay'+Number(i+2)+'">'+answer+'</li>');
		}
		setTimeout(()=>{
			this.result();
		}, this.answerArray.length*800 + 3000);

		setTimeout(()=>{
			$('.checkedAnswer').addClass('show');
		},300);
	}
	result(){
		$('.loadingContainer').addClass('deactive');
		setTimeout(()=>{
			$('.diagnosisChart .header,.diagnosisChart .moko').addClass('statusResult');
			$('.resultContainer').addClass('active');
			$('.diagnosisChart').addClass('result');
		}, 500)
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
