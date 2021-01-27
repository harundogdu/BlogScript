<?php
require_once '../config.php';
if ($_POST) :
    $messages_name      = $database->filterSyntax($_POST['messages_name']);
    $messages_mail      = $database->filterSyntax($_POST['messages_mail']);
    $messages_subject   = $database->filterSyntax($_POST['messages_subject']);
    $messages_message   = $database->filterSyntax($_POST['messages_message']);
    if (!$messages_name || !$messages_mail || !$messages_subject || !$messages_message) :
        echo "empty";
    else :
        $addMessagess =  $database->setQuery("INSERT INTO messages", "(messages_name,messages_mail,messages_subject,messages_message) VALUES (?,?,?,?)", array($messages_name, $messages_mail, $messages_subject, $messages_message));
        if ($addMessagess) :
            echo "yes";
        else :
            echo "no";
        endif;
    endif;
endif;
