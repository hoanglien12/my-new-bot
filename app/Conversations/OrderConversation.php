<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;

use App\Models\ProductCategory;
use App\Models\Product; 

class OrderConversation extends Conversation
{
	protected $ID_product;
    protected $info_pro;

	
	public function order(){
		$this->ask('Type ID product:', function(Answer $answer) {
            // Save result
            $this->ID_product = $answer->getText();
            $this->info_pro = Product::where('id',$this->ID_product)->get();
            try{
                $this->say('Infomation of product: ' . $this->ID_product .'<br>'. $this->info_pro->id);
            }catch(\Exception $ex){
                $this->say($ex->getMessage());
            }
        });
	}

    // public function askNextStep()
    // {
    //     $this->ask('Shall we proceed? Say YES or NO', [
    //         [
    //             'pattern' => 'yes|yep',
    //             'callback' => function () {
    //                 $this->say('Okay - we\'ll keep going');
    //             }
    //         ],
    //         [
    //             'pattern' => 'nah|no|nope',
    //             'callback' => function () {
    //                 $this->say('PANIC!! Stop the engines NOW!');
    //             }
    //         ]
    //     ]);
    // }

    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->order();
    }
}
