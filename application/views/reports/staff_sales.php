<div class="discounts-list full-height">
    <div class="panel panel-transparent">
        <div class="panel-body sm-padding-15">
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="no-margin hidden-xs">Sales by Staff</h3>
                </div>
            </div>            
            <div class="row m-t-20 clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12" id="">
                    <form class="filters form-inline clearfix" method="post" accept-charset="UTF-8" action="/reports/staffSales">
                        <div class="m-b-20 reports-filters reports-filters--short row">
                            <div class="col-lg-12 sm-no-padding">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="inline-block" id="filter-inputs">
                                            <label class="sr-only" for="date_range">date_range</label>
                                            <span class="custom reports-filters__custom">
                                                <div class="input-group">
                                                    <input type="text" name="date_from" id="date_from" value="" class="date-input form-control text-center" readonly="readonly">
                                                    <span class="input-group-addon">to</span>
                                                    <input type="text" name="date_to" id="date_to" value="" class="date-input form-control text-center" readonly="readonly">

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
                    <!--div class="row m-b-10 filters-with-custom">
                        <div class="col-lg-12">
                            <div class="filters-description sm-m-b-15">
                                <p class="report-options no-margin">
                                    Displaying from <span class="font-bold"><?php //echo date('l, j M Y', strtotime($staffsales['fromDate'])); ?></span> to <span class="font-bold"><?php //echo date('l, j M Y', strtotime($staffsales['toDate'])); ?></span>
                                </p>
                            </div>
                        </div>
                    </div-->
                    <?php if (!empty($staffsales)) { ?>
                        <table class="table"  id="staffsale_list">
                            <thead class="bg-grey">
                                <tr>
                                    <th>Staff Name</th>
                                    <th>Services Provided #</th>
                                    <th>Gross Total</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th colspan="3" style="text-align:right;padding-right: 265px;"></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($staffsales['result'] as $staffsale) {
                                    ?> 
                                    <tr>
                                        <td><?php echo $staffsale['staffname'] ?></td>
                                        <td><?php echo ($staffsale['quantity'] != '') ? $staffsale['quantity'] : '-'; ?></td>
                                        <td><?php echo Common::formatMoneyToPrint($staffsale['salevalue']); ?></td>
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

    var fdate = moment('<?php echo $staffsales['fromDate'];  ?>').format('MM/DD/YYYY');
    var tdate = moment('<?php echo $staffsales['toDate'];  ?>').format('MM/DD/YYYY');

    $(document).ready(function () {

        $('#date_from').datepicker( {maxDate : '+0d' } ).datepicker("setDate", fdate);
        $('#date_to').datepicker( {maxDate : '+0d' } ).datepicker("setDate", tdate);

        var oTable = $('#staffsale_list').dataTable({
            "bLengthChange": false,
            "pageLength": 20,
            "columns": [
                null,
                null,
                null
            ],
            "footerCallback": function (row, data, start, end, display) {
                var api = this.api(), data;
                var colNumber = [2];

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
                    $(api.column(colNo).footer()).html('TOTAL &nbsp;&nbsp;₹&nbsp;' + (accounting.formatMoney(total2)));
                }
            }
        });
    });
</script>