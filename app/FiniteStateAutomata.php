<?php

namespace App;

class FiniteStateAutomata
{
    private $currentState = 'S0';

    private $remainder;

    const S0 = 0;
    const S1 = 1;
    const s2 = 2;

    const TRANSLATION_TABLE = [
        'S0' => [
            '0' => 'S0',
            '1' => 'S1',
            'value' => 0,
        ],
        'S1' => [
            '0' => 'S2',
            '1' => 'S0',
            'value' => 1,
        ],
        'S2' => [
            '0' => 'S1',
            '1' => 'S2',
            'value' => 2,
        ],
    ];

    /**
     * Function to convert integer to a binary string,
     * and process the string one by one bit to get out come.
     *
     * @param int $input
     * @return array
     */
    public function handle(int $input): array
    {
        $input = decbin($input);
        $queue = [];

        for ($i = 0; $i < strlen($input); $i++){
            $this->currentState = self::TRANSLATION_TABLE[$this->currentState][$input[$i]];
            $queue[] = [
                'input' => $input[$i],
                'result' => $this->currentState,
            ];
        }

        $this->remainder = self::TRANSLATION_TABLE[$this->currentState]['value'];

        return [
            'details'=> $queue,
            'message' => 'The remainder is '. $this->remainder,
        ];

    }

    /**
     * @return mixed
     */
    public function getRemainder(): int
    {
        return $this->remainder;
    }
}
