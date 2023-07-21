<?php

namespace App\Controllers;

use App\Config\View;
use App\Models\Comment_Recipe;

class Comments
{
  private $comment;

  public function __construct()
  {
    $this->comment = Comment_Recipe::getInstance();
  }

  public function allComments()
  {
    $view = View::getInstance("Comments/comments", "front");
    // récupérer la data dans la bdd
    $view->assign('comments', $this->comment->selectWhere(null));
  }

  public function comment()
  {
    //route dynamique 
  }

  public function allCommentsBO()
  {
    $view = View::getInstance("Comments/commentsBO", "back");
  }

  public function commentBO()
  {
    $view = View::getInstance("Comments/commentBO", "back");
    //route dynamique
  }
}