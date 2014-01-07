<?php
/* @var $this BetfairController 
   $events 
*/

$this->breadcrumbs = array(
    'Betfair Sportarten' => array('/betfair/eventTypes'),
    'Events',
);
?>

<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>



<?php

/*
    print_r ($events->Result->header);
    print '<br/>';

    print_r ($events->Result->errorCode);
    print '<br/>';    
    
    //print_r ($events->Result->eventItems);
    print '<br/>';
    print '<br/>';
    print '<br/>';
 */
    
    print '<table>';
    
    
    
    if (array_key_exists('MarketSummary', $events->Result->marketItems )) {
       // render('market',array('session'=>$session,'events'=>$events,));
    echo "hier in MarketSummary";
    }

    
    
     //<eventItems xsi:type="n2:ArrayOfBFEvent">
    
/*
               <marketItems xsi:type="n2:ArrayOfMarketSummary">
               <n2:MarketSummary xsi:type="n2:MarketSummary">
                  <eventTypeId xsi:type="xsd:int">1</eventTypeId>
                  <marketId xsi:type="xsd:int">112340417</marketId>
                  <marketName xsi:type="xsd:string">Asiatisches Handicap</marketName>
                  <marketType xsi:type="n2:MarketTypeEnum">A</marketType>
                  <marketTypeVariant xsi:type="n2:MarketTypeVariantEnum">ADL</marketTypeVariant>
                  <menuLevel xsi:type="xsd:int">6</menuLevel>
                  <orderIndex xsi:type="xsd:int">807600</orderIndex>
                  <startTime xsi:type="xsd:dateTime">0001-01-01T00:00:00.000Z</startTime>
                  <timezone xsi:type="xsd:string">GMT</timezone>
                  <venue xsi:nil="1"/>
                  <betDelay xsi:type="xsd:int">0</betDelay>
                  <numberOfWinners xsi:type="xsd:int">0</numberOfWinners>
                  <eventParentId xsi:type="xsd:int">27123026</eventParentId>
                  <exchangeId xsi:type="xsd:int">1</exchangeId>
               </n2:MarketSummary>
*/    

    

    //check if array has more than one element
    if (array_key_exists('BFEvent', $events->Result->eventItems ))
    {        
            
    if ( count($events->Result->eventItems->BFEvent) >1)
    {
        
             $sorted_events = array();
             foreach($events->Result->eventItems->BFEvent  as $record)
             {
                 $sorted_events[$record->orderIndex] = $record;
             }

             ksort($sorted_events);

             $records = array();

             foreach($sorted_events as $record)
             {
                 $records []= $record;
             }

             $sorted_events = $records;
    }        
    else
    {
        $sorted_events = array($events->Result->eventItems->BFEvent);
    }
             
    if ( count($sorted_events) ==0  )        
    {
        print "Es gibt derzeit keine Wetten auf diesem Markt!";
    }        

    else
    {
    //foreach ($events->Result->eventItems->BFEvent as $event)
    foreach ($sorted_events as $event)
        
    {
        print '<tr>';
        print '<td>';
        echo CHtml::link($event->eventName,array('betfair/events', 'eventId'=>$event->eventId)); 
        print '</td>';
        
        print '<td>';
        echo 'index ';
        echo $event->orderIndex; 
        print '</td>';
        
        print '<td>';
        echo 'level ';
        echo $event->menuLevel; 
        print '</td>';
        
       // print_r($event);
        
        print '<tr>';
        //print '<br/>';
    }
    
    }  
    
  }
    print '</table>';
    print '<br/>';
?>

<p><?php echo "your session: $session"; ?></p>
