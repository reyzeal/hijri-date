<?PHP
namespace Reyzeal\HijriTimeBot\Foundation;
class Connection {
	private $base_url='http://api.aladhan.com/';
	
	protected function getArray($json, $mode=false){
		return json_decode($json,$mode);
	}
	
	public function fetch($module,$mode=false){
		$feedback=file_get_contents($this->base_url.'/'.$module);
		return !$mode?$this->getArray($feedback,$mode)->data:$this->getArray($feedback,$mode)['data'];
	}
}
?>