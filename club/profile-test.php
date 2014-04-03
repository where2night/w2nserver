<?php

include_once "../framework/sessions.php";
include_once "../framework/visits.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>W2N-Profile Club</title>
    <meta name="description" content="Where2Night"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no" />
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv="pragma" content="no-cache" />
   <!-- Icon W2N -->
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <!-- Estilos Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet" media="screen">
  	<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../css/profile-test1.css" type="text/css" /><!-- Responsive -->
	<link rel="stylesheet" href="../css/profile-test2.css" type="text/css" /><!-- Responsive -->	
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>

	<!-- script -->
<script src="../js/events.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/register.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="../js/keep-session.js"></script>

<script type="text/javascript"> 
	function getData(){
<?php 
	if(isset($_GET['idv'])){
?>
	
	var idProfile = <?php echo $_GET['idv'];?>;
	var id = <?php echo $_SESSION['id_user'];?>;
	var token = "<?php echo $_SESSION['token'];?>";
	var params = "/" + idProfile + "/" + token; 
	var url1 = "../develop/update/";
	var params = "/" + id + "/" + token + "/" + idProfile;
	url1 += "local.php";
	url1 += params;
	$.ajax({
	url: url1,
	dataType: "json",
	type: "GET",
	timeout: 5000,
	complete: function(r2){
		var json = JSON.parse(r2.responseText);
		var companyName = json.companyName;
		var localName = json.localName;
		var cif = json.cif;
		var poblationLocal = json.poblationLocal;
		var cpLocal = json.cpLocal;
		var telephoneLocal = json.telephoneLocal;
		var street = json.street;
		var streetName = json.streetNameLocal;
		var streetNumber = json.streetNumberLocal;
		var music = json.music;
		var entryPrice = json.entryPrice;
		var drinkPrice = json.drinkPrice;
		var openingHours = json.openingHours;
		var closeHours = json.closeHours;
		var picture = json.picture;
		var about = json.about;
		var latitude = json.latitude;
		var longitude = json.longitude;
		$.post("../framework/visits_add.php",
		  {
		  	user_type: 'club',
		    id_user: idProfile,
			companyName: companyName,
			localName: localName,
			cif: cif,
			poblationLocal: poblationLocal,
			cpLocal: cpLocal,
			telephoneLocal: telephoneLocal,
			street: street,
			streetName: streetName,
			streetNumber: streetNumber,
			music: music,
			entryPrice: entryPrice,
			drinkPrice: drinkPrice,
			openingHours: openingHours,
			closeHours: closeHours,
			picture: picture,
			about: about,
			latitude: latitude,
			longitude: longitude
		  },
		  function(data,status){
			//alert("Data: " + data + "\nStatus: " + status);								  ;
		  });
		},
		onerror: function(e,val){
			alert("Contraseña y/o usuario incorrectos");
		}
	});

	


<?php		
	}// end (isset($_GET['idv']))
?>

}
    
    
    </script>


	<script type="text/javascript">  
    $(document).ready(function(){ 
		getData();
      
	     $("#change-data").on("click", function (event) {
          
        var idProfile = <?php echo $_SESSION['id_user'];?>;
        var token = "<?php echo $_SESSION['token'];?>";
        var companyName = $('#name').val();
        var localName = $('#local_name').val();
        var cif = $('#cif').val();
        var poblationLocal = $('#poblation').val();
        var cpLocal = $('#postal-code').val();
        var telephone = $('#telephone').val();
        var street = $("#street").val();
        var streetName = $("#streetName").val();
        var streetNumber = $("#streetNumber").val();
        var music = $('#music-style').val();
        var entryPrice = $('#entryPrice').val();
        var drinkPrice = $('#drinkPrice').val();

        var timepicker_open = $("#timepicker_open").data("kendoTimePicker");
		var date1 = timepicker_open.value();
		var openingHours = '';

		var h = date1.getHours();
		var m = date1.getMinutes();
		var s = date1.getSeconds();

		if (h < 10) h = '0' + h;
		if (m < 10) m = '0' + m;
		if (s < 10) s = '0' + s;

		openingHours = h + ':' + m + ':' + s;

		var timepicker_close = $("#timepicker_close").data("kendoTimePicker");
		var date2 = timepicker_close.value();
		var closeHo2rs = '';

		var h = date2.getHours();
		var m = date2.getMinutes();
		var s = date2.getSeconds();

		if (h < 10) h = '0' + h;
		if (m < 10) m = '0' + m;
		if (s < 10) s = '0' + s;

		closeHours = h + ':' + m + ':' + s;

        var about = $('#about-you').val();
        var picture = '';

        var params = "/" + idProfile + "/" + token;
        
         console.log($.ajax({
            url: "../develop/update/local.php" + params,
            dataType: "json",
            type: "POST",
            timeout: 5000,
            data: {
              idProfile:idProfile,
              companyName:companyName,
              localName:localName,
              cif: cif,
              telephone: telephone,
              poblationLocal: poblationLocal,
              cpLocal: cpLocal,
              street: street,
              streetName: streetName,
              streetNumber: streetNumber,
              music: music,
              entryPrice: entryPrice,
              drinkPrice: drinkPrice,
              openingHours: openingHours,
              closeHours: closeHours,
              picture: picture,
              about: about
            },
            complete: function(r){
              $.post("../framework/session_start.php",
                    {
						type_login: 'normal',
						user_type: 'club',
						id_user: idProfile,
						token: token,
						companyName:companyName,
						localName:localName,
						cif: cif,
						telephone: telephone,
						poblationLocal: poblationLocal,
						cpLocal: cpLocal,
						street: street,
						streetName: streetName,
						streetNumber: streetNumber,
						music: music,
						entryPrice: entryPrice,
						drinkPrice: drinkPrice,
						openingHours: openingHours,
						closeHours: closeHours,
						picture: picture,
						about: about
					},
                    function(data,status){
                      //window.location.href="home.php";
                    });
                
              },
            onerror: function(e,val){
              alert("Hay error");
            }
        }));
      });
 
		
	});//end $(document).ready(function()
	</script>
	
	<script type="text/javascript">
function changeMyClassName(theButton)
{
myButtonID = theButton.id;
if(document.getElementById(myButtonID).className=='myClickedButton')
{
document.getElementById(myButtonID).className='myDefaultButton';
document.getElementById(myButtonID).value='SIGUEME';
}
else
{
document.getElementById(myButtonID).className='myClickedButton';
document.getElementById(myButtonID).value='SIGUIENDO';
}
}
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
  $idProfile=$_SESSION['id_user']; 
  $token=$_SESSION['token']; 
  
  
?>


<script>
	

var ide = '<?php echo $idProfile; ?>' ;
var tok = '<?php echo $token; ?>' ;
	
</script>



<!-- MiPerfil -->
<div class="container" style="background-image:url(../images/CollageNeon.jpg);margin-bottom:-50px;">
		<div class="row">
			<div class="col-md-10" id="content-wrapper"  style="background-image:url(../images/CollageNeon.jpg)">
				<div class="row">
					<div class="col-lg-12">
					<header class="page-header"style="background-color:#000; border-color:#ff6b24;margin-bottom:1%;padding-bottom:1px;padding-top:1px;margin-top:1%;margin-left:1%;margin-right:-20%">
					<h1 style="color:#ff6b24;">Perfil Local</h1>
					</header>
						<div class="row" id="user-profile"style="background-color:#000;margin-left:1%;margin-right:-20%">
							<div class="col-lg-3 col-md-4 col-sm-4" >
								<div class="main-box clearfix"style="background-color:#1B1E24;border-color:#ff6b24;box-shadow: 1px 1px 2px 0 #ff6b24;">
									<h2 style="color:#ff6b24;text-transform: uppercase; text-align:center;"><?php echo $_SESSION['local_name']; ?>NOMBRE LOCAL</h2>
									
									<img src="../images/reg1.jpg" alt="" class="profile-img img-responsive center-block banner1" style="border-color:#ff6b24;"/>
									<div class="profile-label">
										<span class="label label" style="">Destroyer</span>
									</div>
									
									<div class="profile-stars">
										
										<span style="color:orange;">Modo</span>
									</div>
									<div class="profile-since"style="color:#707070;">
										Miembro desde: Ene 2012
									</div>
									
									<div class="profile-details" style="background-color:#1B1E24;border-color:#ff6b24;">
										<ul class="fa-ul">
											<li  style="color:#ff6b24;">Seguidores: <span style=""> 456</span></li>
											<li  style="color:#ff6b24;">Publicaciones: <span style=""> 828</span></li>
										</ul>
									</div>
									
									<div class="profile-message-btn center-block text-center">
										<a href="#" class="">
											<input id="btn01"  class="botonseguir" type="button"value="SIGUEME"onClick="btnSeguir(this);">
											
										</a>
									</div>
								</div>
							</div>
							
							<div class="col-lg-9 col-md-8 col-sm-8">
								<div class="main-box clearfix " style="background-color:#1B1E24;box-shadow: 1px 1px 2px 0 #ff6b24;">
									<div class="profile-header">
										<h3 style="border-color:#ff6b24"><span style="color:#ff6b24;border-color:#ff6b24">Acerca de nosotros</span></h3>
									</div>
									
									<p style="color:#707070;">
										<?php echo $_SESSION['about']; ?>
									</p>
									
									<h3 style="border-color:#ff6b24"><span style="color:#ff6b24;border-color:#ff6b24">Información</span></h3>
									
									<div class="row profile-user-info">
										<div class="col-sm-8">
											<div class="profile-user-details clearfix">
												<div class="profile-user-details-label"style="color:#34d1be;">
													Nombre Local
												</div>
												<div class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
													<?php echo $_SESSION['local_name']; ?>
												</div>
											</div>
											<br>
											<div class="profile-user-details clearfix">
												<div class="profile-user-details-label"style="color:#34d1be;">
													Estilo de Música
												</div>
												<div class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
													<?php echo $_SESSION['music']; ?>
												</div>
											</div>
											<br>
											<div class="profile-user-details clearfix">
												<div class="profile-user-details-label"style="color:#34d1be;">
													Precio Entrada
												</div>
												<div class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
													<?php if ( $_SESSION['entry_price'] == "") echo  $_SESSION['entry_price']." €"?>
												</div>
											</div>
											<br>
											<div class="profile-user-details clearfix">
												<div class="profile-user-details-label"style="color:#34d1be;">
													Precio Bebida
												</div>
												<div class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
													<?php echo $_SESSION['drink_price']; ?>
												</div>
											</div>
										</div>
										
										<div class="col-sm-4 profile-social">
											<ul class="fa-ul" style="color:orange">
												<li><i class=""></i><a href="#" style="">@Twitter</a></li>
												<li><i class=""></i><a href="#"style="">Facebook</a></li>
												<li><i class=""></i><a href="#"style="">Instagram</a></li>
		
											</ul>
										</div>
									</div>
									
									<div class="tabs-wrapper profile-tabs" >
										<ul class="nav nav-tabs"style="border-color:#ff6b24;">
											<li class="active"><a href="#tab-activity" data-toggle="tab">Actividad</a></li>
											<li><a href="#tab-friends" data-toggle="tab">Seguidores</a></li>
											<li><a href="#tab-photos" data-toggle="tab">Fotos</a></li>	
										</ul>
										<!-- Comienza Actividad -->
										<div class="tab-content">
											<div class="tab-pane fade in active" id="tab-activity">
												
															
																<div class="the-timeline">
																	<ul>
																		<!-- Comienza Evento -->
																		<li class="">
																			<div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div>
																				<span class="label label-dark-blue" style="font-size:12px;">Evento Local</span> <?php echo $_SESSION['local_name']; ?>
																				<span style="font-size:12px;color:orange">Publicó el evento <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> hace 3 min</span>
																		</li>
																		<table class="table  tablaC1">
																			<tbody>
																				<tr class="">
																					<td><h5 style="color:#ff6b24">Título Evento</h5><p style="color:#707070;font-size:14px;"></p>
																					<input id="btn05"  class="botonapuntar" type="button"value="Me Apunto"onClick="btnApuntar(this);">
																					</td>
																				</tr>
																			</tbody>
																		</table>
																		<!-- Termina Evento -->
																		<!-- Comienza Evento -->
																		<li class="">
																			<div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div>
																				<span class="label label-dark-blue" style="font-size:12px;">Lista Local</span> <?php echo $_SESSION['local_name']; ?>
																				<span style="font-size:12px;color:orange;">Publicó la lista <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> hace 3 min</span>
																		</li>
																		<table class="table  tablaC1">
																			<tbody>
																				<tr class="">
																					<td><h5 style="color:#ff6b24">Título Lista</h5><p style="color:#707070;font-size:14px;"></p>
																					<input id="btn04"  class="botonapuntar" type="button"value="Me Apunto"onClick="btnApuntar(this);">
																					</td>
																				</tr>
																			</tbody>
																		</table>
																		<!-- Termina Evento -->
																	</ul>
																</div>	
											</div>
										<!-- Termina Actividad -->	
										<!-- Comienza Amigos -->
											<div class="tab-pane fade " id="tab-friends">
												<ul class="widget-users row">
													<li class="col-md-6" style="border-color:#ff6b24;">
														<div class="img" style="">
															<img src="../images/profile.jpg" alt=""/>
														</div>
														<div class="details" style="background-color:#1B1E24;border:0px">
															<div class="name">
																<a href="#" style="color:#ff6b24; font-size:16px;">Nombre Seguidor</a>
															</div>
															<div class="time">
																<i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:11px;"></i> Última publicación: 3 min
															</div>
															<div class="type">
																<span class="label">Modo</span>
															</div>
														</div>
													</li>
													<li class="col-md-6"style="border-color:#ff6b24;">
														<div class="img">
															<img src="../images/profile.jpg" alt=""/>
														</div>
														<div class="details"style="background-color:#1B1E24;border:0px">
															<div class="name">
																<a href="#" style="color:#ff6b24; font-size:16px;">Nombre Seguidor</a>
															</div>
															<div class="time">
																<i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:11px;"></i> Última publicación: 1 semana
															</div>
															<div class="type">
																<span class="label">Modo</span>
															</div>
														</div>
													</li>
													<li class="col-md-6" style="border-color:#ff6b24;">
														<div class="img" style="">
															<img src="../images/profile.jpg" alt=""/>
														</div>
														<div class="details" style="background-color:#1B1E24;border:0px">
															<div class="name">
																<a href="#" style="color:#ff6b24; font-size:16px;">Nombre Seguidor</a>
															</div>
															<div class="time">
																<i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:11px;"></i> Última publicación: 3 min
															</div>
															<div class="type">
																<span class="label">Modo</span>
															</div>
														</div>
													</li>
													<li class="col-md-6"style="border-color:#ff6b24;">
														<div class="img">
															<img src="../images/profile.jpg" alt=""/>
														</div>
														<div class="details"style="background-color:#1B1E24;border:0px">
															<div class="name">
																<a href="#" style="color:#ff6b24; font-size:16px;">Nombre Seguidor</a>
															</div>
															<div class="time">
																<i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:11px;"></i> Última publicación: 1 semana
															</div>
															<div class="type">
																<span class="label">Modo</span>
															</div>
														</div>
													</li>
													
												<br/>
												
											</div>
										<!-- Termina Amigos -->	
									
											<!-- Comienza Fotos -->
											<div class="tab-pane fade" id="tab-photos">	
											<!--	<div class="container" style="background-color:#000;box-shadow: 1px 1px 2px 0 #ff6b24;">
													<form class="form-inline">
													<div class="form-group">
														<a href="#"id="image-gallery-button" class="btn btn-success pull-right" style="background-color:#000;border-color:#ff6b24;color:#34d1be;">Ver todas</a>
													</div>
													</form>
													<br>
												<!-- The container for the list of example images -->
												<!-- 	<div id="links"></div>
													<br>
												</div>
											<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
											<!-- 	<div id="blueimp-gallery" class="blueimp-gallery" >
												<!-- The container for the modal slides -->
												<!-- 	<div class="slides"></div>
													<!-- Controls for the borderless lightbox -->
												<!-- 	<h3 class="title"></h3>
													<a class="prev">‹</a>
													<a class="next">›</a>
													<a class="close">×</a>
													<a class="play-pause"></a>
													<ol class="indicator"></ol>
													<!-- The modal dialog, which will be used to wrap the lightbox content -->
												<!-- 	<div class="modal fade" style="background-color:transparent; width:100%;height:100%;margin-top:20%;">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" aria-hidden="true">&times;</button>
																	<h4 class="modal-title"></h4>
																</div>
																<div class="modal-body next"></div>
																<div class="modal-footer">
																	<a href="#" class="btn btn-success pull-left prev" style="background-color:#000;border-color:#ff6b24;color:#34d1be;"><i class="glyphicon glyphicon-chevron-left"></i> Anterior </a>
																	<a href="#" class="btn btn-success pull-right next" style="background-color:#000;border-color:#ff6b24;color:#34d1be;">Siguiente <i class="glyphicon glyphicon-chevron-right"></i></a>
												
																</div>
															</div>
														</div>
													</div>
												</div>-->
	
											</div>	<!-- Termina Fotos -->
									
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- /MiPerfil --> 
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script src="../js/profile-test1.js"></script>
<script src="../js/profile-test2.js"></script>
</body>
</html>
