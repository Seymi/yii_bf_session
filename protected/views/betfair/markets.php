<?php
/* @var $this BetfairController */

$this->breadcrumbs = array(
    'Betfair' => array('/betfair'),
    'Markets',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
    You may change the content of this page by modifying
    the file <tt><?php echo __FILE__; ?></tt>.
</p>


<p><?php echo "your session: $session"; ?></p>

<?php
$ap_param = array(
    'request' =>
    array(
        'session_token' => $session,
        'clientStamp' => 0,
    ),
);


try {
    $wsdl_url = 'https://api.betfair.com/global/v3/BFGlobalService.wsdl';
    $client = new SoapClient($wsdl_url);

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
    
    foreach ($return as $market) {
       // print_r ($market->eventTypeItems->EventType->name) . '<br/>';
        print_r ($market->eventTypeItems) . '<br/>' . '<br/>' . '<br/>';
       //        // print_r ($market->eventTypeItems->EventType->id) . '<br/>';
        
        
    }        
    
} catch (Exception $e) {
    echo "Exception occured: " . $e;
}

?>
