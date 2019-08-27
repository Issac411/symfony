<?php

namespace App\Form;

use App\Entity\Idee;
use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\BooleanType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;


class IdeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',null, ['label' => 'Titre'])
            ->add('description', TextareaType::class, ['required' => false])
            ->add('author',TextareaType::class, ['required' => false])
            ->add('file', FileType::class, [
                'label' => 'Brochure (PDF file)',
                'mapped' => false,
                'required' => false])

                /******************************************
                 * 
                 */

            ->add('categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'libelle',
                'multiple' => true,

            ])

            /*->add('categorie', CollectionType::class, array( 
                    'entry_type' => EntityType::class, 
                    'entry_options' => array(
                        'class' => Categorie::class,
                        'choice_label' => 'libelle'
                    ),
                ))*/


                /**********************************************
                 * 
                 */

            /*->add('categorie', CollectionType::class, [
                // each entry in the array will be an "email" field
                'entry_type' => EntityType::class,
                // these options are passed to each "email" type
                'entry_options' => [
                    'class' => Categorie::class,
                    'label' => 'libelle',
                    'allow_add' => true
                ],
            ])*/
            
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Idee::class,
        ]);
    }
}
