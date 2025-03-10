<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class CategoryFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => "Titre de la catégorie", 
                'required' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => "Veuilliez saisir un titre de catégorie"
                    ])
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => "Description de la catégorie", 
                'required' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => "Veuillez saisir une description"
                    ])
                ],
                'attr' => [
                    'rows' => 10
                ]
            ])
            // ->add('createdAt', null, [
            //     'widget' => 'single_text',
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
