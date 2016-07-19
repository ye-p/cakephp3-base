<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Log\Log;

/**
 * Custom shell command.
 */
class CustomShell extends Shell
{

    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int Success or error code.
     */
    public function main($args)
    {
    }

    public function execute($cmd)
    {
        $cmd = escapeshellarg($cmd);
        exec($cmd,$output,$return_var);
        if($return_var != 0){
            //error
            array_unshift($output, $return_var);
            $this->log($output, 'error');
        }
    }
}
