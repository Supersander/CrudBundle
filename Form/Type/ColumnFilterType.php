<?php

namespace Opifer\CrudBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ColumnFilterType extends AbstractType
{
    /** @var array */
    protected $columns;

    /**
     * Constructor
     *
     * @param array $columns
     */
    public function __construct(array $columns)
    {
        $this->columns = $columns;
    }

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $columns = [];
        foreach ($this->columns as $column) {
            // Temporarily disable relations
            if (isset($column['joinColumns'])) {
                continue;
            }
            $columns[$column['fieldName']] = $column['fieldName'];
        }

        $builder
            ->add('name')
            ->add('columns', 'choice', [
                'choices' => [$columns],
                'multiple' => true,
                'expanded' => true,
                'required' => true
            ])
            ->add('Save filter', 'submit')
        ;
    }

    /**
     * {@inheritDoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Opifer\CrudBundle\Entity\CrudFilter',
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'columnfilter';
    }
}