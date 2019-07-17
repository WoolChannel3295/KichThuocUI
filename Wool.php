<?php

namespace KichThuocUI;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

use jojoe77777\FormAPI;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\event\Listener;
use pocketmine\server\ServerCommandEvent;

class Wool extends PluginBase implements Listener {
	
	public function onEnable() : void {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info("§d§lPLUGIN KÍCH THƯỚC UI LÀM BỞI WOOLCHANNEL3295 ĐÃ ĐƯỢC BẬT")
	}
	
	public function onDisable() : void {
		$this->getServer()->getPluginManager()->registerEvents($this, $this)
		$this->getLogger()->info("§c§lPLUGIN KÍCH THƯỚC UI LÀM BỞI WOOLCHANNEL3295 ĐÃ ĐƯỢC TẮT")
	}
	
	public function checkDepends() : void {
		$this->formapi = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        if(is_null($this->formapi)){
            $this->getLogger()->error("§a§lPLUGIN KÍCH THƯỚC UI CẦN CÀI ĐẶT PLUGIN FORM API ĐỂ PHÁT HUY HẾT KHẢ NĂNG PLUGIN");
            $this->getPluginLoader()->disablePlugin($this);
	    }
    }
	
	public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args):bool{
        if($cmd->getName() == "kichthuoc"){
            if(!($sender instanceof Player)){
                $sender->sendMessage("KÍCH THƯỚC UI", false);
                return true;
            }
            $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
            $form = $api->createSimpleForm(function (Player $sender, $data){
                $result = $data;
                if ($result == null) {
                }
                switch ($result) {
                    case 0:
                        $sender->sendMessage("KichThuocUI");
                        $player->$setScale("1");
                        break;
                    case 1:
                        $sender->sendMessage("KÍCH THƯỚC UI");
                        $player->$setScale("2");
                        break;
                    case 2:
                        $sender->sendMessage("KÍCH THƯỚC UI");
                        $player->$setScale("3");
                        break;
                    case 3:
                        $sender->sendMessage("KÍCH THƯỚC UI");
                        $player->$setScale("4");
                        break;
                    case 4:
                        $sender->sendMessage("KÍCH THƯỚC UI");
                        break;
                }
            });
            $form->setTitle("§lMENU KÍCH THƯỚC");
            $form->setContent("HÃY CHỌN KÍCH THƯỚC MÀ BẠN MUỐN DÙNG");
            $form->addButton("§lNhỏ");
            $form->addButton("§lVừa");
            $form->addButton("§lLớn");
            $form->addButton("§lCực Lớn");
            $form->addButton("§lThoát Ra");
            $form->sendToPlayer($sender);
        }
        return true;
    }
}