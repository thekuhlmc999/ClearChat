<?php

namespace tkm\ClearChat;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;

class ClearChatCommand extends Command{

    public function __construct()
    {
        parent::__construct("clearchat", Main::$config->get("description"), "", Main::$config->get("aliases", []));
        $this->setPermission("clearchat.cmd");
        $this->setPermissionMessage(Main::$config->get("no.perm"));
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if(!$sender instanceof Player)return false;
        if(!$this->testPermission($sender))return false;
        Main::clear(false, $sender);
    }
}