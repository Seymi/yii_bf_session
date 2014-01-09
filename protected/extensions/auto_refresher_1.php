
<input id="refresh_rate" type="number" min="0.2" max="120" step="0.2" value="1" size="2" />


auto refresh
<input id="auto_refresher" type="checkbox" value="true" checked />

<input id="refresh_range" type="range" min="0.2" max="120" step="0.2" value="1" onchange="printValue('refresh_range', 'refresh_rate')" />



<script type="text/javascript">
    
    var r = document.getElementById(auto_refresher);
    auto_refresh = r.value;
    

    //auto_refresh = true;
    //count = 0;
    //auto_refresh = false;


    if (auto_refresh)
        window.onload = setupRefresh;

    function setupRefresh() {
        setTimeout("refreshPage();", 1000); // milliseconds
    }
    function refreshPage() {
        //count +=1;
        //print  count;
        window.location = location.href;
    }


    function printValue(sliderID, textbox) {
        var x = document.getElementById(textbox);
        var y = document.getElementById(sliderID);
        x.value = y.value;
    }


</script> 




<?php

print 'jetzt: ' . date('Y-m-d H:i:s');
?>
