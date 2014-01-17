<?php
class Excellence_Pay_Block_Info_Pay extends Mage_Payment_Block_Info
{
	protected function _prepareSpecificInformation($transport = null)
	{
		if (null !== $this->_paymentSpecificInformation) {
			return $this->_paymentSpecificInformation;
		}
		$info = $this->getInfo();
		$transport = new Varien_Object();
		$transport = parent::_prepareSpecificInformation($transport);
		$transport->addData(array(
			Mage::helper('payment')->__('Our Account') => Mage::getStoreConfig('payment/pay/our_account', $store = null),
			Mage::helper('payment')->__('Sender First Name') => $info->getPaySenderFirstName(),
			Mage::helper('payment')->__('Sender Last Name')  => $info->getPaySenderLastName(),
			Mage::helper('payment')->__('Transfer From Country')   => $info->getPayFromCountry(),
			Mage::helper('payment')->__('Money Transfer Control Number (MTCN)') => $info->getPayMtcn(),
			Mage::helper('payment')->__('Amount Sent') => $info->getPayAmountSent(),
		));
		return $transport;
	}
}