<html>
<head><meta charset="utf-8"></head>
<body>
<div style="max-width:700px;margin-top:auto;margin-bottom:auto;margin-right:auto;margin-left:auto;padding-top:30px;padding-bottom:30px;padding-right:30px;padding-left:30px;border-width:1px;border-style:solid;border-color:#eee;box-shadow:0 0 10px rgba(0, 0, 0, .15);font-size:13px;line-height:24px;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;color:#555;">
    <table cellpadding="0" cellspacing="0" style="width:100%;line-height:inherit;text-align:left;">
        <tr>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;padding-bottom:10px;font-size:45px;line-height:45px;color:#333;">
                <img style="max-width: 100px;" src="<?php echo base_url('/assets/Infinitylogo.jpg') ?>">
            </td>

            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;padding-bottom:10px;">
                <br/>
                <br/>
                <span style="font-size:35px;margin-right:150px;">INFINITY SALONS</span>
                <hr>
                <div style="display:block;height:15px;"></div>
                <div style="margin-right:80px;text-align:center;">
                    Invoice number: <?php echo $checkout['invoicenumber'] ?><br>
                    Date: <?php echo date('F j, Y', strtotime($checkout['invoicedate'])) ?>
                </div>
            </td>
        </tr>
    </table>

    <table cellpadding="0" cellspacing="0" style="width:100%;line-height:inherit;text-align:left;">
        <tr>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;padding-bottom:10px;" ></td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;padding-bottom:10px;" >
                <br>
            </td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;padding-bottom:10px;" ></td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;padding-bottom:10px;" ></td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;padding-bottom:10px;" ></td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;padding-bottom:10px;">
                <?php
                if (!empty($client)) {
                    echo $client['firstname'] . ' ' . $client['lastname'] . ' </br>' . $client['mobile'];
                }
                ?>
            </td>
        </tr>
        <?php $fmt = Common::formatMoney(); ?>
        <tr>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;">Item</td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"></td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;">Actual Price</td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;">Quantity</td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"> &nbsp;Discount<br>(each item)</td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;">Price</td>
        </tr>

        <?php
        if (!empty($services)) {
            foreach ($services as $service) {
                ?>
                <tr>
                    <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"><?php echo $service['servicename'] ?></td>
                    <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"><?php //echo $services['stafffname'] . ' ' . $services['stafflname']                   ?></td>
                    <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"><?php echo $fmt->format($service['specialprice']) ?></td>
                    <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"><?php echo $service['quantity'] ?></td>
                    <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"><?php echo (!empty($service['discountid'])) ? $service['discountvalue'] : '-'; ?></td>
                    <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"><?php echo $fmt->format($service['price']) ?></td>
                </tr>
                <?php
            }
        }
        ?>

        <?php
        if (!empty($products)) {
            foreach ($products as $product) {
                ?>
                <tr>
                    <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"><?php echo $product['productname'] ?></td>
                    <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"><?php //echo $product['stafffname'] . ' ' . $product['stafflname']                   ?></td>
                    <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"><?php echo $fmt->format($product['specialprice']) ?></td>
                    <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"><?php echo $product['quatity'] ?></td>
                    <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"><?php echo (!empty($product['discountid'])) ? $product['discountvalue'] : '-'; ?></td>
                    <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"><?php echo $fmt->format($product['price']) ?></td>
                </tr>

                <?php
            }
        }
        ?>
        <tr>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"></td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"></td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"></td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"></td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;">Total</td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"> <?php echo $fmt->format($checkoutinvoice['sale']) ?> </td>
        </tr>
        <tr>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;padding-bottom:10px;" ></td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;padding-bottom:10px;" ></td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;padding-bottom:10px;" ></td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;padding-bottom:10px;" ></td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;padding-bottom:10px;" ></td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;padding-bottom:10px;" ></td>
        </tr>

        <?php if (!empty($tipdetails)) { ?>
            <tr>
                <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;">Tip</td>
                <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"></td>
                <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"></td>
                <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"></td>
                <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"></td>
                <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"></td>
            </tr>
            <tr>
                <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"></td>
                <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"></td>
                <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"></td>
                <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"><?php echo $tipdetails['fname'] . ' ' . $tipdetails['lname'] ?></td>
                <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"></td>
                <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"><?php echo $fmt->format($tipdetails['price']) ?></td>
            </tr>


        <?php } ?>

        <?php if (!empty($taxes)) { ?>
            <tr>
                <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;">Tax</td>
                <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"></td>
                <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"></td>
                <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"></td>
                <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"></td>
                <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"></td>
            </tr>
            <?php
            $totaltax = 0;
            foreach ($taxes as $tax) {
                ?>
                <tr>
                    <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"></td>
                    <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"></td>
                    <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"></td>
                    <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"></td>
                    <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"><?php echo $tax['taxname'] .' ('.$tax['rate'].'%)' ?></td>
                    <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"><?php
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
        <tr>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"></td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"></td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"></td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;">Grand Total</td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"></td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"><?php echo $fmt->format($checkoutinvoice['totalprice']); ?></td>
        </tr>
        <tr>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;padding-bottom:10px;" ></td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;padding-bottom:10px;" ></td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;padding-bottom:10px;" ></td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;padding-bottom:10px;" ></td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;padding-bottom:10px;" ></td>
            <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;padding-bottom:10px;" ></td>
        </tr>
        <?php if (!empty($checkoutpayments)) { ?>
            <tr>
                <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;">Payment Method</td>
                <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"></td>
                <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"></td>
                <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"></td>
                <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"></td>
                <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;background-color:#eee;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ddd;font-weight:bold;padding-bottom:10px;"></td>
            </tr>
            <?php
            foreach ($checkoutpayments as $payments) {
                ?>
                <tr>
                    <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"></td>
                    <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"></td>
                    <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"></td>
                    <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"></td>
                    <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"><?php echo $payments['type']; ?></td>
                    <td style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#eee;padding-bottom:10px;"><?php echo $fmt->format($payments['amount']); ?>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
    <div style="bottom:0;left:0;right:0;">
        <hr>
        <table style="width:100%;line-height:inherit;text-align:left;">
            <tfoot>
            <tr style="font-size:12px;" >
                <td colspan="2" style="padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;padding-bottom:10px;" >
                    Shop No. 19 & 20, Bhumiraj Co-op Housing Society,<br>
                    Sector 14, Sanpada, Navi Mumbai-400705
                </td>
                <td style="width:300px;padding-top:5px;padding-right:5px;padding-left:5px;vertical-align:top;padding-bottom:10px;" >
                    Service tax No: AATPC9486BSD001<br>
                    PAN No: AATPC9486B
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
</body>
</html>