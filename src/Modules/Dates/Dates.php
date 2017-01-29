<?PHP
namespace Reyzeal\HijriDate\Modules;
use Reyzeal\HijriDate\Foundation\Connection as Connection;
class Dates extends Module{
	protected $date;
	public function execute(){
		return (new Connection)->fetch($this->module.$this->date);
	}
}