<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 *
 * @copyright Copyright (c) 2016, ownCloud, Inc.
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OCA\Survey_Client\Controller;

use OCA\Survey_Client\Collector;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http;
use OCP\BackgroundJob\IJobList;
use OCP\IRequest;
use OCP\Notification\IManager;

class EndpointController extends Controller {

	/** @var Collector */
	protected $collector;

	/** @var IJobList */
	protected $jobList;

	/** @var IManager */
	protected $manager;

	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param Collector $collector
	 * @param IJobList $jobList
	 * @param IManager $manager
	 */
	public function __construct($appName, IRequest $request, Collector $collector, IJobList $jobList, IManager $manager) {
		parent::__construct($appName, $request);

		$this->collector = $collector;
		$this->jobList = $jobList;
		$this->manager = $manager;
	}

	/**
	 * @return \OC_OCS_Result
	 */
	public function enableMonthly() {
		$this->jobList->add('OCA\Survey_Client\BackgroundJobs\MonthlyReport');

		$notification = $this->manager->createNotification();
		$notification->setApp('survey_client');
		$this->manager->markProcessed($notification);

		return new \OC_OCS_Result();
	}

	/**
	 * @return \OC_OCS_Result
	 */
	public function disableMonthly() {
		$this->jobList->remove('OCA\Survey_Client\BackgroundJobs\MonthlyReport');

		$notification = $this->manager->createNotification();
		$notification->setApp('survey_client');
		$this->manager->markProcessed($notification);

		return new \OC_OCS_Result();
	}

	/**
	 * @return \OC_OCS_Result
	 */
	public function sendReport() {
		return $this->collector->sendReport();
	}
}
