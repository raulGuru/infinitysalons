<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Invoice</title>
        <link rel="stylesheet" media="all" href="<?php echo base_url('/assets/css/invoice.css') ?>">
        <link rel="stylesheet" type="text/css" media="print" href="<?php echo base_url('/assets/css/invoice.css') ?>" />
    </head>

    <body>
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
<!--                    <td colspan="6">
                        <table>
                            <tr>-->
                    <td class="title">
                        <img class="logo" src="<?php echo base_url('/assets/Infinitylogo.jpg') ?>">
                    </td>

                    <td>
                        <br/>
                        <br/>
                        <span class="company_name">INFINITY SALONS</span>
                        <hr>
                        <div class="clearfix"></div>
                        <div class=" header">
                            Invoice number: <?php echo $checkout['invoicenumber'] ?><br>
                            Date: <?php echo date('F j, Y', strtotime($checkout['invoicedate'])) ?>
                        </div>
                    </td>
                </tr>
            </table>

            <table cellpadding="0" cellspacing="0">
                <tr class="information">
                    <td></td>
                    <td>
                        <br>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <?php
                        if (!empty($client)) {
                            echo $client['firstname'] . ' ' . $client['lastname'] . ' </br>' . $client['mobile'];
                        }
                        ?>
                    </td>
                </tr>
                <?php $fmt = Common::formatMoney(); ?>
                <tr class="heading">
                    <td>Item</td>
                    <td></td>
                    <td>Actual Price</td>
                    <td>Quantity</td>
                    <td> &nbsp;Discount<br>(each item)</td> 
                    <td>Price</td>
                </tr>

                <?php
                if (!empty($services)) {
                    foreach ($services as $service) {
                        ?>
                        <tr class="item">
                            <td><?php echo $service['servicename'] ?></td>
                            <td><?php //echo $services['stafffname'] . ' ' . $services['stafflname']                   ?></td>
                            <td><?php echo $fmt->format($service['specialprice']) ?></td>
                            <td><?php echo $service['quantity'] ?></td>
                            <td><?php echo (!empty($service['discountid'])) ? $service['discountvalue'] : '-';
                        ?></td> 
                            <td><?php echo $fmt->format($service['price']) ?></td>
                        </tr>     
                        <?php
                    }
                }
                ?>

                <?php
                if (!empty($products)) {
                    foreach ($products as $product) {
                        ?>
                        <tr class="item">
                            <td><?php echo $product['productname'] ?></td>
                            <td><?php //echo $product['stafffname'] . ' ' . $product['stafflname']                   ?></td>
                            <td><?php echo $fmt->format($product['specialprice']) ?></td>
                            <td><?php echo $product['quatity'] ?></td>
                            <td><?php echo (!empty($product['discountid'])) ? $product['discountvalue'] : '-'; ?></td>
                            <td><?php echo $fmt->format($product['price']) ?></td>
                        </tr>

                        <?php
                    }
                }
                ?>
<!--                <tr class="heading">
                    <td colspan="6">
                        Payment Method
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>-->

                <tr class="heading">
                    <td>
                        <?php //echo $checkoutinvoice['businesspaytype']   ?>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td> <?php echo $fmt->format($checkoutinvoice['sale']) ?> </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <?php if (!empty($tipdetails)) { ?>
                    <tr class="heading">
                        <td>Tip</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td> 
                        <td></td>
                    </tr>
                    <tr class="item">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $tipdetails['fname'] . ' ' . $tipdetails['lname'] ?></td>
                        <td></td>
                        <td><?php echo $fmt->format($tipdetails['price']) ?></td>
                    </tr>


                <?php } ?>

                <?php if (!empty($taxes)) { ?>
                    <tr class="heading">
                        <td>Tax</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td> 
                        <td></td>
                    </tr>
                    <?php
                    $totaltax = 0;
                    foreach ($taxes as $tax) {
                        ?>
                        <tr class="item">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $tax['taxname'] .' ('.$tax['rate'].'%)' ?></td>
                            <td><?php
                                $taxcost = round((($checkoutinvoice['sale'] / 100) * $tax['rate']), 2);
                                $totaltax = $totaltax + $taxcost;
                                echo $fmt->format($taxcost);
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
                <tr class="heading">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Grand Total</td>
                    <td></td>
                    <td><?php echo $fmt->format($checkoutinvoice['totalprice']); ?></td>
                </tr>
            </table>
            <div class="divFooter">
                <hr>
                <table>
                    <tfoot>
                        <tr style="font-size: 12px">
                            <td colspan="2">
                                Shop No. 19 & 20, Bhumiraj Co-op Housing Society,<br>
                                Sector 14, Sanpada, Navi Mumbai-400705
                            </td>
                            <td style="width: 300px">
                                Service tax No: AATPC9486BSD001<br>
                                PAN No: AATPC9486B
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <script>
            //window.print();

        </script>
    </body>
</html>