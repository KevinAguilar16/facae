<section id="presentacion">
    
    
<div class="w3-container" id="eys-registro">

		<div style="width: 50%;  padding:10px; margin:auto; position:relative; " >
				<div class="w3-card-2"  style="width:100%; height:700px; ">
					<header class="w3-container" style="background-color:#4CAF50;">
						<p style="font-variant: small-caps; font-weight:bold; font-family:'Times New Roman'; font-size:25px; color:white;
                text-align:center;">Registrate a nuestra plataforma</p>
					</header>
				<div class="w3-container" style="display:flex; flex-direction:column; padding: 30px; font-size:70%;">
				<?php
					echo form_open('login/new_user_registration');
				?>

	<div class="w3-container" style="text-align:left; font-size: 70%;">
	<?php
//		echo form_label("Programa al que desea optar : ","idprograma").'<br/>';
//		$options = array('--Select--');
//		foreach ($programa_list as $row){
  //   			$options[$row->idprograma] = $row->programa;
//		}
	//	echo form_dropdown('idprograma',$options,array("style"=>"width:100%;"));
		  
  // 		echo form_input(array('id'=>'idprograma','name'=>'idprograma','value'=>2, 'type'=>'hidden'));
   //		echo form_input(array('id'=>'programa','name'=>'programa','value'=>$options[2], 'class'=>'form-control'));
	 ?>
	</div>


				<div  class="w3-container" style="text-align:left; font-size: 70%;">
					<?php
					echo "<label  style='text-align:left; font-size: 100%;' for='cedula'> Cédula: </label>";
					echo form_input(array('id'=>'cedula','name'=>'cedula', 'class'=>'form-control'));
					echo "<div class='error_msg'>";
					if (isset($message_display)) {
						echo $message_display;
					}
					echo "</div>";
					?>
				</div>


	<div class="w3-container" style="text-align:left; font-size: 70%;">
   	<?php
   		echo "<label style='text-align:left; font-size: 100%;'  for='apellidos'> Apellidos: </label>";
   		echo form_input(array('id'=>'apellidos','name'=>'apellidos', 'class'=>'form-control'));
   		echo "<div class='error_msg'>";
   		if (isset($message_display)) {
     			echo $message_display;
   		}
		echo "</div>";
   	?>
	</div>


	<div class="w3-container"  style="text-align:left; font-size: 70%;">
  	<?php
  		echo "<label  style='text-align:left; font-size:100%;' for='nombres' >  Nombres: </label>";
  		echo form_input(array('id'=>'nombres','name'=>'nombres', 'class'=>'form-control'));
  		echo "<div class='error_msg'>";
  		if (isset($message_display)) {
     			echo $message_display;
  		}
		echo "</div>";
  	?>
	</div>



	<div class="w3-container"  style="text-align:left; font-size: 70%;">
  	<?php
  		echo "<label  style='text-align:left; font-size:100%;' for='perfil' >  Perfil: </label>";
		$options= array('--Select--');
		foreach ($perfiles as $row){
			$options[$row->idperfil]= $row->descripcion;
		}
  		echo form_dropdown('idperfil',$options,set_select('--Select--','default_value'),array('class'=>'form-control'));
  		echo "<div class='error_msg'>";
  		if (isset($message_display)) {
     			echo $message_display;
  		}
		echo "</div>";
  	?>
	</div>









	<div class="w3-container"  style="text-align:left; font-size: 70%;" >
  	<?php
  		echo "<label style='text-align:left; font-size: 100%;'  for='email'> Correo: </label>";
  		$data = array('id'=>'email', 'type' => 'email','name' => 'email','class'=>'form-control');
  		echo form_input($data);
  	?>
	</div>

	<div class="w3-container"  style="text-align:left; font-size: 70%;" >
  	<?php
  		echo "<label  style='text-align:left; font-size: 100%;'    for='password' > Contraseña: </label>";
  		echo form_password(array('id'=>'password','type'=>'password','name'=>'password', 'class'=>'form-control'));
  	?>
	</div>

	<div class="w3-container"   style="text-align:left; font-size: 70%;"  >
  		<?php
  		echo "<label  style='text-align:left; font-size: 100%; padding:0;'    for='password2' > Repita contraseña: </label>";
  		echo form_password(array('id'=>'password2','type'=>'password','name'=>'password', 'class'=>'form-control','style'=>'border-color:green;'));
  		?>
	</div>

	<div class="w3-container" style="padding-top:10px;">
  	<?php 	$data=array('type'=>'submit','value'=>'Guardar datos','name'=>'submit','style'=>'background-color: #4CAF50;
  		border: 0;
  		border-radius: 10px;
 		cursor: pointer;
  		color: #fff;
  		font-size:16px;
  		font-weight: bold;
  		line-height: 1.4;
  		padding: 10px;
  		width: 100%;');
  		echo form_submit($data);
  		echo form_close();?>
	</div>
	</div>

	<footer align="right"  class='w3-container' style="font-size:25px; padding: 10px;">
 		<center> ¿Ya creastes tu cuenta? <br> <a style="color:red;"  href="<?php echo base_url() ?>index.php/login" role="button">Ingresar al sistema</a></center>
	</footer>

</div>
</div>
</div>
</section>



