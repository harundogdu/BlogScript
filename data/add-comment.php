<?php
require_once '../config.php';
if ($_POST) :
    $comment_user      = $database->filterSyntax($_POST['comment_user']);
    $comment_mail      = $database->filterSyntax($_POST['comment_mail']);
    $comment_website   = $database->filterSyntax($_POST['comment_website']);
    $comment_content   = $database->filterSyntax($_POST['comment_content']);
    $comment_post_id   = $database->filterSyntax($_POST['comment_post_id']);
    if (!$comment_user || !$comment_mail || !$comment_website || !$comment_content) :
        echo "empty";
    else :
        $query = $database->setQuery("INSERT INTO comment ", " (comment_user,comment_mail,comment_website,comment_content,comment_post_id) VALUES (?,?,?,?,?) ", array($comment_user, $comment_mail, $comment_website, $comment_content, $comment_post_id));
        if ($query) {
            echo "yes";
        } else {
            echo "no";
        }
    endif;
else :
    echo "empty";
endif;
