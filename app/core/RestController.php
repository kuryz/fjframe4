<?php  
ini_set('display_errors', 0);
class RestController extends Controller
{
	 /**
     * The request has succeeded / barred
     */
    const HTTP_OK = 200;
    const HTTP_BAD = 400;

    const HTTP_UNAUTHORIZED = 401;
    const HTTP_FORBIDDEN = 403;
    const HTTP_NOT_FOUND = 404;

	public $_status = 400, $_body = [], $_error = [];

	public function rest_model($model)
	{
		return $this->model($model);
	}
	public function json_result($data = [])
	{
		echo json_encode($data);
	}
	public function json_response($response_code,$response_message,$data)
	{
	 	$final_result = array();
	  	$response = array();
		$response['response_code']    = $response_code;
		$response['response_message'] = $response_message;

	  	if(!empty($data)) $data = $data;
		else $data = $data;
	 	
		$final_result['response'] = $response;
		$final_result['data'] = $data;

		return $this->json_result($final_result);
	}
}

?>