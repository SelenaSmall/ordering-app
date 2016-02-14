<?php

	namespace OrderingApp\Bundle\OrderBundle\Entity;

	use Doctrine\ORM\Mapping as ORM;
	use Symfony\Component\Validator\Constraints as Validate;

	/**
	 * Order entity
	 *
	 * @ORM\Entity
	 * @ORM\Table(name="orders")
	 */
	class Order {
		# region Properties

		/**
		 * @ORM\Column(type="guid")
		 * @ORM\Id
		 * @ORM\GeneratedValue(strategy="UUID")
		 */
		protected $uuid;

		/**
		 * @ORM\Column(type="string", length=255)
		 * @Validate\NotBlank()
		 * @Validate\Length(max=255)
		 */
		protected $name;

		/**
		 * @ORM\Column(type="string", length=255)
		 * @Validate\NotBlank()
		 * @Validate\Email()
		 * @Validate\Length(max=255)
		 */
		protected $email;

		/**
		 * @ORM\Column(type="text")
		 * @Validate\NotBlank()
		 */
		protected $address;

		/**
		 * @ORM\Column(type="text")
		 * @Validate\NotBlank()
		 */
		protected $contents;

		/**
		 * @ORM\Column(name="created_at", type="datetime", nullable=true)
		 * @var \DateTime
		 */
		protected $createdAt;

		# endregion Properties

		# region Construct

		public function __construct() {
			$this->createdAt = new \DateTime();
		}

		# endregion Construct

		# region Setters

		/**
		 * Set name
		 *
		 * @param string $name
		 * @return $this
		 */
		public function setName($name) {
			$this->name = $name;

			return $this;
		}

		/**
		 * Set email
		 *
		 * @param string $email
		 * @return $this
		 */
		public function setEmail($email) {
			$this->email = $email;

			return $this;
		}

		/**
		 * Set address
		 *
		 * @param string $address
		 * @return $this
		 */
		public function setAddress($address) {
			$this->address = $address;

			return $this;
		}

		/**
		 * Set contents
		 *
		 * @param string $contents
		 * @return $this
		 */
		public function setContents($contents) {
			$this->contents = $contents;

			return $this;
		}

		/**
		 * Set createdAt
		 *
		 * @param \DateTime $createdAt
		 * @return $this
		 */
		public function setCreatedAt(\DateTime $createdAt) {
			$this->createdAt = $createdAt;

			return $this;
		}

		# endregion Setters

		# region Getters

		/**
		 * Get uuid
		 *
		 * @return integer
		 */
		public function getUuid() {
			return $this->uuid;
		}

		/**
		 * Get name
		 *
		 * @return string
		 */
		public function getName() {
			return $this->name;
		}

		/**
		 * Get email
		 *
		 * @return string
		 */
		public function getEmail() {
			return $this->email;
		}

		/**
		 * Get address
		 *
		 * @return string
		 */
		public function getAddress() {
			return $this->address;
		}

		/**
		 * Get contents
		 *
		 * @return string
		 */
		public function getContents() {
			return $this->contents;
		}

		/**
		 * Get createdAt
		 *
		 * @return \DateTime
		 */
		public function getCreatedAt() {
			return $this->createdAt;
		}

		# endregion Getters
	}