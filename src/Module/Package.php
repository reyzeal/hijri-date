<?PHP 
	function addRecursive($directory){
		foreach($directory as $file){
			if($file->isFile()&&!($file->getFilename()=='hijritime.php'||$file->getFilename()=='error_log'||$file->getFilename()=='Package.php')){
				include (dirname($file->getPathname().'/'.$file->getFilename()));
				echo $file->getFilename().'<br>';
				}
		}
		foreach($directory as $folder){
			if($folder->isDir()&&!$folder->isDot()){
				addRecursive(new DirectoryIterator(dirname($folder->getPathname().'/'.$folder->getBasename())));
			}
		}
	}
	addRecursive(new DirectoryIterator(dirname(__DIR__).'/Foundation'));
	addRecursive(new DirectoryIterator(__DIR__));
?>