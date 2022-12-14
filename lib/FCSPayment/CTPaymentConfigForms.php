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
 * @author     FATCHIP GmbH <support@fatchip.de>
 * @copyright  2018 First Cash Solution
 * @license    <http://www.gnu.org/licenses/> GNU Lesser General Public License
 * @link       https://www.computop.com
 */

namespace Fatchip\FCSPayment;
/**
 * Class CTPaymentConfigForms
 * @package Fatchip\FCSPayment
 */
class CTPaymentConfigForms
{
    const formGeneralTextElements =
        [
            'merchantID' => [
                'name' => 'merchantID',
                'type' => 'text',
                'value' => '',
                'label' => 'MerchantID',
                'required' => true,
                'description' => '{s name="backend/FatchipFCSPayment/merchantid_desc"}Ihre Merchant Id (Benutzername){/s}',
            ],
            'mac' => [
                'name' => 'mac',
                'type' => 'text',
                'value' => '',
                'label' => 'MAC',
                'required' => true,
                'description' => 'Ihr HMAC-Key',
            ],
            'blowfishPassword' => [
                'name' => 'blowfishPassword',
                'type' => 'text',
                'value' => '',
                'label' => 'Blowfish Password',
                'required' => true,
                'description' => 'Ihr Verschl??sselungs-Passwort',
            ],
            'prefixOrdernumber' => [
                'name' => 'prefixOrdernumber',
                'type' => 'text',
                'value' => '',
                'label' => 'Bestellnummer Pr??fix',
                'required' => false,
                'description' => 'Pr??fix f??r Bestellnummern. Sie k??nnen folgende Platzhalter verwenden: %transid% , %payid%, %xid%',
            ],
            'suffixOrdernumber' => [
                'name' => 'suffixOrdernumber',
                'type' => 'text',
                'value' => '',
                'label' => 'Bestellnummer Suffix',
                'required' => false,
                'description' => 'Suffix f??r Bestellnummern. Sie k??nnen folgende Platzhalter verwenden: %transid% , %payid%, %xid%',
            ],
        ];

    const formGeneralSelectElements =
        [
            'debuglog' => [
                'name' => 'debuglog',
                'type' => 'select',
                'value' => 'inactive',
                'label' => 'Debug Protokoll',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['inactive', [
                            'de_DE' => 'keine Protokollierung',
                            'en_GB' => 'disable logging',
                            'fr_FR' => 'd??sactiver la journalisation',
                        ]],
                        ['active', [
                            'de_DE' => 'Protokollierung',
                            'en_GB' => 'enable logging',
                            'fr_FR' => 'activer la journalisation',
                        ]],
                        ['extended', [
                            'de_DE' => 'erweiterte Protokollierung',
                            'en_GB' => 'enable extra logging',
                            'fr_FR' => 'activer la journalisation suppl??mentaire',
                        ]],
                    ],
                'description' => 'Erzeugt eine Log Datei <FatchipFCSPayment_.log> mit Debug Ausgaben im Shopware Protokollverzeichnis.<BR>',
           ],
        ];

    const formCreditCardSelectElements =
        [
            'creditCardMode' => [
                'name' => 'creditCardMode',
                'type' => 'select',
                'value' => 'IFRAME',
                'label' => 'Kreditkarte - Modus',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['IFRAME', 'IFrame'],
                        ['SILENT', 'Silent Mode'],
                        ['PAYMENTPAGE', 'Payment Page'],
                    ],
                'description' => '<b>IFrame</b>: Kreditkartendaten werden nach klick auf "Zahlungsplichtig bestellen" in einem IFrame eingegeben<BR>
                                  <b>Silent Mode</b>: Kreditkartendaten werden auf der Seite "Pr??fen und Bestellen" eingegeben.<BR>
                                  <b>Payment Page</b>: Kreditkartendaten werden nach klick auf "Zahlungsplichtig bestellen" in einem blanken Fenster eingegeben<BR>'
            ],
            'creditCardTestMode' => [
                'name' => 'creditCardTestMode',
                'type' => 'select',
                'value' => 1,
                'label' => 'Kreditkarte - Test-Modus',
                'required' => false,
                'editable' => false,
                'store' =>
                [
                    [0, [
                        'de_DE' => 'inaktiv',
                        'en_GB' => 'disabled',
                        'fr_FR' => 'd??sactiv??',
                    ]],
                    [1, [
                        'de_DE' => 'aktiv',
                        'en_GB' => 'enabled',
                        'fr_FR' => 'activ??',
                    ]],
                ],
            ],
            'creditCardSilentModeBrandsVisa' => [
                'name' => 'creditCardSilentModeBrandsVisa',
                'type' => 'select',
                'value' => 1,
                'label' => 'Kreditkarte - Visa (Silent Mode)',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        [0, [
                            'de_DE' => 'inaktiv',
                            'en_GB' => 'disabled',
                            'fr_FR' => 'd??sactiv??',
                        ]],
                        [1, [
                            'de_DE' => 'aktiv',
                            'en_GB' => 'enabled',
                            'fr_FR' => 'activ??',
                        ]],
                    ],
            ],
            'creditCardSilentModeBrandsMaster' => [
                'name' => 'creditCardSilentModeBrandsMaster',
                'type' => 'select',
                'value' => 1,
                'label' => 'Kreditkarte - MasterCard (Silent Mode)',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        [0, [
                            'de_DE' => 'inaktiv',
                            'en_GB' => 'disabled',
                            'fr_FR' => 'd??sactiv??',
                        ]],
                        [1, [
                            'de_DE' => 'aktiv',
                            'en_GB' => 'enabled',
                            'fr_FR' => 'activ??',
                        ]],
                    ],
            ],
            'creditCardSilentModeBrandsAmex' => [
                'name' => 'creditCardSilentModeBrandsAmex',
                'type' => 'select',
                'value' => 1,
                'label' => 'Kreditkarte - American Express (Silent Mode)',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        [0, [
                            'de_DE' => 'inaktiv',
                            'en_GB' => 'disabled',
                            'fr_FR' => 'd??sactiv??',
                        ]],
                        [1, [
                            'de_DE' => 'aktiv',
                            'en_GB' => 'enabled',
                            'fr_FR' => 'activ??',
                        ]],
                    ],
            ],
            'creditCardCaption' => [
                'name' => 'creditCardCaption',
                'type' => 'select',
                'value' => 'AUTO',
                'label' => 'Kreditkarte - Capture Modus',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['AUTO', [
                            'de_DE' => 'Automatisch',
                            'en_GB' => 'automatic',
                            'fr_FR' => 'automatique',
                        ]],
                        ['MANUAL', [
                            'de_DE' => 'Manuell',
                            'en_GB' => 'manual',
                            'fr_FR' => 'manuel',
                        ]],
                    ],
                'description' => '<b>AUTO</b>: Reservierte Betr??ge werden sofort automatisch eingezogen.<BR>
                                  <b>MANUAL</b>: Geldeinz??ge werden von Ihnen manuell im Shopbackend durchgef??hrt.',
            ],
            'creditCardAcquirer' => [
                'name' => 'creditCardAcquirer',
                'type' => 'select',
                'value' => 'GICC',
                'label' => 'Kreditkarte - Acquirer',
                'required' => 'true',
                'editable' => false,
                'store' =>
                    [
                        ['GICC', 'GICC'],
                        ['CAPN', 'CAPN'],
                        ['Omnipay', 'Omnipay'],
                    ],
                'description' => '<b>GICC</b>: Concardis, B+S Card Service, EVO Payments, American Express, Elavon, SIX Payment Service<BR>
                                  <b>CAPN</b>: American Express<BR>
                                  <b>Omnipay</b>: EMS payment solutions, Global Payments, Paysquare',
            ],
            'creditCardAccVerify' => [
                'name' => 'creditCardAccVerify',
                'type' => 'select',
                'value' => 0,
                'label' => 'Kreditkarte - Kontoverifizierung anfordern ',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        [0, [
                            'de_DE' => 'inaktiv',
                            'en_GB' => 'disabled',
                            'fr_FR' => 'd??sactiv??',
                        ]],
                        [1, [
                            'de_DE' => 'aktiv',
                            'en_GB' => 'enabled',
                            'fr_FR' => 'activ??',
                        ]],
                    ],
                'description' => 'Indikator f??r Anforderung einer Kontoverifizierung (alias Nullwert-Authorisierung). <BR>
                                  Bei einer angeforderten Kontoverifizierung ist der ??bermittelte Betrag optional und <BR>
                                  wird f??r die tats??chliche Zahlungstransaktion ignoriert (z.B. Autorisierung).',
            ],
        ];

    const formCreditCardNumberElements =
        [
        ];

    const formCreditCardTextElements =
        [
            'creditCardTemplate' => [
                'name' => 'creditCardTemplate',
                'type' => 'text',
                'value' => '1cs_cards_v1',
                'label' => 'Kreditkarte - Template Name',
                'required' => false,
                'description' => 'Name der XSLT-Datei mit Ihrem individuellen Layout f??r das Bezahlformular. Wenn Sie das Responsive First Cash Solution-Template f??r mobile Endger??te nutzen m??chten, ??bergeben Sie den Templatenamen ???1cs_cards_v1???.',
            ],
        ];

    const formIdealSelectElements =
        [
            'idealDirektOderUeberSofort' => [
                'name' => 'idealDirektOderUeberSofort',
                'type' => 'select',
                'value' => 'DIREKT',
                'label' => 'iDEAL - Dienst',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['DIREKT', 'iDEAL Direkt'],
                        ['PPRO', 'via PPRO'],
                    ],
                'description' => 'Ideal Zahlungen k??nnen direkt ??ber Ideal oder ??ber PPRO abgewickelt werden',
            ],
        ];


    const formLastschriftSelectElements =
        [
            'lastschriftDienst' => [
                'name' => 'lastschriftDienst',
                'type' => 'select',
                'value' => 'DIREKT',
                'label' => 'Lastschrift - Dienst',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['DIREKT', [
                            'de_DE' => 'Direktanbindung',
                            'en_GB' => 'direct',
                            'fr_FR' => 'direct',
                        ]],
                        /*
                        ['EVO', [
                            'de_DE' => 'EVO Payments',
                            'en_GB' => 'EVO Payments',
                            'fr_FR' => 'EVO Payments',
                        ]],
                        ['INTERCARD', [
                            'de_DE' => 'Intercard',
                            'en_GB' => 'Intercard',
                            'fr_FR' => 'Intercard',
                        ]],
                        */
                    ],
                'description' => 'Lastschrift Zahlungen k??nnen direkt, ??ber EVO oder ??ber INTERCARD abgewickelt werden.',
            ],
            'lastschriftCaption' => [
                'name' => 'lastschriftCaption',
                'type' => 'select',
                'value' => 'AUTO',
                'label' => 'Lastschrift - Capture Modus',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['AUTO', [
                            'de_DE' => 'Automatisch',
                            'en_GB' => 'automatic',
                            'fr_FR' => 'automatique',
                        ]],
                        ['MANUAL', [
                            'de_DE' => 'Manuell',
                            'en_GB' => 'manual',
                            'fr_FR' => 'manuel',
                        ]],
                    ],
                'description' => '<b>AUTO</b>: Reservierte Betr??ge werden sofort automatisch eingezogen.<BR>
                            <b>MANUAL</b>: Geldeinz??ge werden von Ihnen manuell im Shopbackend durchgef??hrt.',
            ],
            'lastschriftAnon' => [
                'name' => 'lastschriftAnon',
                'type' => 'select',
                'value' => 'Aus',
                'label' => 'Iban anonymisieren',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['Aus', [
                            'de_DE' => 'Aus',
                            'en_GB' => 'off',
                            'fr_FR' => 'off',
                        ]],
                        ['An', [
                            'de_DE' => 'An',
                            'en_GB' => 'on',
                            'fr_FR' => 'on',
                        ]],
                    ],
                'description' => 'Stellt im Checkout und im Mein Konto Bereich die Iban anonymisiert dar',
            ],
        ];

    const formLastschriftNumberElements =
        [
        ];

    const formPayDirektTextElements =
        [
            'payDirektShopApiKey' => [
                'name' => 'payDirektShopApiKey',
                'type' => 'text',
                'value' => '',
                'label' => 'Paydirekt - Shop Api Key',
                'required' => false,
                'description' => 'Ihr Paydirekt Api Schl??ssel',
            ],
        ];

    const formPayDirektSelectElements =
        [
            'payDirektCaption' => [
                'name' => 'payDirektCaption',
                'type' => 'select',
                'value' => 'AUTO',
                'label' => 'Paydirekt - Capture Modus',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['AUTO', [
                            'de_DE' => 'Automatisch',
                            'en_GB' => 'automatic',
                            'fr_FR' => 'automatique',
                        ]],
                        ['MANUAL', [
                            'de_DE' => 'Manuell',
                            'en_GB' => 'manual',
                            'fr_FR' => 'manuel',
                        ]],
                    ],
                'description' => '<b>AUTO</b>: Reservierte Betr??ge werden sofort automatisch eingezogen.<BR>
                                  <b>MANUAL</b>: Geldeinz??ge werden von Ihnen manuell im Shopbackend durchgef??hrt.',
            ],
        ];

    const formPayDirektNumberElements =
        [
        ];

    const formPayPalSelectElements =
        [
            'paypalCaption' => [
                'name' => 'paypalCaption',
                'type' => 'select',
                'value' => 'AUTO',
                'label' => 'Paypal - Capture Modus',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['AUTO', [
                            'de_DE' => 'Automatisch',
                            'en_GB' => 'automatic',
                            'fr_FR' => 'automatique',
                        ]],
                        ['MANUAL', [
                            'de_DE' => 'Manuell',
                            'en_GB' => 'manual',
                            'fr_FR' => 'manuel',
                        ]],
                    ],
                'description' => 'bestimmt, ob der angefragte Betrag sofort oder erst sp??ter eingezogen wird. <br>
                                  <b>Wichtig:<br>Bitte kontaktieren Sie den First Cash Solution Support f??r Manual, um die unterschiedlichen Einsatzm??glichkeiten abzukl??ren.</b>',
            ],
            'paypalSetOrderStatus' => [
                'name' => 'paypalSetOrderStatus',
                'type' => 'select',
                'value' => 'Aus',
                'label' => 'Paypal - Bestellstatus bei Capture',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['Aus', [
                            'de_DE' => 'Aus',
                            'en_GB' => 'off',
                            'fr_FR' => 'off',
                        ]],
                        ['An', [
                            'de_DE' => 'An',
                            'en_GB' => 'on',
                            'fr_FR' => 'on',
                        ]],
                    ],
                'description' => 'Wenn diese Option An ist, dann wird der Bestellstatus bei Paypal Bestellungen,<br>bei denen der Capture fehlschl??gt, auf "Kl??rung notwendig" gesetzt"  <br>',
            ],
        ];

    const formAmazonTextElements =
        [
            'amazonSellerId' => [
                'name' => 'amazonSellerId',
                'type' => 'text',
                'value' => '',
                'label' => 'AmazonPay - SellerId',
                'required' => false,
                'description' => 'Ihre Amazonpay SellerId',
            ],
            'amazonClientId' => [
                'name' => 'amazonClientId',
                'type' => 'text',
                'value' => '',
                'label' => 'AmazonPay - ClientId',
                'required' => false,
                'description' => 'Ihre Amazonpay ClientId',
            ],

        ];

    const formAmazonSelectElements =
        [
            'amazonLiveMode' => [
                'name' => 'amazonLiveMode',
                'type' => 'select',
                'value' => 'Test',
                'label' => 'Amazon Modus',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['Live', 'Live'],
                        ['Test', 'Test'],
                    ],
                'description' => 'AmazonPay im Live oder Testmodus benutzen',
            ],
            'amazonCaptureType' => [
                'name' => 'amazonCaptureType',
                'type' => 'select',
                'value' => 'AUTO',
                'label' => 'Amazon Capture Modus',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['AUTO', [
                            'de_DE' => 'Automatisch',
                            'en_GB' => 'automatic',
                            'fr_FR' => 'automatique',
                        ]],
                        ['MANUAL', [
                            'de_DE' => 'Manuell',
                            'en_GB' => 'manual',
                            'fr_FR' => 'manuel',
                        ]],
                    ],
                'description' => '<b>Automatisch</b>: Reservierte Betr??ge werden automatisch eingezogen.<BR>
                                  <b>Manuell</b>: Geldeinz??ge werden von Ihnen manuell im Shopbackend durchgef??hrt.',
            ],
            'amazonButtonType' => [
                'name' => 'amazonButtonType',
                'type' => 'select',
                'value' => 'PwA',
                'label' => '<a href="https://pay.amazon.com/de/developer/documentation/lpwa/201952050#ENTER_TYPE_PARAMETER" rel="noopener" target="_blank">AmazonPay - Button Typ</a>',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['PwA', 'Amazon Pay (Default)'],
                        ['Pay', 'Pay'],
                        ['A', 'A'],
                        ['LwA', 'LwA'],
                        ['Login', 'Login'],
                    ],
                'description' => 'Typ des Amazon Buttons<BR>
                                  Das Aussehen der verschiedenen Buttons.<BR>
                                  Klicken Sie links auf den Link "AmazonPay - Button Typ"',
            ],
            'amazonButtonColor' => [
                'name' => 'amazonButtonColor',
                'type' => 'select',
                'value' => 'Gold',
                'label' => '<a href="https://pay.amazon.com/de/developer/documentation/lpwa/201952050#ENTER_COLOR_PARAMETER" rel="noopener" target="_blank">AmazonPay - Button Farbe</a>',
                'required' => 'true',
                'editable' => false,
                'store' =>
                    [
                        ['Gold', 'Gold'],
                        ['LightGray', 'LightGray'],
                        ['DarkGray', 'DarkGray'],
                    ],
                'description' => 'Farbe des Amazon Buttons<BR>
                                  Das Aussehen der verschiedenen Buttons.<BR>
                                  Klicken Sie links auf den Link "AmazonPay - Button Farbe"',
            ],
            'amazonButtonSize' => [
                'name' => 'amazonButtonSize',
                'type' => 'select',
                'value' => 'medium',
                'label' => '<a href="https://pay.amazon.com/de/developer/documentation/lpwa/201952050#ENTER_SIZE_PARAMETER" rel="noopener" target="_blank">AmazonPay - Button Gr????e</a>',
                'required' => 'true',
                'editable' => false,
                'store' =>
                    [
                        ['small', [
                            'de_DE' => 'klein',
                            'en_GB' => 'small',
                            'fr_FR' => 'petit',
                        ]],
                        ['medium', [
                            'de_DE' => 'mittel',
                            'en_GB' => 'medium',
                            'fr_FR' => 'moyen',
                        ]],
                    ],
                'description' => 'Gr????e des Amazon Buttons<BR>
                                  Das Aussehen der verschiedenen Buttons.<BR>
                                  Klicken Sie links auf den Link "AmazonPay - Button Gr????e"',
            ],
        ];

/*    const formBonitaetElements =
        [
            'bonitaetusereturnaddress' => [
                'name' => 'bonitaetusereturnaddress',
                'type' => 'boolean',
                'value' => false,
                'label' => 'Bonit??tspr??fung - Zur??ckgelieferte Adressdaten verwenden',
                'required' => false,
                'description' => 'Ersetzt die Rechnungsaddresse mit u.U. korrigierten Adressen aus der Bonit??tspr??fung',
            ],
            'bonitaetinvalidateafterdays' => [
                'name' => 'bonitaetinvalidateafterdays',
                'type' => 'number',
                'value' => '30',
                'label' => 'Bonit??tspr??fung - G??ltigkeit der Bonit??tspr??fung in Tagen',
                'required' => false,
                'description' => 'Stellen Sie hier ein, wie lange ein bereits durchgef??hrte Bontit??tspr??fung g??ltig bleibt',
            ],
        ];*/

/*    const formBonitaetSelectElements =
        [
            'crifmethod' => [
                'name' => 'crifmethod',
                'type' => 'select',
                'value' => 'inactive',
                'label' => 'CRIF Bonit??tspr??fung',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['inactive', [
                            'de_DE' => 'Inaktiv',
                            'en_GB' => 'inactive',
                            'fr_FR' => 'inactif',
                        ]],
                        ['QuickCheck', [
                            'de_DE' => 'QuickCheck',
                            'en_GB' => 'quick check',
                            'fr_FR' => 'v??rification rapide',
                        ]],
                        ['CreditCheck', [
                            'de_DE' => 'Kredit Check',
                            'en_GB' => 'Creditcard check',
                            'fr_FR' => 'V??rification CreditCheck',
                        ]],
                    ],
                'description' => 'f??hrt eine Bonit??tspr??fung aus, bevor ein Benutzer Zahlarten ausw??hlen kann.<BR>
                                  Erstellen Sie unter "Einstellungen->Riskmanagement" Regeln mit den Bedingungen<BR>
                                  "First Cash Risikoampel IST <Farbe>"<BR>und<BR>
                                  "First Cash Risikoampel IST NICHT <Farbe>"<BR>',
            ],
        ];*/

    const formKlarnaTextElements =
        [
            'klarnaaction' => [
                'name' => 'klarnaaction',
                'type' => 'text',
                'value' => '',
                'label' => 'Klarna Aktionscode',
                'required' => false,
                'description' => 'Der Wert ist von Laufzeiten und Monatsraten abh??ngig, die Sie mit Klarna vereinbart haben. Dieser Wert kann per Subshop unterschiedlich sein.',
            ],
            'klarnaaccount' => [
                'name' => 'klarnaaccount',
                'type' => 'text',
                'value' => '',
                'label' => 'Klarna Konto',
                'required' => false,
                'description' => 'Das zu benutzende Klarna Konto. <br/><br/>
    
            <b>Die verf??gbaren Klarna-Zahlungsarten in Abh??ngigkeit von der Konfiguration bei Klarna </b><br/>
            Wenn <u>Klarna PayNow</u> aktiviert ist, dann k??nnen <u>Klarna Lastschrift</u> und <u>Klarna Sofort</u> nicht aktiviert werden<br/>
    
            Wenn <u>Klarna Lastschrift</u> und/oder <u>Klarna Sofort</u> aktiv ist, dann kann <u>Klarna PayNow</u> nicht aktiviert werden',
            ],
        ];

    const formTranslations =
        [
            'de_DE' => [
                'merchantID' => [
                    'label' => 'MerchantID',
                    'description' => 'Ihre MerchantID',
                ],
                'mac' => [
                    'label' => 'MAC',
                    'description' => 'Ihr HMAC-Key',
                ],
                'blowfishPassword' => [
                    'label' => 'Blowfish Password',
                    'description' => 'Ihr Verschl??sselungs-Passwort',
                ],
                'fatchip_firstcash_apitest_button' => [
                    'label' => '<strong>API Zugang Testen (Erst Speichern und Caches leeren)<strong>',
                ],
                'fatchip_firstcash_ideal_button' => [
                    'label' => '<strong>iDeal Banken aktualisieren <strong>',
                ],
                'prefixOrdernumber' => [
                    'label' => 'Bestellnummer Pr??fix',
                    'description' => 'Pr??fix f??r Bestellnummern. Sie k??nnen folgende Platzhalter verwenden: %transid% , %payid%, %xid%',
                ],
                'suffixOrdernumber' => [
                    'label' => 'Bestellnummer Suffix',
                    'description' => 'Suffix f??r Bestellnummern. Sie k??nnen folgende Platzhalter verwenden: %transid% , %payid%, %xid%',
                ],
                'debuglog' => [
                    'label' => 'Debug Protokoll',
                    'description' => 'Erzeugt eine Log Datei <FatchipFCSPayment_.log> mit Debug Ausgaben im Shopware Protokollverzeichnis',
                ],
                'creditCardMode' => [
                    'label' => 'Kreditkarte - Modus',
                    'description' => '<b>IFrame</b>: Kreditkartendaten werden nach klick auf "Zahlungsplichtig bestellen" in ein IFrame eingegeben<BR>
                                  <b>Silent Mode</b>: Kreditkartendaten werden auf der Seite "Pr??fen und Bestellen" eingegeben.<BR>',
                ],
                'creditCardTestMode' => [
                    'label' => 'Kreditkarte - Test-Modus',
                    'description' => '<b>IFrame</b>: Kreditkartendaten werden nach klick auf "Zahlungsplichtig bestellen" in ein IFrame eingegeben<BR>
                                  <b>Silent Mode</b>: Kreditkartendaten werden auf der Seite "Pr??fen und Bestellen" eingegeben.<BR>',
                ],
                'creditCardSilentModeBrandsVisa' => [
                    'label' => 'Kreditkarte - Visa (Silent Mode)',
                    // 'description' => '',
                ],
                'creditCardSilentModeBrandsMaster' => [
                    'label' => 'Kreditkarte - MasterCard (Silent Mode)',
                    // 'description' => '',
                ],
                'creditCardSilentModeBrandsAmex' => [
                    'label' => 'Kreditkarte - American Express (Silent Mode)',
                    // 'description' => '',
                ],
                'creditCardCaption' => [
                    'label' => 'Kreditkarte - Capture Modus',
                    'description' => '<b>AUTO</b>: Reservierte Betr??ge werden sofort automatisch eingezogen.<BR>
                                  <b>MANUAL</b>: Geldeinz??ge werden von Ihnen manuell im Shopbackend durchgef??hrt.',
                ],
                'creditCardAcquirer' => [
                    'label' => 'Kreditkarte - Acquirer',
                    'description' => '<b>GICC</b>: Concardis, B+S Card Service, EVO Payments, American Express, Elavon, SIX Payment Service<BR>
                                  <b>CAPN</b>: American Express<BR>
                                  <b>Omnipay</b>: EMS payment solutions, Global Payments, Paysquare',
                ],
                'creditCardAccVerify' => [
                    'label' => 'Kreditkarte - Kontoverifizierung anfordern ',
                    'description' => 'Indikator f??r Anforderung einer Kontoverifizierung (alias Nullwert-Authorisierung). <BR>
                                  Bei einer angeforderten Kontoverifizierung ist der ??bermittelte Betrag optional und <BR>
                                  wird f??r die tats??chliche Zahlungstransaktion ignoriert (z.B. Autorisierung).',
                ],
                'creditCardTemplate' => [
                    'label' => 'Kreditkarte - Template Name',
                    'description' => 'Name der XSLT-Datei mit Ihrem individuellen Layout f??r das Bezahlformular. Wenn Sie das Responsive First Cash Solution-Template f??r mobile Endger??te nutzen m??chten, ??bergeben Sie den Templatenamen ???1cs_cards_v1???.',
                ],
                'idealDirektOderUeberSofort' => [
                    'label' => 'iDEAL - Dienst',
                    'description' => 'Ideal Zahlungen k??nnen direkt ??ber Ideal oder ??ber PPRO abgewickelt werden',
                ],
                'lastschriftDienst' => [
                    'label' => 'Lastschrift - Dienst',
                    'description' => 'Lastschrift Zahlungen k??nnen direkt abgewickelt werden.',
                ],
                'lastschriftCaption' => [
                    'label' => 'Lastschrift - Capture Modus',
                    'description' => '<b>AUTO</b>: Reservierte Betr??ge werden sofort automatisch eingezogen.<BR>
                            <b>MANUAL</b>: Geldeinz??ge werden von Ihnen manuell im Shopbackend durchgef??hrt.',
                ],
                'lastschriftAnon' => [
                    'label' => 'Iban anonymisieren',
                    'description' => 'Stellt im Checkout und im Mein Konto Bereich die Iban anonymisiert dar',
                ],
                'payDirektShopApiKey' => [
                    'label' => 'Paydirekt - Shop Api Key',
                    'description' => 'Ihr Paydirekt Api Schl??ssel',
                ],
                'payDirektCaption' => [
                    'label' => 'Paydirekt - Capture Modus',
                    'description' => '<b>AUTO</b>: Reservierte Betr??ge werden sofort automatisch eingezogen.<BR>
                                  <b>MANUAL</b>: Geldeinz??ge werden von Ihnen manuell im Shopbackend durchgef??hrt.',
                ],
                'paypalCaption' => [
                    'label' => 'Paypal - Capture Modus',
                    'description' => 'bestimmt, ob der angefragte Betrag sofort oder erst sp??ter eingezogen wird. <br>
                                  <b>Wichtig:<br>Bitte kontaktieren Sie den First Cash Solution Support f??r Manual, um die unterschiedlichen Einsatzm??glichkeiten abzukl??ren.</b>',
                ],
                'paypalSetOrderStatus' => [
                    'label' => 'Paypal - Bestellstatus bei Capture',
                    'description' => 'Wenn diese Option An ist, dann wird der Bestellstatus bei Paypal Bestellungen,<br>bei denen der Capture fehlschl??gt, auf "Kl??rung notwendig" gesetzt"  <br>',
                ],
                'amazonSellerId' => [
                    'label' => 'AmazonPay - SellerId',
                    'description' => 'Ihre Amazonpay SellerId',
                ],
                'amazonClientId' => [
                    'label' => 'AmazonPay - ClientId',
                    'description' => 'Ihre Amazonpay ClientId',
                ],
                'amazonLiveMode' => [
                    'label' => 'Amazon Modus',
                    'description' => 'AmazonPay im Live oder Testmodus benutzen',
                ],
                'amazonCaptureType' => [
                    'label' => 'Amazon Capture Modus',
                    'description' => '<b>Automatisch</b>: Reservierte Betr??ge werden automatisch eingezogen.<BR>
                                  <b>Manuell</b>: Geldeinz??ge werden von Ihnen manuell im Shopbackend durchgef??hrt.',
                ],
                'amazonButtonType' => [
                    'label' => '<a href="https://pay.amazon.com/de/developer/documentation/lpwa/201952050#ENTER_TYPE_PARAMETER" rel="noopener" target="_blank">AmazonPay - Button Typ</a>',
                    'description' => 'Typ des Amazon Buttons<BR>
                                  Das Aussehen der verschiedenen Buttons.<BR>
                                  Klicken Sie links auf den Link "AmazonPay - Button Typ"',
                ],
                'amazonButtonColor' => [
                    'label' => '<a href="https://pay.amazon.com/de/developer/documentation/lpwa/201952050#ENTER_COLOR_PARAMETER" rel="noopener" target="_blank">AmazonPay - Button Farbe</a>',
                    'description' => 'Farbe des Amazon Buttons<BR>
                                  Das Aussehen der verschiedenen Buttons.<BR>
                                  Klicken Sie links auf den Link "AmazonPay - Button Farbe"',
                ],
                'amazonButtonSize' => [
                    'label' => '<a href="https://pay.amazon.com/de/developer/documentation/lpwa/201952050#ENTER_SIZE_PARAMETER" rel="noopener" target="_blank">AmazonPay - Button Gr????e</a>',
                    'description' => 'Gr????e des Amazon Buttons<BR>
                                  Das Aussehen der verschiedenen Buttons.<BR>
                                  Klicken Sie links auf den Link "AmazonPay - Button Gr????e"',
                ],
                /*'bonitaetusereturnaddress' => [
                    'label' => 'Bonit??tspr??fung - Zur??ckgelieferte Adressdaten verwenden',
                    'description' => 'Ersetzt die Rechnungsaddresse mit u.U. korrigierten Adressen aus der Bonit??tspr??fung',
                ],
                'bonitaetinvalidateafterdays' => [
                    'label' => 'Bonit??tspr??fung - G??ltigkeit der Bonit??tspr??fung in Tagen',
                    'description' => 'Stellen Sie hier ein, wie lange ein bereits durchgef??hrte Bontit??tspr??fung g??ltig bleibt',
                ],
                'crifmethod' => [
                    'label' => 'CRIF Bonit??tspr??fung',
                    'description' => 'f??hrt eine Bonit??tspr??fung aus, bevor ein Benutzer Zahlarten ausw??hlen kann.<BR>
                                  Erstellen Sie unter "Einstellungen->Riskmanagement" Regeln mit den Bedingungen<BR>
                                  "First Cash Risikoampel IST <Farbe>"<BR>und<BR>
                                  "First Cash Risikoampel IST NICHT <Farbe>"<BR>',
                ],*/
                'klarnaaction' => [
                    'label' => 'Klarna Aktionscode',
                    'description' => 'Der Wert ist von Laufzeiten und Monatsraten abh??ngig, die Sie mit Klarna vereinbart haben. Dieser Wert kann per Subshop unterschiedlich sein.',
                ],
                'klarnaaccount' => [
                    'label' => 'Klarna Konto',
                    'description' => 'Das zu benutzende Klarna Konto. <br/><br/>
                                    <b>Die verf??gbaren Klarna-Zahlungsarten in Abh??ngigkeit von der Konfiguration bei Klarna </b><BR>
                                    Wenn <u>Klarna PayNow</u> aktiviert ist, dann k??nnen <u>Klarna Lastschrift</u> und <u>Klarna Sofort</u> nicht aktiviert werden<BR>
                                    Wenn <u>Klarna Lastschrift</u> und/oder <u>Klarna Sofort</u> aktiv ist, dann kann <u>Klarna PayNow</u> nicht aktiviert werden',
                ],
            ],
            'en_GB' => [
                'merchantID' => [
                    'label' => 'MerchantID',
                    'description' => 'Your MerchantID',
                ],
                'mac' => [
                    'label' => 'MAC',
                    'description' => 'Your HMAC-Key',
                ],
                'blowfishPassword' => [
                    'label' => 'Blowfish Password',
                    'description' => 'Your blowfish password',
                ],
                'fatchip_firstcash_apitest_button' => [
                    'label' => '<strong>test API credentials (Save and clear cache first)<strong>',
                ],
                'fatchip_firstcash_ideal_button' => [
                    'label' => '<strong>update iDeal banks<strong>',
                ],
                'prefixOrdernumber' => [
                    'label' => 'Ordernumber prefix',
                    'description' => 'Prefix for ordernumbers. You can use the following placeholders: %transid% , %payid%, %xid%',
                ],
                'suffixOrdernumber' => [
                    'label' => 'Ordernumber suffix',
                    'description' => 'Suffix for ordernumbers. You can use the following placeholders: %transid% , %payid%, %xid%',
                ],
                'debuglog' => [
                    'label' => 'Debug protocol',
                    'description' => 'Creates a log file <FatchipFCSPayment_.log> with debugging output on the shopware log folder',
                ],
                'creditCardMode' => [
                    'label' => 'Creditcard - Mode',
                    'description' => '<b>IFrame</b>: The creditcard form will be displayed after clicking "confirm payment" in an iframe<BR>
                                  <b>Silent Mode</b>: The creditcard form will be displayed on the "complete order" page.<BR>',
                ],
                'creditCardTestMode' => [
                    'label' => 'Creditcard - Testmode',
                    // 'description' => '',
                ],
                'creditCardSilentModeBrandsVisa' => [
                    'label' => 'Creditcard - Visa (Silent Mode)',
                    // 'description' => '',
                ],
                'creditCardSilentModeBrandsMaster' => [
                    'label' => 'Creditcard - MasterCard (Silent Mode)',
                    // 'description' => '',
                ],
                'creditCardSilentModeBrandsAmex' => [
                    'label' => 'Creditcard - American Express (Silent Mode)',
                    // 'description' => '',
                ],
                'creditCardCaption' => [
                    'label' => 'Creditcard - Capture Mode',
                    'description' => '<b>AUTO</b>: Reserved amounts will be captured automatically.<BR>
                                  <b>MANUAL</b>: Reserverd amounts have to be captured manuelly in the shop backend.',
                ],
                'creditCardAcquirer' => [
                    'label' => 'Creditcard - Acquirer',
                    'description' => '<b>GICC</b>: Concardis, B+S Card Service, EVO Payments, American Express, Elavon, SIX Payment Service<BR>
                                  <b>CAPN</b>: American Express<BR>
                                  <b>Omnipay</b>: EMS payment solutions, Global Payments, Paysquare',
                ],
                'creditCardAccVerify' => [
                    'label' => 'Creditcard - Account verification',
                    'description' => 'Indicator for an account verification request (alias Null-Auth).<BR>
                                  By using an account verification request the amount is optional and<BR>
                                  will be ignored for the real payment (E.g. authorization).',
                ],
                'creditCardTemplate' => [
                    'label' => 'Creditcard - Template name',
                    'description' => 'Name of the XSLT-file with your individual payment form layout. If you want to use the responsive firstcash template for mobile devices, please use the template name ???1cs_cards_v1???.',
                ],
                'idealDirektOderUeberSofort' => [
                    'label' => 'iDEAL - Service',
                    'description' => 'iDEAL payments can be handled by using direct (Sofort) or PPRO.',
                ],
                //'lastschriftDienst' => [
                //    'label' => 'Direct debit - Service',
                //    'description' => 'Direct debit payments will be handeled directly.',
                //],
                'lastschriftCaption' => [
                    'label' => 'Direct debit - Capture Mode',
                    'description' => '<b>AUTO</b>: Reserved amounts will be captured automatically.<BR>
                                  <b>MANUAL</b>: Reserverd amounts have to be captured manuelly in the shop backend.',
                ],
                'lastschriftAnon' => [
                    'label' => 'Anonymize IBAN',
                    'description' => 'The customers IBAN will be displayed anonymized in checkout and on the my accoutn page',
                ],
                'payDirektShopApiKey' => [
                    'label' => 'Paydirekt - Shop Api Key',
                    'description' => 'Your Paydirekt Api Key',
                ],
                'payDirektCaption' => [
                    'label' => 'Paydirekt - Capture Modus',
                    'description' => '<b>AUTO</b>: Reserved amounts will be captured automatically.<BR>
                                  <b>MANUAL</b>: Reserverd amounts have to be captured manuelly in the shop backend.',
                ],
                'paypalCaption' => [
                    'label' => 'Paypal - Capture Modus',
                    'description' => 'capture reserverd amounts now or manually later. <br>
                                  <b>Important:<br>Please contact the computop customer support before using the manual setting to clarify possible use cases .</b>',
                ],
                'paypalSetOrderStatus' => [
                    'label' => 'Paypal - Order status on captures',
                    'description' => 'If this option is enabled, the orderstatus of failed paypal captures will be set to "review necessary"<br>',
                ],
                'amazonSellerId' => [
                    'label' => 'AmazonPay - SellerId',
                    'description' => 'Your Amazonpay SellerId',
                ],
                'amazonClientId' => [
                    'label' => 'AmazonPay - ClientId',
                    'description' => 'Your Amazonpay ClientId',
                ],
                'amazonLiveMode' => [
                    'label' => 'Amazon Modus',
                    'description' => 'Use AmazonPay in live or test mode',
                ],
                'amazonCaptureType' => [
                    'label' => 'Amazon Capture Mode',
                    'description' => '<b>AUTO</b>: Reserved amounts will be captured automatically.<BR>
                                  <b>MANUAL</b>: Reserverd amounts have to be captured manuelly in the shop backend.',
                ],
                'amazonButtonType' => [
                    'label' => '<a href="https://pay.amazon.com/de/developer/documentation/lpwa/201952050#ENTER_TYPE_PARAMETER" rel="noopener" target="_blank">AmazonPay - Button Type</a>',
                    'description' => 'Type of the Amazon button<BR>
                                  The look of the different buttons.<BR>
                                  Please click on the left link "AmazonPay - Button Type"',
                ],
                'amazonButtonColor' => [
                    'label' => '<a href="https://pay.amazon.com/de/developer/documentation/lpwa/201952050#ENTER_COLOR_PARAMETER" rel="noopener" target="_blank">AmazonPay - Button Color</a>',
                    'description' => 'Color of the Amazon button<BR>
                                  The look of the different button.<BR>
                                  Please click on the left link "AmazonPay - Button Color"',
                ],
                'amazonButtonSize' => [
                    'label' => '<a href="https://pay.amazon.com/de/developer/documentation/lpwa/201952050#ENTER_SIZE_PARAMETER" rel="noopener" target="_blank">AmazonPay - Button Size</a>',
                    'description' => 'Size of the amazon button<BR>
                                  The look of the different button.<BR>
                                  Please click on the left link "AmazonPay - Button Size"',
                ],
                /*'bonitaetusereturnaddress' => [
                    'label' => 'Credit check  - Use customer addresses from credit check response',
                    'description' => 'Replaces the customers addresses with the addresses from the credit check response',
                ],
                'bonitaetinvalidateafterdays' => [
                    'label' => 'Credit check - Validity of the credit check in days',
                    'description' => 'Set how many days a credit check stays valid for a customer befor re-cehecking',
                ],
                'crifmethod' => [
                    'label' => 'CRIF Credit check',
                    'description' => 'checks credit worthiness before displaying possible payments.<BR>
                                  Create your own rules in "Riskmanagement" with the conditions <BR>
                                  "First Cash Traffic light IS <Color>"<BR>and<BR>
                                  "First Cash Traffic light IST NOT <Color>"<BR>',
                ],*/
                'klarnaaction' => [
                    'label' => 'Klarna action code',
                    'description' => 'This value depends on durations and monthly rates term you arranged with Klarna. This value can be different for each subshop.',
                ],
                'klarnaaccount' => [
                    'label' => 'Klarna Account',
                    'description' => 'Your Klarna account. <br/><br/>
                                    <b>Available Klarna Payments depending on your Klarna account configuration</b><BR>
                                    If <u>Klarna PayNow</u> is active, you cant activate <u>Klarna Direct debit</u> und <u>Klarna Sofort</u><BR>
                                    if <u>Klarna Direct debit</u> and/or <u>Klarna Sofort</u> are active, then <u>Klarna PayNow</u> can not be activated',
                ],
            ],
            'fr_FR' => [
                'merchantID' => [
                    'label' => 'MerchantID',
                    'description' => 'Votre MerchantID',
                ],
                'mac' => [
                    'label' => 'MAC',
                    'description' => 'Votre cl?? HMAC',
                ],
                'blowfishPassword' => [
                    'label' => 'Mot de passe Blowfish',
                    'description' => 'Votre mot de passe Blowfish',
                ],
                'fatchip_firstcash_apitest_button' => [
                    'label' => '<strong>Tester les donn??es d`acc??s API (Enregistrer d`abord et vider le cache)<strong>',
                ],
                'fatchip_firstcash_ideal_button' => [
                    'label' => '<strong>Actualiser les iDeal banques<strong>',
                ],
                'prefixOrdernumber' => [
                    'label' => 'Pr??fixe de num??ro de commande',
                    'description' => 'Pr??fixe pour les num??ros de commande. Vous pouvez utiliser les param??tres fictifs suivants: %transid% , %payid%, %xid%',
                ],
                'suffixOrdernumber' => [
                    'label' => 'Suffixe de num??ro de commande',
                    'description' => 'Suffixe pour les num??ros de commande. Vous pouvez utiliser les param??tres fictifs suivants: %transid% , %payid%, %xid%',
                ],
                'debuglog' => [
                    'label' => 'Journalisation de d??boggage',
                    'description' => 'Cr??er un journal <FatchipFCSPayment_.log> avec les traces de d??boggage dans le dossier de journaux de shopware',
                ],
                'creditCardMode' => [
                    'label' => 'Carte de cr??dit - Mode',
                    'description' => '<b>IFrame</b>: Le formulaire sera affich?? apr??s avoir cliqu?? sur "Confirmer le paiement" dans un iframe<BR>
                                  <b>Mode silencieux</b>: Le formulaire sera affich?? sur la page "V??rifier et Commander".<BR>',
                ],
                'creditCardTestMode' => [
                    'label' => 'Carte de cr??dit - Mode test',
                    // 'description' => '',
                ],
                'creditCardSilentModeBrandsVisa' => [
                    'label' => 'Carte de cr??dit - Visa (Mode silencieux)',
                    // 'description' => '',
                ],
                'creditCardSilentModeBrandsMaster' => [
                    'label' => 'Carte de cr??dit - MasterCard (Mode silencieux)',
                    // 'description' => '',
                ],
                'creditCardSilentModeBrandsAmex' => [
                    'label' => 'Carte de cr??dit - American Express (Mode silencieux)',
                    // 'description' => '',
                ],
                'creditCardCaption' => [
                    'label' => 'Carte de cr??dit - Mode de d??bit',
                    'description' => '<b>AUTO</b>: Les montants r??serv??s seront d??bit??s automatiquement.<BR>
                                  <b>MANUEL</b>: Les montants r??serv??s doivent ??tre d??bit??s manuellement via l\'administration de la boutique.',
                ],
                'creditCardAcquirer' => [
                    'label' => 'Carte de cr??dit - Acqu??reur',
                    'description' => '<b>GICC</b>: Concardis, B+S Card Service, EVO Payments, American Express, Elavon, SIX Payment Service<BR>
                                  <b>CAPN</b>: American Express<BR>
                                  <b>Omnipay</b>: EMS payment solutions, Global Payments, Paysquare',
                ],
                'creditCardAccVerify' => [
                    'label' => 'Carte de cr??dit - V??rification de compte',
                    'description' => 'Indicateur pour une requ??te de v??rification de compte (alias Null-Auth).<BR>
                                  En utilisant une demande de v??rification de compte, le montant est<BR>
                                  facultatif et sera ignor?? pour le paiement r??el (Exemple, autorisation).',
                ],
                'creditCardTemplate' => [
                    'label' => 'Carte de cr??dit - Nom du mod??le',
                    'description' => 'Nom du fichier XSLT avec votre disposition de formulaire de paiment individuel. Si vous souhaitez utiliser le mod??le firstcash adaptable pour les appareils mobiles, veuillez utiliser le nom de mod??le ???1cs_cards_v1???.',
                ],
                'idealDirektOderUeberSofort' => [
                    'label' => 'iDEAL - Service',
                    'description' => 'iDEAL payments can be handled by using direct (Sofort) or PPRO.',
                    'description' => 'Les paiements iDEAL peuvent ??tre g??r??s en utilisant direct (Sofort) ou PPRO.',
                ],
                //'lastschriftDienst' => [
                //    'label' => 'Direct debit - Service',
                //    'description' => 'Les paiements par pr??l??vement peuvent ??tre g??r??s en utilisant direct, EVO ou INTERCARD.',
                //],
                'lastschriftCaption' => [
                    'label' => 'Direct debit - Mode de d??bit',
                    'description' => '<b>AUTO</b>: Les montants r??serv??s seront d??bit??s automatiquement.<BR>
                                  <b>MANUEL</b>: Les montants r??serv??s doivent ??tre d??bit??s manuellement via l\'administration de la boutique.',
                ],
                'lastschriftAnon' => [
                    'label' => 'Anonymiser l\'IBAN',
                    'description' => 'L\'IBAN du client sera affich?? de mani??re anonyme durant la transaction et sur la page \'Mon compte\'.',
                ],
                'payDirektShopApiKey' => [
                    'label' => 'Paydirekt - Cl?? API',
                    'description' => 'Votre cl?? API Paydirekt',
                ],
                'payDirektCaption' => [
                    'label' => 'Paydirekt - Mode de d??bit',
                    'description' => '<b>AUTO</b>: Les montants r??serv??s seront d??bit??s automatiquement.<BR>
                                  <b>MANUEL</b>: Les montants r??serv??s doivent ??tre d??bit??s manuellement via l\'administration de la boutique.',
                ],
                'paypalCaption' => [
                    'label' => 'Paypal - Mode de d??bit',
                    'description' => 'Les montants r??serv??s seront d??bit??s maintenant ou manuellement plus tard. <br>
                                  <b>Important:<br>Veuillez contacter le service client computop avant d\'utiliser le param??tre manuel, pour clarifier les possibles cas d\'usage.</b>',
                ],
                'paypalSetOrderStatus' => [
                    'label' => 'Paypal - Statut de la commande sur les d??bits',
                    'description' => 'Si cette option est activ??e, le statut de commande d\'un d??bit Paypal ??chou?? sera converti en "r??vision n??cessaire"<br>',
                ],
                'amazonSellerId' => [
                    'label' => 'AmazonPay - SellerId',
                    'description' => 'Voire SellerId Amazonpay',
                ],
                'amazonClientId' => [
                    'label' => 'AmazonPay - ClientId',
                    'description' => 'Votre ClientId Amazonpay',
                ],
                'amazonLiveMode' => [
                    'label' => 'Mode Amazon',
                    'description' => 'Utiliser AmazonPay en mode live ou test',
                ],
                'amazonCaptureType' => [
                    'label' => 'Amazon Mode de d??bit',
                    'description' => '<b>AUTO</b>: Les montants r??serv??s seront d??bit??s automatiquement.<BR>
                                  <b>MANUEL</b>: Les montants r??serv??s doivent ??tre d??bit??s manuellement via l\'administration de la boutique.',
                ],
                'amazonButtonType' => [
                    'label' => '<a href="https://pay.amazon.com/de/developer/documentation/lpwa/201952050#ENTER_TYPE_PARAMETER" rel="noopener" target="_blank">AmazonPay - Type de bouton</a>',
                    'description' => 'Type du bouton Amazon<BR>
                                  L\'aspect des diff??rents boutons.<BR>
                                  Veuillez cliquer sur le lien ?? gauche "AmazonPay - Type de bouton"',
                ],
                'amazonButtonColor' => [
                    'label' => '<a href="https://pay.amazon.com/de/developer/documentation/lpwa/201952050#ENTER_COLOR_PARAMETER" rel="noopener" target="_blank">AmazonPay - Couleur de bouton</a>',
                    'description' => 'Couleur du bouton Amazon<BR>
                                  L\'aspect des diff??rents boutons.<BR>
                                  Veuillez cliquer sur le lien ?? gauche "AmazonPay - Couleur de bouton"',
                ],
                'amazonButtonSize' => [
                    'label' => '<a href="https://pay.amazon.com/de/developer/documentation/lpwa/201952050#ENTER_SIZE_PARAMETER" rel="noopener" target="_blank">AmazonPay - Taille de bouton</a>',
                    'description' => 'Taille du bouton Amazon<BR>
                                  L\'aspect des diff??rents boutons.<BR>
                                  Veuillez cliquer sur le lien ?? gauche "AmazonPay - Taille de bouton"',
                ],
                /*'bonitaetusereturnaddress' => [
                    'label' => 'V??rification de cr??dit  - Utiliser l\'adresse du client de la v??rification de cr??dit',
                    'description' => 'Remplace l\'adresse du client par celle re??ue dans la r??ponse de v??rification de cr??dit',
                ],
                'bonitaetinvalidateafterdays' => [
                    'label' => 'V??rification de cr??dit - Validit?? de la v??rification de cr??dit en jours',
                    'description' => 'D??finir combien de jours une v??rification de cr??dit reste valide pour un client avant re-v??rification',
                ],
                'crifmethod' => [
                    'label' => 'V??rification de cr??dit CRIF',
                    'description' => 'V??rifie la validit?? du cr??dit avant d\'afficher les paiements disponibles.<BR>
                                  Cr??ez vos propre r??gles dans "Gestion de risque" avec les conditions <BR>
                                  "First Cash Traffic light IS <Color>"<BR>et<BR>
                                  "First Cash Traffic light IST NOT <Color>"<BR>',
                ],*/
                'klarnaaction' => [
                    'label' => 'Code action Klarna',
                    'description' => 'Cette valeur d??pend de la dur??e et des termes de taux mensuels que vous avez convenus avec Klarna. Cette valeur peut diff??rer entre chaque sous-boutique.',
                ],
                'klarnaaccount' => [
                    'label' => 'Compte Klarna',
                    'description' => 'Votre compte Klarna. <br/><br/>
                                    <b>Paiement Klarna disponibles selon la configuration de votre compte Klarna</b><BR>
                                    Si <u>Klarna PayNow</u> est actif, vous ne pouvez pas activer <u>Klarna Direct debit</u> et <u>Klarna Sofort</u><BR>
                                    si <u>Klarna Direct debit</u> et/ou <u>Klarna Sofort</u> sont actifs, alors <u>Klarna PayNow</u> ne peut pas ??tre activ??',
                ],
            ],
        ];
}
