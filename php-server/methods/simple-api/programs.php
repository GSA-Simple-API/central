<?php$route = '/simple-api/programs/';$app->get($route, function ()  use ($app){	if(isset($_REQUEST['query'])){ $query = $_REQUEST['query']; } else { $query = '';}	$ObjectText = file_get_contents('https://raw.github.com/simple-api/api-programs/gh-pages/programs.json');	$ObjectResult = json_decode($ObjectText,true);	$ReturnObject = array();	foreach($ObjectResult as $Object){		$IncludeRecord = 1;		$id = $Object['id'];		$name = $Object['name'];		$description = $Object['description'];		$url = $Object['url'];		$state = $Object['state'];		$phone = $Object['phone'];		$email = $Object['email'];		if($query!=''){		$IncludeRecord = 0;			if(strpos(strtolower($name),strtolower($query)) === 0 || strpos(strtolower($description),strtolower($query)) === 0 || strpos(strtolower($url),strtolower($query)) === 0 || strpos(strtolower($state),strtolower($query)) === 0 || strpos(strtolower($state),strtolower($query)) === 0 || strpos(strtolower($phone),strtolower($query)) === 0 || strpos(strtolower($email),strtolower($query)) === 0)				{				$IncludeRecord = 1;				}			}		if($IncludeRecord==1)			{			$F = array();			$F['id'] = $id;			$F['name'] = $name;			$F['description'] = $description;			$F['url'] = $url;			$F['state'] = $state;			$F['phone'] = $phone;			$F['email'] = $email;			array_push($ReturnObject, $F);			}		}		$app->response()->header("Content-Type", "application/json");		echo format_json(json_encode($ReturnObject));	});$route = '/simple-api/programs/:id';$app->get($route, function ($IncomingID)  use ($app){	$ObjectText = file_get_contents('https://raw.github.com/simple-api/api-programs/gh-pages/programs.json');	$ObjectResult = json_decode($ObjectText,true);	$ReturnObject = array();	foreach($ObjectResult as $Object){		$IncludeRecord = 0;		$id = $Object['id'];		$name = $Object['name'];		$description = $Object['description'];		$url = $Object['url'];		$state = $Object['state'];		$phone = $Object['phone'];		$email = $Object['email'];		if($IncomingID==$id)			{			$IncludeRecord=1;			}		if($IncludeRecord==1)			{			$F = array();			$F['id'] = $id;			$F['name'] = $name;			$F['description'] = $description;			$F['url'] = $url;			$F['state'] = $state;			$F['phone'] = $phone;			$F['email'] = $email;			array_push($ReturnObject, $F);			}		}		$app->response()->header("Content-Type", "application/json");		echo format_json(json_encode($ReturnObject));	});?>