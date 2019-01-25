<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use App\Conversations\SelectConversation;


class InformationConversation extends Conversation
{
	public function getInformationConversation(){
	     $user = $this->bot->userStorage()->find();
	     $message = '';
	     $message .= 'Name: ' . $user->get('select') . '<br>';

	     $this->say('This is your information!. <br><br>' . $message);


	}
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->getInformationConversation();
    }
}
