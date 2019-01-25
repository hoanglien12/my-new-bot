<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

// $botman->hears('Hi', function ($bot) {
//     $bot->reply('Hello!');
// });
// $botman->hears('My First Message', function ($bot) {
//     $bot->reply('Your First Response');
// });
// $botman->hears('keyword', function (BotMan $bot) {
//     $bot->typesAndWaits(2);
//     $bot->reply("Tell me more!");
// });
// $botman->group(['recipient' => ['a', 'b', 'c']], function($bot) {
//     $bot->hears('keyword', function($bot) {
//     	$bot->reply('Group recipient!');
//         // Only listens when recipient '1234567890', '2345678901' or '3456789012' is receiving the message.
//     });
// });

// $botman->hears('Hello', function($bot) {
//     $bot->startConversation(new OnboardingConversation);
// });

$botman->fallback(function($bot) {
    $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...');
});
$botman->hears('Bắt đầu', BotManController::class.'@startConversation');
