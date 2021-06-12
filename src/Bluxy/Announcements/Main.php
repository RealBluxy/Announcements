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

namespace Bluxy\Announcements;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\plugin\PluginBase as Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Server;
use pocketmine\scheduler\Task;
use Bluxy\Announcements\Task as AnnounTask;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\item\Item;
use pocketmine\utils\Config;
use pocketmine\network\protocol\mcpe\PlayerSoundPacket;

class Main extends PluginBase implements Listener{


    public function onEnable()
    {
        @mkdir($this->getDataFolder());
        $this->saveResource("config.yml");
        $this->saveDefaultConfig();
        $this->cfg = $this->getConfig();
	    
	$interval = $this->cfg->get("interval");
	$this->getScheduler()->scheduleRepeatingTask(new AnnounTask($this), (int) $interval);
    }
	
    public function onDisable() : void{
	    @mkdir($this->getDataFolder());
        $this->saveResource("config.yml");
        $this->saveDefaultConfig();
        $this->cfg = $this->getConfig();
	    }
  
   public function MsgTask() {
     
     $msg[1] = $this->cfg->get("msg1");
     $msg[2] = $this->cfg->get("msg2");
     $msg[3] = $this->cfg->get("msg3");
     $msg[4] = $this->cfg->get("msg4");
     $msg[5] = $this->cfg->get("msg5");
     $msg[6] = $this->cfg->get("msg6");
     $msg[7] = $this->cfg->get("msg7");
     $msg[8] = $this->cfg->get("msg8");
     $msg[9] = $this->cfg->get("msg9");
     $msg[10] = $this->cfg->get("msg10");
     
     $rand = $msg[mt_rand(1,10)];
     
     $this->getServer()->broadcastMessage("$rand");
	   
   }
	
	 public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
	  
    switch($command->getName()) {
		 
        case "sounds":
		    //https://www.digminecraft.com/lists/sound_list_pe.php sounds lsit boi
		    if($sender->hasPermission("Announcements.sounds")){
	$sender->sendMessage("§a Go To https://www.digminecraft.com/lists/sound_list_pe.php for the sounds list !");
		}else{
			$sender->sendMessage("§cYou Don't have the Permission To Use This Command");
		    }
            break;
		     case "ansound":
		    if($sender->hasPermission("Announce.sound")){
		    if(isset($args[0])) {
			    
		   foreach($this->getServer()->getOnlinePlayers() as $p){
			   
		   $pk = PlaySoundPacket;
		   $pk->soundName = (string) $args[0];
		   $pk->volume = 1; 
		   $pk->pitch = 1; 
		   $pk->disableRelativeVolume = true;
		   $p->dataPacket($pk);
			   $sender->sendMessage("§a BroadCasted Sound: §e$args[0]");
                   }
		    }else{
			    $sender->sendMessage("§cUsage: /ansound <soundname> ");
			    $sender->sendMessage("§aPro Tip: Run The Command '/sounds' To Get a List Of Sound You Can BroadCast!");
		    }else{
			    $sender->sendMessage("§cYou Don't have the Permission To Use This Command");
		    }
		    }
		     break;
		     case "antitle":
		    if($sender->hasPermission("Announce.title")){
		    foreach($this->getServer()->getOnlinePlayers() as $p){
			    if(isset($args[0]) && isset($args[1])) {
			    $p->addTitle((string) $args[0], (string) $args[0], 5, 30, 5);
		    }else{
				    $sender->sendMessage("§cUsage: /antitle <title> <subtitle> ");
			    }else{
				    $sender->sendMessage("§cYou Don't have the Permission To Use This Command");
			    }
		    }
		    }
		     break;
		     case "anmsg":
		    if($sender->hasPermission("Announce.msg")){
		    foreach($this->getServer()->getOnlinePlayers() as $p){
			    if(isset($args[0])) {
				    $this->getServer()->broadcastMessage((string) $args[0]);
			    }else{
				    $sender->sendMessage("§cUsage: /anmsg <message>");
				    $sender->sendMessage("§aPro Tip: Use '\n' in your message to skip a line!");
				    }else{
				     $sender->sendMessage("§cYou Don't have the Permission To Use This Command");
			    }
		    }
		    }
		     break;
		     case "anitem":
		    if($sender->hasPermission("Announce.item")){
		    foreach($this->getServer()->getOnlinePlayers() as $p){
			    if(isset($args[0]) && isset($args[1]) && isset($args[2])) {
				    $player->getInventory()->addItem(Item::get($args[0], $args[1], $args[2]))->setCustomName((string) $args[3])->setLore([$args[4]]);
			    }else{
				     $sender->sendMessage("§cUsage: /anitem <itemid> <item meta (if there isn't set it to 0)> <amount> <item custom name(optional)> <item description (optioanal)>");
		            }else{
				     $sender->sendMessage("§cYou Don't have the Permission To Use This Command");
			    }
		    }
		    }
		      break;
      
    }
}
