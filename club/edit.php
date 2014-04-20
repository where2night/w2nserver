<?php

include_once "../framework/sessions.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>W2N-EditProfile Club</title>
    <meta name="description" content="Where2Night"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no" />

    <!-- Icon W2N -->
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon.ico" type="image/x-icon">

    <!-- Styles -->
	
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet" media="screen">
  	<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">	
	<link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->	
	<link rel="stylesheet" href="../css/profile-test1.css" type="text/css" /><!-- Responsive -->
	<link rel="stylesheet" href="../css/profile-test2.css" type="text/css" /><!-- Responsive -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../css/profile-photo.css" type="text/css" />
	<link href="../css/kendo.common.min.css" rel="stylesheet" />
    <link href="../css/kendo.default.min.css" rel="stylesheet" />
	<!-- script -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>	
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/keep-session.js"></script>	
	
	
	
	<script type="text/javascript">  
    $(document).ready(function(){ 
      
	                
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
		$("#change-data1").on("click", function (event) {
	          
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
		$("#timepicker_open").kendoTimePicker({
		    format: "HH:mm"
		});
		$("#timepicker_close").kendoTimePicker({
		    format: "HH:mm"
		});     
    });//end $(document).ready(function()
    
    
    </script>

</head>

<body>
	<style>  
		body{
			  background-color: #000;
		}
		navbar-fixed-top{
				z-index:1030;
		}
		@media (max-width: 979px){

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
					<h1 style="color:#ff6b24;font-size:30px;">Editar Perfil Local</h1>
					</header>
						<div class="row" id="user-profile"style="background-color:#000; padding-top:8px;margin-left:0px;width:102%;margin-right:-20%;margin-top:-1%">
							
							
							<div class="col-lg-9 col-md-8 col-sm-8">
								<div class="main-box clearfix " style="background-color:#1B1E24;box-shadow: 1px 1px 2px 0 #ff6b24;width:134%">
									
									<div class="profile-header">
										<h3 style="border-color:transparent"><span style="color:#ff6b24;border-color:#ff6b24">Información</span></h3>
									</div> 
									<div class="tabs-wrapper profile-tabs" >
										<ul class="nav nav-tabs"style="border-color:#ff6b24;">
											<li class="active"><a href="#tab-basic" data-toggle="tab">Básica</a></li>
											<li><a href="#tab-details" data-toggle="tab">Detallada</a></li>
											<li><a href="#tab-photo" data-toggle="tab">Foto</a></li>
										</ul>
										
										<div class="tab-content">
										<!-- Comienza Basic-->
											<div class="tab-pane fade in active" id="tab-basic">
												 <form class="form-horizontal" style="width:99%"role="form">
                                                        <div class="form-group">
                                                            <label for="local_name" class="col-lg-2 control-label" style="color:#ff6b24;font-size:13px;">Nombre Local</label>
                                                            <div class="col-lg-9">
                                                                <input type="text" class="form-control" id="local_name" name="local_name" placeholder="Nombre Local" value="<?php echo $_SESSION['local_name']; ?>">
                                                            </div>
                                                        </div>
                                                        
														<div class="form-group">
															<label class="col-lg-2 control-label" style="color:#ff6b24;font-size:13px;">Dirección </label>
															<div class="col-sm-2 " >
															<select class="form-control" style="height:26px;margin-top:4%;padding-bottom:2%;padding-top:1%" id="street" required>
																<option value="0" <?php if ($_SESSION['street'] == 0) echo 'selected="1"'; ?>>Calle</option>
																<option value="1" <?php if ($_SESSION['street'] == 1) echo 'selected="1"'; ?>>Avd.</option>
																<option value="2" <?php if ($_SESSION['street'] == 2) echo 'selected="1"'; ?>>Plaza</option>
															</select>
															</div>
															<div class="col-sm-6 control-label">
																<input id="streetName" type="text" class="form-control" placeholder="Nombre"/>
															</div>
															<div class="col-sm-1 control-label">
																<input id="streetNumber" type="text" class="form-control" placeholder="Número"/>
															</div> 
														</div>
														<div class="form-group">
															<label for="poblation" class="col-lg-2 control-label" style="color:#ff6b24;font-size:13px;">Población</label>
															<div class="col-sm-2">
																<input type="text" class="form-control" id="poblation" placeholder="Población"value="<?php echo $_SESSION['poblation_local']; ?>">
															</div>
															<label for="postal-code" class="col-lg-2 control-label" style="color:#ff6b24;font-size:13px; margin-left:-5%">C.P. </label>
															<div class="col-sm-2">
																<input type="text" class="form-control" id="postal-code" name="postal-code" placeholder="C.P"value="<?php echo $_SESSION['cp_local']; ?>">
															</div>
															<label for="telephone" class="col-lg-2 control-label" style="color:#ff6b24;font-size:13px;">Teléfono</label>
															<div class="col-sm-2">
																<input type="text" class="form-control" id="telephone" name="telephone" placeholder="Teléfono"value="<?php echo $_SESSION['telephone']; ?>" >
															</div>
														</div>
                                                        <div class="form-group">
                                                            <label for="inputemail" class="col-lg-2 control-label" style="color:#ff6b24;font-size:13px;">Correo Electrónico</label>
                                                            <div class="col-lg-9">
                                                                <input type="email" class="form-control" id="inputemail" placeholder="Correo Electrónico">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputpassword" class="col-lg-2 control-label"style="color:#ff6b24;font-size:13px;">Contraseña</label>
                                                            <div class="col-lg-9">
                                                                <input type="password" class="form-control" id="inputpassword" placeholder="Contraseña">
                                                                <input type="password" class="form-control together" id="inputpassword2" placeholder="Repite Contraseña">
                                                            </div>
                                                        </div>
                                                       
                                                    </form>
													<a id="change-data" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:44%">Guardar Cambios</a>		
																
											</div>
										<!-- Termina Basic -->	
										<!-- Comienza Details -->
											<div class="tab-pane fade " id="tab-details">
												 <form class="form-horizontal " style="width:99%"role="form">
													
                                                        <div class="form-group">
                                                            <label for="music-style" class="col-lg-2 control-label"style="color:#ff6b24;font-size:13px;">Estilo de Música</label>
                                                            <div class="col-lg-10">
                                                                <input id="music-style" name="favourite-music" type="text" placeholder="Estilo de Música" class="form-control"value="<?php echo $_SESSION['music']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="entryPrice" class="col-lg-2 control-label"style="color:#ff6b24;font-size:13px;">Precio Entrada</label>
                                                            <div class="col-lg-1">
                                                                <input id="entryPrice" name="favourite-drink" type="text" placeholder="Precio Entrada" class="form-control" value="<?php echo $_SESSION['entry_price']; ?>">
                                                            </div>
															<label for="drinkPrice" class="col-lg-2 control-label"style="color:#ff6b24;font-size:13px;">Precio Bebida</label>
                                                            <div class="col-lg-1">
                                                                <input id="drinkPrice" name="favourite-drink" type="text" placeholder="Precio Bebida" class="form-control" value="<?php echo $_SESSION['drink_price']; ?>">
                                                            </div>
                                                        </div>
														<div class="form-group">
                                                           <label for="timepicker_open" class="col-lg-2 control-label"style="color:#ff6b24;font-size:13px;">Apertura</label>
                                                            <div class="col-lg-2" >
                                                                 <input id="timepicker_open" style="height:22px"value="<?php echo $_SESSION[opening_hours];?>" />
                                                            </div>
															<label for="timepicker_close" class="col-lg-2 control-label"style="color:#ff6b24;font-size:13px;">Cierre</label>
                                                            <div class="col-lg-2">
                                                                <input id="timepicker_close" style="height:22px"value="<?php echo $_SESSION[close_hours];?>" />
                                                            </div>
															
                                                        </div>
														
														<div class="form-group">
                                                            <label for="about-you" class="col-lg-2 control-label"style="color:#ff6b24;font-size:13px;">Acerca de Mi</label>
                                                            <div class="col-lg-10">
                                                                <textarea id="about-you" class="form-control" placeholder="Acerca de Mi..." rows="6" style="font-size:13px"><?php echo $_SESSION['about']; ?></textarea>
                                                            </div>
                                                        </div>
														
                                                     </form>   
													<a id="change-data1" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:44%">Guardar Cambios</a>	
													
											</div>
										<!-- Termina Details -->	
										<!-- Comienza Photo -->
											<div class="tab-pane fade " id="tab-photo">
													
												<div class="fileupload fileupload-new" data-provides="fileupload">
												<div class="fileupload-new thumbnail " style="width: 25%; height:25%;margin-left:37%"><img src="../images/reg1.jpg" alt="Profile Avatar" /></div>
												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 200px; line-height: 20px;margin-left:40%"></div>
												<div style="text-align:center">
													<span class="btn btn-success btn-file"style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none"><span class="fileupload-new">Seleccionar Foto</span><span class="fileupload-exists">Cambiar</span><input type="file" /></span>
													<a href="#" class="btn btn-success fileupload-exists" data-dismiss="fileupload"style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none">Borrar</a>
												</div>
												</div>

											</div>
											
											<!-- Termina Photo -->
										
											
									
								</div> <!-- Termina tab-content -->
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
<script src="../js/profile-photo.js"></script>
<script src="../js/kendo.all.min.js"></script>
</body>
</html>
