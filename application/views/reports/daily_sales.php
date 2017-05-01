<div class="discounts-list full-height">
    <div class="panel panel-transparent">
        <div class="panel-body sm-padding-15">
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="no-margin hidden-xs">Daily Sales</h3>
                </div>
            </div>            
            <div class="row m-t-20 clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12" id="">
                    <form class="filters form-inline clearfix" method="post" accept-charset="UTF-8" action="/reports/dailySales">
                        <div class="m-b-20 reports-filters reports-filters--short row">
                            <div class="col-lg-12 sm-no-padding">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="inline-block" id="filter-inputs">
                                            <label class="sr-only" for="date_range">date_range</label>
                                            <span class="custom reports-filters__custom">
                                                <div class="input-group">
                                                    <input type="text" name="date_from" id="date_from" value="<?php echo (!empty($dailysales['fromDate'])) ? $dailysales['fromDate'] : ""; ?>" class="date-input form-control text-center" readonly="readonly">
                                                    <span class="input-group-addon">to</span>
                                                    <input type="text" name="date_to" id="date_to" value="<?php echo (!empty($dailysales['toDate'])) ? $dailysales['toDate'] : ""; ?>" class="date-input form-control text-center" readonly="readonly">

                                                </div>
                                            </span>
                                        </div>
                                        <button name="button" type="submit" class="btn btn-success m-l-5 sm-pull-right sm-m-b-10 report-view-button">
                                            <span>View</span>
                                            <div class="report-spinner hidden">
                                                <i class="icon-refresh icon-spin"></i>
                                                Loading...
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row m-b-10 filters-with-custom">
                        <div class="col-lg-12">
                            <div class="filters-description sm-m-b-15">
                                <p class="report-options no-margin">
                                    Displaying from <span class="font-bold"><?php echo (!empty($dailysales['fromDate'])) ? date('l, j M Y', strtotime($dailysales['fromDate'])) : date('l, j M Y'); ?></span> to <span class="font-bold"><?php echo (!empty($dailysales['toDate'])) ? date('l, j M Y', strtotime($dailysales['toDate'])) : date('l, j M Y'); ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (!empty($dailysales)) {
                        ?>
                        <table class="table table-hover table-sortable"  id="staffsale_list">
                            <thead class="bg-grey">
                                <tr>
                                    <th>Sale Date</th>
                                    <th>No. Of Services</th>
                                    <!--<th>Invoice Date</th>-->
                                    <th>Gross Total (in <span>&#8377;</span>)</th>
                                    <!--<th>iNDate</th>-->
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th colspan="3" style="text-align:right;padding-right: 265px;"></th>
                                    <!--<th></th>-->
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $fmt = Common::formatMoney();
                                foreach ($dailysales['result'] as $dailysale) {
                                    ?> 
                                    <tr class="clickable-row" data-params='{"id":"<?php echo $dailysale['serviceid']; ?>"}' >
                                        <td><?php echo date('l, j M Y', strtotime($dailysale['invoicedate'])) ?></td>
                                        <td><?php echo $dailysale['services'] ?></td>
                                        <td><?php echo Common::formatMoneyToPrint($dailysale['totalprice']);?></td>
                                        <!--<td><?php // echo $dailysale['invoicedate']          ?></td>-->
                                    </tr>
    <?php } ?>                                            
                            </tbody>
                        </table>
<?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var oTable = $('#staffsale_list').dataTable({
            "bLengthChange": false,
            "pageLength": 20,
            "columns": [
                null,
                null,
                null
//                {"visible": false}
            ],
            "footerCallback": function (row, data, start, end, display) {
                var api = this.api(), data;
                var colNumber = [2];

                var intVal = function (i) {
                    return typeof i === 'string' ?
//                            i.replace(/[, ₹&nbsp;]|(\.\d{2})/g, "") * 1 :
                            i.replace(/(\.\d{2})/g, "") * 1 :
                            typeof i === 'number' ?
                            i : 0;
                };
                for (i = 0; i < colNumber.length; i++) {
                    var colNo = colNumber[i];
                    var total2 = api
                            .column(colNo, {page: 'current'})
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);
                            $(api.column(colNo).footer()).html('TOTAL &nbsp;&nbsp;₹&nbsp;' + (accounting.formatMoney(total2)));
                }
            }
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
</script>