
  // Here we run a very simple test of the Graph API after login is successful. 
  // This testAPI() function is only called in those cases. 
  var photo;
  function loginFacebook() {
    console.log('Welcome!  Fetching your information.... ');
	FB.api('/me/picture?type=normal', function(response) {
 
		 photo = response.data.url;
					
				 
	});
    (FB.api('/me', function(response) {
					email2 = response.email;
					//alert(email2);
					var firstName2 = response.first_name;
					//alert(firstName2);
					var last_name2 = response.last_name;
					//alert(last_name2);
					var gender2 = response.gender;
					//alert(gender2);
					var birthday_date2 = response.birthday;
					//alert(birthday_date2);
					
					//alert(photo);
					$.ajax({
								url: "../develop/login/loginfb.php",
								dataType: "json",
								type: "POST",
								data: {
									name: firstName2,
									surnames: last_name2,
									gender: gender2,
									birthdate: birthday_date2,
									email:email2,
									picture:photo
									
								},
								complete: function(r){
								
									var json = JSON.parse(r.responseText);
									
									if (json.Token ==0){
										alert("error");
									} else {
											redirectLoginFb();
										}
										
								},
								onerror: function(e,val){
									alert("Hay error");
								}
					});
			},{scope: 'email,user_photos,user_videos,user_birthday'}) );
  }
  
  function redirectLoginFb(){
	alert("Login correcto con facebook");
	window.location.href="http://www.where2night.es/user/profile.php";	
	//document.getElementById("logFb").innerHTML=email2;
  }
  
   function logOut()
    {
		
		FB.logout(function(){window.location.href="http://www.where2night.es";});

    }