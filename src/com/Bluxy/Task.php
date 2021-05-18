<?php

namespace com\Bluxy;

use pocketmine\scheduler\Task as MsgTask;
use com\Bluxy\main;
use pocketmine\schedule\Task;

class Task extends MsgTask {
        public function __construct(Main $plugin) {
              
          $this->plugin = $plugin;
          
        }

        public function onTick() : void {
                
                $this->plugin->MsgTask();
          
        }
}
