<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Models\ProductCategory;
use App\Models\Product; 

class OrderConversation extends Conversation
{
	protected $ID_product;
	
	public function order(){
		$this->ask('Nhập mã sản phẩm bạn muốn đặt', function(Answer $answer) {
            // Save result
            $this->ID_product = $answer->getText();
            $this->say('Thông tin sản phẩm có mã: ' . $this->ID_product);
            // $info_pro = Product::where('id',$this->ID_product);
            // $this->say($this->$info_pro);
            $this->bot->userStorage()->save([
	            'ID_product' => $answer->getText(),
	        ]);
        });
	}
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
