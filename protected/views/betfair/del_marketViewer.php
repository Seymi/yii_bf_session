

<script type="text/javascript">
    
    auto_refresh = true;
    //auto_refresh = false;
    
    refresh_time = 2000; // ms
    
    
    if (auto_refresh) window.onload = setupRefresh;
    
    function setupRefresh() {
      //setTimeout("refreshPage();", refreh_time); // milliseconds
      setTimeout("refreshPage();", 2000); // milliseconds

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


  <div id="odds">
  <table cellpadding="1" cellspacing="1" border="2">

  <?php
  
  //check if array has at least one element
  if (array_key_exists('RunnerPrices', $marketOdds->Result->marketPrices->runnerPrices ))
  {
      
    foreach ($marketOdds->Result->marketPrices->runnerPrices->RunnerPrices as $runnerPrice)
    {

     /*
      print_r ($runnerPrice);       print '<br/>';
     */ 

      print '<tr>';
      //print '<td rowspan="2" >';
      //print '<td rowspan="1" >';
      print '<td>';
      print 'selectionId: ' . $runnerPrice->selectionId;      //print '<br/>';
      //print 'asianLineId: ' . $runnerPrice->asianLineId;       print ' >> ';
      //print 'handicap: ' .  $runnerPrice->handicap;     print ' >> ';
      //print 'reductionFactor: ' . $runnerPrice->reductionFactor;        print ' >> ';
      //print 'sortOrder: ' . $runnerPrice->sortOrder;      print ' >> ';
      //print 'lastPrice: ' . $runnerPrice->lastPriceMatched;      print ' >> ';
      //print 'totalAmount: ' . $runnerPrice->totalAmountMatched;      print '<br/>';
      //print '_________________'; 
      print '</td>';

      print '<td class="odd_back">';
      //print_r ($runnerPrice->bestPricesToBack);

    // Vorlage von eventHierarchy
    //foreach ($marketDetails->Result->market->eventHierarchy->EventId as $eventHierarchyEventId)
    //{
    //    echo CHtml::link($eventHierarchyEventId, array('betfair/events', 'eventId'=>$eventHierarchyEventId)) . ' >> '; 
    //}

      //foreach ($runnerPrice->bestPricesToBack->Price->price as $price)
 
    //check if array has more than one element
    if (array_key_exists('bestPricesToBack', $runnerPrice ))
    {        
      
      foreach ($runnerPrice->bestPricesToBack as $price)
      {

            $sorted_prices = array();
            foreach($price as $p)
            {
                $sorted_prices[$p->depth] = $p;
            }

            krsort($sorted_prices);

            $records = array();
            foreach($sorted_prices as $record)
            {
                $records []= $record;
            }

            $sorted_prices = $records;
          
            
          print '<table>';
          print '<tr>';
          
          //foreach ($price as $p)
          foreach ($sorted_prices as $p)  
          {
             print '<td>';
             print $p->price;
             print '<br/>';
             print $p->amountAvailable;
             print '</td>';
          }    

          print '</tr>';
          print '</table>';
          
          //print_r( $price);
          //print $price->amountAvailable;
      }
      
    }

      print '</td>';

      print '<td class="odd_lay">';    
      //print_r ($runnerPrice->bestPricesToLay);
      foreach ($runnerPrice->bestPricesToLay as $price)
      {
          print '<table>';
          print '<tr>';
          
          foreach ($price as $p)
          {
             print '<td>';
             print $p->price;
             print '<br/>';
             print $p->amountAvailable;
             print '</td>';
             
          } 
          print '</tr>';
          print '</table>';
          
          
          //print_r( $price);
          //print $price->amountAvailable;
      }    

      print '</td>';
      
      
      print '<td>';
          print '<table>';
          print '<tr>';
                print 'lastPrice: ' . $runnerPrice->lastPriceMatched;      print '<br/>';
                print 'totalAmount: ' . $runnerPrice->totalAmountMatched;      
          print '</tr>';
          print '</table>';
      print '</td>';


      print '</tr>';
    }    
  
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

