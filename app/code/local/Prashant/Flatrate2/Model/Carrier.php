<?php

class Prashant_Flatrate2_Model_Carrier
    extends Mage_Shipping_Model_Carrier_Abstract
    implements Mage_Shipping_Model_Carrier_Interface
{
exit;
    protected $_code = 'flatrate2';
	
	   /**
     * Enter description here...
     *
     * @param Mage_Shipping_Model_Rate_Request $data
     * @return Mage_Shipping_Model_Rate_Result
     */
    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
		$result = Mage::getModel('shipping/rate_result');
		
        $rate = Mage::getModel('shipping/rate_result_method');
     
		$rate->setCarrier($this->_code);
		$rate->setCarrierTitle($this->getConfigData('title'));
		$rate->setMethod($this->_code);
		$rate->setMethodTitle($this->getConfigData('name'));
		$rate->setPrice($this->getConfigData('price'));
		$rate->setCost(0);
		$result->append($rate)
        return $result;
    }

    public function getAllowedMethods()
    {
        return array('flatrate2' => 'Flatrate 2');
    }

}