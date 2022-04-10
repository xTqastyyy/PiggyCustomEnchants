<?php

declare(strict_types=1);

namespace DaPigGuy\PiggyCustomEnchants\enchants\weapons;

use DaPigGuy\PiggyCustomEnchants\enchants\CustomEnchantIds;
use DaPigGuy\PiggyCustomEnchants\enchants\ReactiveEnchantment;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\Event;
use pocketmine\inventory\Inventory;
use pocketmine\item\Item;
use pocketmine\player\Player;

class RazoredgedEnchant extends ReactiveEnchantment
{
    public string $name = "Razoredged";

    public function getDefaultExtraData(): array
    {
        return ["base" => 10, "multiplier" => 0.5];
    }

    public function react(Player $player, Item $item, Inventory $inventory, int $slot, Event $event, int $level, int $stack): void
    {
        if ($event instanceof EntityDamageByEntityEvent) {
            $event->setModifier($this->extraData["base"] + $level * $this->extraData["multiplier"], CustomEnchantIds::RAZOREDGED);
        }
    }
}
