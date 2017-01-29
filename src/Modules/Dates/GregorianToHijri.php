<?PHP
namespace Reyzeal\HijriDate\Modules;

class GregorianToHijri extends Dates{
	protected $module='gToH?date=';
	public function __construct($str){
		$this->date=$str;
	}
}
?>