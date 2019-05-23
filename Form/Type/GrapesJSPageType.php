<?php
namespace HackOro\GrapesJSBundle\Form\Type;

use HackOro\GrapesJSBundle\ContentVariantType\GrapesJSContentVariantType;
use Symfony\Component\Asset\Packages as AssetHelper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GrapesJSPageType extends AbstractType
{
    const NAME = 'grapes_js_page';

    /** @var AssetHelper */
    protected $assetHelper;

    /** @var  string */
    protected $dataClass;

    /**
     * @param AssetHelper $assetHelper
     */
    public function setAssetHelper(AssetHelper $assetHelper)
    {
        $this->assetHelper = $assetHelper;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'title',
                TextType::class,
                [
                    'label' => 'Title',
                    'required' => true,
                ]
            )
            ->add(
                'content',
                HiddenType::class,
                [
                    'label' => 'Content',
                    'required' => false,
                ]
            )
            ->add(
                'css',
                HiddenType::class,
                [
                    'label' => 'CSS',
                    'required' => false,
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => $this->dataClass,
                'content_variant_type' => GrapesJSContentVariantType::TYPE,
            ]
        );
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
     * @param string $dataClass
     */
    public function setDataClass($dataClass)
    {
        $this->dataClass = $dataClass;
    }
}
