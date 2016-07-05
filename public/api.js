var Api = {
	init:function(){
		// get total num days from API
		$.get('/api/days',null,function(response){
			var total = response.total_days;
			$('#js-total-days-funded').text(total);
			$('#js-total-days-funded-next').text(total+1);
		});

		// bind events (form submit)
		this.bindEvents();
	},
	bindEvents:function(){
		$('body').on('submit','#form-donate',this.submitForm);
	},
	submitForm:function(e){
		e.preventDefault();
		var $form = $(this);
		var form_data = $form.serialize();
		$.post('/api/days',form_data,function(response){
			$('#js-form-response').text(response);
		}).fail(function(e,error){
			console.log(error);
			$('#js-form-response').text(error).css('color','red');
		});
	}
};


$(document).ready(function() {
	Api.init();
});

