<?php

class Betfair extends CFormModel
{
    public $username;
    public $password;
    
    public $session;
    public $errorCode;
    public $logged_in = false;
    
    
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password', 'required'),
			// password needs to be authenticated
			//array('password', 'authenticate'),
		);
	}
    
    
    public function login()
    {
        $client=new SoapClient('https://api.betfair.com/global/v3/BFGlobalService.wsdl');

        $ap_param = array(
        'request' => 
            array(
                'username' => $this->username,
                'password' => $this->password,
                'productId' => '82',    
                'ipAddress' => '',
                'locationId' => '',
                'vendorSoftwareId' => '',
            ),
        );  

        try {
            $response = $client->__call("login", array($ap_param));
        } catch (Exception $e) {
            echo 'Exception abgefangen: ',  $e->getMessage(), "\n";
            $this->addError('password','Login fehlgeschlagen - ' . $e->getMessage());
            $this->session = null;
            $this->logged_in = false;
            return false;
        }

        $this->session = $response->Result->header->sessionToken;
        $this->errorCode = $response->Result->errorCode;
    
        $this->logged_in = true;
        Yii::app()->request->cookies['session'] = new CHttpCookie('session', $this->session);    
        if ($this->errorCode != "OK")
        {
          $this->addError('password','Fehler - ' . $this->errorCode);
        }

        return $this->session;
     }
     
     public function events($session, $eventId)
     {
         try {
         $wsdl_url = 'https://api.betfair.com/global/v3/BFGlobalService.wsdl';
         $client = new SoapClient($wsdl_url);

         $params = array( 'request' => array( 'header' => array( 'sessionToken' => $session,
                                                                 'clientStamp' => 0,
                                                               ),
                                              'eventParentId'=> $eventId,
                                            ),
                        );

         $return = $client->__call("getEvents", array($params));
         } catch (Exception $e) {
              echo "Exception occured: " . $e;
         }
         return $return;
     }  
     
     public function marketViewer($session, $marketId)
     {
         try {
         $wsdl_url = 'https://api.betfair.com/global/v3/BFGlobalService.wsdl';
         $client = new SoapClient($wsdl_url);

         $params = array( 'request' => array( 'header' => array( 'sessionToken' => $session,
                                                                 'clientStamp' => 0,
                                                               ),
                                              'marketId'=> $marketId,
                                            ),
                        );

         $return = $client->__call("getMarket", array($params));
         } catch (Exception $e) {
              echo "Exception occured: " . $e;
              return null;
         }
         return $return;
     }  
     

}
