<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Support\Facades\Validator;
use App\Conversations\InformationConversation;

class OnboardingConversation extends Conversation
{
	protected $firstname;

    protected $email;

    public function askFirstname()
    {
        $this->ask('Hello! What is your name?', function(Answer $answer) {
            // Save result
            $this->firstname = $answer->getText();

            $this->say('Nice to meet you '.$this->firstname);
            $this->bot->userStorage()->save([
	            'name' => $answer->getText(),
	        ]);
            $this->askEmail();
        });
    }
    public function askEmail()
	{
	    $this->ask('What is your email?', function(Answer $answer) {

	        $validator = Validator::make(['email' => $answer->getText()], [
	            'email' => 'email',
	        ]);

	        if ($validator->fails()) {
	            return $this->repeat('That doesn\'t look like a valid email. Please enter a valid email.');
	        }

	        $this->bot->userStorage()->save([
	            'email' => $answer->getText(),
	        ]);

	        $this->askMobile();
	    });
	}
    public function askMobile()
    {
        $this->ask('And What is your mobile phone?', function(Answer $answer) {
            $this->bot->userStorage()->save([
                'phone' => $answer->getText(),
            ]);

            $this->bot->startConversation(new SelectConversation());

        });
    }

    public function run()
    {
        // This will be called immediately
        $this->askFirstname();
    }
    
}
