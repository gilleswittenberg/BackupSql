<?php
/**
 * All BackupSql plugin tests
 */
class AllBackupSqlTest extends CakeTestCase {

/**
 * Suite define the tests for this plugin
 *
 * @return void
 */
	public static function suite() {
		$suite = new CakeTestSuite('All BackupSql test');

		$path = CakePlugin::path('BackupSql') . 'Test' . DS . 'Case' . DS;
		$suite->addTestDirectoryRecursive($path);

		return $suite;
	}

}
