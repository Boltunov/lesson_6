<?php
declare(strict_types=1);

namespace App\Services;

use App\Services\Contracts\Parser;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade;


class ParserService implements Parser
{
    private string $link;

    public function setLink(string $link): Parser
    {
        $this->link = $link;
        return $this;
    }

    public function saveParserData(): void
    {
        $xml = Facade::load($this->link);

        $date = $xml->parse([
            'title' => [
                'uses' => 'channel.title',
            ],
            'link' => [
                'uses' => 'channel.link',
            ],
            'description' => [
                'uses' => 'channel.description',
            ],
            'image' => [
                'uses' => 'channel.image.url',
            ],
            'news' => [
                'uses' => 'channel.item[title, link, author, description, pubDate]'
            ],
        ]);

        $explode = explode("/", $this->link);
        $fileName = end($explode);

        Storage::append('parse/' . $fileName . ".txt", json_encode($data));
    }
}
