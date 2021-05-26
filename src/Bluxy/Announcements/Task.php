<?php

/*
* " Hey? What Are You Doing Here ? Unless You Know What You are Doing ,  You Should Probaply Close This File And Stay Safe ! "
*
*
*     
*╭━━╮╭╮
*┃╭╮┃┃┃
*┃╰╯╰┫┃╭╮╭┳╮╭┳╮╱╭╮
*┃╭━╮┃┃┃┃┃┣╋╋┫┃╱┃┃
*┃╰━╯┃╰┫╰╯┣╋╋┫╰━╯┃
*╰━━━┻━┻━━┻╯╰┻━╮╭╯
*╱╱╱╱╱╱╱╱╱╱╱╱╭━╯┃
*╱╱╱╱╱╱╱╱╱╱╱╱╰━━╯
*
*                Copyright (C) <2021>  <Bluxy>
*
*    This program is free software: you can redistribute it and/or modify
*    it under the terms of the GNU General Public License as published by
*    the Free Software Foundation, either version 3 of the License, or
*    any later version.
*
*    This program is distributed in the hope that it will be useful,
*    but WITHOUT ANY WARRANTY; without even the implied warranty of
*    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*    GNU General Public License for more details.
*
*    Note : If You Found Any Isuess Or Suggestions Please Contact Me On Discord : "Blux#4061"
*
*/

namespace Bluxy\Announcements;

use pocketmine\scheduler\Task as AnnounTask;
use Bluxy\Announcements\main;


class Task extends AnnounTask {
        public function __construct(Main $plugin) {
              
          $this->plugin = $plugin;
          
        }

        public function onRun($currentTick) {
                
                $this->plugin->MsgTask();
          
        }
}
