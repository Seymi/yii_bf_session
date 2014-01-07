<?php
/* @var $this BetfairController 
   $markets 
*/

$this->breadcrumbs = array(
    'Betfair' => array('/betfair'),
    'Markets',
);
?>

<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>


<?php

  

  //print_r ($markets);
  //print '<br/>';
  
/*
    print_r ($markets->Result->header);
    print '<br/>';
    print 'XXXXXXXXXXXXX    XXXXXXXXXXXXXXXXXX   XXXXXXXXXXXXX';
    print '<br/>';
    
    


    print_r ($markets->Result->errorCode);
    print '<br/>';    
    print '<br/>';
    print '<br/>';
    print ' ############   ##############  #################  ';
    print '<br/>';

  

    print_r ($markets->Result->marketItems);
    print '<br/>';
    print '<br/>';
    print '<br/>';
    print 'OOOOO OOOOOOOOOOO OOOOOOOOOOOO OOOOOOOOOOOO';
    print '<br/>';
  
  */
  
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
    if (array_key_exists('MarketSummary', $markets->Result->marketItems ))
    {        

    if ( count($markets->Result->marketItems->MarketSummary ) >1)
    {
        
             $sorted_markets = array();
             foreach($markets->Result->marketItems->MarketSummary as $record)
             {
                 $sorted_markets[$record->marketName] = $record;
             }

             ksort($sorted_markets);

             $records = array();

             foreach($sorted_markets as $record)
             {
                 $records []= $record;
             }

             $sorted_markets = $records;
    }        
    else
    {
        $sorted_markets = array($markets->Result->marketItems->MarketSummary);
    }



  //foreach ($markets->Result->marketItems->MarketSummary as $market)
  foreach ($sorted_markets as $market)    
  {
    //print_r ($market);
    echo CHtml::link($market->marketName,array('betfair/marketViewer', 'marketId'=>$market->marketId)); 
    print '<br/>';
  }
  
  } else
  {
     print "Es gibt derzeit keine Wetten auf diesem Markt!";
  }    
 

?>

