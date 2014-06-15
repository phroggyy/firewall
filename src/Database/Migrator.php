<?php

/**
 * Part of the Tracker package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://www.opensource.org/licenses/BSD-3-Clause
 *
 * @package    Tracker
 * @version    1.0.0
 * @author     Antonio Carlos Ribeiro @ PragmaRX
 * @license    BSD License (3-clause)
 * @copyright  (c) 2013, PragmaRX
 * @link       http://pragmarx.com
 */

namespace PragmaRX\Firewall\Database;

use PragmaRX\Support\Migrator as BaseMigrator;

class Migrator extends BaseMigrator {

	protected $tables = array(
		'firewall',
	);

	protected function migrateUp()
	{
		$this->schemaBuilder->create(
			'firewall',
			function ($table)
			{
				$table->increments('id');

				$table->string('ip_address', 39)->unique()->index();

				$table->boolean('whitelisted')->default(false); /// default is blacklist

				$table->timestamps();
			}
		);
	}

	protected function migrateDown()
	{
		$this->dropAllTables();
	}
}