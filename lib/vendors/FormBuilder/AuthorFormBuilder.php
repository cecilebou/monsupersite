<?php
namespace FormBuilder;

use \OCFram\FormBuilder;
use \OCFram\StringField;
use \OCFram\PasswordField;
use \OCFram\SameValidator;
use \OCFram\TextField;
use \OCFram\NumberField;
use \OCFram\TypeField;

use \OCFram\TypeValidator;
use \OCFram\EmailField;
use \OCFram\EmailValidator;
use \OCFram\DateField;
use \OCFram\MaxLengthValidator;
use \OCFram\NotNullValidator;
use \OCFram\DateValidator;

class AuthorFormBuilder extends FormBuilder
{
  public function build($types)
  {

    $this->form
        ->add(new StringField([
        'label'      => 'Pseudo',
        'name'       => 'pseudo',
        'id'         => 'pseudo',
        'maxLength'  => 50,
        'validators' => [
          new MaxLengthValidator('Le Auteur de l\'auteur spécifié est trop long (50 caractères maximum)', 50),
          new NotNullValidator('Merci de spécifier un pseudo'),
        ],
       ]))
       ->add(new StringField([
        'label'      => 'Firstname',
        'name'       => 'firstname',
        'id'         => 'firstname',
        'maxLength'  => 50,
        'validators' => [
          new MaxLengthValidator('Le prénom spécifié est trop long (50 caractères maximum)', 50),
          new NotNullValidator('Merci de spécifier un prénom'),
        ],
       ]))
       ->add(new StringField([
        'label'      => 'Lastname',
        'name'       => 'lastname',
        'id'         => 'lastname',
        'maxLength'  => 50,
        'validators' => [
          new MaxLengthValidator('Le nom spécifié est trop long (50 caractères maximum)', 50),
          new NotNullValidator('Merci de spécifier un nom'),
        ],
       ]))
       ->add(new DateField([
        'label'      => 'Date of Birth',
        'name'       => 'dateofbirth',
        'id'         => 'dateofbirth',
        'validators' => [
          new DateValidator('Date incorrecte, format : DD/MM/YYYY'),
          new NotNullValidator('Merci de spécifier une date au format : DD/MM/YYYY'),
        ],
      ]))
       ->add($password = new PasswordField([
        'label'      => 'Password',
        'name'       => 'password',
        'id'         => 'password',
        'maxLength'  => 50,
        'validators' => [
          new MaxLengthValidator('Le mot de passe spécifié est trop long (50 caractères maximum)', 50),
          new NotNullValidator('Merci de spécifier un mot de passe'),
        ],
      ]))
       ->add(new PasswordField([
        'label'      => 'Password confirmation',
        'name'       => 'passwordCheck',
        'id'         => 'passwordCheck',
        'maxLength'  => 50,
        'validators' => [
          new MaxLengthValidator('Le mot de passe spécifié est trop long (50 caractères maximum)', 50),
          new NotNullValidator('Merci de confirmer le mot de passe'),
          new SameValidator('Les mots de passe sont différents', $password),
        ],
      ]))
       ->add(new EmailField([
        'label'      => 'Email',
        'name'       => 'email',
        'id'         => 'email',
        'validators' => [
          new NotNullValidator('Merci de spécifier un email'),
          new EmailValidator('Merci de rentrer un email valide'),
        ],
       ]))
      ->add(new TypeField([
        'label'      => 'Type',
        'name'       => 'type',
        'id'         => 'type',
        'type'       => $types,
        'validators' => [
          new TypeValidator('Merci de spécifier un type correct', $types),
        ],
       ])) 
       ;
  }
}
?>