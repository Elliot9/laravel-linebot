<?php
namespace App\Services;
use LINE\LINEBot;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
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

    public function replyMessage($content): Response
    {
        if (is_string($content)) {
            $content = new TextMessageBuilder($content);
        }
        return $this->lineBot->replyMessage($this->replyToken, $content);
    }
}