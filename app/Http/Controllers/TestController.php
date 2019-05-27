<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LineBotService;

class TestController extends Controller
{
	private $lineBotService;
	public function __construct(LineBotService $lineBotService)
    {
        $this->lineBotService = $lineBotService;
    }
    public function index()
    {
    	// $this->lineBotService->pushMessage('Elliot現在沒空');
    	 $target = $this->lineBotService->buildTemplateMessageBuilderDeprecated(
            'https://i.imgur.com/8rDeuAI.jpg',
            'https://https://github.com/Elliot9/laravel-linebot',
            'Fat Seal'
        );
        $this->lineBotService->pushMessage($target);

    }

    public function webhook()
    {	
		$this->lineBotService->pushMessage('回復雞器人');
    	// \Log::info($request);
    }
}
