<?php

namespace CoreBundle\Entity;

use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;

class User extends BaseUser
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @Assert\NotBlank(message = "Username can not be empty")
     * @Assert\Email(message = "Username is not valid")
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $surName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var float
     */
    protected $balance = 0;

    /**
     * @var Collection
     */
    private $withdrawRequests;

    /**
     * @var boolean
     */
    private $isEmailNotifications = false;

    /**
     * @var boolean
     */
    private $isPhoneNotifications = false;

    /**
     * @var string
     */
    private $facebookId;

    /**
     * @var string
     */
    private $googleId;

    /**
     * @var string
     */
    private $vkId;

    /**
     * @var string
     */
    private $mailruId;

    /**
     * @var \DateTime
     */
    private $registeredAt;

    /**
     * @var User
     */
    private $referrer;

    /**
     * @var Collection
     */
    private $referrals;

    /**
     * @var float
     */
    private $balance_affiliate = 0;

    /**
     * @var AffiliateProgram
     */
    private $affiliateProgram;

    /**
     * @var boolean
     */
    private $gaIsRegistrationSent = 0;

    /**
     * @var string
     */
    private $nickname;

    /**
     * @var Collection
     */
    private $userHashes;

    /*
     * @var string
     */
    private $clientNumber;

    /**
     * @var Collection
     */
    private $personalBonus;

    /**
     * @var array
     */
    private $extra = [];

    /**
     * @var integer
     */
    private $shopId;

    /**
     * @var float
     */
    private $partnerBalance = 0;

    /*
     * @var boolean
     */
    private $gaIsFirstOrderSent = 0;

    /**
     * @var Collection
     */
    private $notifications;

    /**
     * @var integer
     */
    private $affiliateDurationInMonths;

    /**
     * @var float
     */
    private $affiliateRateInPercentFromCommission = 0;

    /**
     * @var string
     */
    private $registerSource;

    /**
     * @var float
     */
    private $partnerDeductionAmount = 0;

    public function __construct()
    {
        parent::__construct();
        $this->registeredAt = new \DateTime();
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
     * Set phone
     *
     * @param string $phone
     *
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set surName
     *
     * @param string $surName
     *
     * @return User
     */
    public function setSurName($surName)
    {
        $this->surName = $surName;

        return $this;
    }

    /**
     * Get surName
     *
     * @return string
     */
    public function getSurName()
    {
        return $this->surName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set balance
     *
     * @param float $balance
     *
     * @return User
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * Get balance
     *
     * @return float
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Add withdrawRequest
     *
     * @param WithdrawRequest $withdrawRequest
     *
     * @return User
     */
    public function addWithdrawRequest(WithdrawRequest $withdrawRequest)
    {
        $this->withdrawRequests[] = $withdrawRequest;

        return $this;
    }

    /**
     * Remove withdrawRequest
     *
     * @param WithdrawRequest $withdrawRequest
     */
    public function removeWithdrawRequest(WithdrawRequest $withdrawRequest)
    {
        $this->withdrawRequests->removeElement($withdrawRequest);
    }

    /**
     * @return WithdrawRequest[]
     */
    public function getWithdrawRequests()
    {
        return $this->withdrawRequests->toArray();
    }

    /**
     * Set isEmailNotifications
     *
     * @param boolean $isEmailNotifications
     *
     * @return User
     */
    public function setIsEmailNotifications($isEmailNotifications)
    {
        $this->isEmailNotifications = $isEmailNotifications;

        return $this;
    }

    /**
     * Get isEmailNotifications
     *
     * @return boolean
     */
    public function getIsEmailNotifications()
    {
        return $this->isEmailNotifications;
    }

    /**
     * Set isPhoneNotifications
     *
     * @param boolean $isPhoneNotifications
     *
     * @return User
     */
    public function setIsPhoneNotifications($isPhoneNotifications)
    {
        $this->isPhoneNotifications = $isPhoneNotifications;

        return $this;
    }

    /**
     * Get isPhoneNotifications
     *
     * @return boolean
     */
    public function getIsPhoneNotifications()
    {
        return $this->isPhoneNotifications;
    }

    /**
     * Set facebookId
     *
     * @param string $facebookId
     *
     * @return User
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;

        return $this;
    }

    /**
     * Get facebookId
     *
     * @return string
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

    /**
     * Set googleId
     *
     * @param string $googleId
     *
     * @return User
     */
    public function setGoogleId($googleId)
    {
        $this->googleId = $googleId;

        return $this;
    }

    /**
     * Get googleId
     *
     * @return string
     */
    public function getGoogleId()
    {
        return $this->googleId;
    }

    /**
     * Set vkId
     *
     * @param string $vkId
     *
     * @return User
     */
    public function setVkId($vkId)
    {
        $this->vkId = $vkId;

        return $this;
    }

    /**
     * Get vkId
     *
     * @return string
     */
    public function getVkId()
    {
        return $this->vkId;
    }

    /**
     * Set mailruId
     *
     * @param string $mailruId
     *
     * @return User
     */
    public function setMailruId($mailruId)
    {
        $this->mailruId = $mailruId;

        return $this;
    }

    /**
     * Get mailruId
     *
     * @return string
     */
    public function getMailruId()
    {
        return $this->mailruId;
    }


    /**
     * Set registeredAt
     *
     * @param \DateTime $registeredAt
     *
     * @return User
     */
    public function setRegisteredAt($registeredAt)
    {
        $this->registeredAt = $registeredAt;

        return $this;
    }

    /**
     * Get registeredAt
     *
     * @return \DateTime
     */
    public function getRegisteredAt()
    {
        return $this->registeredAt;
    }


    /**
     * Set gaIsRegistrationSent
     *
     * @param boolean $gaIsRegistrationSent
     *
     * @return User
     */
    public function setGaIsRegistrationSent($gaIsRegistrationSent)
    {
        $this->gaIsRegistrationSent = $gaIsRegistrationSent;

        return $this;
    }

    /**
     * Get gaIsRegistrationSent
     *
     * @return boolean
     */
    public function getGaIsRegistrationSent()
    {
        return $this->gaIsRegistrationSent;
    }
    /**
     * @var boolean
     */
    private $gaIsRegistrationRedirect = 0;


    /**
     * Set gaIsRegistrationRedirect
     *
     * @param boolean $gaIsRegistrationRedirect
     *
     * @return User
     */
    public function setGaIsRegistrationRedirect($gaIsRegistrationRedirect)
    {
        $this->gaIsRegistrationRedirect = $gaIsRegistrationRedirect;

        return $this;
    }

    /**
     * Get gaIsRegistrationRedirect
     *
     * @return boolean
     */
    public function getGaIsRegistrationRedirect()
    {
        return $this->gaIsRegistrationRedirect;
    }

    /**
     * Set referrer
     *
     * @param User $referrer
     *
     * @return User
     */
    public function setReferrer(User $referrer = null)
    {
        $this->referrer = $referrer;

        return $this;
    }

    /**
     * Get referrer
     *
     * @return User
     */
    public function getReferrer()
    {
        return $this->referrer;
    }

    /**
     * Add referral
     *
     * @param User $referral
     *
     * @return User
     */
    public function addReferral(User $referral)
    {
        $this->referrals[] = $referral;

        return $this;
    }

    /**
     * Remove referral
     *
     * @param User $referral
     */
    public function removeReferral(User $referral)
    {
        $this->referrals->removeElement($referral);
    }

    /**
     * Get referrals
     *
     * @return Collection
     */
    public function getReferrals()
    {
        return $this->referrals;
    }

    /**
     * Set balanceAffiliate
     *
     * @param float $balanceAffiliate
     *
     * @return User
     */
    public function setBalanceAffiliate($balanceAffiliate)
    {
        $this->balance_affiliate = $balanceAffiliate;

        return $this;
    }

    /**
     * Get balanceAffiliate
     *
     * @return float
     */
    public function getBalanceAffiliate()
    {
        return $this->balance_affiliate;
    }

    /**
     * Set affiliateProgram
     *
     * @param AffiliateProgram $affiliateProgram
     *
     * @return User
     */
    public function setAffiliateProgram(AffiliateProgram $affiliateProgram = null)
    {
        $this->affiliateProgram = $affiliateProgram;

        return $this;
    }

    /**
     * Get affiliateProgram
     *
     * @return AffiliateProgram
     */
    public function getAffiliateProgram()
    {
        return $this->affiliateProgram;
    }

    /**
    * Set nickname
    *
    * @param string $nickname
    *
    * @return User
    */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get nickname
     *
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Add userHash
     *
     * @param UserHash $userHash
     *
     * @return User
     */
    public function addUserHash(UserHash $userHash)
    {
        $this->userHashes[] = $userHash;

        return $this;
    }

    /**
     * Remove userHash
     *
     * @param UserHash $userHash
     */
    public function removeUserHash(UserHash $userHash)
    {
        $this->userHashes->removeElement($userHash);
    }

    /**
     * Get userHashes
     *
     * @return Collection
     */
    public function getUserHashes()
    {
        return $this->userHashes;
    }

    /*
     * Set clientNumber
     *
     * @param string $clientNumber
     *
     * @return User
     */
    public function setClientNumber($clientNumber)
    {
        $this->clientNumber = $clientNumber;
        return $this;
    }

    /*
     * Get clientNumber
     *
     * @return string
     */
    public function getClientNumber()
    {
        return $this->clientNumber;
    }

    /**
     * @var float
     */
    private $balanceExpressWithdraw = 0;


    /**
     * Set balanceExpressWithdraw
     *
     * @param float $balanceExpressWithdraw
     *
     * @return User
     */
    public function setBalanceExpressWithdraw($balanceExpressWithdraw)
    {
        $this->balanceExpressWithdraw = $balanceExpressWithdraw;

        return $this;
    }

    /**
     * Get balanceExpressWithdraw
     *
     * @return float
     */
    public function getBalanceExpressWithdraw()
    {
        return $this->balanceExpressWithdraw;
    }

    /**
     * Add personalBonus
     *
     * @param PersonalBonus $personalBonus
     *
     * @return User
     */
    public function addPersonalBonus(PersonalBonus $personalBonus)
    {
        $this->personalBonus[] = $personalBonus;

        return $this;
    }

    /**
     * Remove personalBonus
     *
     * @param PersonalBonus $personalBonus
     */
    public function removePersonalBonus(PersonalBonus $personalBonus)
    {
        $this->personalBonus->removeElement($personalBonus);
    }

    /**
     * Get personalBonus
     *
     * @return Collection
     */
    public function getPersonalBonus()
    {
        return $this->personalBonus;
    }

    /**
     * Set shopId
     *
     * @param integer $shopId
     *
     * @return User
     */
    public function setShopId($shopId)
    {
        $this->shopId = $shopId;

        return $this;
    }

    /**
     * Get shopId
     *
     * @return integer
     */
    public function getShopId()
    {
        return $this->shopId;
    }


    /**
     * Set extra
     *
     * @param array $extra
     *
     * @return User
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;

        return $this;
    }

    /**
     * Get extra
     *
     * @return array
     */
    public function getExtra()
    {
        return $this->extra;
    }
    /**
     * @var boolean
     */
    private $maxCashbackEnabled = 0;


    /**
     * Set maxCashbackEnabled
     *
     * @param boolean $maxCashbackEnabled
     *
     * @return User
     */
    public function setMaxCashbackEnabled($maxCashbackEnabled)
    {
        $this->maxCashbackEnabled = $maxCashbackEnabled;

        return $this;
    }

    /**
     * Get maxCashbackEnabled
     *
     * @return boolean
     */
    public function getMaxCashbackEnabled()
    {
        return $this->maxCashbackEnabled;
    }

    /**
     * Set partnerBalance
     *
     * @param float $partnerBalance
     *
     * @return User
     */
    public function setPartnerBalance($partnerBalance)
    {
        $this->partnerBalance = $partnerBalance;
    }

    /*
     * Add notification
     *
     * @param UserNotification $notification
     *
     * @return User
     */
    public function addNotification(UserNotification $notification)
    {
        $this->notifications[] = $notification;

        return $this;
    }

    /**
     * Get partnerBalance
     *
     * @return float
     */
    public function getPartnerBalance()
    {
        return $this->partnerBalance;
    }

    /*
     * Remove notification
     *
     * @param UserNotification $notification
     */
    public function removeNotification(UserNotification $notification)
    {
        $this->notifications->removeElement($notification);
    }

    /**
     * Get notifications
     *
     * @return Collection
     */
    public function getNotifications()
    {
        return $this->notifications;
    }

    /**
     * Set gaIsFirstOrderSent
     *
     * @param boolean $gaIsFirstOrderSent
     *
     * @return User
     */
    public function setGaIsFirstOrderSent($gaIsFirstOrderSent)
    {
        $this->gaIsFirstOrderSent = $gaIsFirstOrderSent;

        return $this;
    }

    /**
     * Get gaIsFirstOrderSent
     *
     * @return boolean
     */
    public function getGaIsFirstOrderSent()
    {
        return $this->gaIsFirstOrderSent;
    }

    /**
     * @var float
     */
    private $secondBalance = 0;


    /**
     * Set secondBalance
     *
     * @param float $secondBalance
     *
     * @return User
     */
    public function setSecondBalance($secondBalance)
    {
        $this->secondBalance = $secondBalance;

        return $this;
    }

    /**
     * Get secondBalance
     *
     * @return float
     */
    public function getSecondBalance()
    {
        return $this->secondBalance;
    }

    /**
     * Set affiliateDurationInMonths
     *
     * @param integer $affiliateDurationInMonths
     *
     * @return User
     */
    public function setAffiliateDurationInMonths($affiliateDurationInMonths)
    {
        $this->affiliateDurationInMonths = $affiliateDurationInMonths;

        return $this;
    }

    /**
     * Get affiliateDurationInMonths
     *
     * @return integer
     */
    public function getAffiliateDurationInMonths()
    {
        return $this->affiliateDurationInMonths;
    }

    /**
     * Set affiliateRateInPercentFromCommission
     *
     * @param float $affiliateRateInPercentFromCommission
     *
     * @return User
     */
    public function setAffiliateRateInPercentFromCommission($affiliateRateInPercentFromCommission)
    {
        $this->affiliateRateInPercentFromCommission = $affiliateRateInPercentFromCommission;

        return $this;
    }

    /**
     * Get affiliateRateInPercentFromCommission
     *
     * @return float
     */
    public function getAffiliateRateInPercentFromCommission()
    {
        return $this->affiliateRateInPercentFromCommission;
    }

    /**
     * Set registerSource
     *
     * @param string $registerSource
     *
     * @return User
     */
    public function setRegisterSource($registerSource)
    {
        $this->registerSource = $registerSource;

        return $this;
    }

    /**
     * Get registerSource
     *
     * @return string
     */
    public function getRegisterSource()
    {
        return $this->registerSource;
    }

    /**
     * Set partnerDeductionAmount
     *
     * @param float $partnerDeductionAmount
     *
     * @return User
     */
    public function setPartnerDeductionAmount($partnerDeductionAmount)
    {
        $this->partnerDeductionAmount = $partnerDeductionAmount;

        return $this;
    }

    /**
     * Get partnerDeductionAmount
     *
     * @return float
     */
    public function getPartnerDeductionAmount()
    {
        return $this->partnerDeductionAmount;
    }
}
