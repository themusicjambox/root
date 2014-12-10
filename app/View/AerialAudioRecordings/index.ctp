<?php
$this->extend('/Common/view');
echo $this->Html->script('jquery-1.11.1.min');
?>
<script>
$('.active').removeClass('active');
$('#aar').addClass('active');

function cargarSubcategorias(){

    var val = $('#categorias_select').val();
    
    $.ajax({
        type:"POST",
        url:"/jambox/AerialAudioRecordings/cargarComboSubCategorias/"+val,
        data:'id_categoria='+val,
        success:function (data) {
        $('#subcategorias_select').replaceWith(data);
        }
    });
}

function stopAndPlay(path, ext, name){
    goToNowPlaying();
    showLoading();
    var ap = $('#audio_player');
    ap.attr("src", path);
    var tit = $('#play_title');
    tit.text(name);
}

function playMusic(){
    hideLoading();
    var ap = $('#audio_player');
    ap.trigger('play');
}

function goToNowPlaying(){
     $('html, body').animate({
        scrollTop: $("#main_logo_img").offset().top
    }, 4500);
}

function hideLoading(){
    $('#loading_gif').hide();
}

function showLoading(){
    $('#loading_gif').show();
}
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57412371-1', 'auto');
  ga('send', 'pageview');

</script>

        
<img style="display:none;" height="80px" width="80px" src="./img/loading18.gif"  id="loading_gif" name="loading_gif">        
<h5 style="text-decoration: underline;" id="play_title" name="play_title">No audio selected.</h5>

<!-- Audio Player -->
<audio id="audio_player" name="audio_player" oncanplaythrough="playMusic();" controls>  
    <source src="files/aerial_audio_recordings/none.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>
<br><br>

<!-- Buscador de grabaciones aereas -->
<?php echo $this->Form->create('buscador_item'); ?>
    <table width="80%" style="margin: 0px auto;">
        <tbody>
            <tr>
                <td><p style="color:white;font-weight:bold;margin: 0px 0px 10px;">Nombre</p></td>
                <td style="text-align:left;"><input style="vertical-align:middle;" type="text" name="f_nombre" id="f_nombre" value="<?=isset($this->request->data['f_nombre']) ? $this->request->data['f_nombre'] : ""?>" /></td>
                <td><p style="color:white;font-weight:bold;margin: 0px 0px 10px;">Año</p></td>
                <td style="text-align:left;">
                    <select id="anio_select" name="anio_select">
                        <option value="0">Todos</option>
                        <?php
                        if (isset($this->request->data['anio_select'])) {
                            $anio_select = $this->request->data['anio_select'];
                        }
                        
                        for ($i=date("Y"); $i >= 2013 ; $i--) { 

                            if ($i == $anio_select){
                                    echo "<option value=".$i." selected>";
                                    echo $i;
                                    echo "</option>";
                                    
                                }else{
                                    echo "<option value=".$i.">";
                                    echo $i;
                                    echo "</option>";
                                }                                                        
                        }
                        ?>
                    </select>
                </td>                
            </tr>
            <tr>                                
                <td><p style="color:white;font-weight:bold;margin: 0px 0px 10px;">Categoría</p></td>
                <td style="text-align:left;">
                    <select id="categorias_select" name="categorias_select">
                    <option value="0">Todas</option>
                    <?php foreach ($categorias as $categoria): ?>                     
                    <?php $id_cat = $categoria['Subcategoria']['id_subcategoria'];
                          $id_selected = $this->request->data['categorias_select'];
                          if ($id_cat == $id_selected) {
                              echo "<option value=".$id_cat." selected>";
                          }else{
                              echo "<option value=".$id_cat.">";
                          }
                    ?>
                    <?php echo $categoria['Subcategoria']['d_subcategoria']; ?>
                    <?php echo "</option>"; ?>
                    <?php endforeach; ?>                    
                    </select>
                    <?php unset($categorias); ?>
                </td>
                <td><p style="color:white;font-weight:bold;margin: 0px 0px 10px;">Estación</p></td>
                <td style="text-align:left;">
                    <select id="estacion_select" name="estacion_select">
                        <option value="0">Todas</option>
                        <?php
                        $estacion_select = "";
                        if (isset($this->request->data['estacion_select'])) {
                            $estacion_select = $this->request->data['estacion_select'];                        
                        }

                        ?>
                        <option value="1" <?php if ($estacion_select == 1) {
                            echo "selected";
                        } ?> >Otoño</option>
                        <option value="2" <?php if ($estacion_select == 2) {
                            echo "selected";
                        } ?>>Invierno</option>
                        <option value="3" <?php if ($estacion_select == 3) {
                            echo "selected";
                        } ?>>Primavera</option>
                        <option value="4" <?php if ($estacion_select == 4) {
                            echo "selected";
                        } ?>>Verano</option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
<?php echo $this->Form->submit('♫ ♪ ♫ ♪'); ?>    
<?php echo $this->Form->end(); ?>    

<!-- Buscador -->

<table class="table table-striped" width="100%" style="margin: 0px auto;">
    <tr>        
        <th><p style="text-align:center;">Nombre</p></th>
        <th><p style="text-align:center;">Descripción</p></th>      
        <th><p style="text-align:center;">Fecha</p></th>
    </tr>        
    <?php foreach ($items as $item): ?>
    <tr>        
        <td style="vertical-align:middle;text-align:center;font-weight:bold; text-decoration:underline;"><span style="cursor:pointer;" onclick="stopAndPlay('<?=$item['AerialAudioRecording']['path'];?>','<?=$item['AerialAudioRecording']['extension'];?>','<?=$item['AerialAudioRecording']['n_item'];?>');"><?php echo $item['AerialAudioRecording']['n_item']; ?></span></td>
        <td style="vertical-align:middle;text-align:center;font-style:italic;"><?php echo $item['AerialAudioRecording']['d_item']; ?></td>   
        <?php
        $phpdate = strtotime($item['AerialAudioRecording']['f_creacion']);
        $mysqldate = date('d/m/Y', $phpdate); 
        ?>
        <td style="vertical-align:middle;text-align:center;"><?php echo $mysqldate; ?></td>
    </tr>
    <?php endforeach; ?>    
    <?php unset($items); ?>
</table>
<?php
    if (isset($result)) {
        echo "<br><p>No se han encontrado resultados.</p>";
    }
?>
