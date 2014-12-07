<select id="subcategorias_select">
<option value="0" selected>-</option>                                     
<?php foreach ($subcategorias as $subcategoria): ?>                       
<?php echo "<option value=".$subcategoria['Subcategoria']['id_subcategoria'].">"; ?>
<?php echo $subcategoria['Subcategoria']['d_subcategoria']; ?>
<?php echo "</option>"; ?>
<?php endforeach; ?>
</select> 
<?php unset($subcategorias); ?>