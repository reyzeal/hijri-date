<?PHP
namespace Reyzeal\HijriTimeBot;
use Reyzeal\HijriTimeBot\Modules\GregorianToHijri as GtoH;
use Reyzeal\HijriTimeBot\Modules\HijriToGregorian as HtoG;
use Reyzeal\HijriTimeBot\Modules\Times;
class HijriTime{
	/*
	 * default timezone;
	 */
	protected $timezone='Asia/Jakarta';
	/*
	 * Month Hijri
	 */
	protected $HijriMonth=[
		'Muharram',
		'Safar',
		'Rabi`ul Awwal',
		'Rabi`ul Akhir',
		'Jumadil Awwal',
		'Jumadil Akhir',
		'Rajab',
		'Sya`ban',
		'Ramadhan',
		'Dzul Qa`dah',
		'Dzul Hijjah'
	];
	/*
	 * @string - argumen tanggal DD-MM-YYYY
	 * return string tanggal DD-MM-YYYY
	 */
	public function GregorianToHijri($string){
		$GtoH=new GtoH($string);
		$GtoH=$GtoH->execute();
		return $GtoH->hijri->day.'-'.$this->HijriMonth[$GtoH->hijri->month->number].'-'.$GtoH->hijri->year;
	}
	/*
	 * @string - argumen tanggal DD-MM-YYYY
	 * return string tanggal DD-MM-YYYY
	 */
	public function HijriToGregorian($string){
		$HtoG=new HtoG($string);
		$HtoG=$HtoG->execute();
		return $HtoG->gregorian->date;
	}
	public function nowHijri(){
		date_default_timezone_set($this->timezone);
		$time=strtotime((new Times)->getDaytimeValue('Maghrib'))<strtotime('now')?strtotime('now +1 day'):strtotime('now');
		return date('H:i l, ',strtotime('now')). PHP_EOL .$this->GregorianToHijri(date('d-m-Y',$time)). PHP_EOL .date('eP',strtotime('now'));
	}
	public function nowGregorian(){
		date_default_timezone_set($this->timezone);
		return date('l, d F Y. H:i eP',strtotime('now'));
	}
	
}