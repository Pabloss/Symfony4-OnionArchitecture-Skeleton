<?php
declare(strict_types=1);

namespace App\Core\Domain\Model\TicTacToe\Game;

use App\Core\Application\History\HistoryContent;
use App\Core\Domain\Model\TicTacToe\ValueObject\Symbol;
use App\Core\Domain\Model\TicTacToe\ValueObject\Tile;
use App\Tests\Stubs\History\HistoryItem;

/**
 * Interface HistoryInterface
 * @package App\Core\Domain\Model\TicTacToe\Game
 */
interface HistoryInterface
{
    /**
     * @return array
     */
    public function content(Game $game): HistoryContent;

    /**
     * @param Game $game
     * @return HistoryItem|null
     */
    public function getLastTurn(Game $game): ?HistoryItem;

    /**
     * @return Symbol
     */
    public function getStartingPlayerSymbol(): Symbol;

    /**
     * @param Game $game
     * @return int
     */
    public function length(Game $game): int;

    /**
     * @param Player $player
     * @param Tile $tile
     * @param Game $game
     */
    public function saveTurn(Player $player, Tile $tile, Game $game):void;
}
