<?php
/* @var $this BetfairController 
   $markets 
*/

$this->breadcrumbs = array(
    'Betfair' => array('/betfair'),
    'MarketViewer',
);
?>

<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>


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

  print "Country: " . $marketDetails->Result->market->countryISO3;
  print " >> ";

  print "BaseRate: " . $marketDetails->Result->market->marketBaseRate;
  print " >> ";

  print "marketId: " .  $marketDetails->Result->market->marketId;
  print " >> ";

  print "marketStatus: " . $marketDetails->Result->market->marketStatus;
  print " >> ";
  
  print "marketSuspendTime: " . $marketDetails->Result->market->marketSuspendTime;
  print '<br/>';

  print $marketDetails->Result->market->menuPath;
  print '<br/>';
  
  print $marketDetails->Result->market->name;
  print '<br/>';
  
  
  print_r ($marketOdds);
  print '<br/>';
  print '<br/>';
  print '<br/>';
  

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
    print '<br/>';
    print '<br/>';
    print 'OOOOO OOOOOOOOOOO OOOOOOOOOOOO OOOOOOOOOOOO';
    print '<br/>';
  
 
?>

