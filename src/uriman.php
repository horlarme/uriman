<?php
namespace uriman;

class uriman{

	public static $uri_array = "";
	public static $uri_json = "";
	public static $address = "";
	public static $uri_string = "";
	public function start(){

		$uri = $_SERVER['QUERY_STRING'];
			$this->uri_array = $this->returnURIAs("array", $uri);
			$this->uri_json = $this->returnURIAs("json", $uri);
			$this->uri_string = $uri;
			$this->myAddress();

	}

	/**
	*	Get the full URL of the current page including the URIs
	*	return string The full URL of the page
	*/
	public function myAddress(){
		$address = $this->myProtocol() . "://" . $this->myHost() . $_SERVER['PHP_SELF'];
		if($this->uri_string != ""){
			$address .= "?" . $this->uri_string;
		}

		return $this->address = $address;
	}

	public function myHost(){
		return $_SERVER['HTTP_HOST'];
	}

	public function myUA($update = ""){
		if($update != ""){
			$newUserAgent = $update; //Saving to a string
			$updatedUserAgent = $_SERVER['HTTP_USER_AGENT'] = $newUserAgent;//updating the user agent with the new string provided
			return $updatedUserAgent;
		}
		return $_SERVER['HTTP_USER_AGENT'];
	}

	public function myProtocol(){
		return $_SERVER['REQUEST_SCHEME'];
	}

	public function myPort(){
		return $_SERVER['SERVER_PORT'];
	}

	public function returnURIAs($a,$uri){
			$uri = explode("&",$uri);
			$c = array();//Where to dump the arrays

			for ($i=0; $i < count($uri); $i++) { 
				$b = explode("=", $uri[$i]);
				$c[$b[0]] = $b[1];
			}

			if($a === "array"){
				return $c;
			}
			if($a === "json" || "JSON"){
				return json_encode($c);
			} 
	}

	public function myPage(){
		return $_SERVER['PHP_SELF'];
	}

	public function show($uri){
		$urilist = $this->uri_array;
		return $urilist[$uri];
	}


	public function edit($uri, $value){
		$uri_array = $this->uri_array;

			if(isset($uri_array[$uri])){
				$uri_to_replace = array($uri => $value);
				$new_array = array_replace($uri_array, $uri_to_replace);

				if($new_array){
					$this->uri_array = $new_array;
					$this->uri_json = json_encode($new_array);
					return true;
					}
			}
			else{
				return false;
			}

	}

}