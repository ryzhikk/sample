<?php

namespace CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

class WithdrawRequest
{

    const STATUS_NEW        = 'new';
    const STATUS_PROCESSING = 'processing';
    const STATUS_PROCESSED  = 'processed';
    const STATUS_REJECTED   = 'rejected';

    const TYPE_NORMAL    = 'normal';
    const TYPE_EXPRESS   = 'express';
    const TYPE_AFFILIATE = 'affiliate';
    const TYPE_FAST      = 'fast';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $status;

    /**
     * @Assert\NotBlank(message = "Сashout method can not be empty")
     * @var string
     */
    private $method;

    /**
     * @Assert\NotBlank(message = "Account can not be empty")
     * @var string
     */
    private $account;

    /**
     * @Assert\NotBlank(message = "User can not be empty")
     * @var User
     */
    private $user;


    /**
     * @Assert\NotBlank(message = "Choice the sum for withdraw")
     * @var integer
     */
    private $sum;

    /**
     * @var Collection
     */
    private $logs;

    /**
    * @var \DateTime
    */
    private $dateCreate;

    /**
     * @var string
     */
    private $fullName;

    /**
     * @var integer
     */
    private $bic;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $type = 'normal';

    /**
     * @var \DateTime
     */
    private $dateFinish;

    /**
     * @var boolean
     */
    private $isSecondBalanceInvolved;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->logs = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return WithdrawRequest
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set method
     *
     * @param string $method
     *
     * @return WithdrawRequest
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Get method
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Set account
     *
     * @param string $account
     *
     * @return WithdrawRequest
     */
    public function setAccount($account)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set user
     *
     * @param User $user
     *
     * @return WithdrawRequest
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set sum
     *
     * @param integer $sum
     *
     * @return WithdrawRequest
     */
    public function setSum($sum)
    {
        $this->sum = $sum;

        return $this;
    }

    /**
     * Get sum
     *
     * @return integer
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * Add log
     *
     * @param WithdrawRequestStatusLog $log
     *
     * @return WithdrawRequest
     */
    public function addLog(WithdrawRequestStatusLog $log)
    {
        $this->logs[] = $log;

        return $this;
    }

    /**
     * Remove log
     *
     * @param WithdrawRequestStatusLog $log
     */
    public function removeLog(WithdrawRequestStatusLog $log)
    {
        $this->logs->removeElement($log);
    }

    /**
     * Get logs
     *
     * @return Collection
     */
    public function getLogs()
    {
        return $this->logs;
    }

    public static function getStatusList()
    {
        return [
            self::STATUS_NEW,
            self::STATUS_PROCESSING,
            self::STATUS_PROCESSED,
            self::STATUS_REJECTED,
        ];
    }

    /**
     * Set dateCreate
     *
     * @param \DateTime $dateCreate
     *
     * @return WithdrawRequest
     */
    public function setDateCreate($dateCreate)
    {
        $this->dateCreate = $dateCreate;

        return $this;
    }

    /**
     * Get dateCreate
     *
     * @return \DateTime
     */
    public function getDateCreate()
    {
        return $this->dateCreate;
    }

    public function prePersistEvent()
    {
        $this->setDateCreate(new \DateTime());

    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return WithdrawRequest
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @var string
     */
    private $comment;


    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return WithdrawRequest
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }
    /**
     * @var boolean
     */
    private $isDeleted = false;


    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     *
     * @return WithdrawRequest
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }

    /**
     * Get isDeleted
     *
     * @return boolean
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * Set fullName
     *
     * @param string $fullName
     *
     * @return WithdrawRequest
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set bic
     *
     * @param integer $bic
     *
     * @return WithdrawRequest
     */
    public function setBic($bic)
    {
        $this->bic = $bic;

        return $this;
    }

    /**
     * Get bic
     *
     * @return integer
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return WithdrawRequest
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set dateFinish
     *
     * @param \DateTime $dateFinish
     *
     * @return WithdrawRequest
     */
    public function setDateFinish($dateFinish)
    {
        $this->dateFinish = $dateFinish;

        return $this;
    }

    /**
     * Get dateFinish
     *
     * @return \DateTime
     */
    public function getDateFinish()
    {
        return $this->dateFinish;
    }

    /**
     * Set isSecondBalanceInvolved
     *
     * @param boolean $isSecondBalanceInvolved
     *
     * @return WithdrawRequest
     */
    public function setIsSecondBalanceInvolved($isSecondBalanceInvolved)
    {
        $this->isSecondBalanceInvolved = $isSecondBalanceInvolved;

        return $this;
    }

    /**
     * Get isSecondBalanceInvolved
     *
     * @return boolean
     */
    public function getIsSecondBalanceInvolved()
    {
        return $this->isSecondBalanceInvolved;
    }
}
