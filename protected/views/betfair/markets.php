<?php
/* @var $this BetfairController 
   $events 
*/

$this->breadcrumbs = array(
    'Betfair' => array('/betfair'),
    'Markets',
);
?>

<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>


<?php

print_r ($markets);
print '<br/>';


<<<<<<< HEAD
    $params = array(
        'request' =>     array(
                       'header' => array(
                            'clientStamp' => 0,
                            'session_token' => $session,
                           ),
            ),
    );

$params = array(
    'request' => 
        array(
            'header' => array(
                'sessionToken' => $session,
                'clientStamp' => 0,
            ),          
        ),
    );
    
    
    //$return = $client->getAllEventTypes($params);
    $return = $client->__call("getAllEventTypes", array($params));
     
    //print_r($return);
    
    foreach ($return as $eventTypeArray) {
       // print_r ($market->eventTypeItems->EventType->name) . '<br/>';
       // print_r ($eventTypeArray->eventTypeItems) . '<br/>' . '<br/>' . '<br/>';
       
       //foreach ($eventTypeArray->eventTypeItems as $eventType) {
       foreach ($eventTypeArray->eventTypeItems as $eventType) {
        //print "name: $eventType->name";
               foreach ($eventType as $event) {
               
               echo CHtml::link($event->name,array('betfair/events', 'param1'=>$event->id)); 
                 
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
=======
?>
>>>>>>> events and markets
