<?php
/* @var $this BetfairController */

$this->breadcrumbs = array(
    'Betfair' => array('/betfair/eventTypes'),
    'Sportarten',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php

try {
    $wsdl_url = 'https://api.betfair.com/global/v3/BFGlobalService.wsdl';
    $client = new SoapClient($wsdl_url);


    $params = array( 'request' => array( 'header' => array( 'sessionToken' => $session,
                                                            'clientStamp' => 0,
                                                          ),          
                                       ),
                   );
    
    
 //$return = $client->getAllEventTypes($params);
    //$return = $client->__call("getAllEventTypes", array($params));
    $return = $client->__call("getActiveEventTypes", array($params));


    //print_r($return);

     foreach ($return as $eventTypeArray) {
       // print_r ($market->eventTypeItems->EventType->name) . '<br/>';
       // print_r ($eventTypeArray->eventTypeItems) . '<br/>' . '<br/>' . '<br/>';
       //foreach ($eventTypeArray->eventTypeItems as $eventType) {
       foreach ($eventTypeArray->eventTypeItems as $eventType) {
        //print "name: $eventType->name";
               foreach ($eventType as $event) {
                 echo CHtml::link($event->name,array('betfair/events', 'eventId'=>$event->id)); 
                    // print "id: $event->id";
                       print '<br/>';                       
                      // print "id: $event->name";
                      // print '<br/>' . '<br/>' . '<br/>';                       
               }
       }
     }        

} catch (Exception $e) {

    echo "Exception occured: " . $e;

}

?>

<p><?php echo "your session: $session"; ?></p>
