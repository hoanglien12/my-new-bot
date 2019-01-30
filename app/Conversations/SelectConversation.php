<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use App\Conversations\OrderConversation;
use App\Conversations\FeedbackConversation;
use App\Models\ProductCategory;
use App\Models\Product;
use BotMan\Drivers\Facebook\Extensions\Element;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use BotMan\Drivers\Facebook\Extensions\GenericTemplate;


class SelectConversation extends Conversation
{
	public function questionSelect()
	{
        $this->bot->reply(GenericTemplate::create()
            ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
            ->addElements([
                Element::create('BotMan Documentation')
                    ->subtitle('All about BotMan')
                    ->image('http://botman.io/img/botman-body.png')
                    ->addButton(ElementButton::create('visit')
                        ->url('http://botman.io')
                    )
                    ->addButton(ElementButton::create('tell me more')
                        ->payload('tell me more')
                        ->type('postback')
                    ),
                Element::create('BotMan Laravel Starter')
                    ->subtitle('This is the best way to start with Laravel and BotMan')
                    ->image('http://botman.io/img/botman-body.png')
                    ->addButton(ElementButton::create('tellmemore')
                        ->url('https://github.com/mpociot/botman-laravel-starter')
                    ),
            ])
        );
	}
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->questionSelect();
    }
}
