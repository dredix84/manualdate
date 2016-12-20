<?php

namespace App\Shell;

use Cake\Console\Shell;

/**
 * Calcs shell command.
 */
class CalcsShell extends Shell {

    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser() {
        $parser = parent::getOptionParser();

        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int Success or error code.
     */
    public function main($start, $end) {
        $this->loadModel('Calculations');
        $result = $this->Calculations->dateDiff($start, $end);
        
        
        $this->out("Start date: $start");
        $this->out("End date: $end");
        $this->out("Result: $result");
        //$this->out($this->OptionParser->help());
    }

}
