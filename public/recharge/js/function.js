$(document).ready(function(){

	$('.stripe-metodos').click(function(e){
		e.preventDefault();
		$('.stripe-metodos-img').removeClass('stripe-metodo-selected');
		$(this).children().addClass('stripe-metodo-selected')
		var metodo = $(this).data('metodo')
		$('#metodo-stripe').val(metodo)
	})
	$('#server').on('change', function () {
		$('#personagem').prop('disabled', false);
	});
	
	$('.tags').on('click', 'a', function (e) {
		console.log(this);
		var val = $(this).attr('href').slice(1);
		$(this).parent().find('a').removeClass('selected');
		$(this).toggleClass('selected');
		if(val != "paypal" && val != "stripe" && val != "card" && val != "ex1")
		{
			$('#valor').val(val);
		}
		e.preventDefault();
	});

	$(window).on('hashchange', function(e){
	    history.replaceState ("", document.title, e.originalEvent.oldURL);
	});
    $('#confirmaStripeOpcoes').click(function(e){
	
		if($('#metodo-stripe').val() == '' || $('#moeda').val() == ''){
			alert('Please make all choices')
		}else{
			var valores_real = [4.85, 9.70, 19.40, 48.50, 97.00, 194.00];
			var cupons = [2000, 4000, 8000, 20000, 40000, 80000];
		    var simbolos = {'myr': 'RM', 'usd': 'US$', 'eur': 'â‚¬', 'brl': 'R$', 'gbp': 'Â£', 'pln': 'ZÅ‚', 'php': 'â‚±', 'try': 'â€Žâ‚º', 'ars': '$', 'bob': 'B$', 'clp': '$', 'cop': '$', 'crc': 'â‚¡', 'svc': 'â€Žâ‚¡', 'gtq': 'â€ŽQ', 'mxn': '$', 'pab': 'â€Ž$', 'pyg': 'G$', 'pen': 'S/', 'dop': 'â€ŽRD$', 'uyu': 'â€Ž$', 'vef': 'â€ŽBs.'}
			var moeda = $('#moeda').val();
			if (moeda !== 'brl'){
				
				$.ajax({
					url: 'https://pay.7tgames.com/ddtank/en/api/callback/stripe/currency.php?currency='+moeda+'_usd',
					method: 'get',
					dataType: 'json'
				}).then(function(data){
					var key = Object.keys(data)
					var conversao  = data[key[0]].toFixed(2)
					var valuesToAppend = '';
					for(var i = 0; i < valores_real.length; i++){
						valuesToAppend += `	<a href="#${valores_real[i] }"  id="${valores_real[i] }" data-nome="${cupons[i]} coins">
														<div class="value">${simbolos[moeda]}${(valores_real[i]/conversao).toFixed(2) }</div>
														<div class="qnt">${cupons[i]}<span>coins</span></div>
													</a>
												`;
					}
					$('#cupons-price').html(valuesToAppend)
					$('.close-modal').trigger('click')
				})
				
			}
			
			
			//$('.close-modal').trigger('click')
		}
	})
}); 