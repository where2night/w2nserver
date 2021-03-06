<?php

include_once "../framework/sessions.php";

 w2n_session_check(); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>W2N-Club Users</title>
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
<script src="../js/autoRefresh.js"></script>
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

function deleteClub(id,idClub){
	

var params = "/" ;
	params=params.concat(ide); 
	params=params.concat("/");
	params=params.concat(tok);
	params=params.concat("/");
	params=params.concat(idClub);

	  
var url="../develop/actions/follow.php";
	url=url.concat(params);
	
	$.ajax({
			url: url,
			dataType: "json",
			type: "DELETE",
			complete: function(r){
		      
			},
			onerror: function(e,val){
				alert("No se puede dejar de seguir");
			}
	});


var element=document.getElementById(id);
var parent = element.parentNode;
parent.removeChild(element);

var element=document.getElementById(id);
var parent = element.parentNode;
parent.removeChild(element);

}

</script>


<script type="text/javascript">  
    $(document).ready(function(){ 

        //Get clubs info
        var idProfile = <?php echo $_SESSION['id_user'];?>;
        var token = "<?php echo $_SESSION['token'];?>";
		
				var param = "/" ;
					param=param.concat(idProfile); 
					param=param.concat("/");
					param=param.concat(token);
					param=param.concat("/");
					param=param.concat(idProfile);

	  				var url="../develop/actions/myFavLocals.php";
					url=url.concat(param);
	                 
	                 var array_follow=new Array();
	               
	               
	               	$.ajax({
						url: url,
						dataType: "json",
						type: "GET",
						async: false,
						complete: function(r){
			  			var json = JSON.parse(r.responseText);	 
             			count=json.rows;
	   		
	   		            var i=0;
			 			while (i<count){
								var user_type = "club";
								var id_user = json[i].idProfile;
								array_follow[array_follow.length]=id_user;
								var localName = json[i].localName;
								var telephoneLocal = json[i].telephoneLocal;
								var street_int = json[i].street;
								switch(street_int){
								case 0:
						  			var street = "Calle";
									break;
								case 1:
						  			var street = "Avda.";
								break;
								case 2:
						  			var street = "Plaza";
								break;
									default:
						  					var street = "Calle";
									}
								var streetName = json[i].streetNameLocal;
								var streetNumber = json[i].streetNumberLocal;
								var picture = json[i].picture;
								if (picture == null || picture.length == 0){
									picture = "../images/reg1.jpg";
									}
								var latitude = json[i].latitude;
								var longitude = json[i].longitude;
								var link = "../club/profile.php?idv=" + id_user;
			 	
							$('#club-favourite tbody').append('<tr><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><img src="'+ picture +'" alt=""/><a href="'+ link +'" class="user-link"style="color:#FF6B24">'+ localName +'</a><span class="user-subhead">Local</span></td><td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ street + " " + streetName + " " + 'Nº' + " " + streetNumber +'</a></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ telephoneLocal +'</a></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><span class="glyphicon glyphicon-star" style="color:#ff6b24;font-size: 30px" id="b'+i+'"></span></td><td style="box-shadow:none;width:20%;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"> <a href="#"id="b'+i+'" class="btn btn-success" style="background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;margin-left:25%"><span id="b'+i+'" onclick="deleteClub(this.id,'+id_user+');">Eliminar</span></a></td></tr>');
			 				i++;
			 			}
					},
					onerror: function(e,val){
						alert("No se pueden saber los seguidores");
				}
			});
	
		
		var params = "/" + idProfile + "/" + token; 
        var url1 = "../develop/read/locals.php" + params;
        
        
        $.ajax({
			url: url1,
			dataType: "json",
			type: "GET",
			timeout: 5000,
			async: false,
			complete: function(r2){
				var json = JSON.parse(r2.responseText);
				for(var i=0; i<json.length; i++){
					var user_type = "club";
					var id_user = json[i].idProfile;
					var localName = json[i].localName;
					var telephoneLocal = json[i].telephoneLocal;
					var street_int = json[i].street;
					switch(street_int){
						case 0:
						  var street = "Calle";
						break;
						case 1:
						  var street = "Avda.";
						break;
						case 2:
						  var street = "Plaza";
						break;
						default:
						  var street = "Calle";
					}
					var streetName = json[i].streetNameLocal;
					var streetNumber = json[i].streetNumberLocal;
					var picture = json[i].picture;
					if (picture == null || picture.length == 0){
						picture = "../images/reg1.jpg";
					}
					var latitude = json[i].latitude;
					var longitude = json[i].longitude;
					var link = "../club/profile.php?idv=" + id_user;


	
            var contains_follow=$.inArray(id_user, array_follow);

            if(contains_follow==-1 )
				
					$('#club-list tbody').append('<tr><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid  #E5E4E2;vertical-align: middle;padding: 12px 8px;"><img src="'+ picture +'" alt=""/><a href="'+ link +'" class="user-link"style="color:#FF6B24">'+ localName +'</a><span class="user-subhead">Local</span></td><td class="text-center"style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ street + " " + streetName + " " + 'Nº' + " " + streetNumber +'</a></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;"><a href="#" style="color:#1B1E24">'+ telephoneLocal +'</a></td><td style="box-shadow:none;font-size: 0.875em;background: #D1D0CE;border-top: 10px solid #E5E4E2;vertical-align: middle;padding: 12px 8px;" colspan="3"></td></tr>');
			
				
				}
			
	    		},
				onerror: function(e,val){
					alert("Contraseña y/o usuario incorrectos");
				}
			});

		$('#club-favourite').dataTable();
      	$('#club-list').dataTable();


    });//end $(document).ready(function()
    
</script>


</head>

<body>  <!--onload="JavaScript:timedRefresh(30000);">-->
<style>  
body{
	background-color:#000;
	
}

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
  if($_SESSION['user_type'] == "user"){
  	include "templates/navbar-header.php"; 
  } else if($_SESSION['user_type'] == "club"){
  	include "../club/templates/navbar-header.php"; 
  }

  /*Sidebar*/
  if($_SESSION['user_type'] == "user"){
 	 include "templates/sidebar.php";
  } else if($_SESSION['user_type'] == "club"){
  	include "../club/templates/sidebar.php"; 
  }
?>
<!-- MiPerfil -->
<div class="container" style="background-image:url(../images/CollageNeon.jpg);margin-bottom:-50px;margin-left:200px">
		<div class="row">
			<div class="col-md-10" id="content-wrapper"  style="background-image:url(../images/CollageNeon.jpg)">
				<div class="row">
					<div class="col-lg-12">
					<header class="page-header"style="background-color:#000; border-color:#ff6b24;margin-bottom:1%;padding-bottom:1px;padding-top:1px;margin-top:0%;width:102%">
					<h1 style="color:#ff6b24;font-size:30px;">Locales Favoritos</h1>
					</header>
					<div class="row" id="user-profile"style="background-color:#000; padding-top:8px;margin-left:0px;width:102%;margin-right:-20%;margin-top:-1%">
						<div class="col-lg-9 col-md-8 col-sm-8">
							<div class="main-box clearfix " style="background-color:#1B1E24;box-shadow: 1px 1px 2px 0 #ff6b24;width:134%">
									<div class="row">
							<div class="col-lg-12">

									<div class="table-responsive">
										<table id="club-favourite" class="table user-list">
											<thead>
												<tr>
													<th><span style="color:#FF6B24;border-color:#ff6b24">Local</span></th>									
													<th class="text-center"><span style="color:#FF6B24;border-color:#ff6b24">Dirección</span></th>
													<th><span style="color:#FF6B24;border-color:#ff6b24">Teléfono</span></th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								<!--	<ul class="pagination pull-right">
										<li ><a href="#"><i class="glyphicon glyphicon-chevron-left" style="color:#FF6B24;"></i></a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">1</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">2</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">3</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">4</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">5</a></li>
										<li><a href="#"><i class="glyphicon glyphicon-chevron-right"style="color:#FF6B24"></i></a></li>
									</ul> -->
								</div>
								
									<div class="table-responsive">
										<table id="club-list" class="table user-list">
											<thead>
												<tr>
													<th><span style="color:#FF6B24;border-color:#ff6b24">Local</span></th>									
													<th class="text-center"><span style="color:#FF6B24;border-color:#ff6b24">Dirección</span></th>
													<th><span style="color:#FF6B24;border-color:#ff6b24">Teléfono</span></th>
													<th>&nbsp;</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								<!--	<ul class="pagination pull-right">
										<li ><a href="#"><i class="glyphicon glyphicon-chevron-left" style="color:#FF6B24;"></i></a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">1</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">2</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">3</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">4</a></li>
										<li ><a href="#"style="color:#FF6B24;border-radius:0px 0px 0px 0px;padding-bottom:3px;">5</a></li>
										<li><a href="#"><i class="glyphicon glyphicon-chevron-right"style="color:#FF6B24"></i></a></li>
									</ul> -->
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
<script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>
</body>
</html>
