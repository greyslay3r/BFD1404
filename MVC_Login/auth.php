<?php


// require_once "db.php";
require_once "AuthModel.php";
require_once "AuthView.php";

$model = new AuthModel();
$view = new AuthView();

$username = empty($_POST['username']) ? '' : strtolower(trim($_POST['username']));
$password = empty($_POST['password']) ? '' : trim($_POST['password']);

$contentPage = 'form';
$user = NULL;

session_start();

if (!empty($username) && !empty($password)) {  // if both exist.. then make the model call
	$user = $model->getUserByNamePass($username, $password);
	if (is_array($user)) {

		$contentPage = 'success';  //if user is valid, then show success page
		
		$_SESSION['userInfo'] = $user;
	}

}

$view->show('header');


$view->show($contentPage, $user);
$view->show('footer');

?>
