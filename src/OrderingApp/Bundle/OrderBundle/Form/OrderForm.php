<?php
	namespace OrderingApp\Bundle\OrderBundle\Form;

	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;

	class OrderForm extends AbstractType {
		#region Public

		/**
		 * @param FormBuilderInterface $builder
		 * @param array $options
		 */
		public function buildForm(FormBuilderInterface $builder, array $options) {
			$builder
				->add('name', null, array(
					'label' => 'entity.order.name'
				))->add('email', null, array(
					'label' => 'entity.order.email'
				))->add('address', null, array(
					'label' => 'entity.order.address'
				))->add('contents', null, array(
					'label' => 'entity.order.contents'
				));
		}

		/**
		 * Set default options
		 *
		 * @param OptionsResolver $resolver
		 */
		public function configureOptions(OptionsResolver $resolver) {
			$resolver->setDefaults(array(
				'data_class'			=> 'OrderingApp\Bundle\OrderBundle\Entity\Order',
				'translation_domain'	=> 'OrderBundle'
			));
		}

		# endregion Public
	}