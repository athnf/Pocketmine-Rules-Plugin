<?php

namespace PrzxRulesUI;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase implements Listener{

    public function onEnable(){
        $this->getLogger()->info("Rules!")
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool{
        switch($cmd->getName()){
            case "rules":
            if ($sender instanceof Player){
                $this->Rules($sender);
                return true;
            }else{
                $sender->sendMessage("use Cmd In Game"); //  message Saat Console Menjalankan Command
            }
        break;
        }
        return true;
    }

    public function PrzxRulesUI($sender){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $sender, int $data = null){
            $result = $data;
            if($result == null){
                return true;
            }
            switch($result){
                case 0;
                    $this->getServer()->getCommandMap()->dispatch($sender, "Contoh Rules");
                break;
            }
        });

        $form->setTitle("Rules Server");
        $form->getContent("Cek Rules Masing Masing Di Bawah Ini");
        $form->addButton("Rules Skyblock");
        $form->sendToPlayer($sender);
        return $form;
        
    }
}