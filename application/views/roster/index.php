<div class="row full-height no-margin table-like business-settings-container" id="settings-container" style="">
    <div class="col-md-9 no-padding b-r b-dark-grey sm-b-b full-height table-cell overflow-hidden">
        <div class="bg-white full-height">
            <?php if (!empty($this->session->flashdata('roster_days_update_mesg'))) { ?>
                <div class="alert alert-settings alert-success">
                    <?php echo $this->session->flashdata('roster_days_update_mesg'); ?>
                </div>
            <?php } ?>
            <div class="panel panel-transparent">
                <div class="panel-body">
                    <div class="row m-t-10">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-9">
                            <div class="tab-content">
                                <div class="tab-pane active" id="permissions">
                                    <div class="row m-b-20 permissions-list">
                                        <div class="col-sm-12">
                                            <form novalidate="novalidate" class="simple_form new_permissions" id="new_permissions" action="/roster/add" method="post">
                                                <div class="row m-b-20">
                                                    <div class="col-sm-12">
                                                        <h3 class="m-t-none">Roster</h3>
                                                        <p>
                                                            Setup which staff are available on which days.
                                                            <!--                                              Setup which sections are accessible to each user permission level. All logged in staff can access the calendar, and owner accounts have full system access.-->
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <span class="form-label no-margin hidden-xs">Select Staff</span>
                                                        <span class="form-label no-margin visible-xs">staff</span>
                                                    </div>
                                                    <div class="col-xs-2 sm-p-l-10">
                                                        <span class="form-label no-margin">Work Days </span>
                                                    </div>
                                                </div>
                                                <div class="attached-form-group permissions-table">
                                                    <div class="row clearfix">
                                                        <div class="col-xs-4 no-padding">
                                                            <div class="form-group">
                                                                <div class="select-wrapper">
                                                                    <select name="staff_id" id="staff_id" class="form-control js-schedule-employee">
                                                                        <option value="">Select staff</option>
                                                                        <?php
                                                                        foreach ($staffs as $staff) {
                                                                            echo '<option value="' . $staff['id'] . '">' . $staff['first_name'] . ' ' . $staff['last_name'] . '</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-2 text-center no-padding">
                                                            <div class="form-group">
                                                                <div class="attached-field-last check-success form-control no-margin">
                                                                    <label for="permissions_owner_business_settings">&nbsp;</label>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-xs-4 no-padding">
                                                            <div class="form-group no-padding no-margin">
                                                                <div class="fs-14 permission-type form-control">Sunday</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-2 text-center no-padding">
                                                            <div class="form-group">
                                                                <div class="attached-field-last check-success checkbox form-control no-margin">
                                                                    <input class="boolean optional " type="checkbox" value="1" checked="checked" name="roster[sunday]" id="sunday" onclick="$(this).val(this.checked ? 1 : 0)">
                                                                    <label for="sunday">&nbsp;</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-xs-4 no-padding">
                                                            <div class="form-group no-padding no-margin">
                                                                <div class="fs-14 permission-type form-control">Monday</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-2 text-center no-padding">
                                                            <div class="form-group">
                                                                <div class="attached-field-last check-success checkbox form-control no-margin">
                                                                    <input class="boolean optional " type="checkbox" value="1" checked="checked" name="roster[monday]" id="monday" onclick="$(this).val(this.checked ? 1 : 0)">
                                                                    <label for="monday">&nbsp;</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-xs-4 no-padding">
                                                            <div class="form-group no-padding no-margin">
                                                                <div class="fs-14 permission-type form-control">Tuesday</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-2 text-center no-padding">
                                                            <div class="form-group">
                                                                <div class="attached-field-last check-success checkbox form-control no-margin">
                                                                    <input class="boolean optional " type="checkbox" value="1" checked="checked" name="roster[tuesday]" id="tuesday" onclick="$(this).val(this.checked ? 1 : 0)">
                                                                    <label for="tuesday">&nbsp;</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-xs-4 no-padding">
                                                            <div class="form-group no-padding no-margin">
                                                                <div class="fs-14 permission-type form-control">Wednesday</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-2 text-center no-padding">
                                                            <div class="form-group">
                                                                <div class="attached-field-last check-success checkbox form-control no-margin">
                                                                    <input class="boolean optional " type="checkbox" value="1" checked="checked" name="roster[wednesday]" id="wednesday" onclick="$(this).val(this.checked ? 1 : 0)">
                                                                    <label for="wednesday">&nbsp;</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-xs-4 no-padding">
                                                            <div class="form-group no-padding no-margin">
                                                                <div class="fs-14 permission-type form-control">Thursday</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-2 text-center no-padding">
                                                            <div class="form-group">
                                                                <div class="attached-field-last check-success checkbox form-control no-margin">
                                                                    <input class="boolean optional " type="checkbox" value="1" checked="checked" name="roster[thursday]" id="thursday" onclick="$(this).val(this.checked ? 1 : 0)">
                                                                    <label for="thursday">&nbsp;</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-xs-4 no-padding">
                                                            <div class="form-group no-padding no-margin">
                                                                <div class="fs-14 permission-type form-control">Friday</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-2 text-center no-padding">
                                                            <div class="form-group">
                                                                <div class="attached-field-last check-success checkbox form-control no-margin">
                                                                    <input class="boolean optional " type="checkbox" value="1" checked="checked" name="roster[friday]" id="friday" onclick="$(this).val(this.checked ? 1 : 0)">
                                                                    <label for="friday">&nbsp;</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-xs-4 no-padding">
                                                            <div class="form-group no-padding no-margin">
                                                                <div class="fs-14 permission-type form-control">Saturday</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-2 text-center no-padding">
                                                            <div class="form-group">
                                                                <div class="attached-field-last check-success checkbox form-control no-margin">
                                                                    <input class="boolean optional " type="checkbox" value="1" checked="checked" name="roster[saturday]" id="saturday" onclick="$(this).val(this.checked ? 1 : 0)">
                                                                    <label for="saturday">&nbsp;</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row m-b-20 m-t-20">
                                                    <div class="col-sm-12">
                                                        <input type="submit" name="commit" value="Save Changes" class="btn btn-success" id="submit-button" disabled="true">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 no-padding full-height table-cell hidden-xs hidden-sm">
    </div>
</div>
<script>
    $('#staff_id').change(function (e) {
        var staff_id = $(this).val();

        if (staff_id === '') {
            $('#submit-button').prop("disabled", true);
            $('input:checkbox').prop('checked', 'checked');
        } else {
            $('#submit-button').prop("disabled", false);
            loadingOverlay();
            $.get('/roster/getUserRoster', {staffid: staff_id}, function (data) {
                removeLoadingOverlay();
                var res = $.parseJSON(data);

                var sundayVal = res.sunday;
                var mondayVal = res.monday;
                var tuesdayVal = res.tuesday;
                var wednesdayVal = res.wednesday;
                var thursdayVal = res.thursday;
                var fridayVal = res.friday;
                var saturdayVal = res.saturday;

                $('#sunday').val(sundayVal);
                $('#monday').val(mondayVal);
                $('#tuesday').val(tuesdayVal);
                $('#wednesday').val(wednesdayVal);
                $('#thursday').val(thursdayVal);
                $('#friday').val(fridayVal);
                $('#saturday').val(saturdayVal);

                if (sundayVal == '0') {
                    $('#sunday').removeAttr("checked");
                } else if (sundayVal == '1') {
                    $('#sunday').prop('checked', true);
                }

                if (mondayVal == '0') {
                    $('#monday').removeAttr("checked");
                } else if (mondayVal == '1') {
                    $('#monday').prop('checked', true);
                }

                if (tuesdayVal == '0') {
                    $('#tuesday').removeAttr("checked");
                } else if (tuesdayVal == '1') {
                    $('#tuesday').prop('checked', true);
                }

                if (wednesdayVal == '0') {
                    $('#wednesday').removeAttr("checked");
                } else if (wednesdayVal == '1') {
                    $('#wednesday').prop('checked', true);
                }

                if (thursdayVal == '0') {
                    $('#thursday').removeAttr("checked");
                } else if (thursdayVal == '1') {
                    $('#thursday').prop('checked', true);
                }

                if (fridayVal == '0') {
                    $('#friday').removeAttr("checked");
                } else if (fridayVal == '1') {
                    $('#friday').prop('checked', true);
                }

                if (saturdayVal == '0') {
                    $('#saturday').removeAttr("checked");
                } else if (saturdayVal == '1') {
                    $('#saturday').prop('checked', true);
                }
            });
        }
    });
</script>