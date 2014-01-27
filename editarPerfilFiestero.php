<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="Where2Night"/>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    	<meta name="format-detection" content="telephone=no" />

        <!-- Styles -->
		
		
        <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-combined.min.css" rel="stylesheet">
		<link href="css/application.css" media="screen" rel="stylesheet" type="text/css" />
		
		
        <!-- JavaScript -->
	    <script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	    <!-- <script type="text/javascript" src="js/loginFacebook.js"></script>
	    <script type="text/javascript" src="js/loginFiestero.js"></script>-->
		<script type="text/javascript" src="js/registrar.js"></script>
        <script type="text/javascript" src="js/jquery-1.10.0.min.js"></script>
		<script type="text/javascript" src="js/fecha.js"></script> 
		
		<script type="text/javascript" src="js/keepSession.js"></script> 
		<script type="text/javascript" src="js/jquery.cookie.js"></script> 
		
		 
   
    
    	
		<title>Where2Night - Editar Perfil Fiestero</title>
    	
    	<script type="text/javascript">  
		$(document).ready(function(){ 
			
			
						
			$("#change-data").on("click", function (event) {
				
		 			var email = $.cookie("email_log");
		 			
		 			console.log($.ajax({
							url: "editprofile.php",
							dataType: "json",
							type: "POST",
							timeout: 5000,
							data: {
								email: email
							},
							complete: function(r){
									var json = JSON.parse(r.responseText);
									var idProfile = json.idProfile;
									var name = $('#name').val();
							        var surnames = $('#surname').val();
							        var day = $('#day').val();
							        if (day.length < 2){
							        	day = "0"+day;
							        } 
							        var month = $('#month').val();
							        if (month.length < 2){
							        	month = "0"+day;
							        }
							        var year = $('#year').val();
							        var birthdate = day+"/"+month+"/"+year;
							        var gender = $("input[type='radio']:checked").val();
							        var music = $('#favourite-music').val();
							        var civil_state = $('#marital-status').val();
							        var city = $('#city').val();
							        var drink = $('#favourite-drink').val();
							        var about = $('#about-you').val();
						 			
									 console.log($.ajax({
											url: "editprofile.php",
											dataType: "json",
											type: "POST",
											timeout: 5000,
											data: {
												idProfile:idProfile,
												name:name,
												surnames: surnames,
												birthdate: birthdate,
												gender: gender,
												music: music,
												civil_state: civil_state,
												city: city,
												drink: drink,
												about: about
											},
											complete: function(r){
													alert('datos enviados');
								    		},
											onerror: function(e,val){
												alert("Hay error");
											}
									}));
				    		},
							onerror: function(e,val){
								alert("Hay error");
							}
					}));
				
			        
					
			
			});
			
		});//end $(document).ready(function()
		
		
    </script>
    	
    </head>
    
    
    	<style>
	navbar-fixed-top{
		z-index:1030;
	  }
	@media (max-width: 979px);
		body{
			background:#000;
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
			padding:20px 20px;
		}
		.main-content{
		    background:url('images/party1.jpg');
		}
	
		</style>
            
        <!--<script type="text/javascript" src="js/registro.js"></script>-->
            
           

        	
<body>
		
		<div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" style="background-color:#000;height:5%" role="banner">
      <div class="container">
        <div class="navbar-header">
          <a href="/" class="navbar-brand"><img src="images/mainlogo.png" alt="logoWhere2Night"</a>
		 </div>
</div>
</div>		 

		<!-- SideBar -->
<div class="sidebar-background">
  <div class="primary-sidebar-background"></div>
</div>
<div class="primary-sidebar">
  <ul class="nav navbar-collapse collapse navbar-collapse-primary">
		<li class="">
          <span class="glow"></span>
          <a href="">
              <span>&nbsp;</span>
          </a>
        </li>
        <li class="">
          <span class="glow"></span>
          <a href="">
              <i class=""><img class="menu-avatar" src="images/party4.jpg" /></i>
              <span>Mi Perfil</span>
          </a>
        </li>
         <li class="">
          <span class="glow"></span>
          <a href="">
              <i class=""><img class="menu-avatar" src="images/party3.jpg" /></i>
              <span>Eventos</span>
          </a>
        </li>
         <li class="">
          <span class="glow"></span>
          <a href="">
              <i class=""><img class="menu-avatar" src="images/party2.jpg" /></i>
              <span>Fotos</span>
          </a>
        </li>
         <li class="">
          <span class="glow"></span>
          <a href="">
              <i class=""><img class="menu-avatar" src="images/party4.jpg" /></i>
              <span>Amigos</span>
          </a>
        </li>
         <li class="">
          <span class="glow"></span>
          <a href="">
              <i class=""><img class="menu-avatar" src="images/party2.jpg" /></i>
              <span>Locales</span>
          </a>
        </li>
         <li class="">
          <span class="glow"></span>
          <a href="">
              <i class=""><img class="menu-avatar" src="images/party3.jpg" /></i>
              <span>DJ's</span>
          </a>
        </li> 
        <li class="">
         <span class="glow"></span>
          <a class="accordion-toggle collapsed " data-toggle="collapse" href="#tnnmk7rjLZ">
              <i class=""><img class="menu-avatar" src="images/party2.jpg" /></i>
                    <span>
                      Configuración&nbsp;&nbsp;&nbsp;
                      <i class="glyphicon glyphicon-circle-arrow-down"></i>
                    </span>
          </a>
          <ul id="tnnmk7rjLZ" class="collapse "> 
                <li class="">
                  <a href="" >
                      <i class="glyphicon glyphicon-edit"></i> Editar Perfil
                  </a>
                </li>
                <li class="">
                  <a href="">
                      <i class="glyphicon glyphicon-lock"></i> Privacidad
                  </a>
                </li>
          </ul>
        </li>
</div>
<!-- /SideBar -->

<div class="main-content" >
  <div class="container"> <!--Container-->
        	<div align="center">
        		<p>&nbsp;</p>
	        	<form class="form-horizontal" role="form" id="edit-profile">
				  <div class="form-group">
				    <label for="name" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Nombre: </b></label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" >
				    </div>
				  </div>
				  
				  <div class="form-group">
				    <label for="surname" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Apellidos: </b></label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="surname" placeholder="Apellidos">
				    </div>
				  </div>
				  
				  <div class="form-group">
				    <label class="col-sm-2 control-label" style="color: #FFFFCC"><b>Fecha de nacimiento: </b></label>
				    <div class="col-sm-2">
				   		<select id="day" class="form-control">
		        			<option value="0" selected="selected">Día</option>
		      					<script>
		    						SelectOptionRange(1,32);
		    					</script>	
		        	 	</select>
		        	 </div>
		        	
		        	<div class="col-sm-2">
		        		<select id="month" class="form-control">
		        			<option value="0" selected="selected">Mes</option>
		        				<script>
		    						SelectOptionRange(1,13);
		    					</script>
		            	</select>
		        	</div>
		        	
		        	<div class="col-sm-2">
		        		<select id="year" class="form-control">
		        			<option value="0" selected="selected">Año</option>
		    					<script>
		    						SelectOptionRange(1905,2013);
		    					</script>    		
		        		</select>
		        	</div>
				  </div>
				  
				  <div class="form-group">
				    <label  class="col-sm-2 control-label" style="color: #FFFFCC"><b>Sexo: </b></label>
				    <div class="col-sm-8">
				        <label class="radio-inline">
				          <input name="radioGroup" id="radio1" value="male" type="radio"><span style="color: #FFFFCC">Hombre</span>
				        </label>
				        <label class="radio-inline">
				          <input name="radioGroup" id="radio2" value="female" type="radio"><span style="color: #FFFFCC">Mujer</span>
				        </label>
				    </div>
				  </div>
				  
				  <div class="form-group">
				    <label for="favourite-music" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Música favorita: </b></label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="favourite-music" name="favourite-music" placeholder="Música favorita">
				    </div>
				  </div>
				  
				  <div class="form-group">
				    <label for="favourite-drink" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Bebida favorita: </b></label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="favourite-drink" name="favourite-drink" placeholder="Bebida favorita">
				    </div>
				  </div>
				  
				  <div class="form-group">
				    <label for="marital-status" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Estado civil: </b></label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="marital-status" placeholder="Estado civil">
				    </div>
				  </div>
				  
				  <div class="form-group">
				    <label for="city" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Ciudad actual: </b></label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="city" name="city" placeholder="Ciudad">
				    </div>
				  </div>
				  
				  <div class="form-group">
				    <label for="about-you" class="col-sm-2 control-label" style="color: #FFFFCC"><b>Acerca de ti: </b></label>
				    <div class="col-sm-8">
				      <textarea id="about-you" class="form-control" rows="3" placeholder="Cuéntanos sobre ti"></textarea>
				    </div>
				  </div>
				  
				  <button type="button" class="btn btn-default" id="change-data">Editar perfil</button>
				  
				</form>
				<p>&nbsp;</p>
			</div>
		</div>
	</div>
      
    <!-- NavbarFooter -->
    <footer class="navbar navbar-inverse navbar-fixed-bottom bs-docs-nav" style="background-color:#000" role="banner">
        <div class="container">
            <div class="navbar-header">
                <!-- Iniciar sesión  -->
                <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
                <ul class="nav navbar-nav navbar-left">
                 <li>
                    <a href="" style="color:#F59236" onmouseover="javascript:this.style.color='#FF6B24';" 
                    onmouseout="javascript:this.style.color='#F59236';">Ayuda</a>
                </li>
                 <li>
                    <a href="" style="color:#F59236" onmouseover="javascript:this.style.color='#FF6B24';"
                     onmouseout="javascript:this.style.color='#F59236';">Condiciones</a>
                </li>
        
                <li>
                    <a href="" style="color: #F59236" onmouseover="javascript:this.style.color='#FF6B24';" 
                    onmouseout=	"javascript:this.style.color='#F59236';">Privacidad</a>
                </li>
               <li>
                    <a href="" style="color:#F59236" onmouseover="javascript:this.style.color='#FF6B24';"
                     onmouseout="javascript:this.style.color='#F59236';"><img src="images/alogo.png" alt=""></a>
                </li>
                </ul>
                </nav> 
                <!-- /Iniciar sesión  -->
                 
            </div>
        </div>
    </footer>
            

     
    </body>
</html>
