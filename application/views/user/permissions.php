<div class="row full-height no-margin table-like business-settings-container" id="settings-container" style="">
    <div class="col-md-9 no-padding b-r b-dark-grey sm-b-b full-height table-cell overflow-hidden">
        <div class="bg-white full-height">
            <?php if (!empty($this->session->flashdata('user_perms_update_mesg'))) { ?>
                <div class="alert alert-settings alert-success">
                    <?php echo $this->session->flashdata('user_perms_update_mesg'); ?>
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
                                            <form class="simple_form new_permissions" id="new_permissions" action="/user/updatePermissions" method="post">
                                                <div class="row m-b-20">
                                                    <div class="col-sm-12">
                                                        <h3 class="m-t-none">User Permssions</h3>
                                                        <p>Setup which sections are accessible to each user permission level. All logged in staff has full system access.</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <span class="form-label no-margin hidden-xs">Select Staff</span>
                                                        <span class="form-label no-margin visible-xs">staff</span>
                                                    </div>
                                                    <div class="col-xs-2 sm-p-l-10">
                                                        <span class="form-label no-margin">Permissions Allowed</span>
                                                    </div>
                                                </div>
                                                <div class="attached-form-group permissions-table">
                                                    <div class="row clearfix">
                                                        <div class="col-xs-4 no-padding">
                                                            <div class="form-group">
                                                                <div class="select-wrapper">
                                                                    <select name="userid" id="userid" class="form-control js-schedule-employee">
                                                                        <option value="">Select User</option>
                                                                        <?php
                                                                        foreach ($users as $user) {
                                                                            echo '<option value="' . $user['id'] . '">' . $user['first_name'] . ' ' . $user['last_name'] . '</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-2 text-center no-padding">
                                                            <div class="form-group">
                                                                <div class="attached-field-last form-control no-margin">
                                                                    <label for="permissions_owner_business_settings">&nbsp;</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-xs-4 no-padding">
                                                            <div class="form-group no-padding no-margin">
                                                                <div class="fs-14 permission-type form-control">Home</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-2 text-center no-padding">
                                                            <div class="form-group">
                                                                <div class="attached-field-last form-control no-margin check-this check-success checkbox">
                                                                    <input class="boolean optional " type="checkbox" value="1" checked="checked" name="permissions[home]" id="home" onclick="$(this).val(this.checked ? 1 : 0)">
                                                                    <label for="home">&nbsp;</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-xs-4 no-padding">
                                                            <div class="form-group no-padding no-margin">
                                                                <div class="fs-14 permission-type form-control">Calender</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-2 text-center no-padding">
                                                            <div class="form-group">
                                                                <div class="attached-field-last check-success checkbox form-control no-margin">
                                                                    <input class="boolean optional " type="checkbox" value="1" checked="checked" name="permissions[calender]" id="calender" onclick="$(this).val(this.checked ? 1 : 0)">
                                                                    <label for="calender">&nbsp;</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-xs-4 no-padding">
                                                            <div class="form-group no-padding no-margin">
                                                                <div class="fs-14 permission-type form-control">Clients</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-2 text-center no-padding">
                                                            <div class="form-group">
                                                                <div class="attached-field-last check-success checkbox form-control no-margin">
                                                                    <input class="boolean optional " type="checkbox" value="1" checked="checked" name="permissions[clients]" id="clients" onclick="$(this).val(this.checked ? 1 : 0)">
                                                                    <label for="clients">&nbsp;</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-xs-4 no-padding">
                                                            <div class="form-group no-padding no-margin">
                                                                <div class="fs-14 permission-type form-control">Services</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-2 text-center no-padding">
                                                            <div class="form-group">
                                                                <div class="attached-field-last check-success checkbox form-control no-margin">
                                                                    <input class="boolean optional " type="checkbox" value="1" checked="checked" name="permissions[services]" id="services" onclick="$(this).val(this.checked ? 1 : 0)">
                                                                    <label for="services">&nbsp;</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-xs-4 no-padding">
                                                            <div class="form-group no-padding no-margin">
                                                                <div class="fs-14 permission-type form-control">Products</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-2 text-center no-padding">
                                                            <div class="form-group">
                                                                <div class="attached-field-last check-success checkbox form-control no-margin">
                                                                    <input class="boolean optional " type="checkbox" value="1" checked="checked" name="permissions[products]" id="products" onclick="$(this).val(this.checked ? 1 : 0)">
                                                                    <label for="products">&nbsp;</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--                                                    <div class="row clearfix">
                                                                                                            <div class="col-xs-4 no-padding">
                                                                                                                <div class="form-group no-padding no-margin">
                                                                                                                    <div class="fs-14 permission-type form-control">Discounts</div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-xs-2 text-center no-padding">
                                                                                                                <div class="form-group">
                                                                                                                    <div class="attached-field-last check-success checkbox form-control no-margin">
                                                                                                                        <input class="boolean optional " type="checkbox" value="1" checked="checked" name="permissions[discounts]" id="discounts" onclick="$(this).val(this.checked ? 1 : 0)">
                                                                                                                        <label for="discounts">&nbsp;</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>-->
                                                    <div class="row clearfix">
                                                        <div class="col-xs-4 no-padding">
                                                            <div class="form-group no-padding no-margin">
                                                                <div class="fs-14 permission-type form-control">Staff</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-2 text-center no-padding">
                                                            <div class="form-group">
                                                                <div class="attached-field-last check-success checkbox form-control no-margin">
                                                                    <input class="boolean optional " type="checkbox" value="1" checked="checked" name="permissions[staff]" id="staff" onclick="$(this).val(this.checked ? 1 : 0)">
                                                                    <label for="staff">&nbsp;</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--                                                    <div class="row clearfix">
                                                                                                            <div class="col-xs-4 no-padding">
                                                                                                                <div class="form-group no-padding no-margin">
                                                                                                                    <div class="fs-14 permission-type form-control">Business Settings</div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-xs-2 text-center no-padding">
                                                                                                                <div class="form-group">
                                                                                                                    <div class="attached-field-last check-success checkbox form-control no-margin">
                                                                                                                        <input class="boolean optional " type="checkbox" value="1" checked="checked" name="permissions[businesssetting]" id="businesssetting" onclick="$(this).val(this.checked ? 1 : 0)">
                                                                                                                        <label for="businesssetting">&nbsp;</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row clearfix">
                                                                                                            <div class="col-xs-4 no-padding">
                                                                                                                <div class="form-group no-padding no-margin">
                                                                                                                    <div class="fs-14 permission-type form-control">Roster</div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-xs-2 text-center no-padding">
                                                                                                                <div class="form-group">
                                                                                                                    <div class="attached-field-last check-success checkbox form-control no-margin">
                                                                                                                        <input class="boolean optional " type="checkbox" value="1" checked="checked" name="permissions[roster]" id="roster" onclick="$(this).val(this.checked ? 1 : 0)">
                                                                                                                        <label for="roster">&nbsp;</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>-->
                                                    <div class="row clearfix">
                                                        <div class="col-xs-4 no-padding">
                                                            <div class="form-group no-padding no-margin">
                                                                <div class="fs-14 permission-type form-control">Setup</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-2 text-center no-padding">
                                                            <div class="form-group">
                                                                <div class="attached-field-last check-success checkbox form-control no-margin">
                                                                    <input class="boolean optional " type="checkbox" value="1" checked="checked" name="permissions[setup]" id="setup" onclick="$(this).val(this.checked ? 1 : 0)">
                                                                    <label for="setup">&nbsp;</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row m-b-20 m-t-20">
                                                        <div class="col-sm-12">
                                                            <input type="submit" name="commit" value="Save Changes" class="btn btn-success" id="submit-button" disabled="true">
                                                        </div>
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
        <div class="col-md-3 no-padding full-height table-cell hidden-xs hidden-sm">
        </div>
    </div>
</div>
<script>
    $('#userid').change(function (e) {
        var userid = $(this).val();
        if (userid === '') {
            $('#submit-button').prop("disabled", true);
            $('input:checkbox').prop('checked', 'checked');
        } else {
            $('#submit-button').prop("disabled", false);
            loadingOverlay();
            $.get('/user/getUserPermissions', {userid: userid}, function (data) {
                removeLoadingOverlay();
                var res = $.parseJSON(data);
                var homeVal = res.home;
                var calenderVal = res.calender;
                var clientsVal = res.clients;
                var servicesVal = res.services;
                var productsVal = res.products;
                //var discountsVal = res.discounts;
                var staffVal = res.staff;
                //var businesssettingVal = res.businesssetting;
                //var rosterVal = res.roster;
                var setupVal = res.setup;
                $('#home').val(homeVal);
                $('#calender').val(calenderVal);
                $('#clients').val(clientsVal);
                $('#services').val(servicesVal);
                $('#products').val(productsVal);
                //$('#discounts').val(discountsVal);
                $('#staff').val(staffVal);
                //$('#businesssetting').val(businesssettingVal);
                //$('#roster').val(rosterVal);
                $('#setup').val(setupVal);
                if (homeVal == '0') {
                    $('#home').removeAttr("checked");
                } else if (homeVal == '1') {
                    $('#home').prop('checked', true);
                }
                if (calenderVal == '0') {
                    $('#calender').removeAttr("checked");
                } else if (calenderVal == '1') {
                    $('#calender').prop('checked', true);
                }
                if (clientsVal == '0') {
                    $('#clients').removeAttr("checked");
                } else if (clientsVal == '1') {
                    $('#clients').prop('checked', true);
                }
                if (servicesVal == '0') {
                    $('#services').removeAttr("checked");
                } else if (servicesVal == '1') {
                    $('#services').prop('checked', true);
                }
                if (productsVal == '0') {
                    $('#products').removeAttr("checked");
                } else if (productsVal == '1') {
                    $('#products').prop('checked', true);
                }
//                if (discountsVal == '0') {
//                    $('#discounts').removeAttr("checked");
//                } else if (discountsVal == '1') {
//                    $('#discounts').prop('checked', true);
//                }
                if (staffVal == '0') {
                    $('#staff').removeAttr("checked");
                } else if (staffVal == '1') {
                    $('#staff').prop('checked', true);
                }
//                if (businesssettingVal == '0') {
//                    $('#businesssetting').removeAttr("checked");
//                } else if (businesssettingVal == '1') {
//                    $('#businesssetting').prop('checked', true);
//                }
//                if (rosterVal == '0') {
//                    $('#roster').removeAttr("checked");
//                } else if (rosterVal == '1') {
//                    $('#roster').prop('checked', true);
//                }
                if (setupVal == '0') {
                    $('#setup').removeAttr("checked");
                } else if (setupVal == '1') {
                    $('#setup').prop('checked', true);
                }
            });
        }
    });
</script>