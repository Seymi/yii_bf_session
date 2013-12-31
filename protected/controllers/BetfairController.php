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
                                $this->redirect(array('markets','session'=>$model->session));
				//$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	public function actionLogout()
	{
		$this->render('logout');
	}

	public function actionMarkets()
	{
                // session cookie is set by betfair->login
                $session = Yii::app()->request->cookies['session']->value;
		$this->render('markets',array('session'=>$session,));
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