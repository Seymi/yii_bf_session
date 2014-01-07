

<script type="text/javascript">
    
    auto_refresh = true;
    auto_refresh = false;
    
    
    if (auto_refresh) window.onload = setupRefresh;
    
    function setupRefresh() {
      setTimeout("refreshPage();", 10000); // milliseconds
    }
    function refreshPage() {
       window.location = location.href;
    }
  </script> 



<?php
/* @var $this BetfairController 
   $markets 
 * $marketOdds
*/


$this->breadcrumbs = array(
    'Betfair' => array('/betfair'),
    'MarketViewer',
);
?>


<h2><?php print $marketDetails->Result->market->menuPath; ?></h2>


<?php

/*
  print_r ($marketDetails);
  print '<br/>';
  print '<br/>';
  print '<br/>';

  print_r(array_keys($marketDetails));
  print '<br/>';
  print '<br/>';
  print '<br/>';

  print_r ($marketDetails->Result->header);
  print '<br/>';
  print 'XXXXXXXXXXXXX    XXXXXXXXXXXXXXXXXX   XXXXXXXXXXXXX';
  print '<br/>';
  print '<br/>';

  print_r ($marketDetails->Result->errorCode);
  print '<br/>';    
  print '<br/>';
  print '<br/>';
  print ' ############   ##############  #################  ';
  print '<br/>';
  print '<br/>';
    
    
  var_dump($marketDetails->Result->market);
  print '<br/>';
  print '<br/>';
  print '<br/>';

  print_r(array_keys($marketDetails->Result->market));
  print '<br/>';
  print '<br/>';
  print '<br/>';
*/    

  print "Country: " . $marketDetails->Result->market->countryISO3; print " >> ";
  print "BaseRate: " . $marketDetails->Result->market->marketBaseRate; print " >> ";
  print "marketId: " .  $marketDetails->Result->market->marketId; print " >> ";
  print "marketStatus: " . $marketDetails->Result->market->marketStatus; print " >> ";
  print "marketSuspendTime: " . $marketDetails->Result->market->marketSuspendTime . ' ' . $marketDetails->Result->market->timezone;;
  print '<br/>';
  
  // eventHierarchy
  foreach ($marketDetails->Result->market->eventHierarchy->EventId as $eventHierarchyEventId)
  {
      echo CHtml::link($eventHierarchyEventId, array('betfair/events', 'eventId'=>$eventHierarchyEventId)) . ' >> '; 
  }
  
  // array of selectionId and runners
  $runners = array();
             foreach($marketDetails->Result->market->runners->Runner  as $runner)
             {
                 $runners[$runner->selectionId] = $runner->name;
             }          
             
  print_r($runners);
  
  
?>

<h3><?php   print $marketDetails->Result->market->name; ?></h3>
  

<p>
<?php
//   market odds starts here
//  print_r ($marketOdds);
//  print '<br/>';

  $show_header = true;
  $show_header = false;
  
  if ($show_header)
  {    
    print_r ($marketOdds->Result->header);
    print '<br/>';
  
    print_r ($marketOdds->Result->errorCode);
    print '<br/>';
  }    

?>  
</p>  

<?php
  //print_r ($marketOdds->Result->marketPrices);
  //print '<br/>';
  
  print_r ($marketOdds->Result->marketPrices->currencyCode);
  print ' >> ';
  print_r ($marketOdds->Result->marketPrices->delay);
  print ' >> ';

  print_r ($marketOdds->Result->marketPrices->marketStatus);
  print ' >> ';
  
  print_r ($marketOdds->Result->marketPrices->numberOfWinners);
  
  print '<br/>';

  
 //print_r($marketOdds->Result->marketPrices->runnerPrices);
  print '<br/>';
  
  ?>


  <div id="odds">
  <table cellpadding="1" cellspacing="1" border="2">

  <?php
  foreach ($marketOdds->Result->marketPrices->runnerPrices->RunnerPrices as $runnerPrice)
  {

   /*
    print_r ($runnerPrice);
    print '<br/>';
    print 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr';
    print '<br/>';
   */ 
      
    print '<tr>';
    //print '<td rowspan="2" >';
    
    print 'selectionId: ' . $runnerPrice->selectionId;      print ' >> ';
    print 'asianLineId: ' . $runnerPrice->asianLineId;       print ' >> ';
    print 'handicap: ' .  $runnerPrice->handicap;     print ' >> ';
    print 'reductionFactor: ' . $runnerPrice->reductionFactor;        print ' >> ';
    print 'sortOrder: ' . $runnerPrice->sortOrder;      print ' >> ';
    print 'lastPrice: ' . $runnerPrice->lastPriceMatched;      print ' >> ';
    print 'totalAmount: ' . $runnerPrice->totalAmountMatched;      print '<br/>';
    print '<br/>'; 
    print '</td>';
    
    print '<td class="odd_back">';
    print_r ($runnerPrice->bestPricesToBack);
    print '</td>';

    print '<td class="odd_lay">';    
    print_r ($runnerPrice->bestPricesToLay);
    print '</td>';

    print '</tr>';
  }    
  
  ?>
  
  </table>
</div>

  <?php
  
  print_r( $marketOdds->Result->minorErrorCode);
  print '<br/>';
  
  
/*  
[currencyCode] => EUR 
[delay] => 0 
[discountAllowed] => 1 
[lastRefresh] => 1388988383940 
[marketBaseRate] => 5 
[marketId] => 112324681 
[marketInfo] => 
[removedRunners] => 
[marketStatus] => ACTIVE 
[numberOfWinners] => 1 
[bspMarket] =>  
*/
  
  

/*
  foreach ($marketDetails->Result->market as $key => $value) {
    print "Key: $key";
    print '<br/>';
    
    if (!is_array($value))
    {    
      print ("Value: $marketDetails->Result->market[$key]");
      print '<br/>';
    } else
    {
      //print_r ($value);
      print '<br/>';
    }    
        
  } 
 */   

/*
  foreach ($marketDetails->Result->market as $marketDetail) 
  {
    //print_r ($marketDetail);
  //  print '<br/>';
      
  print_r ($marketDetail->countryISO3);
  print '<br/>';
 */

  
  /*
  countryISO3
  discountAllowed
  eventTypeId
  lastRefresh
  marketBaseRate
  marketDescription
  marketDescriptionHasDate
  marketDisplayTime
  marketId
  marketStatus
  marketSuspendTime
  marketTime
  marketType
  marketTypeVariant
  menuPath
  eventHierarchy  (EventId)
  name
  numberOfWinners
  parentEventId

  runners    (asianLineId, handicap, name, selectionId)

  unit
  maxUnitValue
  minUnitValue          
  interval          
  runnersMayBeAdded        
  timezone
  couponLinks          
  bspMarket
  */        
          
    //print_r ($marketDetails->Result->market);
    print '<br/>';
    print 'OOOOO OOOOOOOOOOO OOOOOOOOOOOO OOOOOOOOOOOO';
    print '<br/>';
  
 
?>

