<?php
include_once __dir__ . '/../vendor/autoload.php';
$username = 'username';
$password = 'password';
$baseUrl = 'http://planit.linkorb.com';
$planit = new \Planit\Client\Client($username, $password, $baseUrl);
$accountName = 'accountName';
$boardName =  'boardname';

try {
    // -- Board details --//
    $oBoard = $planit->getBoard($accountName, $boardName);
    echo '[' . $oBoard->getName() . '] "'."\n\r"; // 'how-to-login-to-linkorb'
    echo $oBoard->getId();
    echo $oBoard->getAccountName();
    echo $oBoard->getColor();
    echo $oBoard->getIconUrl();
    echo $oBoard->getCreatedAt();
    echo $oBoard->getCreatedBy();
    echo $oBoard->getUpdatedAt();
    echo $oBoard->getUpdatedBy();
    echo $oBoard->getDescription();
    echo $oBoard->getDetails();

    //-- Board all lists --//
    $lists = $planit->getBoardLists($accountName, $boardName);
    echo '-- Board List --';
    foreach ($lists as $obj) {
        echo "\n\r";
        echo $obj->getId();
        echo $obj->getName();
        echo $obj->getBoardId();
        echo $obj->getIcon();
        echo $obj->getOrderKey();
        echo $obj->getDescription();
    }

    //-- Board list details --//
    $oList = $planit->getBoardLists($accountName, $boardName, 'TODO');
    echo "\n\r";
    echo $oList->getId();
    echo $oList->getName();
    echo $oList->getBoardId();
    echo $oList->getIcon();
    echo $oList->getOrderKey();
    echo $oList->getDescription();

    //-- Board Cards --//
    $cards = $planit->getBoardCards($accountName, $boardName);
    echo '-- Board Cards --';
    foreach ($cards as $obj) {
        echo "\n\r";
        echo $obj->getId();
        echo $obj->getName();
        echo $obj->getCreatedAt();
        echo $obj->getCreatedBy();
        echo $obj->getUpdatedAt();
        echo $obj->getUpdatedBy();
        echo $obj->getDescription();
        echo $obj->getDetails();
    }

    //-- Card detials/view --//
    $card = $planit->getCard($cardId);
    echo '-- Cards Details--';
    echo "\n\r";
    echo $card->getId();
    echo $card->getName();
    echo $card->getCreatedAt();
    echo $card->getCreatedBy();
    echo $card->getUpdatedAt();
    echo $card->getUpdatedBy();
    echo $card->getDescription();
    echo $card->getDetails();

    echo "\n\r";
    echo '-- Cards acitivities--';
    foreach ($card->getActivities() as $oActivity) {
        echo "\n\r";
        echo $oActivity->getId();
        echo $oActivity->getCardId();
        echo $oActivity->getType();
        echo $oActivity->getCreatedAt();
        echo $oActivity->getCreatedBy();
        echo $oActivity->getMessage();
        echo $oActivity->getFieldname();
        echo $oActivity->getOldValue();
        echo $oActivity->getNewValue();
    }
    echo "\n\r";
    echo '-- Cards Boards--';
    foreach ($card->getBoards() as $oBoard) {
        echo "\n\r";
        echo $oBoard->getId();
        echo $oBoard->getBoardId();
        echo $oBoard->getBoardName();
        echo $oBoard->getBoardListId();
        echo $oBoard->getBoardListName();
    }

    // returns rendered html
} catch (\Exception $e) {
    switch ($e->getCode()) {
        case 400:
            echo 'Bad Request: ', $e->getMessage();
            break;
        case 403:
            echo 'Access denied or Unauthorised: ', $e->getMessage();
            break;
        case 404:
            echo 'Not found: ', $e->getMessage();
            break;
    }
}
