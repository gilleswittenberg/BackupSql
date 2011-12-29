<?php
App::uses('ConnectionManager', 'Model');

class BackupSqlShell extends AppShell {
	
	protected $_backupDir;

	public function main() {
		$this->_backupDir = TMP . 'backups' . DS;
		$config = isset($this->args[0]) ? $this->args[0] : 'default';
		$filename = isset($this->args[1]) ? $this->args[1] : 'backup_sql_'.date('Y-m-d_H.i.s').'.sql';
		//$backupDir = isset($this->args[2]) || $this->_backupDir;

		// check if database connection isset in app/Config/database.php
		if (!array_key_exists($config, ConnectionManager::enumConnectionObjects())) {
			$this->err('Config specified does not exist in app/Config/database.php');		
			$this->_stop();
		}
		// check if backup directory exists and prompt to create
		if (!is_dir($this->_backupDir)) {
			$this->out($this->_backupDir.' does not exist.');
			$selection = $this->in('Create?', array('Y', 'N'), 'N');
			if (strtolower($selection) == 'y') {
				$this->_createBackupDir();
			}
			else{
				$this->err('Aborting');
				$this->_stop();
			}
		}
		// check if filename exists and prompt to overwrite
		if (file_exists($this->_backupDir . $filename)) {
			$this->out($this->_backupDir.' does not exist.');
			$selection = $this->in('Create?', array('Y', 'N'), 'N');
			if (strtolower($selection) == 'n') {
				$this->err('Aborting');
				$this->_stop();
			}
		}
		// backup 
		$datasource = ConnectionManager::getDataSource($config);
		$this->_backup($datasource->config, $filename);
	}

	public function getOptionParser() {
		$parser = parent::getOptionParser();
		$parser->addArgument('config', array(
			'help' => 'Config as specified in app/Config/database.php'
		))->addArgument('filename', array(
			'help' => 'Filename for the sql file'
		));
		return $parser;
	}

	protected function _createBackupDir() {
		mkdir($this->_backupDir, 0777, true);
		//@todo check to see if successful
	}

	protected function _backup($config, $filename) {
		// shell> mysqldump [options] db_name [tbl_name ...]
		$file = $this->_backupDir . DS . $filename;
		exec('mysqldump --host='.$config['host'].' --user='.$config['login'].' --password='.$config['password'].' '.$config['database'].' > '.$file);
		//@todo check to see if successful
	}
}
