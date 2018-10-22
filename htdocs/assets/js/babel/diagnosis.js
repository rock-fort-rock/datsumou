export default class Diagnosis{
	constructor(){
		// console.log('Diagnosis');
		this.answerArray = [];
	}
	
	init(){
		const totalQ = $('.questions li').length;
		let answerArray = [];
		$('.questions .answer').on({
			'click': (e) => {
				const q = $(e.currentTarget).closest('.question');
				const current = $('.questions li').index(q);
				$(q).removeClass('active');
				this.answerArray.push($(e.currentTarget).data('answer'));
				if(current == totalQ-1){
					this.result();
					$('.resultContainer').addClass('active');
				}else{
					$(q).next().addClass('active');
				}
				
			}
		})
	}

	result(){
		// console.log(this.answerArray);
		if(this.answerArray[0] == 1){
			console.log('Q1はAですね');
		}
	}

}