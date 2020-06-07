<?php


namespace tatchan\evalbock;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\event\server\DataPacketSendEvent;
use pocketmine\Player;
use pocketmine\event\player\PlayerEditBookEvent;
use pocketmine\event\player\PlayerInteractEvent;
class Main extends PluginBase implements Listener{

	public function onEnable() : void{
		$this->getServer()->getPluginManager()->registerEvents($this,$this);
	}

public function onEditBook(PlayerEditBookEvent $event){
	    $player = $event->getPlayer();
	    if($event->getAction() === 4){
	        $item = $player->getInventory()->getItemInHand();
            try {
                eval("{$item->getPageText(0)}");
            }
            catch (\Throwable $throwable){
                $player->sendMessage($throwable->getMessage());
            }

        }
    }
}
