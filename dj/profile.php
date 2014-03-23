<?php

include_once "../framework/sessions.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>W2N-Perfil DJ</title>
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
  <link rel="stylesheet" href="../css/profile-dj.css" type="text/css" /><!-- Style -->	
  <link rel="stylesheet" href="../css/responsive.css" type="text/css" /><!-- Responsive -->	

  <!-- script -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/registro.js"></script>

  <script type="text/javascript">  
    $(document).ready(function(){ 
      
      //Function for close session
        $("#close_session").on("click", function (event) {
          $.post("../framework/session_end.php",
            {},
            function(data,status){
                eraseCookie('w2n_id');
                eraseCookie('w2n_token');
                eraseCookie('w2n_type');
              var url = "http://www.where2night.es";
              $(location).attr('href',url);
            });
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
<!-- NavbarHeader -->
	<div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" style="background-color:#000;height:5%" role="banner">
      <div class="container">
        <div class="navbar-header">
          <a href="/" class="navbar-brand"><img src="../images/mainlogo.png" alt="logoWhere2Night"</a>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-primary">
          <span class="sr-only">Toggle Side Navigation</span>
          <i class="icon-th-list"></i>
        </button>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-top">
          <span class="sr-only">Toggle Top Navigation</span>
          <i class="icon-align-justify"></i>
        </button>
    
        </div>  
         <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-collapse-top">
        <div class="navbar-right">
		
          <ul class="nav navbar-nav navbar-left">
           <a href="" style="font-size:12px ;color:#6C6C6C" onmouseout="javascript:this.style.color='#6C6C6C';"onmouseover="javascript:this.style.color='#F2A116';"><strong>Inicio</strong>&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-home" style="color:#FF6B24; margin-top:15px"></i></a>
				<li>
              <a href= class="dropdown-toggle" data-toggle="dropdown"></a>
              	
            	</li>
               
          </ul>
			
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="search-query animated" placeholder="Buscar" style="margin-top:-1px" >
            <i class="glyphicon glyphicon-search" style="color:#FF6B24; margin-top:0px"></i>
            </div>
          </form>

          <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle dropdown-avatar" data-toggle="dropdown">
              <span>
                <img class="menu-avatar" src="../images/profile.jpg" /> <span onmouseout="javascript:this.style.color='#6C6C6C';"onmouseover="javascript:this.style.color='#F2A116';"> <span><?php echo $_SESSION['name']." ".$_SESSION['surname']; ?></span>&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-cog"style="color:#FF6B24"></i></span>
              </span>
              </a>
              <ul class="dropdown-menu">


                <li class="with-image">
                  <div class="avatar">
                    <img src="../images/profile.jpg" />
                  </div>
                  <span><?php echo $_SESSION['name']." ".$_SESSION['surnames']; ?></span>
                </li>

                <li class="divider"></li>

                <li><a href="#"><i class="glyphicon glyphicon-user"style="color:#FF6B24"></i> <span>Perfil</span></a></li>
                <li><a href="http://www.where2night.es/editar-fiestero.php"><i class="glyphicon glyphicon-edit"style="color:#FF6B24"></i> <span>Editar Perfil</span></a></li>
                <li><a href="#"><i class="glyphicon glyphicon-wrench"style="color:#FF6B24"></i> <span>Configuración</span></a></li>
                <li id="close_session"><a href="#"><i class="glyphicon glyphicon-off" style="color:#FF6B24"></i> <span>Cerrar Sesión</span></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div><!-- /.navbar-collapse -->
      </div>
    </div>
<!-- /NavbarHeader -->

<!-- MiPerfil -->
<div class="main-content" style="background-image:url(../images/CollageNeon.jpg);height:2000px; margin-left:0px;margin-bottom:-50px;" > 
<div class="wrapper">
		<div class="container">
		<div class="row">
			<div class="col-md-12 profile-margin">
				<div class="col-md-4">
					<div class="profile-sec-head banner2">
						<img src="../images/profile.jpg" alt="" />
						<h1>
							<span><?php echo $_SESSION['name']." ".$_SESSION['surname']; ?></span>
						</h1>
						<p style="color:#FF6B24"><i class="glyphicon glyphicon-map-marker"style="color:#FF6B24"></i>Localización DJ</p>
					</div>
					<div>
						 <button type="button" class="btn botonseguir" style="margin-top:5%;margin-left:38%">SIGUEME</button>
					</div>
                   	 </div> 
		</div><!-- col-md-12 -->
        </div><!-- row -->
           	<div class="row">
			<div class="col-md-12 the-timeline-margin">
                        <div class="col-md-6">
                        
					<!-- Begin timeline Events -->
                  		<div class="titulos">
                        <ul><li>EVENTOS</li></ul>
                       
                        </div>
						<div class="the-timeline">
							<ul><li><div class="the-date">
										<span>01</span>
										<small>Feb</small>
									</div>
									<h4>Show event</h4>
									<p>
												
									</p>
									<button type="button" class="btn botonMeApunto" style="margin-left:80%">Me Apunto<i class="glyphicon glyphicon-thumbs-up iconColor"></i></button>
								</li>
								<li>
									<div class="the-date">
										<span>31</span>
										<small>Jan</small>
									</div>
									<h4>show pic </h4>
									<div class="videoWrapper">
									<iframe src=""></iframe>
									</div>
									<p>
								
									</p>
									<button type="button" class="btn botonMeApunto" style="margin-left:80%">Me Apunto<i class="glyphicon glyphicon-thumbs-up iconColor"></i></button>
								</li>
								<li>
									<div class="the-date">
										<span>20</span>
										<small>Des</small>
									</div>
                                    <h4>show event!!</h4>
									<p>
									 
									</p>
									<button type="button" class="btn botonMeApunto" style="margin-left:80%">Me Apunto<i class="glyphicon glyphicon-thumbs-up iconColor"></i></button>
								</li>
							</ul>
						</div><!-- End div .the-timeline -->
						<!-- End timeline -->
					</div><!-- End div .col-sm-6 -->
                     <div class="col-md-6">
                        
					<!-- Begin timeline Listas -->
             
							
									
					</div><!-- End div .col-sm-6 -->
    </div><!-- col-md-12 -->
        </div><!-- row -->
        <div class="row">
			<div class="col-md-12">
        <div class="titulos">
                        <ul><li>FOTOS</li></ul>
                        </div>
      <div class="seguidores">
              	<ul><li></li></ul>
              </div>
					    
             </div><!-- col-md-12 -->
              </div><!-- row -->
              <div class="row">
             <div class="col-md-12">
        <div class="titulos">
                        <ul><li>SEGUIDORES</li></ul>
                       
                        </div>
                        <div class="seguidores">
              	<ul><li></li></ul>
              </div>
					
					    
             </div><!-- col-md-12 -->
        </div><!-- row -->
         <div class="row">
             <div class="col-md-12">
        <div class="titulos">
                        <ul><li>INFORMACIÓN</li></ul>
                       
                        </div>
              <div class="mapa">
              	<li>Dirección,número de télefono...</li>
              </div>
					    
             </div><!-- col-md-12 -->
        </div><!-- row -->
		</div><!-- Container -->
	</div><!-- Wrapper -->

</div>
<!-- /MiPerfil --> 

</body>
</html>