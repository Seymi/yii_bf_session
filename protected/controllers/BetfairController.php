<?php

class BetfairController extends Controller
{
  public function actionLogin()
  {
    $model = new betfair;
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='betfair-login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['Betfair']))
		{
			$model->attributes=$_POST['Betfair'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
                                $this->redirect(array('eventTypes','session'=>$model->session));
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

  public function actionLogout()
	{
		$this->render('logout');
	}

  public function actionEvents($eventId)
  {
    // session cookie is set by betfair->login
    $session = Yii::app()->request->cookies['session']->value;
    $model = new Betfair;
    $events = $model->events($session, $eventId);
    
    if (array_key_exists('MarketSummary', $events->Result->marketItems )) 
    {
      $this->redirect(array('markets', 'eventId'=>$eventId));
    } else
    {
      $this->render('events',array('session'=>$session,'events'=>$events,));
    }
  }

        
  public function actionEventTypes()
  {
    // session cookie is set by betfair->login
    $session = Yii::app()->request->cookies['session']->value;
    $this->render('eventTypes',array('session'=>$session,));
  }
        
  public function actionMarkets($eventId)
  {
    // session cookie is set by betfair->login
    $session = Yii::app()->request->cookies['session']->value;
    $model = new Betfair;
    $markets = $model->events($session, $eventId);
    //$dataProvider=new CArrayDataProvider($markets);
    
    //$this->render('markets',array('markets'=>$markets, 'dataProvider'=>$dataProvider));
    $this->render('markets',array('markets'=>$markets));
  }


  public function actionMarketViewer($marketId)
  {
    // session cookie is set by betfair->login
    $session = Yii::app()->request->cookies['session']->value;
    $model = new Betfair;
    $marketDetails = $model->marketViewer($session, $marketId);
    $marketOdds = $model->marketOdds($session, $marketId);
    
    //$dataProvider=new CArrayDataProvider($markets);
    
    //$this->render('markets',array('markets'=>$markets, 'dataProvider'=>$dataProvider));
    $this->render('marketViewer',array('marketDetails'=>$marketDetails, 'marketOdds'=>$marketOdds));
  }


        
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
        
        
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}