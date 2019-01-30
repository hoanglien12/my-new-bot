<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;

class CustomerConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        
        $this->askUser();
    }

    public function askUser(){
    	$this->ask('Bạn muốn đổi trả/thông báo đơn hàng lỗi nào? ', function(Answer $answer) {
            // Save result
            $this->say('Cám ơn bạn.');
        });
    }
}
