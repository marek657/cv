<?php

namespace Trexima\EuropeanCvBundle\Form\Parts;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Trexima\EuropeanCvBundle\Entity\EuropeanCV;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Yaml\Yaml;
use Trexima\EuropeanCvBundle\Form\Type\EuropeanCVDigitalSkillType;
use Trexima\EuropeanCvBundle\Form\Type\Select2Type;

/**
 * Digital skills
 */
class EuropeanCVPartDigitalSkillsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('digitalSkills', CollectionType::class, [
                'entry_type' => EuropeanCVDigitalSkillType::class,
                'entry_options' => [
                    'label' => false
                ],
                'by_reference' => false,
                'label' => false,
                'prototype' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'delete_empty' => true
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults([
            'data_class' => EuropeanCV::class,
            'is_user_logged_in' => false,
            'translation_domain' => 'trexima_european_cv',
            'sex_required' => false,
            'phones_min' => 0,
            'practices_min' => 0,
            'educations_min' => 0,
            'languages_min' => 0,
            'additional_informations_min' => 0,
            'attachments_min' => 0
         ]);

        $resolver->setRequired([
            'photo_upload_route'
        ]);
    }
}