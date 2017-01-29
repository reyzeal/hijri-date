<?PHP
namespace Reyzeal\HijriTimeBot\Modules;

class HijriToGregorian extends Dates{
	protected $module='hToG?date=';
	public function __construct($str){
		$this->date=$str;
	}
}
?>