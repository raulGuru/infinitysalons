<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Invoice</title>

        <style>
            .invoice-box{
                max-width:800px;
                margin:auto;
                padding:30px;
                border:1px solid #eee;
                box-shadow:0 0 10px rgba(0, 0, 0, .15);
                font-size:16px;
                line-height:24px;
                font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                color:#555;
            }

            .invoice-box table{
                width:100%;
                line-height:inherit;
                text-align:left;
            }

            .invoice-box table td{
                padding:5px;
                vertical-align:top;
            }

            .invoice-box table tr td:nth-child(2){
                text-align:right;
            }

            .invoice-box table tr.top table td{
                padding-bottom:20px;
            }

            .invoice-box table tr.top table td.title{
                font-size:45px;
                line-height:45px;
                color:#333;
            }

            .invoice-box table tr.information table td{
                padding-bottom:40px;
            }

            .invoice-box table tr.heading td{
                background:#eee;
                border-bottom:1px solid #ddd;
                font-weight:bold;
            }

            .invoice-box table tr.details td{
                padding-bottom:20px;
            }

            .invoice-box table tr.item td{
                border-bottom:1px solid #eee;
            }

            .invoice-box table tr.item.last td{
                border-bottom:none;
            }

            .invoice-box table tr.total td:nth-child(2){
                border-top:2px solid #eee;
                font-weight:bold;
                text-align:center;
            }

            /*@media only screen and (max-width: 600px) {*/
            @media print {
                .invoice-box table tr.top table td{
                    width:100%;
                    display:block;
                    text-align:center;
                }

                .invoice-box table tr.information table td{
                    width:100%;
                    display:block;
                    text-align:center;
                }
            }
        </style>
    </head>

    <body>
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="6">
                        <table>
                            <tr>
                                <td class="title">
                                    <img src="<?php echo base_url('/assets/Infinitylogo.jpg') ?>" style="width:100%; max-width:200px;">
                                </td>

                                <td style="display: table-cell">
                                    Invoice number: <?php echo $checkout['invoicenumber'] ?><br>
                                    Date: <?php echo date('F j, Y', strtotime($checkout['invoicedate'])) ?><br>
                                    <!-- Due: February 1, 2015-->
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="information">
                    <td></td>
                    <td>
                        Infinity Salon.<br>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <?php
                        if (!empty($client)) {
                            echo $client['firstname'] . ' ' . $client['lastname'] . '. </br>' . $client['mobile'];
                        }
                        ?>
                    </td>
                </tr>

                <tr class="heading">
                    <td>Item</td>
                    <td></td>
                    <td>Special Price</td>
                    <td>Quantity</td>
                    <td> &nbsp;Discount<br>(each item)</td> 
                    <td>Price</td>
                </tr>

                <?php if (!empty($services)) { ?>
                    <tr class="item">
                        <td><?php echo $services['servicename'] ?></td>
                        <td><?php //echo $services['stafffname'] . ' ' . $services['stafflname'] ?></td>
                        <td><?php echo '₹' . $services['specialprice'] ?></td>
                        <td><?php echo $services['quantity'] ?></td>
                        <td><?php
                            $value = ($services['discounttype'] == 'percentage') ? ($services['discountvalue'] . '% off') : ('₹' . $services['discountvalue'] . ' off');
                            echo (!empty($services['discountname'])) ? $value : '-';
                            ?></td> 
                        <td><?php echo '₹' . $services['price'] ?></td>
                    </tr>     
                <?php } ?>

                <?php
                if (!empty($products)) {
                    foreach ($products as $product) {
                        ?>
                        <tr class="item">
                            <td><?php echo $product['productname'] ?></td>
                            <td><?php //echo $product['stafffname'] . ' ' . $product['stafflname'] ?></td>
                            <td><?php echo '₹' . $product['specialprice'] ?></td>
                            <td><?php echo $product['quatity'] ?></td>
                            <td><?php echo (!empty($product['discountid'])) ? $product['discountvalue'] : '-'; ?></td>
                            <td><?php echo '₹' . $product['price'] ?></td>
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
                        <?php //echo $checkoutinvoice['businesspaytype'] ?>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total</td>

                    <td>
                        <?php echo '₹' . $checkoutinvoice['sale'] ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                
                <?php if(!empty($tipdetails)) { ?>
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
                            <td><?php echo $tipdetails['fname'] .' '.$tipdetails['lname'] ?></td>
                            <td></td>
                            <td><?php echo '₹'.$tipdetails['price'] ?></td>
                        </tr>
                            

                <?php }?>
                
                        
                <?php if(!empty($taxes)) { ?>
                        <tr class="heading">
                            <td>Tax</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td> 
                            <td></td>
                        </tr>
                <?php $totaltax = 0;
                    foreach($taxes as $tax) { ?>
                        

                        <tr class="item">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $tax['taxname'] ?></td>
                            <td><?php 
                            $taxcost = (($checkoutinvoice['sale'] / 100) * $tax['rate']);
                                               $totaltax = $totaltax + $taxcost;
                                             echo '₹'.$taxcost;  ?></td>
                        </tr>
                <?php    }
                } ?>
                        
                <tr class="heading">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Grand Total</td>
                    <td></td>
                    <td><?php echo '₹' . $checkoutinvoice['totalprice']; ?></td>
                </tr>
            </table>
        </div>
        <script>
            //window.print();

        </script>
    </body>
</html>