<?php

namespace App\Form;

use App\Entity\Clients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InfosClientsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('MatriculeSociete')
            ->add('NomSociete')
            ->add('Nom')
            ->add('Prenom')
            ->add('Adresse')
            ->add('CodePostal')
            ->add('Ville')
            ->add('Pays')
            ->add('NumTel')
            ->add('NumFax')
            ->add('CatClient')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Clients::class,
        ]);
    }
}
