<?php

/**
 *
 */
class backend_system_restore_helper {

	private $file_list;

	function __construct() {
		# code...
	}

	function get_backup_list() {
		if (self::list_backup_files()) {
			self::create_choice_view();
		}
	}

	function list_backup_files() {
		try {
			$dir = "files/db/";
			$file = ScanHelper::scan($dir);
			$backup_array = array();
			$filesizeHelper = new backend_count_file_size();
			foreach ($file as $key => $filename) {
				$value = $filename;
				if (strpos($value, "sql") !== false) {
					$value = str_replace(".sql", "", $value);
					$pos = strpos($value, ".");
					if ($pos !== false) {
						$value = substr($value, $pos + 1);
					}
					if (strlen($value) == 14) {
						$backup = array();
						$time = mktime(substr($value, 8, 2), substr($value, 10, 2), substr($value, 12, 2), substr($value, 4, 2), substr($value, 6, 2), substr($value, 0, 4));
						$backup['size'] = $filesizeHelper->getFileSize($dir . $filename);
						$backup['name'] = $filename;
						$backup_array[$time] = $backup;
					}
				}
			}
			krsort($backup_array);
			$this->file_list = $backup_array;
			self::delete_unused_files();
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	function delete_unused_files() {
		if (count($this->file_list) > 10) {
			$index = 0;
			$dir = "files/db/";
			foreach ($this->file_list as $key => $value) {
				$index++;
				if ($index > 10) {
					if (@unlink($dir . $value['name'])) {
						unset($this->file_list[$key]);
					}
				}
			}
		}
	}

	function create_choice_view() {
		$index = 1;
		foreach ($this->file_list as $key => $value) {
			echo '
<tr class="odd" role="row">
	<td class="sorting_1">' . $index . '</td>
	<td>' . date("Y/m/d H:i:s", $key) . '</td>
	<td>' . $value['size'][1] . '</td>
	<td>
		<a href="' . Yii::app()->assets->getUrlPath("backend/restoredb/code/" . md5($value['name'])) . '" target="_blank" class="btn btn-xs default btn-editable"> <i class="fa fa-database"></i>
		   从这个备份恢复
		</a>
	</td>
</tr>
';
			$index++;
		}

	}
}

?>