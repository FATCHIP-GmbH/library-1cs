<?php
/**
 * The First Cash Solution Shopware Plugin is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * The First Cash Solution Shopware Plugin is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with First Cash Solution Shopware Plugin. If not, see <http://www.gnu.org/licenses/>.
 *
 * PHP version 5.6, 7.0 , 7.1
 *
 * @category   Payment
 * @package    FatchipFCSPayment
 * @subpackage CTPaymentMethods
 * @author     FATCHIP GmbH <support@fatchip.de>
 * @copyright  2018 First Cash Solution
 * @license    <http://www.gnu.org/licenses/> GNU Lesser General Public License
 * @link       https://www.computop.com
 */

namespace Fatchip\FCSPayment\CTHelper;

use Exception;
use Fatchip\FCSPayment\CTOrder\CTOrder;
use Shopware\Plugins\FatchipFCSPayment\Util;


/**
 * @package Fatchip\FCSPayment\CTPaymentMethods
 * @property Util $utils
 */
trait KlarnaPayments
{
    public function needNewKlarnaSession()
    {
        /** @var CTOrder $ctOrder */
        $ctOrder = $this->utils->createCTOrder();
        /** @var \Fatchip\FCSPayment\CTPaymentMethods\KlarnaPayments $payment */
        $session = Shopware()->Session();

        $sessionAmount = $session->get('FatchipFCSKlarnaPaymentAmount', '');
        $currentAmount = (int) $ctOrder->getAmount();
        $amountChanged = $currentAmount !== $sessionAmount;

        $sessionArticleListBase64 = $session->get('FatchipFCSKlarnaPaymentArticleListBase64', '');
        $currentArticleListBase64 = $this->createArticleListBase64();
        $articleListChanged = $sessionArticleListBase64 !== $currentArticleListBase64;

        $sessionAddressHash = $session->get('FatchipFCSKlarnaPaymentAddressHash', '');
        $currentAddressHash = $this->createAddressHash();
        $addressChanged = $sessionAddressHash !== $currentAddressHash;

        $sessionDispatch = $session->get('FatchipFCSKlarnaPaymentDispatchID', '');
        $currentDispatch = $session->offsetGet('sDispatch');
        $dispatchChanged = $sessionDispatch != $currentDispatch;

        return !$session->offsetExists('FatchipFCSKlarnaAccessToken')
            || $amountChanged
            || $articleListChanged
            || $addressChanged
            || $dispatchChanged;
    }

    /**
     * @return \Fatchip\FCSPayment\CTPaymentMethods\KlarnaPayments
     */
    public function createCTKlarnaPayment()
    {
        $userData = Shopware()->Modules()->Admin()->sGetUserData();
        $paymentName = $userData['additional']['payment']['name'];

        $payTypes = [
            'pay_now' => 'pay_now',
            'pay_later' => 'pay_later',
            'slice_it' => 'pay_over_time',
            'direct_bank_transfer' => 'direct_bank_transfer',
            'direct_debit' => 'direct_debit',
        ];

        // set payType to correct value
        foreach ($payTypes as $key => $value) {
            $length = strlen($key);
            if (substr($paymentName, -$length) === $key) {
                $payType = $value;
                break;
            }
        }

        if (!isset($payType)) {
            return null;
        }

        $articleList = $this->createArticleListBase64();
        $taxAmount = $this->calculateTaxAmount($articleList);

        $URLConfirm = Shopware()->Front()->Router()->assemble([
            'controller' => 'checkout',
            'action' => 'finish',
            'forceSecure' => true,
        ]);

        $ctOrder = $this->utils->createCTOrder();

        if (!$ctOrder instanceof CTOrder) {
            return null;
        }

        $klarnaAccount = $this->config['klarnaaccount'];

        $params = $this->getKlarnaSessionRequestParams(
            $taxAmount,
            $articleList,
            $URLConfirm,
            $payType,
            $klarnaAccount,
            $userData['additional']['country']['countryiso'],
            (int) $ctOrder->getAmount(),
            $ctOrder->getCurrency(),
            \Fatchip\FCSPayment\CTPaymentMethods\KlarnaPayments::generateTransID(),
            Util::getRemoteAddress());

        return $params;
    }

    public function cleanSessionVars()
    {
        $session = Shopware()->Session();
        $sessionVars = [
            'FatchipFCSKlarnaPaymentSessionResponsePayID',
            'FatchipFCSKlarnaPaymentSessionResponseTransID',
            'FatchipFCSKlarnaPaymentTokenExt',
            'FatchipFCSKlarnaPaymentArticleListBase64',
            'FatchipFCSKlarnaPaymentAmount',
            'FatchipFCSKlarnaPaymentAddressHash',
            'FatchipFCSKlarnaPaymentHash',
            'FatchipFCSKlarnaAccessToken',
            'FatchipFCSKlarnaPaymentDispatchID',
            'FCSError',
        ];

        foreach ($sessionVars as $sessionVar) {
            $session->offsetUnset($sessionVar);
        }
    }

    /**
     * Calculates the Klarna tax amount by adding the tax amounts of each position in the article list.
     *
     * @param $articleList
     *
     * @return float
     */
    public static function calculateTaxAmount($articleList)
    {
        $taxAmount = 0;
        $articleList = json_decode(base64_decode($articleList), true);
        foreach ($articleList['order_lines'] as $article) {
            $itemTaxAmount = $article['total_tax_amount'];
            $taxAmount += $itemTaxAmount;
        }

        return $taxAmount;
    }

    /**
     * Creates an md5 hash from current billing and shipping addresses.
     *
     * @return string
     */
    public static function createAddressHash()
    {
        $userData = Shopware()->Modules()->Admin()->sGetUserData();

        /** @var string $address */
        $address = md5(serialize($userData['billingaddress']) . serialize($userData['shippingaddress']));

        return $address;
    }

    /**
     * @param int $digitCount Optional parameter for the length of resulting
     *                        transID. The default value is 12.
     *
     * @return string The transID with a length of $digitCount.
     */
    public static function generateTransID($digitCount = 12)
    {
        mt_srand((double)microtime() * 1000000);

        $transID = (string)mt_rand();
        // y: 2 digits for year
        // m: 2 digits for month
        // d: 2 digits for day of month
        // H: 2 digits for hour
        // i: 2 digits for minute
        // s: 2 digits for second
        $transID .= date('ymdHis');
        // $transID = md5($transID);
        $transID = substr($transID, 0, $digitCount);

        return $transID;
    }

    /**
     * Creates the Klarna article list. The list is json and then base64 encoded.
     *
     * @return string
     */
    public function createArticleListBase64()
    {
        $articleListArray = [];
        $userData = $this->getUserData(); // new
        $chargeVat = $userData['additional']['charge_vat'];

        try {
            foreach (Shopware()->Modules()->Basket()->sGetBasket()['content'] as $item) {
                $quantity = (int)$item['quantity'];
                $itemTaxAmount = $chargeVat ? (int) round(str_replace(',', '.', $item['tax']) * 100) : 0;
                if (!empty($item['amountWithTax'])) {
                    $totalAmount = $chargeVat ? (int) round(str_replace(',', '.', $item['amountWithTax']) * 100) :  (int) ($item['amountnetNumeric'] * 100);
                    $unit_price = $chargeVat ? (int) round(($item['amountWithTax'] * 100 / $quantity)) : (int) ($item['netprice'] * 100);
                } else {
                    $totalAmount = $chargeVat ? (int) round(str_replace(',', '.', $item['amountNumeric']) * 100) :  (int) ($item['amountnetNumeric'] * 100);
                    $unit_price = $chargeVat ? (int) round(($item['priceNumeric'] * 100)) : (int) ($item['netprice'] * 100);
                }
                $articleListArray['order_lines'][] = [
                    'name' => $item['articlename'],
                    'quantity' => $quantity,
                    'unit_price' => $unit_price,
                    'total_amount' => (int) $totalAmount,
                    'tax_rate' => $chargeVat ? (int) ($item['tax_rate'] * 100) : 0,
                    'total_tax_amount' => (int) $itemTaxAmount,
                ];
            }
        } catch (Exception $e) {
            return '';
        }

        $shippingCosts = Shopware()->Modules()->Admin()->sGetPremiumShippingcosts();

        if ($shippingCosts >= 0) {
            $articleListArray['order_lines'][] = [
                'name' => 'shippingcosts',
                'quantity' => 1,
                'unit_price' => $chargeVat ? (int) ($shippingCosts['brutto'] * 100) : (int) ($shippingCosts['netto'] * 100) ,
                'total_amount' => $chargeVat ? (int) ($shippingCosts['brutto'] * 100) : (int) ($shippingCosts['netto'] * 100) ,
                'tax_rate' => $chargeVat ? (int) ($shippingCosts['tax'] * 100) : 0,
                'total_tax_amount' => $chargeVat ? (int) (($shippingCosts['brutto'] - $shippingCosts['netto']) * 100) : 0 ,
            ];
        }

        /** @var string $articleList */
        $articleList = base64_encode(json_encode($articleListArray));

        return $articleList;
    }

    /**
     * @return array
     * @deprecated in 5.6, will be protected in 5.8
     *
     * Get complete user-data as an array to use in view
     *
     */
    public function getUserData()
    {
        $system = Shopware()->System();
        $userData = Shopware()->Modules()->Admin()->sGetUserData();
        if (!empty($userData['additional']['countryShipping'])) {
            $system->sUSERGROUPDATA = Shopware()->Db()->fetchRow('
                SELECT * FROM s_core_customergroups
                WHERE groupkey = ?
            ', [$system->sUSERGROUP]);

            $taxFree = $this->isTaxFreeDelivery($userData);

            if ($taxFree) {
                $system->sUSERGROUPDATA['tax'] = 0;
                $system->sCONFIG['sARTICLESOUTPUTNETTO'] = 1; // Old template
                Shopware()->Session()->set('sUserGroupData', $system->sUSERGROUPDATA);
                $userData['additional']['charge_vat'] = false;
                $userData['additional']['show_net'] = false;
                Shopware()->Session()->set('sOutputNet', true);
            } else {
                $userData['additional']['charge_vat'] = true;
                $userData['additional']['show_net'] = !empty($system->sUSERGROUPDATA['tax']);
                Shopware()->Session()->set('sOutputNet', empty($system->sUSERGROUPDATA['tax']));
            }
        }

        return $userData;
    }

    /**
     * Validates if the provided customer should get a tax free delivery
     *
     * @param array $userData
     *
     * @return bool
     */
    protected function isTaxFreeDelivery($userData)
    {
        if (!empty($userData['additional']['countryShipping']['taxfree'])) {
            return true;
        }

        if (empty($userData['additional']['countryShipping']['taxfree_ustid'])) {
            return false;
        }

        // new
        if (empty($userData['shippingaddress']['ustid'])
            && !empty($userData['billingaddress']['ustid'])
            && !empty($userData['additional']['country']['taxfree_ustid'])) {
            return true;
        }

        return !empty($userData['shippingaddress']['ustid']);
    }
}
