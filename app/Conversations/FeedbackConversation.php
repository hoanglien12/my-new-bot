<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;

class FeedbackConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->feedback();
    }

    public function feedback(){
    	$this->ask('Mời bạn gửi hình ảnh hoặc tin nhắn feedback về sản phẩm', function(Answer $answer) {
            // Save result
            $this->say('Cám ơn bạn đã gửi feedback. Chúng tôi sẽ liên hệ sớm nhất ');
        });
    }
}
