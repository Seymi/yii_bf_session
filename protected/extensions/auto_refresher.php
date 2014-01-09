
<input id="refresh_rate" type="number" name="refresh_rate" size=1 />
auto refresh
<input type="checkbox" name="auto_refresh" />

<input type="range" name="refresh_range" min="0.2" max="120" step="0.2" value="1" onchange="printValue('refresh_range','refresh_rate')" />



<script type="text/javascript">
    
    auto_refresh = true;
    count = 0;
    auto_refresh = false;
    
    
    if (auto_refresh) window.onload = setupRefresh;
    
    function setupRefresh() {
      setTimeout("refreshPage();", 1000); // milliseconds
    }
    function refreshPage() {
       //count +=1;
       //print  count;
       window.location = location.href;
    }
</script> 


  

<?php
print 'jetzt: ' . date('Y-m-d H:i:s');
?>
