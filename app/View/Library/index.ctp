<?php
$this->extend('/Common/view');
echo $this->Html->script('jquery-1.11.1.min');
?>
<script>
$('.active').removeClass('active');
$('#lib').addClass('active');

function submit_form(){
    document.forms["form_library"].submit();
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

<form action="./Library" id="form_library" name="form_library" method="post" accept-charset="utf-8">
<table width="30%" style="margin: 0px auto;">
    <tbody>
        <tr>   
            <td rowspan="2">
                <p style="font-weight:bold;text-decoration:underline;">Document type:</p>
            </td>
            <td style="font-weight:bold;">
                All
            </td>
            <td style="font-weight:bold;">
                Link
            </td>
            <td style="font-weight:bold;">
                File
            </td>
        </tr>
        <?php
        if (isset($this->request->data['type'])) {
            $checked = $this->request->data['type'];
        }else{
            $checked = 0;
        }
        ?>
        <tr>   
            <td>
                <input id="all" onclick="submit_form();" type="radio" name="type" value="0" <?=$checked == 0 ? "checked" : "";?>/>
            </td>
            <td>
                <input id="link" onclick="submit_form();" type="radio" name="type" value="1" <?=$checked == 1 ? "checked" : "";?>/>
            </td>
            <td>
                <input id="file" onclick="submit_form();" type="radio" name="type" value="2" <?=$checked == 2 ? "checked" : "";?>/>
            </td>
        </tr>
    </tbody>
</table>
</form> 

<!-- Buscador -->

<table class="table table-striped" width="70%" style="margin: 0px auto;">
    <tr>        
        <th><p style="text-align:center;">Nombre</p></th>
        <th><p style="text-align:center;">Descripción</p></th>      
        <th><p style="text-align:center;">&nbsp;</p></th>
    </tr>        
    <?php foreach ($docs as $doc): ?>
    <tr>        
        <td style="vertical-align:middle;text-align:center;font-weight:bold; text-decoration:underline;">
            <?php echo $doc['Document']['n_document']; ?></td>
        <td style="vertical-align:middle;text-align:center;font-style:italic;">
            <?php echo $doc['Document']['d_document']; ?></td>   

        <td style="vertical-align:middle;text-align:center;text-decoration:underline;font-weight:bold;">
        <?php
        $tipo = $doc['Document']['id_tipo_doc'];        
        $link = $doc['Document']['path'];
        if ($tipo == 1) { // Link            
            echo "<a href='$link' target='_blank'>Go</a>";    
        }elseif ($tipo == 2) { // File
            $link = basename($link);
            echo "<a href='files/library/$link' target='_blank'>Download</a>";
        }
        ?>
        </td> 
    </tr>
    <?php endforeach; ?>    
    <?php unset($items); ?>
</table>
<?php
    if (isset($result)) {
        echo "<br><p>No se han encontrado resultados.</p>";
    }
?>
