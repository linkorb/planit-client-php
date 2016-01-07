<?php
namespace Planit\Client;

use GuzzleHttp\Client as GuzzleClient;
use Planit\Client\Model\Board;
use Planit\Client\Model\BoardList;
use Planit\Client\Model\Card;
use Planit\Client\Model\CardActivity;
use Planit\Client\Model\CardBoard;

class Client
{
    private $username;
    private $password;
    private $baseUrl;
    private $httpClient;

    public function __construct($username, $password, $baseUrl)
    {
        $this->username = $username;
        $this->password = $password;
        $this->baseUrl = $baseUrl;
        $this->httpClient = new GuzzleClient();
    }
    public function getBoard($accountName, $boardName)
    {
        $res = $this->httpClient->get(
            $this->baseUrl.'/api/v1/'.$accountName.'/'.$boardName,
            ['auth' => [$this->username, $this->password]]
        );
        if ($res->getStatusCode() == 200) {
            $data = json_decode($res->getBody(), true);
            $obj = new Board();
            $obj->fillData($data);
            return $obj;
        }
        throw new \Exception(json_decode($res->getBody(), true)['error'], $res->getStatusCode());
    }

    public function getBoardLists($accountName, $boardName)
    {
        $res = $this->httpClient->get(
            $this->baseUrl.'/api/v1/'.$accountName.'/'.$boardName.'/lists',
            ['auth' => [$this->username, $this->password]]
        );

        if ($res->getStatusCode() == 200) {
            $ret = [];
            $data = json_decode($res->getBody(), true);
            foreach ($data as $list) {
                $obj = new BoardList();
                $obj->fillData($list);
                $ret[] = $obj;
            }
            return $ret;
        }
        throw new \Exception(json_decode($res->getBody(), true)['error'], $res->getStatusCode());
    }

    public function getBoardListView()
    {
        $res = $this->httpClient->get(
            $this->baseUrl.'/api/v1/'.$accountName.'/'.$boardName.'/lists/'.$boardListName,
            ['auth' => [$this->username, $this->password]]
        );
        if ($res->getStatusCode() == 200) {
            $data = json_decode($res->getBody(), true);
            $obj = new BoardList();
            $obj->fillData($list);
            return $obj;
        }
        throw new \Exception(json_decode($res->getBody(), true)['error'], $res->getStatusCode());
    }

    public function getBoardCards($accountName, $boardName)
    {
        $res = $this->httpClient->get(
            $this->baseUrl.'/api/v1/'.$accountName.'/'.$boardName.'/cards',
            ['auth' => [$this->username, $this->password]]
        );

        if ($res->getStatusCode() == 200) {
            $ret = [];
            $data = json_decode($res->getBody(), true);
            foreach ($data as $card) {
                $obj = new Card();
                $obj->fillData($card);
                $ret[] = $obj;
            }
            return $ret;
        }
        throw new \Exception(json_decode($res->getBody(), true)['error'], $res->getStatusCode());
    }

    public function getCard($cardId)
    {
        $res = $this->httpClient->get(
            $this->baseUrl.'/api/v1/cards/'.$cardId,
            ['auth' => [$this->username, $this->password]]
        );

        if ($res->getStatusCode() == 200) {
            $data = json_decode($res->getBody(), true);
            $obj = new Card();
            $obj->fillData($data);

            $aActivity = [];
            $aBoard = [];
            if (count($data['activity']) > 0) {
                foreach ($data['activity'] as $activity) {
                    $objActivity = new CardActivity();
                    $objActivity->fillData($activity);
                    $aActivity[] = $objActivity;
                }
            }

            if (count($data['boards']) > 0) {
                foreach ($data['boards'] as $board) {
                    $objCardBoard = new CardBoard();
                    $objCardBoard->fillData($board);
                    $aBoard[] = $objCardBoard;
                }
            }
            $obj->setActivities($aActivity);
            $obj->setBoards($aBoard);
            return $obj;
        }
        throw new \Exception(json_decode($res->getBody(), true)['error'], $res->getStatusCode());
    }
}
