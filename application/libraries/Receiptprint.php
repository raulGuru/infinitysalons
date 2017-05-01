<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once (__DIR__ . '/../escpos-php/autoload.php');

use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

Class Receiptprint {   
    
    
    function printInvoice($invoice) {
        
        $checkout = $invoice['checkout'];
        $client = $invoice['client'];
        $checkoutinvoice = $invoice['checkoutinvoice'];
        $checkoutpayments = $invoice['checkoutpayments'];
        $taxes = $invoice['taxes'];
        $services = $invoice['services'];
        $products = $invoice['products'];
        $tipdetails = $invoice['tipdetails'];
        
        try {
        
            $connector = new WindowsPrintConnector("EPSON TM-T82 Receipt");
            $printer = new Printer($connector);

            /* Print top logo */
            //$logo = EscposImage::load((__DIR__ . '/../../assets/rsz_1header_infinitylogo.png'), false);
            //$printer -> setJustification(Printer::JUSTIFY_CENTER);
            //$printer -> graphics($logo);

            /* Name of shop */
            $printer -> setJustification(Printer::JUSTIFY_CENTER);
            //$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
            $printer -> setTextSize(2, 2);
            $printer -> setUnderline(Printer::UNDERLINE_DOUBLE);
            $printer -> text("INFINITY SALONS\n");
            $printer -> feed();

            /* shop address */
            $printer -> setTextSize(1, 1);
            $printer -> setUnderline(Printer::UNDERLINE_NONE);
            $printer -> text("Shop No. 19 & 20,Bhumiraj Co-op Housing Society,\n");
            $printer -> text("Sector 14, Sanpada, Navi Mumbai-400705\n");
            $printer -> text(str_repeat("-", 48)."\n");
            $printer -> feed();

            /* invoice number , date */        
            $printer -> setUnderline(Printer::UNDERLINE_NONE);
            $printer -> setTextSize(1, 1);
            $printer -> text("INV NO: ". $checkout['invoicenumber'] ."\n");
            $printer -> text("Dt: ". date('F j, Y', strtotime($checkout['invoicedate'])) ."\n");
            $printer -> feed();

            /* client name , number */
            $printer -> setJustification(Printer::JUSTIFY_RIGHT);
            $printer -> text("". $client['firstname'] . ' ' . $client['lastname'] ."\n");
            if(!empty($client['mobile'])) {
                $printer -> text("". $client['mobile'] ."\n");
            }
            $printer -> feed();

            /* items header*/
            $printer -> setJustification();
            $printer->text(str_repeat("-", 48)."\n");
            $printer->setEmphasis(true);
            $printer->text("Item                Rate     Qty Discnt  Price\n");
            $printer->setEmphasis(false);
            $printer->text(str_repeat("-", 48)."\n");

            /* items */
            
            foreach ($services as $service) {
                //if(strlen($service['servicename']) > 18) {
                    //opt1
                    /*$str = wordwrap($service['servicename'], 18, ";;", true);
                    $itnm = explode(";;", $str);*/
                    $itm = Receiptprint::split_on($service['servicename'], 18);
                //}
                    $ds = (!empty($service['discountid'])) ? '-' . trim(str_replace(' off', '', $service['discountvalue'])) : '-';
                    
                    $itml = str_pad($itm[0], 20, ' ', STR_PAD_RIGHT);
                    $rt = str_pad(Common::formatMoneyToPrint($service['specialprice']), 9, ' ', STR_PAD_RIGHT);
                    $qt = str_pad($service['quantity'], 4, ' ', STR_PAD_RIGHT);
                    $dist = str_pad($ds, 8, ' ', STR_PAD_RIGHT);
                    $pr = Common::formatMoneyToPrint($service['price']);
                    
                    $printer->text("$itml$rt$qt$dist$pr\n");
                    
                    if(!empty($itm[1])) {
                        $printer->text("$itm[1]\n\n");
                    }else {
                        $printer->text("\n");
                    }                    
            }

            /* item total */
            $printer->text(str_repeat("-", 48)."\n");
            $printer->setEmphasis(true);
            $printer->text("                            Total    Rs.". Common::formatMoneyToPrint($checkoutinvoice['sale']) ."\n");
            $printer->setEmphasis(false);
            
            /* optional tip */
            if (!empty($tipdetails)) {
                
                $printer->text(str_repeat("-", 48)."\n");
                $printer->setEmphasis(true);
                $tl = str_pad('Tip: '. $tipdetails['fname'] . ' ' . $tipdetails['lname'], 34, ' ', STR_PAD_LEFT);
                $tr = str_pad(Common::formatMoneyToPrint($tipdetails['price']), 14, ' ', STR_PAD_LEFT);
                $printer->text("$tl$tr\n");
                $printer->setEmphasis(false);
            }

            /* optional tax */
            if(!empty($taxes)) {
                
                $printer->text(str_repeat("-", 48)."\n");                
                
                $totaltax = 0;
                foreach ($taxes as $tax) {
                    $txl = str_pad($tax['taxname'] .' ('.$tax['rate'].'%)', 34, ' ', STR_PAD_LEFT);
                                        
                    $taxcost = round((($checkoutinvoice['sale'] / 100) * $tax['rate']), 2);
                    $totaltax = $totaltax + $taxcost;                               
                    
                    $txr = str_pad(Common::formatMoneyToPrint($taxcost), 14, ' ', STR_PAD_LEFT);                    
                    $printer->text("$txl$txr\n");
                }                
            }

            /* grand total */
            $gtl = str_pad('Grand total', 30, ' ', STR_PAD_LEFT);
            $gtr = str_pad(Common::formatMoneyToPrint($checkoutinvoice['totalprice']), 18, ' ', STR_PAD_LEFT);         
            
            $printer->text(str_repeat("-", 48)."\n");
            //$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
            $printer->setEmphasis(true);
            $printer->text("$gtl$gtr\n");
            $printer->setEmphasis(false);
            //$printer -> selectPrintMode();

            /* payments */
            $printer->text(str_repeat("-", 48)."\n");
            foreach ($checkoutpayments as $payments) {
                $pl = str_pad($payments['type'], 30, ' ', STR_PAD_LEFT);
                $pr = str_pad(Common::formatMoneyToPrint($payments['amount']), 18, ' ', STR_PAD_LEFT);
                $printer->text("$pl$pr\n");
            }

            /* Footer */
            $printer -> feed(2);
            $printer->setFont(Printer::FONT_B);
            $printer -> text("Service tx No:AATPC9486BSD001                  PAN No:AATPC9486B");            

            /* Cut the receipt and open the cash drawer */
            $printer -> feed();
            $printer -> cut();
            $printer -> pulse();

            $printer -> close();
        
        } catch (Exception $e) {
            echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
        }        
    }
    
    function split_on($string, $num) {
        $length = strlen($string);
        $output[0] = trim(substr($string, 0, $num));
        $output[1] = trim(substr($string, $num, $length ));
        return $output;
    } 
    
}