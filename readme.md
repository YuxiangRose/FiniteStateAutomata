## Description:

This is a program using finite state automata, The automata below gives you remainder when dividing a number by 3.

This program is using Laravel and PHP 7, for the unit test, it using the PHPUNIT.


## How to Use:
For using this please check follow
<ol>
    <li>Check out the repository</li>
    <li>Under the home dirctory run the command: <b>php artisan command:finite</b> will give the reusult of the remainder</li>
    <li>Under the home dirctory run the command: <b>php artisan command:finite --details</b> wiil give the result and the process details</li>
    <li>For unit test Under the home dirctory run the command: 
        <b>./vendor/bin/phpunit ./tests/Unit/FiniteStateAutomataTest.php</b>
    </li>
</ol>

## Files:
<ul>
    <li>Command file: <b><i>App\Console\Commands\finite.php</i></b></li>
    <li>Main Service file: <b><i>App\FiniteStateAutomata.php</i></b></li>
    <li>Test file: <b><i>test\Unit\FiniteStateAutomataTest.php</i></b></li>
</ul>
