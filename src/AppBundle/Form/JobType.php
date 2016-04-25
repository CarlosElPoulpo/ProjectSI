<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('video', VideoType::class, array('label' => 'newjob.form.file', 'translation_domain' => 'AppBundle'))
            ->add('targetFormat', ChoiceType::class, array('choices'  => array('.mp3' => 'mp3','.WMA' => 'WMA'), 'label' => 'newjob.form.targetformat', 'translation_domain' => 'AppBundle', 'empty_data'  => null))
            ->add('save', SubmitType::class, array('label' => 'newjob.form.submit', 'translation_domain' => 'AppBundle'))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Job'
        ));
    }

    public function getName()
    {
        return 'app_bundle_job_form';
    }
}
