<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('perfil/add', 'NUEVA PERFIL'); ?>
<br>
<br>

<table border="1">
<tr>

<th> IDPERFIL</th>
<th> DESCRIPCION</th>
</tr>
<tbody>
<?php  foreach($perfil_list as $list) { ?>
<tr>

<td> <?php echo $list->idperfil ?></td>
<td> <?php echo $list->descripcion?></td>
<td> <?php echo anchor('perfil/edit/'.$list->idperfil,'Edit') ?> || <?php echo anchor('perfil/delete/'.$list->idperfil,'Delete') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>