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

$application = new \OCA\Survey_Client\AppInfo\Application();

\OCP\API::register(
	'post',
	'/apps/survey_client/api/v1/report',
	[$application->getContainer()->query('EndpointController'), 'sendReport'],
	'survey_client',
	\OCP\API::ADMIN_AUTH
);

\OCP\API::register(
	'post',
	'/apps/survey_client/api/v1/monthly',
	[$application->getContainer()->query('EndpointController'), 'enableMonthly'],
	'survey_client',
	\OCP\API::ADMIN_AUTH
);

\OCP\API::register(
	'delete',
	'/apps/survey_client/api/v1/monthly',
	[$application->getContainer()->query('EndpointController'), 'disableMonthly'],
	'survey_client',
	\OCP\API::ADMIN_AUTH
);
