<div class="discounts-list full-height">
    <div class="panel panel-transparent">
        <div class="panel-body sm-padding-15">
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="no-margin hidden-xs">Sales by Clients</h3>
                </div>
            </div>            
            <div class="row m-t-20 clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12" id="">
                    <form class="filters form-inline clearfix" method="post" accept-charset="UTF-8" action="/reports/clientSales">
                        <div class="m-b-20 reports-filters reports-filters--short row">
                            <div class="col-lg-12 sm-no-padding">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="inline-block" id="filter-inputs">
                                            <label class="sr-only" for="date_range">date_range</label>
                                            <span class="custom reports-filters__custom">
                                                <div class="input-group">
                                                    <input type="text" name="date_from" id="date_from" value="<?php echo (isset($clientsales['fromDate'])) ? $clientsales['fromDate'] : ""; ?>" class="date-input form-control text-center" readonly="readonly">
                                                    <span class="input-group-addon">to</span>
                                                    <input type="text" name="date_to" id="date_to" value="<?php echo (isset($clientsales['toDate'])) ? $clientsales['toDate'] : ""; ?>" class="date-input form-control text-center" readonly="readonly">

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
                                    Displaying from <span class="font-bold"><?php echo (!empty($clientsales['fromDate'])) ? date('l, j M Y', strtotime($clientsales['fromDate'])) : date('l, j M Y'); ?></span> to <span class="font-bold"><?php echo (!empty($clientsales['toDate'])) ? date('l, j M Y', strtotime($clientsales['toDate'])) : date('l, j M Y'); ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($clientsales)) { ?>
                        <table class="table table-hover table-sortable"  id="clientsale_list">
                            <thead class="bg-grey">
                                <tr>
                                    <th>Client Name</th>
                                    <th>Gender</th>
                                    <th>Added</th>
                                    <th>Appointments</th>
                                    <th>Last Appointment</th>
                                    <th>Services</th>
                                    <th>Total Sales</th>
                                    <!--<th>iNDate</th>-->
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th colspan="7" style="text-align:right"></th>
                                    <!--<th></th>-->
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $fmt = Common::formatMoney();
                                foreach ($clientsales['client'] as $clientsale) {
                                    ?> 
                                    <tr class="clickable-row" data-params='{"id":"<?php echo $clientsale['id']; ?>"}' >
                                        <td><?php echo $clientsale['clientname'] ?></td>
                                        <td><?php echo $clientsale['gender'] != '' ? ($clientsale['gender'] == 'f' ? 'Female' : ( $clientsale['gender'] == 'm' ? 'Male' : '-')) : '-' ?></td>
                                        <td><?php echo date('l, j M Y', strtotime($clientsale['timestamp'])) ?></td>
                                        <td><?php echo $clientsale['appointments']; ?></td>
                                        <td><?php echo (!empty($clientsale['checkout']['invoicedate']) ? date('l, j M Y', strtotime($clientsale['checkout']['invoicedate'])) : '-') ?></td>
                                        <td><?php echo $clientsale['services'] ?></td>
                                        <td><?php echo $fmt->format($clientsale['totalsales']) ?></td>
                                        <!--<td><?php // echo $invoice['invoicedate']           ?></td>-->
                                    </tr>
                                <?php } ?>                                            
                            </tbody>
                        </table>
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
                                            <p class="m-b-20">
                                                Try using different filter options to find what you're looking for
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var oTable = $('#clientsale_list').dataTable({
            "bLengthChange": false,
            "pageLength": 20,
            "columns": [
                null,
                null,
                null,
                null,
                null,
                null,
                null,
//                {"visible": false}
            ],
            "footerCallback": function (row, data, start, end, display) {
                var api = this.api(), data;
                var colNumber = [6];

                var intVal = function (i) {
                    return typeof i === 'string' ?
                            i.replace(/[, ₹&nbsp;]|(\.\d{2})/g, "") * 1 :
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
//                    $(api.column(colNo).footer()).html('TOTAL ₹&nbsp;' + formatMoney(total2, 2));
                    $(api.column(colNo).footer()).html('TOTAL ₹&nbsp;' + (total2));
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
                    aData._date = new Date(aData[8]).getTime();
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