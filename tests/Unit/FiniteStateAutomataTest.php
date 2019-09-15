<?php

namespace Tests\Unit;

use App\FiniteStateAutomata;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

/**
 * Class FiniteStateAutomataTest
 * @package Tests\Unit
 */
class FiniteStateAutomataTest extends TestCase
{
    use WithFaker;

    /**
     * @var FiniteStateAutomata
     */
    public $finiteStateAutomata;

    public function setUp(): void
    {
        parent::setUp();
        $this->finiteStateAutomata = new FiniteStateAutomata();
    }

    public function testHandle()
    {
        $input = $this->faker->numberBetween(0,2147483647);
        $remainder = $input % 3;

        $result = $this->finiteStateAutomata->handle($input);

        //Test for checking if the process details are in the result
        $this->assertArrayHasKey(
            'details',
            $result
        );

        //Test for checking if the process details is array
        $this->assertIsArray($result['details']);

        //Test for checking if the process details is empty or not
        $this->assertGreaterThan(
            0,
            count($result['details'])
        );

        //Test for checking if the message in the result
        $this->assertArrayHasKey(
            'message',
            $result
        );

        //Test for checking if the message is string
        $this->assertIsString($result['message']);

        //Test for checking if remainder is correct
        $this->assertEquals(
            $remainder,
            $this->finiteStateAutomata->getRemainder()
        );
    }
}
