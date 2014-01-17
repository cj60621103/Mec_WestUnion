<?php
class Excellence_Pay_Model_Pay extends Mage_Payment_Model_Method_Cc
{
	protected $_code = 'pay';
	protected $_formBlockType = 'pay/form_pay';
	protected $_infoBlockType = 'pay/info_pay';

	// protected $_isGateway               = false;
	// protected $_canAuthorize            = false;
	// protected $_canCapture              = false;
	//protected $_canCapturePartial       = true;
	// protected $_canRefund               = false;


	protected $_canSaveCc = false; //if made try, the actual credit card number and cvv code are stored in database.

	//protected $_canRefundInvoicePartial = true;
	//protected $_canVoid                 = true;
	//protected $_canUseInternal          = true;
	//protected $_canUseCheckout          = true;
	//protected $_canUseForMultishipping  = true;
	//protected $_canFetchTransactionInfo = true;
	//protected $_canReviewPayment        = true;
	
	 public function assignData($data)
    {
        if (!($data instanceof Varien_Object)) {
            $data = new Varien_Object($data);
        }
        $info = $this->getInfoInstance();
        $info->setPaySenderFirstName($data->getPaySenderFirstName())
            ->setPaySenderLastName($data->getPaySenderLastName())
            ->setPayFromCountry($data->getPayFromCountry())
            ->setPayMtcn($data->getPayMtcn())
            ->setPayAmountSent($data->getPayAmountSent())
            ;
        return $this;
    }
	
	public function validate()
    {
		
	}
	
	public function authorize(Varien_Object $payment, $amount)
	{
		return $this;
	}
	
	 public function getCentinelValidationData()
    {
        $info = $this->getInfoInstance();
        $params = new Varien_Object();
        // $params
            // ->setPaymentMethodCode($this->getCode())
            // ->setCardType($info->getCcType())
            // ->setCardNumber($info->getCcNumber())
            // ->setCardExpMonth($info->getCcExpMonth())
            // ->setCardExpYear($info->getCcExpYear())
            // ->setAmount($this->_getAmount())
            // ->setCurrencyCode($this->_getCurrencyCode())
            // ->setOrderNumber($this->_getOrderId());
			
		$params->setPaySenderFirstName($info->getPaySenderFirstName())
            ->setPaySenderLastName($info->getPaySenderLastName())
            ->setPayFromCountry($info->getPayFromCountry())
            ->setPayMtcn($info->getPayMtcn())
            ->setPayAmountSent($info->getPayAmountSent());
        return $params;
    }
	
}
