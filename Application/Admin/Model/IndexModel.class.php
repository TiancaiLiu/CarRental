<?php
namespace Admin\Model;
use Think\Model;
class IndexModel {
	public function del_dir($dir) {
		$dh = opendir($dir);
		while ($file = readdir($dh)) {
			if($file != "." && $file != "..") {
				$fullpath = $dir . '/' . $file;
				if(!is_dir($fullpath)) {
					@unlink($fullpath);
				}else {
					del_dir($fullpath);
				}
			}
		}
		closedir($dh);
		if(rmdir($dir)) {
			return ture;
		}else {
			return false;
		}
	}
}