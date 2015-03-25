<?php
$this->extend('/Common/view');
echo $this->Html->script('jquery-1.11.1.min');
?>
<script>
$('.active').removeClass('active');
$('#archive').addClass('active');
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57412371-1', 'auto');
  ga('send', 'pageview');

</script>
<table width="80%" style="margin: 0px auto;" border="3">
    <tbody> <?php $j = 0;
                  $k = 0;?>   	
            <?php foreach ($jams as $jam): ?>
            
                <?php                
                if ($j % 3 == 0) {
                    echo "<tr>";
                }                
                ?>
                <td>
                <?php echo $jam['Archive']['code'];
                $j++;                
                ?>
                </td>  
                <?php
                if ($j == 3) {
                    echo "</tr>";
                    $j = 0;
                    echo "<tr>";
                    for ($z=$k-2; $z <= $k; $z++){
                        $reg = $jams[$z];
                        echo "<td style='vertical-align:middle;text-align:center;'>";
                        echo "<span style='font-weight:bold; text-decoration:underline;'>";
                        echo strtoupper($reg['Archive']['n_jam']);
                        echo "</span>";
                        echo "<br>";
                        echo "<span style='font-style:italic;'>";
                        echo $reg['Archive']['d_jam'];
                        echo "</span>";                        
                        echo "<br>";
                        $phpdate = strtotime($reg['Archive']['f_creacion']);
                        $mysqldate = date('d/m/Y', $phpdate);
                        echo $mysqldate;                        
                        echo "</td>";
                    }
                    echo "</tr>";
                }
                $k++;
                ?>  
            <?php endforeach; ?>  
            <?php
            if ($k % 3 != 0) {  
                echo "<tr>";
                for ($z=$k-1; $z < $k; $z++){
                    $reg = $jams[$z];
                    echo "<td style='vertical-align:middle;text-align:center;'>";
                    echo "<span style='font-weight:bold; text-decoration:underline;'>";
                    echo strtoupper($reg['Archive']['n_jam']);
                    echo "</span>";
                    echo "<br>";
                    echo "<span style='font-style:italic;'>";
                    echo $reg['Archive']['d_jam'];
                    echo "</span>";                    
                    echo "<br>";
                    $phpdate = strtotime($reg['Archive']['f_creacion']);
                    $mysqldate = date('d/m/Y', $phpdate);
                    echo $mysqldate;                    
                    echo "</td>";
                }
                echo "</tr>";

            }
            ?>  
            <?php unset($jams); ?>
	</tbody>
</table>
<?php
    if (isset($result)) {
        echo "<br><p>No available open sessions yet.</p>";
    }
?>
