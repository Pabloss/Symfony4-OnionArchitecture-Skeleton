<?php
declare(strict_types=1);

namespace App\Tests\Core\Domain\Model\TicTacToe\Event\Params;

use App\Core\Domain\Event\Params\Params;
use App\Core\Domain\Event\Params\ParamsInterface;
use App\Core\Domain\Model\TicTacToe\Game\Game;
use App\Core\Domain\Model\TicTacToe\Game\Player;
use App\Core\Domain\Model\TicTacToe\ValueObject\Tile;
use PHPUnit\Framework\TestCase;

class ParamsTest extends TestCase
{
    /** @var ParamsInterface */
    private $params;

    /** @var Player */
    private $player;

    /** @var Tile */
    private $tile;

    /** @var Game */
    private $game;

    /**
     * @test
     */
    public function isInstance()
    {
        self::assertInstanceOf(ParamsInterface::class, $this->params);
    }

    /**
     * @test
     */
    public function getEveryParam()
    {
        self::assertSame($this->player, $this->params->player());
        self::assertSame($this->tile, $this->params->tile());
        self::assertSame($this->game, $this->params->game());
    }

    protected function setUp()
    {
        $gameProphecy = $this->prophesize(Game::class);
        $tileProphecy = $this->prophesize(Tile::class);
        $playerProphecy = $this->prophesize(Player::class);

        $this->player = $playerProphecy->reveal();
        $this->tile = $tileProphecy->reveal();
        $this->game = $gameProphecy->reveal();

        $this->params = new Params($this->player, $this->tile, $this->game);
    }
}
