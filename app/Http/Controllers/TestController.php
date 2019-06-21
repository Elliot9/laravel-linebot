<?php

namespace App\Http\Controllers;
use LINE\LINEBot;

use Illuminate\Http\Request;
use App\Services\LineBotService;

class TestController extends Controller
{
	// private $lineBotService;
	// public function __construct(LineBotService $lineBotService)
 //    {
 //        $this->lineBotService = $lineBotService;
 //    }
    public function index()
    {
        $content = new TextMessageBuilder('Elliot現在沒空');
        app(LINEBot::class)->pushMessage(env('LINE_USER_ID'),$content);
    	// $this->lineBotService->pushMessage('Elliot現在沒空');
        // 
    	 // $target = $this->lineBotService->buildTemplateMessageBuilderDeprecated(
      //       'https://i.imgur.com/8rDeuAI.jpg',
      //       'https://https://github.com/Elliot9/laravel-linebot',
      //       'Fat Seal'
      //   );
      //   $this->lineBotService->pushMessage($target);
        // dd(app(LINEBot::class));

    }

    public function webhook()
    {	
		// $this->lineBotService->replyMessage('你才是');
    	// \Log::info($request);
    }
}
