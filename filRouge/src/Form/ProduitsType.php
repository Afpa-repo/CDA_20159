<?php

namespace App\Form;

use App\Entity\Produits;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomProduit')
            ->add('CodeProduit')
            ->add('LibelleProduit')
            ->add('DescriptionProduit')
            ->add('PrixProduit')
            ->add('StockProduit')
            ->add('CouleurProduit')
            ->add('PhotoProduit')
            ->add('DateAjoutProduit')
            ->add('DateModifProduit')
            ->add('StockAlert')
            ->add('IdSousCat')
            ->add('IdFournisseur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produits::class,
        ]);
    }
}
