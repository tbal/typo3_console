<?php
namespace Helhum\Typo3Console\Command;

/*
 * This file is part of the typo3 console project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read
 * http://www.gnu.org/licenses/gpl-2.0.html
 *
 */

use Helhum\Typo3Console\Mvc\Controller\CommandController;

/**
 * Class SchedulerCommandController
 */
class BackendCommandController extends CommandController
{
    /**
     * Locks backend access for all users by writing a lock file that is checked when the backend is accessed.
     *
     * @param string $redirectUrl URL to redirect to when the backend is accessed
     */
    public function lockCommand($redirectUrl = null)
    {
        if (@is_file((PATH_typo3conf . 'LOCK_BACKEND'))) {
            $this->outputLine('A lockfile already exists. Overwriting it...');
        }

        \TYPO3\CMS\Core\Utility\GeneralUtility::writeFile(PATH_typo3conf . 'LOCK_BACKEND', (string)$redirectUrl);

        if ($redirectUrl === null) {
            $this->outputLine('Wrote lock file to \'typo3conf/LOCK_BACKEND\'');
        } else {
            $this->outputLine('Wrote lock file to \'typo3conf/LOCK_BACKEND\' with instruction to redirect to: \'' . $redirectUrl . '\'');
        }
    }

    /**
     * Unlocks the backend access by deleting the lock file
     */
    public function unlockCommand()
    {
        if (@is_file((PATH_typo3conf . 'LOCK_BACKEND'))) {
            unlink(PATH_typo3conf . 'LOCK_BACKEND');
            if (@is_file((PATH_typo3conf . 'LOCK_BACKEND'))) {
                $this->outputLine('ERROR: Could not remove lock file \'typo3conf/LOCK_BACKEND\'!');
                $this->sendAndExit(1);
            } else {
                $this->outputLine('Removed lock file \'typo3conf/LOCK_BACKEND\'');
            }
        } else {
            $this->outputLine('No lock file \'typo3conf/LOCK_BACKEND\' was found, hence no lock could be removed.');
            $this->sendAndExit(2);
        }
    }
}
