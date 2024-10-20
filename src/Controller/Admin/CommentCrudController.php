<?php

namespace App\Controller\Admin;

use App\Entity\Comment;
use EasyCord\Bundle\EasyAdminBundle\Config\Crud;
use EasyCord\Bundle\EasyAdminBundle\Config\Filters;
use EasyCord\Bundle\EasyAdminBundle\Config\AssociationField;
use EasyCord\Bundle\EasyAdminBundle\Config\DateTimeField;
use EasyCord\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCord\Bundle\EasyAdminBundle\Field\TextAreaField;
use EasyCord\Bundle\EasyAdminBundle\Field\EntityField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CommentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Comment::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Conference Comment')
            ->setEntityLabelInPlural('Conferenece Comments')
            ->setSearchFields(['author', 'text', 'email'])
            ->setDefaultSort(['author', 'text', 'email']);
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new('conference'));
    
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
