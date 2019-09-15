<?php

namespace App\Console\Commands;

use App\FiniteStateAutomata;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class finite extends Command
{
    /**
     * The name and signature of the console command.
     * Add option --details will output the whole process detail
     *
     * @var string
     */
    protected $signature = 'command:finite {--details}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the command will asking for an input then outcome remainder of the input integer divide by 3';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $input = $this->ask('Please input an valid integer');

        //validation of the input, to make sure the input is and positive integer. 099 will be allowed and treat as 99.
        $validator = Validator::make([
            'input' => $input,
        ], [
            'input' => ['required','regex:/^[0-9]+$/']
        ]);

        if ($validator->fails()) {
            $this->info('Please input an valid integer.');
            return 1;
        }

        //Throw the input into the Finite State Automata, and get out come result.
        $finiteStateAutomata = new FiniteStateAutomata();
        $result = $finiteStateAutomata->handle((int)$input);
        if ($this->option('details')) {
            $this->info('Convert '. (int)$input . ' to binary string as '.  decbin($input) .' and input into the machine.');
            $this->info('The machine will go as follows:');
            $this->info('Initial state = S0');
            foreach ($result['details'] as $line) {
                $this->info('Input = ' . $line['input'] . ' Result State = ' . $line['result'] . ' Current State = ' . $line['result']);
            }
        }

        $this->info($result['message']);
    }
}
