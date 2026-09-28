$(document).ready(function(){
	
			let currentcaptcha='';
			function generatecaptcha(length = 6){
				const character="ABCDEFGHIJKLMNOPQRSTWYZabcefghijklmnopqrstuvwxyz1234567890!@#$%^&*";
				const charlen=character.length;
				let captcha='';
				for(let i=0;i<length;i++){
					captcha +=(character.charAt(Math.floor(Math.random()*charlen)));
				}
				currentcaptcha=captcha;// $("#capt").text(captcha);
				$("#capt").text(captcha);
				// return captcha;
			}
			generatecaptcha(6);
			$("#refresh").click(function(){
				$('#txt').val("");
			 	generatecaptcha(6);
			 })
			$("#verify").click(function(){
				let cap=currentcaptcha;
				let tet=$("#txt").val();
				if(cap!==tet){
				    generatecaptcha(6);
				    $('#txt').val("");
					$("#cmsg").html("<font color='red'>Invalid Captcha</font>");
				}
				else{
					// generatecaptcha(6);
					// $('#txt').val("");
					$("#cmsg").html("<font color='green'>Valid Captcha</font>");
				}
			})
			
})

