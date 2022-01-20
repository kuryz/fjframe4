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

	protected $_status = 400, $_body = [], $_error = [];

	public function apiModel($model)
	{
		return $this->model($model);
	}
	public function jsonResponse($response_code,$response_message,$data)
	{
		return $this->json($response_code,$response_message,$data);
	}
}

?>