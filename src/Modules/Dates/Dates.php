<?PHP
namespace Reyzeal\HijriTimeBot\Modules;
use Reyzeal\HijriTimeBot\Foundation\Connection as Connection;
class Dates extends Module{
	protected $date;
	public function execute(){
		return (new Connection)->fetch($this->module.$this->date);
	}
}