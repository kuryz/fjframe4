<?php 
/**
 * 
 */
class File
{
	private $_extensions = ["image/jpg","image/png","image/jpeg","image/gif","application/pdf","application/msword","application/json"];
	private $_pictures = ["image/jpg","image/png","image/jpeg"];
	private $_document = ["application/pdf","application/msword","application/ppt"];

	public function fileName($file)
	{
		if (isset($file)) {
			return $file['name'];
		}
		return 'no file uploaded';
	}
	public function getSize($file)
	{
		if (isset($file)) {
			return $file['size'];
		}
	}
	public function tmpName($file)
	{
		if (isset($file)) {
			return $file['tmp_name'];
		}
	}
	public function fileExt($file)
	{
		if(in_array($file['type'], $this->_extensions)){
			return $file['type'];
		}
		return 'invalid';
	}
	public function picExt($file)
	{
		if(in_array($file['type'], $this->_pictures)){
			return true;
		}
		return false;
	}
	public function docExt($file)
	{
		if(in_array($file['type'], $this->_document)){
			return true;
		}
		return false;
	}
	public function move_to($file, $path)
	{
		if(!file_exists($path)) mkdir($path, 0777, true);
		$file_tmp = $this->tmpName($file);
		$file = $this->fileName($file);
		$unique=random_strings(21);
		$target = $unique.$file;
		//echo "$target";
		move_uploaded_file($file_tmp, $path.$target);
		return $path.$target;
	}
	public function delete($file)
	{
		unlink(str_replace(SITE_URL, '', $file));
	}
}