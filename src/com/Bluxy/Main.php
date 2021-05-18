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

declare(strict_types=1);

namespace com\Bluxy;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\plugin\PluginBase as Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Server;
use pocketmine\scheduler\Task;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\item\Item;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{
  
  public function onLoad() : void{
		$this->getLogger()->info(TextFormat::WHITE . "Announcements Loading...");
	}


    public function onEnable()
    {

       $this->getLogger()->info(TextFormat::GREEN . "Announcements Enabled");

        @mkdir($this->getDataFolder());
        $this->saveResource("config.yml");
        $this->saveDefaultConfig();
        $this->cfg = $this->getConfig();
     
	    //creating the task..
	    
	     $interval = $this->cfg->get("interval");
	     $this->getScheduler()->scheduleRepeatingTask(new Task($this), (int) $interval);
    }
	
    public function onDisable() : void{
		$this->getLogger()->info(TextFormat::DARK_RED . "Announcements was deactivated ! ");
	}
  
   public function MsgTask() {
	   
	   //$interval = $this->cfg->get("interval");
     
     //$msg = $this->cfg->get("msg");
     
     $msg1 = $this->cfg->get("msg1");
     $msg2 = $this->cfg->get("msg2");
     $msg3 = $this->cfg->get("msg3");
     $msg4 = $this->cfg->get("msg4");
     $msg5 = $this->cfg->get("msg5");
     $msg6 = $this->cfg->get("msg6");
     $msg7 = $this->cfg->get("msg7");
     $msg8 = $this->cfg->get("msg8");
     $msg9 = $this->cfg->get("msg9");
     $msg10 = $this->cfg->get("msg10");
     
     $msg = array($msg1, $msg2, $msg3, $msg4, $msg5, $msg6, $msg7, $msg8, $msg9, $msg10);
     $rand = array_rand($msg);
     
     $this->getServer()->broadcastMessage("$rand");
	   //$this->getScheduler()->scheduleRepeatingTask(new Task($this), $interval);
     
   }
}
