<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use App\Conversations\OrderConversation;


class SelectConversation extends Conversation
{
	public function questionSelect()
	{
		 $question = Question::create('Bạn muốn hỗ trợ về vấn đề gì?')
            ->callbackId('select')
            ->addButtons([
                Button::create('Đặt hàng')->value('Đặt hàng'),
                Button::create('Feedback')->value('Feedback'),
                Button::create('Đơn hàng (Đơn hàng lỗi/đổi trả hàng)')->value('Đơn hàng (Đơn hàng lỗi/đổi trả hàng)'),
            ]);

        $this->ask($question, function(Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $this->bot->userStorage()->save([
                    'select' => $answer->getValue(),
                ]);
                
                if($this->bot->userStorage()->find('Đặt hàng')){
                    // $this->say('đặt hàng');
                    $this->bot->startConversation(new OrderConversation());
                }
                // $this->bot->startConversation(new InformationConversation());
            }
        });

        
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
