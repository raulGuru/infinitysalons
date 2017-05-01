<div class="discounts-list full-height">
    <div class="panel panel-transparent">
        <div class="panel-body sm-padding-15">
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="no-margin hidden-xs">Invoices</h3>
                </div>
            </div>            
            <?php if (!empty($invoices)) { ?>
                <div class="row m-t-20 clearfix">
                    <div class="col-sm-12 col-md-12 col-lg-12" id="">
                        <!--<form class="filters form-inline clearfix" method="post" accept-charset="UTF-8" action="/reports/invoices">-->
                            <div class="m-b-20 reports-filters reports-filters--short row">
                                <div class="col-lg-12 sm-no-padding">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="inline-block" id="filter-inputs">
                                                <label class="sr-only" for="date_range">date_range</label>
                                                <span class="custom reports-filters__custom">
                                                    <div class="input-group">
                                                        <input type="text" name="date_from" id="date_from" value="<?php echo (isset($fromDate)) ? $fromDate : ""; ?>" class="date-input form-control text-center" readonly="readonly">
                                                        <span class="input-group-addon">to</span>
                                                        <input type="text" name="date_to" id="date_to" value="<?php echo (isset($toDate)) ? $toDate : ""; ?>" class="date-input form-control text-center" readonly="readonly">

                                                    </div>
                                                </span>
                                            </div>
<!--                                            <button name="button" type="submit" class="btn btn-success m-l-5 sm-pull-right sm-m-b-10 report-view-button">
                                                <span>View</span>
                                                <div class="report-spinner hidden">
                                                    <i class="icon-refresh icon-spin"></i>
                                                    Loading...
                                                </div>
                                            </button>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!--</form>-->
                        <table class="table table-sortable"  id="invoices_list">
                            <thead class="bg-grey">
                                <tr>
                                    <th>Invoice #</th>
                                    <th>Client</th>
                                    <th>Invoice Date</th>
                                    <th>Gross Total</th>
                                    <th>iNDate</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($invoices as $invoice) {
                                    ?> 
                                    <tr  >
                                        <td><a href="javascript:void(0);" class="view_invoice" data-invoiceid="<?php echo $invoice['invoiceid'] ?>"><?php echo $invoice['invoicenumber'] ?></a></td>
                                        <td><?php echo ($invoice['clientid'] != 0) ? $invoice['client']['firstname'] . ' ' . $invoice['client']['lastname'] : '-'; ?></td>
                                        <td><?php echo date('l, j M Y', strtotime($invoice['invoicedate'])) ?></td>
                                        <td><?php echo Common::formatMoneyToPrint($invoice['totalprice']); ?></td>
                                        <td><?php echo $invoice['invoicedate'] ?></td>
                                        <td><a href="javascript:void(0);" class="edit_invoice" data-invoiceid="<?php echo $invoice['invoiceid'] ?>">edit</a></td>
                                        <!--/sales/editInvoice-->
                                    </tr>
                                <?php } ?>                                            
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row m-t-20 clearfix">
                    <div class="text-center no-overflow">
                        <div class="row full-height sm-padding-10">
                            <div class="col-sm-8 col-sm-offset-2 full-height">
                                <div class="text-center placeholder-text center-margin reports-no-results">
                                    <p class="hint-text">
                                        <i class="s-icon-search placeholder-icon hint-text"></i>
                                    </p>
                                    <h3 class="m-b-10">No Results Found</h3>
<!--                                    <p class="m-b-20">
                                        Try using different filter options to find what you're looking for
                                    </p>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        var oTable = $('#invoices_list').dataTable({
            "bLengthChange": false,
            "pageLength": 20,
            "columns": [
                null,
                null,
                null,
                null,
                {"visible": false},
                null
            ]
        });

        $("#date_from").datepicker({
            maxDate: '+0d',
            onSelect: function (date) {
                minDateFilter = new Date(date).getTime();
                oTable.fnDraw();
            }
        })/*.keyup(function() {
         minDateFilter = new Date(this.value).getTime();
         oTable.fnDraw();
         })*/.datepicker("setDate", new Date());

        $("#date_to").datepicker({
            maxDate: '+0d',
            onSelect: function (date) {
                maxDateFilter = new Date(date).getTime();
                oTable.fnDraw();
            }
        })/*.keyup(function() {
         maxDateFilter = new Date(this.value).getTime();
         oTable.fnDraw();
         })*/.datepicker("setDate", new Date());
    });

    // Date range filter
    minDateFilter = new Date().getTime();
    maxDateFilter = new Date().getTime();

    $.fn.dataTableExt.afnFiltering.push(
            function (oSettings, aData, iDataIndex) {
                if (typeof aData._date == 'undefined') {
                    aData._date = new Date(aData[4]).getTime();
                }
                if (minDateFilter && !isNaN(minDateFilter)) {
                    if (aData._date < minDateFilter) {
                        return false;
                    }
                }
                if (maxDateFilter && !isNaN(maxDateFilter)) {
                    if (aData._date > maxDateFilter) {
                        return false;
                    }
                }
                return true;
            }
    );

    $('.view_invoice').bind('click', function () {
        var invoiceid = $(this).data('invoiceid');
        window.open(g.base_url + 'invoice/printinvoice?id=' + invoiceid, '_blank');
    });
    
    $('.edit_invoice').bind('click', function () {
       loadingOverlay();
       $.ajax({
            url: g.base_url + 'sales/editInvoice',
            type: 'post',   
            dataType: 'html',
            data: $(this).data(),
            success: function(data) {
                removeLoadingOverlay();
                $('body').append(data);
                $('#new-service-sale').modal({backdrop: 'static', keyboard: false});
                $('#new-service-sale').on('hidden.bs.modal', function(){
                    $('.modal-backdrop').remove();
                });
            }
        });            
    });
    
</script>