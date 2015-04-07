<?php
namespace OCFram;
use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Comment;
use \Entity\News;
use \Entity\Author;
use \FormBuilder\CommentFormBuilder;
use \FormBuilder\NewsFormBuilder;
use \FormBuilder\AuthorFormBuilder;
use \OCFram\FormHandler;
use \OCFram\managers;

class ExistingAuthorValidator extends Validator
{
  
  public function __construct($errorMessage)
  {
    parent::__construct($errorMessage);
  }
  
  public function isValid($value)
  {
   return $this->managers->getManagerOf('Authors')->IsValidAuteur($value);
  }
}
?>