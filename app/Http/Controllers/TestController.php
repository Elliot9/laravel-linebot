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
use App\Services\LineReplyService;

class TestController extends Controller
{
	private $lineBotService;
	public function __construct()
    {
        $this->lineBotService = app(LineBotService::class);
    }
    public function index()
    {
        // $response = $this->lineBotService->pushMessage('Elliot現在沒空');
        // $response = $this->lineBotService->pushVideoMessage('https://backend.jhong-demo.com.tw/images/582979657.141260.mp4','https://images.genius.com/60ec5fe01688173b91c19d04fe6de73f.500x500x1.jpg');
        // $response = $this->lineBotService->pushStickerMessage('11538','51626530');
        //$response = $this->lineBotService->pushTemplateMessage();



        // $this->assertEquals(200, $response->getHTTPStatus());
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

    public function webhook(Request $request)
    {	
        $lineReplyService = new LineReplyService($request['replyToken']);
        $lineReplyService->replyMessage('你才是');
		// $this->lineBotService->replyMessage('你才是');
    	\Log::info($request);
    }
}
