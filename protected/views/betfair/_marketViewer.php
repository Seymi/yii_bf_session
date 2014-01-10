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

  <h2>
      <?php
      
      
      try {
          if (array_key_exists('Result', $marketDetails))
            if (array_key_exists('market', $marketDetails->Result))
              if ( is_array($marketDetails->Result->market) && array_key_exists('menuPath', $marketDetails->Result->market) ) 
                print $marketDetails->Result->market->menuPath;
              else
                 print "menuPath not found"; 
      } catch (Exception $e) {
          echo "Exception occured: " . $e;
          $this->render('error', $e);
      }
      ?>
  </h2>

<?php

/*
  print_r ($marketDetails);
  print '<br/>';
  print '<br/>';
  print '<br/>';
*/
/*
  print_r(array_keys($marketDetails));
  print '<br/>';
  print '<br/>';
  print '<br/>';
 
 */

/*
  print_r ($marketDetails->Result->header);
  print '<br/>';
  print 'XXXXXXXXXXXXX    XXXXXXXXXXXXXXXXXX   XXXXXXXXXXXXX';
  print '<br/>';
  print '<br/>';
*/
  print_r ($marketDetails->Result->errorCode);
  print '<br/>';    
  print '<br/>';
  print '<br/>';
  print ' ############   ##############  #################  ';
  print '<br/>';
  print '<br/>';
    
    
/*
  var_dump($marketDetails->Result->market);
  print '<br/>';
  print '<br/>';
  print '<br/>';

  print_r(array_keys($marketDetails->Result->market));
  print '<br/>';
  print '<br/>';
  print '<br/>';
*/

/*
  print "Country: " . $marketDetails->Result->market->countryISO3; print " >> ";
  print "BaseRate: " . $marketDetails->Result->market->marketBaseRate; print " >> ";
  print "marketId: " .  $marketDetails->Result->market->marketId; print " >> ";
  print "marketStatus: " . $marketDetails->Result->market->marketStatus; print " >> ";
  print "marketSuspendTime: " . $marketDetails->Result->market->marketSuspendTime . ' ' . $marketDetails->Result->market->timezone;;
  print '<br/>';
 
*/
  
  // eventHierarchy
 
  if ( is_array($marketDetails->Result->market->eventHierarchy) && array_key_exists('EventId', $marketDetails->Result->market->eventHierarchy) ) 
  foreach ($marketDetails->Result->market->eventHierarchy->EventId as $eventHierarchyEventId)
  {
      echo CHtml::link($eventHierarchyEventId, array('betfair/events', 'eventId'=>$eventHierarchyEventId)) . ' >> '; 
  }

  
  // array of selectionId and runners
  //check if array has more than one element


  if ( is_array($marketDetails->Result->market->runners) && array_key_exists('Runner', $marketDetails->Result->market->runners ) )
  {        
      $runners = array();
      foreach($marketDetails->Result->market->runners->Runner  as $runner)
      {
          $runners[$runner->selectionId] = $runner->name;
      }          
      print_r($runners);
  }    
 
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

