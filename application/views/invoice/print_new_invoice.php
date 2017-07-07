<!doctype html>
<html>
    <head>
        <style>
            @font-face {
                font-family: 'Merchant Copy';
                src: url('<?php echo base_url('/assets/fonts/MerchantCopy.ttf') ?>') format('woff'), /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
                     url('<?php echo base_url('/assets/fonts/MerchantCopy.ttf') ?>') format('truetype'); /* Chrome 4+, Firefox 3.5, Opera 10+, Safari 3?5 */
            } 
            body { font-size: 18px; font-family: "Merchant Copy"; margin-left: 13px; margin-right: 13px }
             div { padding-top:3px; padding-bottom:3px; text-align: center; }
        </style>
    </head>
    <body>
        <div style="width:270px;">
        <div style="font-size:30px; margin-top: 10px">INFINITY SALONS</div>
        <div style="margin-top:-3px">--------------------------</div>

        <div style="margin-top:8px;">Shop No.19 & 20,Bhumiraj Co-op Hsg Society</div>
        <div>Sector 14, Sanpada, Navi Mumbai-400705</div>
        <div>------------------------------------------</div>
        
        <!--invoice number , date, client-->
	<div style="margin-top:5px;">Inv no: <?php echo $checkout['invoicenumber'] ?></div>
	<div>Dt: <?php echo date('F j, Y', strtotime($checkout['invoicedate'])) ?></div>
	<div style="margin-top:8px; text-align: right;"><?php echo $client['firstname'] . ' ' . $client['lastname']; ?></div>
        <div style="text-align: right;"><?php echo $client['mobile']; ?></div>
	<div style="margin-top:8px; ">------------------------------------------</div>
        <!--invoice number , date, client-->
        
        <!--items header-->
	<div>
            <span style="width: 120px;text-align: left;float: left;">Item</span>
            <span style="width: 50px;float: left;">Rate</span>
            <span style="width: 20px;float: left;">Qty</span>
            <span style="width: 30px;float: left;">Disc</span>
            <span style="width: 50px;float: right;text-align: right;">Price</span>
	</div>
	<div style="margin-top:8px; ">------------------------------------------</div>
        <!--items header-->
        
        <!--items-->
        <?php foreach ($services as $service) {
            $itm = Receiptprint::split_on($service['servicename'], 18);
            $ds = (!empty($service['discountid'])) ? '-' . trim(str_replace(' off', '', $service['discountvalue'])) : '-'; ?>
        <div style="position: relative;">
            <span style="width: 120px;text-align: left;float: left;padding-top:3px; padding-bottom:3px;"><?php echo $itm[0]; ?></span>
            <span style="width: 50px;float: left;padding-top:3px; padding-bottom:3px;"><?php echo Common::formatMoneyToPrint($service['specialprice']); ?></span>
            <span style="width: 20px;float: left;padding-top:3px; padding-bottom:3px;"><?php echo $service['quantity']; ?></span>
            <span style="width: 30px;float: left;padding-top:3px; padding-bottom:3px;"><?php echo $ds; ?></span>
            <span style="width: 50px;float: right;text-align: right;padding-top:3px; padding-bottom:3px;"><?php echo Common::formatMoneyToPrint($service['price']); ?></span>
	</div>
        
        <?php //if(!empty($itm[1])) { ?>
        
        <div style="width: 270px;text-align: left;margin-bottom: 0px;margin-top: 5px;">
            <span><?php echo !empty($itm[1]) ? $itm[1] : '&nbsp;' ; ?></span>
        </div>

        <?php //} ?>        
        
        <?php } ?>
        
        <!--item total-->
	<div>------------------------------------------</div>
	<div style="text-align: right;">
		<span style="width: 190px;float: left;">Total</span>
                <span style="width: 80px;float: right;">Rs.<?php echo Common::formatMoneyToPrint($checkoutinvoice['sale']); ?></span>
	</div>
	<div>------------------------------------------</div>
        <!--item total-->
        
        <!--optional tip-->
        <?php if (!empty($tipdetails)) { ?>
        <div style="text-align: right;">
            <span style="width: 190px;float: left;"><?php echo 'Tip: '. $tipdetails['fname'] . ' ' . $tipdetails['lname']; ?></span>
            <span style="width: 80px;float: right;"><?php echo Common::formatMoneyToPrint($tipdetails['price']); ?></span>
	</div>
        <?php } ?>
        <!--optional tip-->

        <!-- optional tax -->
        <?php if (!empty($taxes)) {
                $totaltax = 0;
                foreach ($taxes as $tax) { ?>        
                <div style="text-align: right;">
                    <span style="width: 190px;float: left;padding-top:1px;"><?php echo $tax['taxname'] .' ('.$tax['rate'].'%)' ?></span>
                    <span style="width: 80px;float: right;padding-top:1px;">
                        <?php
                            $taxcost = round((($checkoutinvoice['sale'] / 100) * $tax['rate']), 2);
                            $totaltax = $totaltax + $taxcost;
                            echo Common::formatMoneyToPrint($taxcost);
                        ?>
                    </span>
                </div>
                <?php } ?>	
	<div>------------------------------------------</div>
        <?php } ?>
        <!-- optional tax -->
        
        <!--grand total-->
        <div style="text-align: right;">
            <span style="width: 190px;float: left;">Grand Total</span>
            <span style="width: 80px;float: right;">Rs.<?php echo Common::formatMoneyToPrint($checkoutinvoice['totalprice']); ?></span>
	</div>
        <div style="margin-top:8px; ">------------------------------------------</div>
        <!--grand total-->        
	
        <!--payments-->
        <?php foreach ($checkoutpayments as $payments) { ?>
	<div style="text-align: right;">
            <span style="width: 190px;float: left;"><?php echo $payments['type']; ?></span>
            <span style="width: 80px;float: right;"><?php echo Common::formatMoneyToPrint($payments['amount']); ?></span>
	</div>
        <?php } ?>
        <div><br></div><div><br></div>
        <!--payments-->
        
        <!--Footer-->
	<div style="text-align: right;font-size:14px; margin-bottom: 20px">
            <span style="width: 150px;float: left;text-align:left">GSTIN:27AATPC9486B1ZC</span>
            <span style="width: 120px;float: right;text-align:right">PAN No:AATPC9486B</span>
	</div>
        <!--Footer-->
</div>
</body>
    
</html>