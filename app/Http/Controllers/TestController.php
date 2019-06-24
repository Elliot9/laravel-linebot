<?php

namespace App\Http\Controllers;
// use LINE\LINEBot;
// use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
// use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;
// use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselTemplateBuilder;
// use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder;
// use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;

use Illuminate\Http\Request;
use App\Services\LineBotService;

class TestController extends Controller
{
	private $lineBotService;
	public function __construct()
    {
        $this->lineBotService = app(LineBotService::class);
    }
    public function index()
    {
        // $content = new TextMessageBuilder('Elliot現在沒空');
        // app(LINEBot::class)->pushMessage(env('LINE_USER_ID'),$content);
    	// $this->lineBotService->pushMessage('Elliot現在沒空');
         
        $response = $this->lineBotService->pushMessage('Elliot現在沒空');
        $this->assertEquals(200, $response->getHTTPStatus());
        // $this->assertEquals(200, $response->getHTTPStatus()); 
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
