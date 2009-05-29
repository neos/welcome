<?php
declare(ENCODING = 'utf-8');
namespace F3\Welcome\Controller;

/*                                                                        *
 * This script belongs to the FLOW3 package "Welcome".                    *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License as published by the *
 * Free Software Foundation, either version 3 of the License, or (at your *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
 * General Public License for more details.                               *
 *                                                                        *
 * You should have received a copy of the GNU Lesser General Public       *
 * License along with the script.                                         *
 * If not, see http://www.gnu.org/licenses/lgpl.html                      *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * @package Welcome
 * @subpackage Controller
 * @version $Id: StandardController.php 2279 2009-05-19 21:16:46Z k-fish $
 */

/**
 * Controller with a welcome start screen for FLOW3
 *
 * @package Welcome
 * @subpackage Controller
 * @version $Id: StandardController.php 2279 2009-05-19 21:16:46Z k-fish $
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 */
use F3\FLOW3\MVC\Controller;

class StandardController extends \F3\FLOW3\MVC\Controller\ActionController {

	/**
	 * @var \F3\FLOW3\Package\ManagerInterface
	 * @inject
	 */
	protected $packageManager;

	/**
	 * Index action
	 *
	 * @return void
	 * @author Christopher Hlubek <hlubek@networkteam.com>
	 */
	public function indexAction() {
		$this->view->assign('baseURI', $this->request->getBaseURI());
		$this->view->assign('flow3CommandLinePath', realpath(FLOW3_PATH_PUBLIC . '../'));

		$flow3Package = $this->packageManager->getPackage('FLOW3');
		$version = $flow3Package->getPackageMetaData()->getVersion();
		$this->view->assign('version', $version);

		$activePackages = $this->packageManager->getActivePackages();
		$this->view->assign('activePackages', $activePackages);
	}

	/**
	 * @return void
	 * @autho Robert Lemke <robert@typo3.org>
	 */
	public function redirectAction() {
		$this->redirect('index');
	}
}
?>