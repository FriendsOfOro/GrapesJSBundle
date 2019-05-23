<?php
namespace HackOro\GrapesJSBundle\Form\Type;

use HackOro\GrapesJSBundle\ContentVariantType\GrapesJSContentVariantType;
use Oro\Component\WebCatalog\Form\PageVariantType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class GrapesJSPageVariantType extends AbstractType
{
    const NAME = 'hackoro_grapesjs_page_variant';

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'grapesjs_page',
                GrapesJSPageSelectType::class,
                [
                    'label' => 'hackoro.grapes_js.entity_label',
                    'required' => true,
                    'constraints' => [new NotBlank()]
                ]
            );
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return PageVariantType::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->getBlockPrefix();
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return self::NAME;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'content_variant_type' => GrapesJSContentVariantType::TYPE,
        ]);
    }
}
