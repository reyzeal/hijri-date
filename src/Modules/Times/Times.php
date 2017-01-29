<?PHP
namespace Reyzeal\HijriTimeBot\Modules;
use Reyzeal\HijriTimeBot\Foundation\Connection as Connection;
class Times extends Module{
	protected $method='4';
	protected $country='ID';
	protected $city='Yogyakarta';
	protected $module=[
		'current_timestamp'=>'currentTimestamp?zone=',
		'timings'=>'timings/##TIMESTAMP##?latitude=##LATITUDE##&longitude=##LONGITUDE##&timezonestring=##TIMEZONE##&method=##METHOD##',
		'timings_bycity'=>'timingsByCity?city=##CITY##&country=##COUNTRY##&method=##METHOD##',
		];
	protected $timezone='Asia/Jakarta';
	
	public function currentTimestamp(){
		return (new Connection)->fetch($this->module['current_timestamp'].$this->timezone);
	}
	
	public function getDaytime(){
		$module=$this->module['timings_bycity'];
		$module=str_replace('##CITY##',$this->city,$module);
		$module=str_replace('##COUNTRY##',$this->country,$module);
		$module=str_replace('##METHOD##',$this->method,$module);
		$string='';
		foreach((new Connection)->fetch($module)->timings as $category => $time){
			$string.=$category .' = '. $time . PHP_EOL;
		}
		return $string;
	}
	public function getDaytimeArray(){
		$module=$this->module['timings_bycity'];
		$module=str_replace('##CITY##',$this->city,$module);
		$module=str_replace('##COUNTRY##',$this->country,$module);
		$module=str_replace('##METHOD##',$this->method,$module);
		return (new Connection)->fetch($module)->timings;
	}
	public function getDaytimeValue($category){
		$module=$this->module['timings_bycity'];
		$module=str_replace('##CITY##',$this->city,$module);
		$module=str_replace('##COUNTRY##',$this->country,$module);
		$module=str_replace('##METHOD##',$this->method,$module);
		$module=(new Connection)->fetch($module,true)['timings'];
		return $module[$category];
	}
}
?>