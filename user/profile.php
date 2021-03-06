<?php
include_once "../framework/sessions.php";

w2n_session_check();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>W2N-profile User</title>
		<meta name="description" content="Where2Night"/>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="format-detection" content="telephone=no" />

		<!-- Icon W2N -->
		<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="../images/favicon.ico" type="image/x-icon">

		<!-- Estilos Bootstrap -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/home.css" rel="stylesheet" type="text/css">
		<link href="../css/bootstrap-combined.min.css" rel="stylesheet">
		<link  href="../css/jquery.carousel.fullscreen.css" rel="stylesheet" >
		<link href="../css/custom.css" rel="stylesheet" media="screen">
		<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
		<link rel="stylesheet" href="../css/profile-test1.css" type="text/css" />
		<!-- Responsive -->
		<link rel="stylesheet" href="../css/profile-test2.css" type="text/css" />
		<!-- Responsive -->
		<link rel="stylesheet" href="../css/responsive.css" type="text/css" />
		<!-- Responsive -->

		<!--<link rel="stylesheet" href="../css/images-user.css">
		<link rel="stylesheet" href="../css/images-user1.css">
		<link rel="stylesheet" href="../css/images-user2.css">-->

		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
		<!-- script -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/keep-session.js"></script>
		<script src="../js/favourites.js"></script>
		<script src="../js/followfriend.js"></script>
		<script src="../js/moment-with-langs.js"></script>
		<script src="../js/moment.min.js"></script>
		<script src="../js/songs.js"></script>
		<script src="../js/lists.js"></script>
<script src="../js/autoRefresh.js"></script>
		<?php $idProfil = $_SESSION['id_user'];
		$toke = $_SESSION['token'];

		if (isset($_GET['idv'])) {
			$id_partier = $_GET['idv'];
		} else
			$id_partier = $idProfil;
		?>

		<script>var ide =  '<?php echo $idProfil; ?>' ;
			var tok = '<?php echo $toke; ?>' ;
			var id_abs = '<?php echo $id_partier; ?>' ;
			var ideUser =  '<?php echo $idProfil; ?>'
		</script>

		<script type="text/javascript">
			function btnVoy(theVoyBtn) {
				myButtonID = theVoyBtn.id;
				if (document.getElementById(myButtonID).className == 'myClickedVoy') {
					document.getElementById(myButtonID).className = 'myDefaultVoy';
					document.getElementById(myButtonID).value = 'Voy a ir';
				} else {
					document.getElementById(myButtonID).className = 'myClickedVoy';
					document.getElementById(myButtonID).value = 'Apuntado';
				}
			}
		</script>

<script type="text/javascript">
		/********************** Join Events ******************/

function getVisitorEvents(){

	var idProfile = <?php echo $_SESSION['id_user']; ?>	;
	var token =  "<?php echo $_SESSION['token']; ?>";
	var params = "/" + idProfile + "/" + token;
	  
	var url = "../develop/actions/myEvents.php" + params;

	var array_ids = new Array(); 
	$.ajax({
			url:url,
			dataType: "json",
			type: "GET",
			async: false,
			complete: function(r){
				var json = JSON.parse(r.responseText);	
				
			  	for (var i = 0; i < json.rows; i++) {
			  		array_ids[i] = "" +json[i].idEvent;
		  		}
			},
			onerror: function(e,val){
				alert("Error al buscar eventos de usuario");
			}
	});
	return array_ids;
}


//Check if function is join or disjoin
function clickedJoinEvent(idEvent){
	var partierEvents = new Array();
	partierEvents = getVisitorEvents();

    if(partierEvents.indexOf(idEvent) > -1){//Event in array, display disjoin
		disjoinEvent (idEvent)
	}else{//Event not in array, display join
		joinEvent (idEvent)
	}
}

function joinEvent (idEvent){

	var idProfile = <?php echo $_SESSION['id_user']; ?>	;
	var token =  "<?php echo $_SESSION['token']; ?>";
	var params = "/" + idProfile + "/" + token + "/" + idEvent;
	  
	var url = "../develop/actions/goToEvent.php" + params;
	$.ajax({
			url:url,
			dataType: "json",
			type: "GET",
			complete: function(r){
			 	var json = JSON.parse(r.responseText);	

			  	$( "button[name='join-event-" + idEvent + "']" ).html('Me Desapunto')
			  	
			},
			onerror: function(e,val){
				alert("No se puedo añadir al evento");
			}
	});
}


function disjoinEvent (idEvent){
	var idProfile = <?php echo $_SESSION['id_user']; ?>	;
	var token =  "<?php echo $_SESSION['token']; ?>";
	var params = "/" + idProfile + "/" + token + "/" + idEvent;
	  
	var url = "../develop/actions/goToEvent.php" + params;
	$.ajax({
			url:url,
			dataType: "json",
			type: "DELETE",
			complete: function(r){
			 	var json = JSON.parse(r.responseText);

			  	$( "button[name='join-event-" + idEvent + "']" ).html('Me Apunto')
			  
			},
			onerror: function(e,val){
				alert("No se puedo eliminar del evento");
			}
	});
}

/********************** Join Events ******************/
</script>

		<script type="text/javascript">
			var actual_page = 0;
			function showMoreUserActivity(){
				/*Increases the page where I go*/
				actual_page = actual_page +1;

				/*prepares attributes for the server*/
				var page = 0;
				var params2 = "/" + ide + "/" + tok + "/" + id_abs;
				var url5 = "../develop/read/newsUser.php" + params2+"/"+actual_page;
				/*Sent by the server url page we now load, besides the token and identifier*/
				/*the query is made ​​to the server, via GET*/
				$.ajax({

						url: url5,
						dataType: "json",
						type: "GET",
						timeout: 5000,

					complete: function(r2){
							/*In response the server a list of 10 activities is received*/
							var json = JSON.parse(r2.responseText);
							var num_elements = json.numElems;
							var num_page = Math.floor(num_elements/10);

							/*Calculates if you follow the link to appear "show more"*/
							if (num_page == actual_page){
								var s = document.getElementById('show_more');
								var div = document.getElementById('show_more');

								div.innerHTML = '';
							}

							/*Calculate the maximum number of items you can go to the list*/
							var len = num_elements - actual_page*10;
							var max_elemts;

							if (len > 10){
								max_elemts = 10;
							}else if (len < 10){
								max_elemts = len;
							}

						/*Browse the list received*/
						for(var i=0; i<max_elemts; i++){
						/*The list that is returned is the activity that can be 5 types:
						1.- Created by local events that follow
						2.- Friends we follow, change status
						3.- Friends we follow, change their mode(De tranquis,Hoy no me lio,Lo que surja,Lo daré todo,Destroyer,Yo me llamo Ralph)
						4.- Friend add to favorites a local
						5.- 5.- Events friends attending */
						var type = json[i].TYPE;
						var goes = json[i].GOES;
						var date = json[i].createdTime;
						var picture = json[i].picture;

						/*Calculates uptime*/

						moment.lang('es', {
								relativeTime : {
								future : "en %s",
								past : "hace %s",
								s : "unos segundos",
								m : "un minuto",
								mm : "%d minutos",
								h : "una hora",
								hh : "%d horas",
								d : "un día",
								dd : "%d días",
								M : "un mes",
								MM : "%d meses",
								y : "un año",
								yy : "%d años"
								}
						});
						
						var dateActivity = moment(date);
						if (dateActivity.isValid()){
							var activityFromNow = dateActivity.fromNow();
						}

						/*must distinguish what type of activity relates (mentioned above), to paint in the html in the right way*/
						if (type == 1){
							/*1.- Created by local events that follow*/
							var localName = json[i].localName;
							var title = json[i].title;
							var startHour = json[i].startHour;
							var closeHour = json[i].closeHour;

							var id_local =  json[i].idProfileLocal;
							var link = "../club/profile.php?idv=" + id_local;
							var streetNameLocal = json[i].streetNameLocal;
							var streetNumberLocal = json[i].streetNumberLocal;
							var text = json[i].text;
							if (picture==0 || picture=="" || picture==null)
							picture = "../images/reg2.jpg";

							var idEvent =  json[i].idEvent;
							var goes =  (json[i].GOES != null);

							if(goes){//User goes to this event, display disjoin
								$('#test').append('<li class=""> <div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div> <span class="label label-dark-blue" style="font-size:12px;">Evento Local</span> <a href="'+ link +'">'+ localName +'</a> <span style="font-size:12px;color:orange"> Publicado <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i>'+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24"> '+title+'</h5><p style="color:#707070;font-size:14px;"></p><p style="color:#E5E4E2;font-size:14px;">'+text+'</p<button type="button" name="join-event-' + json[i].idEvent + '" class="btn pull-right" style="margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;" onclick="clickedJoinEvent(' + "'" + json[i].idEvent + "'" + ');">Me Desapunto</button></td></tr></tbody></table>');
							}else{
								$('#test').append('<li class=""> <div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div> <span class="label label-dark-blue" style="font-size:12px;">Evento Local</span> <a href="'+ link +'">'+ localName +'</a> <span style="font-size:12px;color:orange"> Publicado <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i>'+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24"> '+title+'</h5><p style="color:#707070;font-size:14px;"></p><p style="color:#E5E4E2;font-size:14px;">'+text+'</p><button type="button" name="join-event-' + json[i].idEvent + '" class="btn pull-right" style="margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;" onclick="clickedJoinEvent(' + "'" + json[i].idEvent + "'" + ');">Me Apunto</button></td></tr></tbody></table>');
							}	
							

						}else if (type == 2){
							/*2.- Friends we follow, change status*/
							var name =  json[i].name;
							var surnames =  json[i].surnames;
							var status =  json[i].status;
							if (picture==0 || picture=="" || picture==null)
							picture = "../images/reg2.jpg";

							$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Estado Fiestero </span> '+name+' '+surnames+' <span style="font-size:12px;color:orange;" > Actualizó su estado <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i>'+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><p style="color:#707070;font-size:14px;">'+name+' cambió su estado a : '+status+'</p></td></tr></tbody></table>');

						}else if (type == 3){
							/*3.- Friends we follow, change mode*/
							var name =  json[i].name;
							var surnames =  json[i].surnames;
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

							if (picture==0 || picture=="" || picture==null)
							picture = "../images/reg2.jpg";

							$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Modo Fiestero</span> '+name+' '+surnames+' <span style="font-size:12px;color:orange;"> Actualizó su modo <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><p style="color:#707070;font-size:14px;">'+name+' '+surnames+' cambió su modo a : <span class="label label">'+modeString+'</span>	</p></td></tr></tbody></table>');
						}else if (type == 4){
							/*4.-friend add to favorites a local*/
							var name =  json[i].name;
							var surnames =  json[i].surnames;
							var localName =  json[i].localName;
							var id_local =  json[i].idProfileLocal;
							var link = "../club/profile.php?idv=" + id_local;
							if (picture==0 || picture=="" || picture==null)
							picture = "../images/reg2.jpg";

							$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Local favorito</span>'+name+' '+surnames+'<span style="font-size:12px;color:orange;"> Agregó un local favorito <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><p style="color:#707070;font-size:14px;">'+name+' '+surnames+' agregó a <a href="'+link+'">'+localName+' '+'</a>como local favorito</p></td></tr></tbody></table>')

						}else if (type == 5){
							/*5.- Events friends attending*/
							var name =  json[i].name;
							var surnames =  json[i].surnames;
							var title = json[i].title;
							var text = json[i].text;
							if (picture==0 || picture=="" || picture==null)
							picture = "../images/reg2.jpg";

							var idEvent =  json[i].idEvent;
							var goes =  (json[i].GOES != null);

							if (goes){//User goes to this event, display disjoin
								$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Evento al que asistirá </span><a href="'+link+'">'+name+' '+surnames+'</a><span style="font-size:12px;color:orange"> se apuntó <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24">'+title+'</h5><p style="color:#E5E4E2;font-size:14px;">'+text+'</p><p style="color:#707070;font-size:14px;"></p><button type="button" name="join-event-' + json[i].idEvent + '" class="btn pull-right" style="margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;" onclick="clickedJoinEvent(' + "'" + json[i].idEvent + "'" + ');">Me Desapunto</button></td></tr></tbody></table>');

							}else{//User doesn't go to this event, display join
								$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Evento al que asistirá </span><a href="'+link+'">'+name+' '+surnames+'</a><span style="font-size:12px;color:orange"> se apuntó <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24">'+title+'</h5><p style="color:#E5E4E2;font-size:14px;">'+text+'</p><p style="color:#707070;font-size:14px;"></p><button type="button" name="join-event-' + json[i].idEvent + '" class="btn pull-right" style="margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;" onclick="clickedJoinEvent(' + "'" + json[i].idEvent + "'" + ');">Me Apunto</button></td></tr></tbody></table>');
							}
						} else  if (type == 6){
							
												// friend go to pub
						var name =  json[i].name;
						var surnames =  json[i].surnames;
						var localName =  json[i].localName;
						var id_local =  json[i].idProfileLocal;
						var link_local = "../club/profile.php?idv=" + id_local;
						var id_user = json[i].idPartierFriend;		
						var link_user = "../user/profile.php?idv=" + id_user;
					

						if (picture==0 || picture=="" || picture==null)
						picture = "../images/reg2.jpg";
							
						var goes =  (json[i].GOES != null);


						var actualdate=json[i].assistdate;
						var year = actualdate.substring(0,4);
						var month = actualdate.substring(5,7);
						var day = actualdate.substring(8,10);
						actualdate = day+'/'+month+'/'+year;

							$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Local al que asistirá </span><a href="'+link_user+'">'+name+' '+surnames+'</a><span style="font-size:12px;color:orange"> <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24"><a href="'+link_user+'">'+name+' '+surnames+'</a></h5><p style="color:#E5E4E2;font-size:14px;">irá a <a href="'+link_local+'">'+localName+'</a> el '+actualdate+' </p><p style="color:#707070;font-size:14px;"></p></td></tr></tbody></table>');



	
						} else  if (type == 7){
							
						var name =  json[i].name;
						var surnames =  json[i].surnames;
						var localName =  json[i].localName;
						var id_local =  json[i].idProfileLocal;
						var link_local = "../club/profile.php?idv=" + id_local;
                        var id_user = json[i].idPartierFriend;		
						var link_user = "../user/profile.php?idv=" + id_user;
			

						if (picture==0 || picture=="" || picture==null)
						picture = "../images/reg2.jpg";

						$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Check-In</span><a href="'+link_user+'"> '+name+' '+surnames+' </a><span style="font-size:12px;color:orange;"> entró  <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><p style="color:#707070;font-size:14px;"><a href="'+link_user+'">'+name+' '+surnames+'</a> ya está en <a href="'+link_local+'">'+localName+'</a> </p></td></tr></tbody></table>');
					
				
											
							
							
						
						}else  if (type == 8){
							
													var name =  json[i].name;
						var surnames =  json[i].surnames;
						var title = json[i].title;
						var text = json[i].text;
						var startHour = json[i].startHour;
						var startH = startHour.substring(0,5);
						var date = json[i].date;
						var year = date.substring(0,4);
						var month = date.substring(5,7);
						var day = date.substring(8,11);
						date = day+'/'+month+'/'+year;

						var localName = json[i].localName;
						var id_local =  json[i].idProfileLocal;
						var link = "../club/profile.php?idv=" + id_local;

						var listDateClose= json[i].dateClose;
					
						var year = listDateClose.substring(0,4);
						var month = listDateClose.substring(5,7);
						var day = listDateClose.substring(8,11);
						listDateClose = day+'/'+month+'/'+year;

						var max=json[i].maxGuest;
					
						var id_user = json[i].idPartierFriend;		
						var link_user = "../user/profile.php?idv=" + id_user;
			
					
						if (picture==0 || picture=="" || picture==null)
						picture = "../images/reg2.jpg";

						var idList =  json[i].idEvent;
						var goes =  (json[i].GOES != null);
	
						var lists=document.getElementById('test').innerHTML;	
						lists = lists.concat("<li><div class='workflow-item hover' style='background-image:url(");
						lists=lists.concat(picture);
						lists=lists.concat(");background-size:100% 100%'></div>");
						lists = lists.concat("<span class='label label-dark-blue' style='font-size:12px'>Lista Local</span> <a href='"+ link +"'>"+ localName +"</a>");
						lists = lists.concat("<span style='font-size:12px;color:orange'> ");
						lists = lists.concat(" <i class='glyphicon glyphicon-time'style='color:#FF6B24;font-size:12px'></i> "+activityFromNow+"</span></li>");
						lists = lists.concat("<table class='table  tablaC1'><tbody><tr><td><h5 style='color:#ff6b24'><b style='color:#34d1be'><a href='"+link_user+"'>");
						lists = lists.concat(name +" "+surnames+ " ");
						lists = lists.concat("</a> </b> se apuntó a la lista <b style='color:orange'>'");
						lists = lists.concat(title);
						lists = lists.concat("'</b></h5><p style='color:#707070;font-size:14px;margin-left:12%; '>");
						lists = lists.concat(text);
						lists = lists.concat("</P>");
						lists = lists.concat("<p style='color:#ff6b24'>El<b style='color:#34d1be'> ");
						lists = lists.concat(date);
						lists = lists.concat("</b> a partir de las <b style='color:#34d1be'> "); 
						lists = lists.concat(startH);
						lists = lists.concat("</b> hrs. Cierre de listas el  <b style='color:#34d1be'>");
						lists = lists.concat(listDateClose);
						lists = lists.concat("</b>");
						lists = lists.concat("</br></p> <span class='glyphicon glyphicon-plus' style='color:#34d1be'> </span> <select id='guests");
						lists = lists.concat(idList); 
						lists = lists.concat("'style='width:10%;border-radius:0px;'>  <option value='0' selected='1'></option>");
			
				    
				    for(var j = 0; j<max; j++ ) {
    					lists=lists.concat("<option value="+ j +">"+j+"</option>");
 						}

						lists = lists.concat("</select> <span style='color:#ff6b24'> Invitados </span>");
				
				if(!goes)
					lists = lists.concat("<a href=''id='"+idList+"'class='btn pull-right' onclick='joinList(this.id);'style='margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;' ><span>Entrar en listas</span></a>");
				else
				    lists = lists.concat("<a href=''id='"+idList+"'class='btn pull-right' onclick='disjoinList(this.id);' style='margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;' ><span>Me Desapunto</span></a>");
					
					lists = lists.concat("</td></tr></tbody></table>");
				
							document.getElementById('test').innerHTML=lists;
							
							
					
												
						
					
														
						
					
							
							
							
							
						}
						
						}

					},

					onerror: function(e,val){
					alert("Contraseña y/o usuario incorrectos");
					}
				});

				}

	$(document).ready(function(){

	//Get my info

	var page = 0;
	var params2 = "/" + ide + "/" + tok + "/" + id_abs;
	var url4 = "../develop/read/newsUser.php" + params2+"/"+page;

	$.ajax({
		url: url4,
		dataType: "json",
		type: "GET",
		timeout: 5000,
		complete: function(r2){
				var json = JSON.parse(r2.responseText);
				var num_elements = json.numElems;
				var div = document.getElementById('activities');
				div.innerHTML = num_elements;
				
				
				for(var i=0; i<10; i++){
					var type = json[i].TYPE;
					var goes = json[i].GOES;
					var date = json[i].createdTime;

					moment.lang('es', {
							relativeTime : {
							future : "en %s",
							past : "hace %s",
							s : "unos segundos",
							m : "un minuto",
							mm : "%d minutos",
							h : "una hora",
							hh : "%d horas",
							d : "un día",
							dd : "%d días",
							M : "un mes",
							MM : "%d meses",
							y : "un año",
							yy : "%d años"
						}
					});
					
					var dateActivity = moment(date);
					if (dateActivity.isValid()){
					var activityFromNow = dateActivity.fromNow();
					}

					if (type == 1){
						var localName = json[i].localName;
						var title = json[i].title;
						var startHour = json[i].startHour;
						var closeHour = json[i].closeHour;
						var date = json[i].date;
						var month = date.substring(5,7);
						var day = date.substring(8,11);

						var m;
						
						if (month == 1){
							m = "ENE";
						}else if (month == 2){
							m = "FEB";
						}else if (month == 3){
							m = "MAR";
						}else if (month == 4){
							m = "ABR";
						}else if (month == 5){
							m = "MAY";
						}else if (month == 6){
							m = "JUN";
						}else if (month == 7){
							m = "JUL";
						}else if (month == 8){
							m = "AGO";
						}else if (month == 9){
							m = "SEP";
						}else if (month == 10){
							m = "OCT";
						}else if (month == 11){
							m = "NOV";
						}else if (month == 12){
							m = "DIC";
						}
						
						var id_local =  json[i].idProfileLocal;
						var link = "../club/profile.php?idv=" + id_local;
						var streetNameLocal = json[i].streetNameLocal;
						var streetNumberLocal = json[i].streetNumberLocal;
						var text = json[i].text;
						var picture = json[i].picture;

						var idEvent =  json[i].idEvent;
						var goes =  (json[i].GOES != null);

						if (picture==0 || picture=="" || picture==null)
						picture = "../images/reg2.jpg";

						//Local event
						if(goes){//User goes to this event, display disjoin
							$('#test').append('<li class=""> <div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div> <span class="label label-dark-blue" style="font-size:12px;">Evento Local</span> <a href="'+ link +'">'+ localName +'</a> <span style="font-size:12px;color:orange"> Publicado <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i>'+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24"> '+title+'</h5><p style="color:#707070;font-size:14px;"></p><p style="color:#E5E4E2;font-size:14px;">'+text+'</p><button type="button" name="join-event-' + json[i].idEvent + '" class="btn pull-right" style="margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;" onclick="clickedJoinEvent(' + "'" + json[i].idEvent + "'" + ');">Me Desapunto</button></td></tr></tbody></table>');

						}else{//User doesn't go to this event, display join
							$('#test').append('<li class=""> <div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div> <span class="label label-dark-blue" style="font-size:12px;">Evento Local</span> <a href="'+ link +'">'+ localName +'</a> <span style="font-size:12px;color:orange"> Publicado <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i>'+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24"> '+title+'</h5><p style="color:#707070;font-size:14px;"></p><p style="color:#E5E4E2;font-size:14px;">'+text+'</p><button type="button" name="join-event-' + json[i].idEvent + '" class="btn pull-right" style="margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;" onclick="clickedJoinEvent(' + "'" + json[i].idEvent + "'" + ');">Me Apunto</button></td></tr></tbody></table>');

						}

						}else if (type == 2){
						var name =  json[i].name;
						var surnames =  json[i].surnames;
						var status =  json[i].status;
						//Change status
						$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Estado Fiestero </span> '+name+' '+surnames+' <span style="font-size:12px;color:orange;" > Actualizó su estado <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i>'+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><p style="color:#707070;font-size:14px;">'+name+' cambió su estado a : '+status+'</p></td></tr></tbody></table>');

					}else if (type == 3){
						//Change mode
						var name =  json[i].name;
						var surnames =  json[i].surnames;
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

						$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Modo Fiestero</span> '+name+' '+surnames+' <span style="font-size:12px;color:orange;"> Actualizó su modo <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><p style="color:#707070;font-size:14px;">'+name+' '+surnames+' cambió su modo a : <span class="label label">'+modeString+'</span>	</p></td></tr></tbody></table>');
					}else if (type == 4){
						//friend add to favorites a local
						var name =  json[i].name;
						var surnames =  json[i].surnames;
						var localName =  json[i].localName;
						var id_local =  json[i].idProfileLocal;
						var link = "../club/profile.php?idv=" + id_local;

						$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url(../images/reg2.jpg);background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Local favorito</span>'+name+' '+surnames+'<span style="font-size:12px;color:orange;"> Agregó un local favorito <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><p style="color:#707070;font-size:14px;">'+name+' '+surnames+' agregó a <a href="'+link+'">'+localName+' '+'</a>como local favorito</p></td></tr></tbody></table>')

					}else if (type == 5){
						//Events friends attending
						var name =  json[i].name;
						var surnames =  json[i].surnames;
						var title = json[i].title;
						var text = json[i].text;

						if (picture==0 || picture=="" || picture==null)
						picture = "../images/reg2.jpg";

						var idEvent =  json[i].idEvent;
						var goes =  (json[i].GOES != null);

						if (goes){//User goes to this event, display disjoin
							$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Evento al que asistirá </span><a href="'+link+'">'+name+' '+surnames+'</a><span style="font-size:12px;color:orange"> se apuntó <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24">'+title+'</h5><p style="color:#E5E4E2;font-size:14px;">'+text+'</p><p style="color:#707070;font-size:14px;"></p><button type="button" name="join-event-' + json[i].idEvent + '" class="btn pull-right" style="margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;" onclick="clickedJoinEvent(' + "'" + json[i].idEvent + "'" + ');">Me Desapunto</button></td></tr></tbody></table>');

						}else{//User doesn't go to this event, display join
							$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Evento al que asistirá </span><a href="'+link+'">'+name+' '+surnames+'</a><span style="font-size:12px;color:orange"> se apuntó <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24">'+title+'</h5><p style="color:#E5E4E2;font-size:14px;">'+text+'</p><p style="color:#707070;font-size:14px;"></p><button type="button" name="join-event-' + json[i].idEvent + '" class="btn pull-right" style="margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;" onclick="clickedJoinEvent(' + "'" + json[i].idEvent + "'" + ');">Me Apunto</button></td></tr></tbody></table>');
						}
					}else  if (type == 6){
						// friend go to pub
						var name =  json[i].name;
						var surnames =  json[i].surnames;
						var localName =  json[i].localName;
						var id_local =  json[i].idProfileLocal;
						var link_local = "../club/profile.php?idv=" + id_local;
						var id_user = json[i].idPartierFriend;		
						var link_user = "../user/profile.php?idv=" + id_user;
					

						if (picture==0 || picture=="" || picture==null)
						picture = "../images/reg2.jpg";
							
						var goes =  (json[i].GOES != null);


						var actualdate=json[i].assistdate;
						var year = actualdate.substring(0,4);
						var month = actualdate.substring(5,7);
						var day = actualdate.substring(8,10);
						actualdate = day+'/'+month+'/'+year;

							$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Local al que asistirá </span><a href="'+link_user+'">'+name+' '+surnames+'</a><span style="font-size:12px;color:orange"> <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><h5 style="color:#ff6b24"><a href="'+link_user+'">'+name+' '+surnames+'</a></h5><p style="color:#E5E4E2;font-size:14px;">irá a <a href="'+link_local+'">'+localName+'</a> el '+actualdate+' </p><p style="color:#707070;font-size:14px;"></p></td></tr></tbody></table>');


	
	
										} else  if (type == 7){
											
						var name =  json[i].name;
						var surnames =  json[i].surnames;
						var localName =  json[i].localName;
						var id_local =  json[i].idProfileLocal;
						var link_local = "../club/profile.php?idv=" + id_local;
                        var id_user = json[i].idPartierFriend;		
						var link_user = "../user/profile.php?idv=" + id_user;
			

						if (picture==0 || picture=="" || picture==null)
						picture = "../images/reg2.jpg";

						$('#test').append('<li class=""><div class="workflow-item hover" style=" background-image:url('+picture+');background-size:100% 100%"></div><span class="label label-dark-blue" style="font-size:12px;">Check-In</span><a href="'+link_user+'"> '+name+' '+surnames+' </a><span style="font-size:12px;color:orange;"> entró  <i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:12px;"></i> '+activityFromNow+'</span></li><table class="table  tablaC1"><tbody><tr class=""><td><p style="color:#707070;font-size:14px;"><a href="'+link_user+'">'+name+' '+surnames+'</a> ya está en <a href="'+link_local+'">'+localName+'</a> </p></td></tr></tbody></table>');
					
				
				
						}else if(type==8){
							
											var name =  json[i].name;
						var surnames =  json[i].surnames;
						var title = json[i].title;
						var text = json[i].text;
						var startHour = json[i].startHour;
						var startH = startHour.substring(0,5);
						var date = json[i].date;
						var year = date.substring(0,4);
						var month = date.substring(5,7);
						var day = date.substring(8,11);
						date = day+'/'+month+'/'+year;

						var localName = json[i].localName;
						var id_local =  json[i].idProfileLocal;
						var link = "../club/profile.php?idv=" + id_local;

						var listDateClose= json[i].dateClose;
					
						var year = listDateClose.substring(0,4);
						var month = listDateClose.substring(5,7);
						var day = listDateClose.substring(8,11);
						listDateClose = day+'/'+month+'/'+year;

						var max=json[i].maxGuest;
					
						var id_user = json[i].idPartierFriend;		
						var link_user = "../user/profile.php?idv=" + id_user;
			
					
						if (picture==0 || picture=="" || picture==null)
						picture = "../images/reg2.jpg";

						var idList =  json[i].idEvent;
						var goes =  (json[i].GOES != null);
	
						var lists=document.getElementById('test').innerHTML;	
						lists = lists.concat("<li><div class='workflow-item hover' style='background-image:url(");
						lists=lists.concat(picture);
						lists=lists.concat(");background-size:100% 100%'></div>");
						lists = lists.concat("<span class='label label-dark-blue' style='font-size:12px'>Lista Local</span> <a href='"+ link +"'>"+ localName +"</a>");
						lists = lists.concat("<span style='font-size:12px;color:orange'> ");
						lists = lists.concat("<i class='glyphicon glyphicon-time'style='color:#FF6B24;font-size:12px'></i> "+activityFromNow+"</span></li>");
						lists = lists.concat("<table class='table  tablaC1'><tbody><tr><td><h5 style='color:#ff6b24'><b style='color:#34d1be'><a href='"+link_user+"'>");
						lists = lists.concat(name +" "+surnames+ " ");
						lists = lists.concat("</a> </b> se apuntó a la lista <b style='color:orange'>'");
						lists = lists.concat(title);
						lists = lists.concat("'</b></h5><p style='color:#707070;font-size:14px;margin-left:12%; '>");
						lists = lists.concat(text);
						lists = lists.concat("</P>");
						lists = lists.concat("<p style='color:#ff6b24'>El<b style='color:#34d1be'> ");
						lists = lists.concat(date);
						lists = lists.concat("</b> a partir de las <b style='color:#34d1be'> "); 
						lists = lists.concat(startH);
						lists = lists.concat("</b> hrs. Cierre de listas el  <b style='color:#34d1be'>");
						lists = lists.concat(listDateClose);
						lists = lists.concat("</b>");
						lists = lists.concat("</br></p> <span class='glyphicon glyphicon-plus' style='color:#34d1be'> </span> <select id='guests");
						lists = lists.concat(idList); 
						lists = lists.concat("'style='width:7%;border-radius:0px;'>  <option value='0' selected='1'></option>");
			
				    
				    for(var j = 0; j<max; j++ ) {
    					lists=lists.concat("<option value="+ j +">"+j+"</option>");
 						}

						lists = lists.concat("</select> <span style='color:#ff6b24'> Invitados </span>");
				
				if(!goes)
					lists = lists.concat("<a href=''id='"+idList+"'class='btn pull-right' onclick='joinList(this.id);'style='margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;' ><span>Entrar en listas</span></a>");
				else
				    lists = lists.concat("<a href=''id='"+idList+"'class='btn pull-right' onclick='disjoinList(this.id);' style='margin-right:5%;background-color:#000;border-color:#ff6b24;color:#34d1be;text-shadow:none;' ><span>Me Desapunto</span></a>");
					
					lists = lists.concat("</td></tr></tbody></table>");
				
							document.getElementById('test').innerHTML=lists;
							
							
					
												
						
					
														
							
						}
						

				}

			if (num_elements > 11){
				$('#show_more').append('<a href="profile.php#both" onclick="showMoreUserActivity();">Mostrar más..</a>	');
			}	

	},
	onerror: function(e,val){
	alert("Contraseña y/o usuario incorrectos");
	}
	});

	//Get user info
<?php
if(isset($_GET['idv'])){
?>
	var idProfile = <?php echo $_GET['idv']; ?>;
	var id = <?php echo $_SESSION['id_user']; ?>;
	var token =  "<?php echo $_SESSION['token']; ?>";
	var params = "/" + idProfile + "/" + token;
	var url1 = "../develop/update/";
	var params = "/" + id + "/" + token + "/" + idProfile;
	url1 += "user.php";
	url1 += params;
	$.ajax({
		url: url1,
		dataType: "json",
		type: "GET",
		timeout: 5000,
		async: false,
		complete: function(r2){
				var json = JSON.parse(r2.responseText);
				var picture = json.picture;
				if (picture.length >0){ 
		        	$('[name="profile-photo"]').attr("src", picture);
		        }else{
		            $('[name="profile-photo"]').attr("src", "../images/reg1.jpg");
		        }
				var name = json.name;
				var surnames = json.surnames;
				$("#complete-name").text(name + " " + surnames);
				$("#complete-name2").text(name + " " + surnames);
				var birthdate = json.birthdate;
				var birth_array = birthdate.split("/");
				$("#birthdate").text(birth_array[2] + "/" + birth_array[1] + "/" + birth_array[0]);
				var gender = json.gender;
				if(gender == "male"){
				$("#gender").text("Hombre");
				}
				if(gender == "female"){
				$("#gender").text("Mujer");
				}
				var memberSince = json.createdTime;
				var year = memberSince.substring(0,4);
				var month = memberSince.substring(5,7);
				if (month==01){month="Ene";$("#memberSince").text(month+" "+year);}
				if (month==02){month="Feb";$("#memberSince").text(month+" "+year);}
				if (month==03){month="Mar";$("#memberSince").text(month+" "+year);}
				if (month==04){month="Abr";$("#memberSince").text(month+" "+year);}
				if (month==05){month="May";$("#memberSince").text(month+" "+year);}
				if (month==06){month="Jun";$("#memberSince").text(month+" "+year);}
				if (month==07){month="Jul";$("#memberSince").text(month+" "+year);}
				if (month==08){month="Ago";$("#memberSince").text(month+" "+year);}
				if (month==09){month="Sep";$("#memberSince").text(month+" "+year);}
				if (month==10){month="Oct";$("#memberSince").text(month+" "+year);}
				if (month==11){month="Nov";$("#memberSince").text(month+" "+year);}
				if (month==12){month="Dic";$("#memberSince").text(month+" "+year);}
				var music = json.music;
					if (music == 0){$("#music").text("Acid-House");}	
					if (music == 1){$("#music").text("Alternative Rock");}
					if (music == 2){$("#music").text("Beatbox");}
					if (music == 3){$("#music").text("Black Metal");}
					if (music == 4){$("#music").text("Country");}
					if (music == 5){$("#music").text("Death Metal");}
					if (music == 6){$("#music").text("Deep House");}
					if (music == 7){$("#music").text("Disco");}
					if (music == 8){$("#music").text("Drum n Bass");}
					if (music == 9){$("#music").text("Electro");}
					if (music == 10){$("#music").text("Europop");}
					if (music == 11){$("#music").text("Folk");}
					if (music == 12){$("#music").text("Folk Rock");}
					if (music == 13){$("#music").text("Funk");}
					if (music == 14){$("#music").text("Hard Trance");}	
					if (music == 15){$("#music").text("Hard-House");}
					if (music == 16){$("#music").text("Hard-Rock");}
					if (music == 17){$("#music").text("Hardcore");}
					if (music == 18){$("#music").text("Hardstyle");}
					if (music == 19){$("#music").text("Heavy Metal");}
					if (music == 20){$("#music").text("Hip Hop");}
					if (music == 21){$("#music").text("House");}
					if (music == 22){$("#music").text("Indie Rock");}
					if (music == 23){$("#music").text("Italo-Disco");}
					if (music == 24){$("#music").text("Italo-Dance");}
					if (music == 25){$("#music").text("Jungle");}
					if (music == 26){$("#music").text("Latin");}
					if (music == 27){$("#music").text("Makina");}	
					if (music == 28){$("#music").text("Minimal");}
					if (music == 29){$("#music").text("Pachanga");}
					if (music == 30){$("#music").text("Pop-Rock");}
					if (music == 31){$("#music").text("Progressive House");}
					if (music == 32){$("#music").text("Progressive Trance");}
					if (music == 33){$("#music").text("Punk");}
					if (music == 34){$("#music").text("Reggae");}
					if (music == 35){$("#music").text("Reggaeton");}
					if (music == 36){$("#music").text("Rock & Roll");}
					if (music == 37){$("#music").text("Ska");}
					if (music == 38){$("#music").text("Soul");}
					if (music == 39){$("#music").text("Soul-Jazz");}
					if (music == 40){$("#music").text("Tech-House");}
					if (music == 41){$("#music").text("Techno");}
					if (music == 42){$("#music").text("Trance");}
					if (music == 43){$("#music").text("Tribal-House");}
				var civil_state = json.civil_state;
					if (civil_state == 0){$("#civil_state").text("Sin compromiso");}
					if (civil_state == 1){$("#civil_state").text("Ennoviad@");}
					if (civil_state == 2){$("#civil_state").text("Con novi@,pero no es un problema");}
					if (civil_state == 3){$("#civil_state").text("Buscando rollete");}
					if (civil_state == 4){$("#civil_state").text("Casad@");}
					if (civil_state == 5){$("#civil_state").text("Divorciad@");}
					if (civil_state == 6){$("#civil_state").text("Viud@");}
				var city = json.city;
				$("#city").text(city);
				
				var drink = json.drink;
					if (drink == 0){$("#drink").text("Agua con gas");}	
					if (drink == 1){$("#drink").text("Agua sin gas");}
					if (drink == 2){$("#drink").text("Anís");}
					if (drink == 3){$("#drink").text("Bourbon");}
					if (drink == 4){$("#drink").text("Brandy");}
					if (drink == 5){$("#drink").text("Calimocho");}
					if (drink == 6){$("#drink").text("Cava");}
					if (drink == 7){$("#drink").text("Cerveza");}
					if (drink == 8){$("#drink").text("Champagne");}
					if (drink == 9){$("#drink").text("Coñac");}
					if (drink == 10){$("#drink").text("Energética");}
					if (drink == 11){$("#drink").text("Ginebra");}
					if (drink == 12){$("#drink").text("Horchata");}
					if (drink == 13){$("#drink").text("Licor con alcohol");}
					if (drink == 14){$("#drink").text("Licor sin alcohol");}
					if (drink == 15){$("#drink").text("Refresco con gas");}
					if (drink == 16){$("#drink").text("Refresco sin gas");}
					if (drink == 17){$("#drink").text("Ron añejo");}
					if (drink == 18){$("#drink").text("Ron Blanco");}
					if (drink == 19){$("#drink").text("Sidra");}
					if (drink == 20){$("#drink").text("Tequila");}
					if (drink == 21){$("#drink").text("Vermouth");}
					if (drink == 22){$("#drink").text("Vino");}
					if (drink == 23){$("#drink").text("Vodka");}
					if (drink == 24){$("#drink").text("Whisky");}
					if (drink == 25){$("#drink").text("Zumo");}
				var about = json.about;
				$("#about").text(about);
				var twitter = json.twitter;
				$("#twitter").text(twitter);
				document.getElementById('twitter').href=twitter;
				var facebook = json.facebook;
				$("#facebook").text(facebook);
				document.getElementById('facebook').href=facebook;
				var instagram = json.instagram;
				$("#instagram").text(instagram);
				document.getElementById('instagram').href=instagram;
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
			},
			onerror: function(e,val){
			alert("Contraseña y/o usuario incorrectos");
			}
	});

<?php }else{//(!isset($_GET['idv'])) ?>
		var id = <?php echo $_SESSION['id_user'];?>;
		var token = "<?php echo $_SESSION['token'];?>";
		var params = "/" + idProfile + "/" + token; 
		var url1 = "../develop/update/";
		var params = "/" + id + "/" + token + "/" + id;
		url1 += "user.php";
		url1 += params;


	$.ajax({
		url : url1,
		dataType : "json",
		type : "GET",
		async : false,
		complete : function(r3) {
			var json = JSON.parse(r3.responseText);
			var picture = json.picture;
			if (picture.length >0){ 
	        	$('[name="profile-photo"]').attr("src", picture);
	        }else{
	            $('[name="profile-photo"]').attr("src", "../images/reg1.jpg");
	        }
			var name = json.name;
			var surnames = json.surnames;
			$("#complete-name").text(name + " " + surnames);
			$("#complete-name2").text(name + " " + surnames);
			var birthdate = json.birthdate;
			var birth_array = birthdate.split("/");
			$("#birthdate").text(birth_array[2] + "/" + birth_array[1] + "/" + birth_array[0]);
			var gender = json.gender;
			if (gender == "male") {
				$("#gender").text("Hombre");
			}
			if (gender == "female") {
				$("#gender").text("Mujer");
			}
			var memberSince = json.createdTime;
			var year = memberSince.substring(0,4);
			var month = memberSince.substring(5,7);
				if (month==01){month="Ene";$("#memberSince").text(month+" "+year);}
				if (month==02){month="Feb";$("#memberSince").text(month+" "+year);}
				if (month==03){month="Mar";$("#memberSince").text(month+" "+year);}
				if (month==04){month="Abr";$("#memberSince").text(month+" "+year);}
				if (month==05){month="May";$("#memberSince").text(month+" "+year);}
				if (month==06){month="Jun";$("#memberSince").text(month+" "+year);}
				if (month==07){month="Jul";$("#memberSince").text(month+" "+year);}
				if (month==08){month="Ago";$("#memberSince").text(month+" "+year);}
				if (month==09){month="Sep";$("#memberSince").text(month+" "+year);}
				if (month==10){month="Oct";$("#memberSince").text(month+" "+year);}
				if (month==11){month="Nov";$("#memberSince").text(month+" "+year);}
				if (month==12){month="Dic";$("#memberSince").text(month+" "+year);}
			
			var music = json.music;
					if (music == 0){$("#music").text("Acid-House");}	
					if (music == 1){$("#music").text("Alternative Rock");}
					if (music == 2){$("#music").text("Beatbox");}
					if (music == 3){$("#music").text("Black Metal");}
					if (music == 4){$("#music").text("Country");}
					if (music == 5){$("#music").text("Death Metal");}
					if (music == 6){$("#music").text("Deep House");}
					if (music == 7){$("#music").text("Disco");}
					if (music == 8){$("#music").text("Drum n Bass");}
					if (music == 9){$("#music").text("Electro");}
					if (music == 10){$("#music").text("Europop");}
					if (music == 11){$("#music").text("Folk");}
					if (music == 12){$("#music").text("Folk Rock");}
					if (music == 13){$("#music").text("Funk");}
					if (music == 14){$("#music").text("Hard Trance");}	
					if (music == 15){$("#music").text("Hard-House");}
					if (music == 16){$("#music").text("Hard-Rock");}
					if (music == 17){$("#music").text("Hardcore");}
					if (music == 18){$("#music").text("Hardstyle");}
					if (music == 19){$("#music").text("Heavy Metal");}
					if (music == 20){$("#music").text("Hip Hop");}
					if (music == 21){$("#music").text("House");}
					if (music == 22){$("#music").text("Indie Rock");}
					if (music == 23){$("#music").text("Italo-Disco");}
					if (music == 24){$("#music").text("Italo-Dance");}
					if (music == 25){$("#music").text("Jungle");}
					if (music == 26){$("#music").text("Latin");}
					if (music == 27){$("#music").text("Makina");}	
					if (music == 28){$("#music").text("Minimal");}
					if (music == 29){$("#music").text("Pachanga");}
					if (music == 30){$("#music").text("Pop-Rock");}
					if (music == 31){$("#music").text("Progressive House");}
					if (music == 32){$("#music").text("Progressive Trance");}
					if (music == 33){$("#music").text("Punk");}
					if (music == 34){$("#music").text("Reggae");}
					if (music == 35){$("#music").text("Reggaeton");}
					if (music == 36){$("#music").text("Rock & Roll");}
					if (music == 37){$("#music").text("Ska");}
					if (music == 38){$("#music").text("Soul");}
					if (music == 39){$("#music").text("Soul-Jazz");}
					if (music == 40){$("#music").text("Tech-House");}
					if (music == 41){$("#music").text("Techno");}
					if (music == 42){$("#music").text("Trance");}
					if (music == 43){$("#music").text("Tribal-House");}
			var civil_state = json.civil_state;
					if (civil_state == 0){$("#civil_state").text("Sin compromiso");}
					if (civil_state == 1){$("#civil_state").text("Ennoviad@");}
					if (civil_state == 2){$("#civil_state").text("Con novi@,pero no es un problema");}
					if (civil_state == 3){$("#civil_state").text("Buscando rollete");}
					if (civil_state == 4){$("#civil_state").text("Casad@");}
					if (civil_state == 5){$("#civil_state").text("Divorciad@");}
					if (civil_state == 6){$("#civil_state").text("Viud@");}
			var city = json.city;
			$("#city").text(city);
			var drink = json.drink;
					if (drink == 0){$("#drink").text("Agua con gas");}	
					if (drink == 1){$("#drink").text("Agua sin gas");}
					if (drink == 2){$("#drink").text("Anís");}
					if (drink == 3){$("#drink").text("Bourbon");}
					if (drink == 4){$("#drink").text("Brandy");}
					if (drink == 5){$("#drink").text("Calimocho");}
					if (drink == 6){$("#drink").text("Cava");}
					if (drink == 7){$("#drink").text("Cerveza");}
					if (drink == 8){$("#drink").text("Champagne");}
					if (drink == 9){$("#drink").text("Coñac");}
					if (drink == 10){$("#drink").text("Energética");}
					if (drink == 11){$("#drink").text("Ginebra");}
					if (drink == 12){$("#drink").text("Horchata");}
					if (drink == 13){$("#drink").text("Licor con alcohol");}
					if (drink == 14){$("#drink").text("Licor sin alcohol");}
					if (drink == 15){$("#drink").text("Refresco con gas");}
					if (drink == 16){$("#drink").text("Refresco sin gas");}
					if (drink == 17){$("#drink").text("Ron añejo");}
					if (drink == 18){$("#drink").text("Ron Blanco");}
					if (drink == 19){$("#drink").text("Sidra");}
					if (drink == 20){$("#drink").text("Tequila");}
					if (drink == 21){$("#drink").text("Vermouth");}
					if (drink == 22){$("#drink").text("Vino");}
					if (drink == 23){$("#drink").text("Vodka");}
					if (drink == 24){$("#drink").text("Whisky");}
					if (drink == 25){$("#drink").text("Zumo");}	
			var about = json.about;
			$("#about").text(about);
			var twitter = json.twitter;
			$("#twitter").text(twitter);
			document.getElementById('twitter').href=twitter;
			var facebook = json.facebook;
			$("#facebook").text(facebook);
			document.getElementById('facebook').href=facebook;
			var instagram = json.instagram;
			$("#instagram").text(instagram);
			document.getElementById('instagram').href=instagram;
			var mode = json.mode;
			if (mode == 0) {
				modeString = "De tranquis";
			} else if (mode == 1) {
				modeString = "Hoy no me lío";
			} else if (mode == 2) {
				modeString = "Lo que surja";
			} else if (mode == 3) {
				modeString = "Lo daré todo";
			} else if (mode == 4) {
				modeString = "Destroyer";
			} else if (mode == 5) {
				modeString = "Yo me llamo Ralph";
			}

			$('#mode').append('<span class="label label">' + modeString + '</span>');

		},
		onerror : function(e, val) {
			alert("No se puede introducir evento 2");
		}
	});

<?php }//end else (!isset($_GET['idv'])) ?>
	});//end $(document).ready(function()
		</script>

	</head>

	<body> <!--onload="JavaScript:timedRefresh(30000);">--->
		<style>
			body{background-color:#000;}
			navbar-fixed-top {
				z-index: 1030;
			}
			@media (max-width: 979px) {
				body {
					padding: 0px;
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
					color: #000;
				}
				.container {
					padding: 0px 20px;
				}

			}

		</style>

		<?php /*NavbarHeader*/
		if ($_SESSION['user_type'] == "user") {
			include "templates/navbar-header.php";
		} else if ($_SESSION['user_type'] == "club") {
			include "../club/templates/navbar-header.php";
		}
		?>

		<!-- MyProfile -->
		<div class="container" style="background-image:url(../images/CollageNeon.jpg);margin-bottom:-50px;">
			<div class="row">
				<div class="col-md-10" id="content-wrapper"  style="background-image:url(../images/CollageNeon.jpg)">
					<div class="row">
						<div class="col-lg-12">
							<header class="page-header"style="background-color:#000; border-color:#ff6b24;margin-bottom:1%;padding-bottom:1px;padding-top:1px;margin-top:0%;margin-left:1%;margin-right:-20%">
								<h1 style="color:#ff6b24;font-size:30px;margin-left:4%;">Perfil Fiestero</h1>
							</header>
							<div class="row" id="user-profile"style="background-color:#000; padding-top:8px;margin-left:1%;margin-right:-20%;margin-top:-1%">
								<div class="col-lg-3 col-md-4 col-sm-4" >
									<div class="main-box clearfix"style="background-color:#1B1E24;border-color:#ff6b24;box-shadow: 1px 1px 2px 0 #ff6b24;">
										<h2 id="complete-name" style="color:#ff6b24;text-transform: uppercase; text-align:center;"></h2>

										<img name="profile-photo" alt="" class="profile-img img-responsive center-block banner1" style="border-color:#ff6b24;"/>

										<div class="profile-label" id="mode">

										</div>

										<div class="profile-stars">

											<span style="color:orange;">Modo</span>
										</div>

										<div class="profile-since"style="color:#707070;">
											Miembro desde: <b id="memberSince"></b>
										</div>

										<div class="profile-details" style="background-color:#1B1E24;border-color:#ff6b24;">
											<ul class="fa-ul">
												<li  style="color:#ff6b24;">
													Seguidores:
													<span id="followers"> 
														<script> 
															my_followers(); 
														</script>
													</span>
												</li>
												<li  style="color:#ff6b24;">
													Siguiendo: 
													<span id="following"> 
														<script> 
															following(); 
														</script>
													</span>
												</li>
												<li  style="color:#ff6b24;">
													Publicaciones: 
													<span id="activities"> 
													</span>
												</li>
											</ul>
										</div>

										<div class="profile-message-btn center-block text-center">

											<a href="#" class="">
											<script>
												paintButton();
											</script> </a>
										</div>
									</div>
								</div>

								<div class="col-lg-9 col-md-8 col-sm-8">
									<div class="main-box clearfix " style="background-color:#1B1E24;box-shadow: 1px 1px 2px 0 #ff6b24;">
										<div class="profile-header">
											<h3 style="border-color:#ff6b24"><span style="color:#ff6b24;border-color:#ff6b24">Acerca de mí</span></h3>
										</div>

										<p id="about" style="color:#707070;">
											<?php //echo $_SESSION['about']; ?>
										</p>

										<h3 style="border-color:#ff6b24"><span style="color:#ff6b24;border-color:#ff6b24">Información</span></h3>

										<div class="row profile-user-info">
											<div class="col-sm-6">
												<div class="profile-user-details clearfix">
													<div class="profile-user-details-label"style="color:#34d1be;">
														Nombre y Apellidos
													</div>
													<div id="complete-name2" class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
														<?php //echo $_SESSION['name']." ".$_SESSION['surnames']; ?>
													</div>
												</div>
												<br>
												<div class="profile-user-details clearfix">
													<div class="profile-user-details-label"style="color:#34d1be;">
														Fecha de Nacimiento
													</div>
													<div id="birthdate" class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
														<?php
														$birth_array = explode ('/',$_SESSION['birthdate']);
														$day = $birth_array[2];
														$month = $birth_array[1];
														$year = $birth_array[0];
														echo $day."/".$month."/".$year
														?>
													</div>
												</div>
												<br>
												<div class="profile-user-details clearfix">
													<div class="profile-user-details-label"style="color:#34d1be;">
														Sexo
													</div>
													<div id="gender" class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
														<?php //if ($_SESSION['gender']=="male") echo "Hombre" ?><?php //if ($_SESSION['gender']=="female") echo "Mujer" ?>
													</div>
												</div>
												<br>
												<div class="profile-user-details clearfix">
													<div class="profile-user-details-label"style="color:#34d1be;">
														Estado Civil
													</div>
													<div id="civil_state" class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
														<?php// echo $_SESSION['civil_state']; ?>
													</div>
												</div>
												<br>
												<div class="profile-user-details clearfix">
													<div class="profile-user-details-label"style="color:#34d1be;">
														Ciudad Actual
													</div>
													<div id="city" class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
														
													</div>
												</div>
												<br>
												<div class="profile-user-details clearfix">
													<div class="profile-user-details-label"style="color:#34d1be;">
														Música Favorita
													</div>
													<div id="music" class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
														
													</div>
												</div>
												<br>
												<div class="profile-user-details clearfix">
													<div class="profile-user-details-label"style="color:#34d1be;">
														Bebida Favorita
													</div>
													<div id="drink" class="profile-user-details-value"style="color:#707070;margin-bottom:-3%">
														
													</div>
												</div>
											</div>

											<div class="col-sm-6 profile-social">
												<ul class="fa-ul" style="color:orange">
													<li>
														<i class=""></i>@Twitter <a id="twitter"href="" target="_blank"></a>
													</li>
													<li>
														<i class=""></i>Facebook <a id="facebook"href=""target="_blank"></a>
													</li>                                              
													<li>
														<i class=""></i>Instagram <a id="instagram"href=""target="_blank"></a>
													</li>

												</ul>
											</div>
										</div>

										<div class="tabs-wrapper profile-tabs" >
											<ul class="nav nav-tabs"style="border-color:#ff6b24;">
												<li class="active">
													<a href="#tab-activity" data-toggle="tab">Actividad</a>
												</li>

												<li>
													<a href="#tab-friends" data-toggle="tab">Amigos</a>
												</li>
												<!--<li><a href="#tab-dj" data-toggle="tab">DJ's</a></li>-->
												<li>
													<a href="#tab-club" data-toggle="tab">Locales</a>
												</li>
												<!--<li>
													<a href="#tab-photos" data-toggle="tab">Fotos</a>
												</li>-->
											</ul>
											<!-- begin Activity -->
											<div class="tab-content">
												<div class="tab-pane fade in active" id="tab-activity">

													<div class="the-timeline">
														<ul id="test">

														</ul>
													</div>

													<div id="show_more" name="both">

													</div>
												</div>
												<!-- end Activity -->
												<!-- begin friends -->
												<div class="tab-pane fade " id="tab-friends">
													<ul class="widget-users row" id="friends">
														<script>
															myfriends();
														</script>

													</ul>

												</div>
												<!-- end friends -->
												<!-- begin DJ's -->
												<!--	<div class="tab-pane fade " id="tab-dj">
												<ul class="widget-users row">
												<li class="col-md-6" style="border-color:#ff6b24;">
												<div class="img" style="">
												<img src="../images/profile.jpg" alt=""/>
												</div>
												<div class="details" style="background-color:#1B1E24;border:0px">
												<div class="name">
												<a href="#" style="color:#ff6b24; font-size:16px;">Nombre DJ</a>
												</div>
												<div class="time">
												<i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:11px;"></i> Última publicación: 3 min
												</div>

												</div>
												</li>
												<li class="col-md-6"style="border-color:#ff6b24;">
												<div class="img">
												<img src="../images/profile.jpg" alt=""/>
												</div>
												<div class="details"style="background-color:#1B1E24;border:0px">
												<div class="name">
												<a href="#" style="color:#ff6b24; font-size:16px;">Nombre DJ</a>
												</div>
												<div class="time">
												<i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:11px;"></i> Última publicación: 1 semana
												</div>

												</div>
												</li>
												<li class="col-md-6" style="border-color:#ff6b24;">
												<div class="img" style="">
												<img src="../images/profile.jpg" alt=""/>
												</div>
												<div class="details" style="background-color:#1B1E24;border:0px">
												<div class="name">
												<a href="#" style="color:#ff6b24; font-size:16px;">Nombre DJ</a>
												</div>
												<div class="time">
												<i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:11px;"></i> Última publicación: 3 min
												</div>

												</div>
												</li>
												<li class="col-md-6"style="border-color:#ff6b24;">
												<div class="img">
												<img src="../images/profile.jpg" alt=""/>
												</div>
												<div class="details"style="background-color:#1B1E24;border:0px">
												<div class="name">
												<a href="#" style="color:#ff6b24; font-size:16px;">Nombre DJ</a>
												</div>
												<div class="time">
												<i class="glyphicon glyphicon-time"style="color:#FF6B24;font-size:11px;"></i> Última publicación: 1 semana
												</div>

												</div>
												</li>

												<br/>

												</div>-->

												<!-- end DJ's -->
												<!-- begin Clubs -->
												<div class="tab-pane fade " id="tab-club">
													<ul class="widget-users row" id="localfav">
														<script>
															favouriteLocals();
														</script>
													</ul>
												</div>
												<!-- end Clubs -->
												<!-- begin Fotos -->
												<!--<div class="tab-pane fade" id="tab-photos">
														<div class="container" style="background-color:#000;box-shadow: 1px 1px 2px 0 #ff6b24;">
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
													</div>

												</div>-->
												<!--end Fotos -->

											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /MyProfile -->
				<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
				<script src="../js/profile-test1.js"></script>
				<script src="../js/profile-test2.js"></script>
				<!--<script src="../js/bootstrap.min.js"></script>
				<script src="../js/images-user2.js"></script>
				<script src="../js/images-user1.js"></script>
				<script src="../js/images-user.js"></script>-->

	</body>
</html>
