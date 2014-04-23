<?php

include_once "../framework/sessions.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>W2N-Users Friends</title>
    <meta name="description" content="Where2Night"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no" />
   <!-- Icon W2N -->
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <!-- Estilos Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet" type="text/css">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
	<link href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >
	<link href="../css/custom.css" rel="stylesheet" media="screen">
	<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->	   	 
	<link rel="stylesheet" href="../css/profile-test1.css" type="text/css" /><!-- Responsive -->
	<link rel="stylesheet" href="../css/profile-test2.css" type="text/css" /><!-- Responsive -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
<!-- script -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/register.js"></script>
<script src="../js/keep-session.js"></script>
<script src="../js/user-list.js"></script>
<!-- /script -->

<?php 
  $idProfil=$_SESSION['id_user']; 
  $toke=$_SESSION['token']; 

?>


<script>
var ide = '<?php echo $idProfil; ?>' ;
var tok = '<?php echo $toke; ?>' ;
</script>



  <script type="text/javascript">  
    $(document).ready(function(){ 
    	
         //Get user info
		var idProfile = <?php echo $_SESSION['id_user'];?>;
	    var token = "<?php echo $_SESSION['token'];?>";
		var params = "/" + idProfile + "/" + token; 
		var url2 = "../develop/update/partier.php" + params;
			
			$.ajax({
				url:url2,
				dataType: "json",
				type: "GET",
				complete: function(r3){
					var json = JSON.parse(r3.responseText);
				/*	var picture = json.picture;
					//$("#profile-img").attr("src", picture);*/
					var name = json.name;
					var surnames = json.surnames;
					//$("#complete-name").text(name + " " + surnames);
					//$("#complete-name2").text(name + " " + surnames);
					$("#navbar-complete-name").text(name + " " + surnames);
					$("#navbar-complete-name2").text(name + " " + surnames);
				/*	var birthdate = json.birthdate;
					var birth_array = birthdate.split("/");
					$("#birthdate").text(birth_array[2] + "/" + birth_array[1] + "/" + birth_array[0]);
					var gender = json.gender;
					if(gender == "male"){
						$("#gender").text("Hombre");
					}
					if(gender == "female"){
						$("#gender").text("Mujer");
					}
					var music = json.music;
					$("#music").text(music);
					var civil_state = json.civil_state;
					$("#civil_state").text(civil_state);
					var city = json.city;
					$("#city").text(city);
					var drink = json.drink;
					$("#drink").text(drink);
					var about = json.about;
					$("#about").text(about);
					var mode = json.mode;
					if (mode == 0){
							modeString = "De tranquis";
					}else if (mode == 1){
						modeString = "Hoy no me lío";
					}else if (mode == 2){
						modeString = "Lo que surja";
					}else if (mode == 3){
						modeString = "Lo daré todo";
					}else if (mode == 4){
						modeString = "Destroyer";
					}else if (mode == 5){
						modeString = "Yo me llamo Ralph";
					}
					
					$('#mode').append('<span class="label label">'+modeString+'</span>');
				  */
				},
				onerror: function(e,val){
					alert("No se puede introducir evento 2");
				}
			});
         
          //Get USER's info 


						var params = "/" ;
							params=params.concat(ide); 
							params=params.concat("/");
							params=params.concat(tok);
							params=params.concat("/");
							params=params.concat(ide);
	

	  					var url="../develop/read/myFriends.php";
							url=url.concat(params);
	
					var Array_friends = new Array();
					$.ajax({
								url: url,
								dataType: "json",
								type: "GET",
								async: false,
								complete: function(r){
			  							var json = JSON.parse(r.responseText);
													  							var count=json.numFriends;
	   									var i=0;
			 
			 							while (i<count){
			 							
			 							var id_user = json[i].idProfile;
										Array_friends[Array_friends.length]=id_user;
										var music = json[i].music;
										if (music == null || music.length == 0){
										music = "Estilo no definido";
										}
										var picture = json[i].picture;
										if (picture == null || picture.length == 0){
										picture = "../images/reg1.jpg";
										}
										var link = "../user/profile.php?idv=" + id_user;
				
				    					var name = json[i].name;
										var surnames = json[i].surnames;
										var drink = json[i].drink;
										var mode =  json[i].mode;
										var modeString;
						
										if (mode == 0){
											modeString = "De tranquis";
											}else if (mode == 1){
											modeString = "Hoy no me lío";
											}else if (mode == 2){
											modeString = "Lo que surja";
											}else if (mode == 3){
											modeString = "Lo daré todo";
											}else if (mode == 4){
											modeString = "Destroyer";
											}else if (mode == 5){
											modeString = "Yo me llamo Ralph";
											}



			 							
			 							
			 								$('#user-list tbody').append('<tr><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><img src="'+ picture +'" alt=""/><a href="'+ link +'" class="user-link"style="color:#FF6B24" target="_blank">'+ name+' '+surnames +'</a><span class="user-subhead">Fiestero</span></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ modeString +'</a></td><td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ drink+'</a></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ music +'</a></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;" colspan="2"></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><span id="b'+i+'" class="glyphicon glyphicon-user" style="color:#000000;font-size: 30px"></span></td><td style="box-shadow:none;width:20%;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"> <a href="#" id="b'+i+'" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:25%"><span id="b'+i+'" onclick="deleteFriend(this.id,'+id_user+');">Eliminar</span></a></td></tr>');
						
			 							     i=i+1;
			 								}
								},
								onerror: function(e,val){
									alert("No se pueden saber los seguidores");
									}
								});


                         		                     	
			                     	var url="../develop/read/petFriendship.php";
										url=url.concat(params);

					
					var Array_request = new Array();
									$.ajax({
											url: url,
											dataType: "json",
											type: "GET",
											async: false,
											complete: function(r){
			  									var json = JSON.parse(r.responseText);
						 									var count=json.numPetitions;
	   											var i=0;
			 
			 									while (i<count){
			
												var id_user = json[i].idProfile;
												Array_request[Array_request.length]=id_user;
												var music = json[i].music;
												if (music == null || music.length == 0){
													music = "Estilo no definido";
													}
												var picture = json[i].picture;
												if (picture == null || picture.length == 0){
													picture = "../images/reg1.jpg";
													}
												var link = "../user/profile.php?idv=" + id_user;
				
				    							var name = json[i].name;	
												var surnames = json[i].surnames;
												var city = json[i].city;
												var drink = json[i].drink;
												var mode =  json[i].mode;
												var modeString;
												if (mode == 0){
													modeString = "De tranquis";
												}else if (mode == 1){
														modeString = "Hoy no me lío";
												}else if (mode == 2){
														modeString = "Lo que surja";
												}else if (mode == 3){
														modeString = "Lo daré todo";
												}else if (mode == 4){
														modeString = "Destroyer";
												}else if (mode == 5){
														modeString = "Yo me llamo Ralph";
												}



			 										$('#user-list tbody').append('<tr><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><img src="'+ picture +'" alt=""/><a href="'+ link +'" class="user-link"style="color:#FF6B24" target="_blank">'+ name+' '+surnames +'</a><span class="user-subhead">Fiestero</span></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ modeString +'</a></td><td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ drink+'</a></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ music +'</a></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;" colspan="2"></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><span class="glyphicon glyphicon-envelope" style="color:#000000;font-size: 30px"></span></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;" colspan="2">SOLICITUD PENDIENTE</td></tr>');
													i=i+1;		
			    								}
											},
												onerror: function(e,val){
													alert("No se pueden saber los seguidores");
														}
										});




		var params = "/" + ide + "/" + tok; 
        var url1 = "../develop/read/partiers.php" + params;
        
        
        $.ajax({
			url: url1,
			dataType: "json",
			type: "GET",
			async: false,
			timeout: 5000,
			complete: function(r2){
				
				var json = JSON.parse(r2.responseText);
				
				for(var i=0; i<json.length; i++){
					
					
					var id_user = json[i].idProfile;
					var music = json[i].music;
					if (music == null || music.length == 0){
						music = "Estilo no definido";
					}
					var picture = json[i].picture;
					if (picture == null || picture.length == 0){
						picture = "../images/reg1.jpg";
					}
					var link = "../user/profile.php?idv=" + id_user;
				
				    var name = json[i].name;
					var surnames = json[i].surnames;
					var city = json[i].city;
					var drink = json[i].drink;
					
					var mode =  json[i].mode;
						var modeString;
						
						if (mode == 0){
							modeString = "De tranquis";
						}else if (mode == 1){
							modeString = "Hoy no me lío";
						}else if (mode == 2){
							modeString = "Lo que surja";
						}else if (mode == 3){
							modeString = "Lo daré todo";
						}else if (mode == 4){
							modeString = "Destroyer";
						}else if (mode == 5){
							modeString = "Yo me llamo Ralph";
						}

	    					
	    					var contains_friend=$.inArray(id_user, Array_friends);
	    					var contains_request=$.inArray(id_user, Array_request);
	    					
	    				if(contains_friend==-1 && contains_request==-1 )	
	    					$('#user-list tbody').append('<tr><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><img src="'+ picture +'" alt=""/><a href="'+ link +'" class="user-link"style="color:#FF6B24" target="_blank">'+ name+' '+surnames +'</a><span class="user-subhead">Fiestero</span></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ modeString +'</a></td><td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ drink+'</a></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ music +'</a></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;" colspan="4"></td></tr>');
						}
				
	    		},
				onerror: function(e,val){
					alert("Contraseña y/o usuario incorrectos");
				}
			});


    });//end $(document).ready(function()
    
  </script> 

</head>

<body>
<style>  

 navbar-fixed-top{
		z-index:1030;
	  }
	@media (max-width: 979px){
		body{
			padding:0px;
		}
		.navbar-fixed-top {
			margin-bottom: 0px;
		}
		.navbar-fixed-top, .navbar-fixed-bottom {
			position: fixed;
		}	
		.navbar .container {
			width: auto;
			padding: 0px 20px;
			color:#000;
		}
		.container{
			padding:0px 20px;
		}
	}	
			
    </style>

<?php 
  /*NavbarHeader*/
  include "templates/navbar-header.php";

  /*Sidebar*/
  include "templates/sidebar.php";
?>
<!-- MiPerfil -->
<div class="container" style="background-image:url(../images/CollageNeon.jpg);margin-bottom:-50px;margin-left:200px">
		<div class="row">
			<div class="col-md-10" id="content-wrapper"  style="background-image:url(../images/CollageNeon.jpg)">
				<div class="row">
					<div class="col-lg-12">
					<header class="page-header"style="background-color:#000; border-color:#ff6b24;margin-bottom:1%;padding-bottom:1px;padding-top:1px;margin-top:0%;width:102%">
					<h1 style="color:#ff6b24;font-size:30px;">Amigos Fiesteros</h1>
					</header>
					<div class="row" id="user-profile"style="background-color:#000; padding-top:8px;margin-left:0px;width:102%;margin-right:-20%;margin-top:-1%">
						<div class="col-lg-9 col-md-8 col-sm-8">
							<div class="main-box clearfix " style="background-color:#1B1E24;box-shadow: 1px 1px 2px 0 #ff6b24;width:134%">
									<div class="row">
							<div class="col-lg-12">
								
									<div class="table-responsive">
										<table id="user-list" class="table user-list">
											<thead>
												<tr>
													<th><span style="color:#FF6B24;border-color:#ff6b24">Fiestero</span></th>									
													<th class="text-center"><span style="color:#FF6B24;border-color:#ff6b24">Modo</span></th>
													<th><span style="color:#FF6B24;border-color:#ff6b24">Bebida favorita</span></th>
													<th><span style="color:#FF6B24;border-color:#ff6b24">Música favorita</span></th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
									<ul class="pagination pull-right">
										<li ><a href="#"><i class="glyphicon glyphicon-chevron-left" style="color:#FF6B24;"></i></a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">1</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">2</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">3</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">4</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">5</a></li>
										<li><a href="#"><i class="glyphicon glyphicon-chevron-right"style="color:#FF6B24"></i></a></li>
									</ul>
								</div>
							
						</div>
								<!--Aqui empieza-->
							</div>
						</div>
					</div>	
					</div>	
				</div>
			</div>
		</div>
</div>	
<!-- MiPerfil -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script src="../js/profile-test1.js"></script>
<script src="../js/profile-test2.js"></script>
<script src="../js/club-list.js"></script>
</body>
</html>
