<?php
namespace App\Services;
use LINE\LINEBot;
use LINE\LINEBot\Response;
use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\VideoMessageBuilder;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder;
use LINE\LINEBot\TemplateActionBuilder\LocationTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder;


use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder;

use LINE\LINEBot\QuickReplyBuilder;

use LINE\LINEBot\QuickReplyBuilder\ButtonBuilder\QuickReplyButtonBuilder;
class LineBotService
{
    /** @var LINEBot */
    private $lineBot;
    private $lineUserId;
    private $replyToken;


    // public function __construct($lineUserId,$replyToken)
    public function __construct($lineUserId)
    {
        $this->lineUserId = $lineUserId;
        // $this->replyToken = $replyToken;
        $this->lineBot = app(LINEBot::class);
    }

    public function fake()
    {
    }

    /**
     * @param TemplateMessageBuilder|string $content
     * @return Response
     */
    public function pushMessage($content): Response
    {
      //$content = new TextMessageBuilder($content,'extra text1', 'extra text2'); 多筆文字

        if (is_string($content)) {
            $content = new TextMessageBuilder($content);
        }
        return $this->lineBot->pushMessage($this->lineUserId, $content);
    }

    public function buildTemplateMessageBuilderDeprecated(
           string $imagePath,
           string $directUri,
           string $label
       ): TemplateMessageBuilder {
           $aa = new UriTemplateActionBuilder($label, $directUri);
           $bb =  new ImageCarouselColumnTemplateBuilder($imagePath, $aa);
           $target = new ImageCarouselTemplateBuilder([$bb, $bb, $bb, $bb, $bb, $bb, $bb, $bb]);

           return new TemplateMessageBuilder('Elliot Bot Test', $target);
       }

    // public function replyMessage($content): Response
    // {
    //     if (is_string($content)) {
    //         $content = new TextMessageBuilder($content);
    //     }
    //     return $this->lineBot->replyMessage($this->replyToken, $content);
    // }




    //酸菜魚
    public function pushVideoMessage($originalContentUrl,$previewImageUrl): Response
    {
      $content = new VideoMessageBuilder($originalContentUrl,$previewImageUrl);
      return $this->lineBot->pushMessage($this->lineUserId, $content);
    }
    public function pushStickerMessage($packageId,$stickerId): Response
    {
      //貼圖查詢 https://developers.line.biz/media/messaging-api/sticker_list.pdf
      $content = new StickerMessageBuilder($packageId,$stickerId);
      return $this->lineBot->pushMessage($this->lineUserId, $content);
    }

    public function pushTemplateMessage(): Response
    {
      $actionBuilder = new LocationTemplateActionBuilder('具垂歲私');
      $imageUrl = 'https://images.genius.com/60ec5fe01688173b91c19d04fe6de73f.500x500x1.jpg';
      $content = new QuickReplyButtonBuilder($actionBuilder,$imageUrl);
      
      dd($test);

      // return $this->lineBot->pushMessage($this->lineUserId, $content);
    }

}