<div class="row full-height no-margin table-like">
    <!--<div class="col-md-9 no-padding b-r b-dark-grey sm-b-b full-height table-cell overflow-hidden">-->
    <div class="bg-white full-height">
        <div class="panel panel-transparent">
            <div class="panel-body sm-padding-20" id="edit_account">
                <form novalidate="novalidate" class="simple_form edit_employee" id="edit_employee" action="/user/saveaccount" accept-charset="UTF-8" method="post">
                    <input type="hidden" name="id" id="employee_id" value="<?php echo (isset($user) ? $user['id'] : ''); ?>">
                    <div class="row m-t-10">
                        <div class="col-sm-12">
                            <div id="details">
                                <div id="general">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group string required employee_first_name">
                                                <label class="string required control-label" for="employee_first_name">
                                                    <abbr title="required">*</abbr> First Name</label>
                                                <input class="string required form-control" autofocus="autofocus" placeholder="e.g. Jane" type="text" value="<?php echo (isset($user) ? $user['first_name'] : ''); ?>" name="first_name" id="employee_first_name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group string required employee_last_name"> <label class="string required control-label" for="employee_last_name"><abbr title="required">*</abbr> Last Name</label><input class="string required form-control" placeholder="e.g. Doe" type="text" value="<?php echo (isset($user) ? $user['last_name'] : ''); ?>" name="last_name" id="employee_last_name"></div>
                                        </div>
                                    </div>
                                    <div class="form-group string optional employee_mobile_number"><label class="string optional control-label" for="employee_mobile_number">Mobile Number</label><input class="string optional tel-input form-control" data-default-country="in" pattern="\d*" type="text" name="mobile" id="employee_mobile_number" placeholder="9123456789" value="<?php echo (isset($user) ? $user['mobile'] : ''); ?>" maxlength="15"></div></div>
                                <div class="form-group email required employee_email"><label class="email required control-label" for="employee_email"><abbr title="required">*</abbr> Email</label><input class="string email required form-control" placeholder="mail@example.com" type="email" value="<?php echo (isset($user) ? $user['email'] : ''); ?>" name="email" id="employee_email" readonly="true"></div>
                            </div>
                            <div id="password">
                                <p>To change your password, complete the fields below:</p>
                                <div class="form-group password optional employee_current_password"><label class="password optional control-label" for="employee_current_password">Current password</label><input class="password optional form-control" type="password" name="current_password" id="employee_current_password"></div>
                                <div class="form-group password optional employee_password"><label class="password optional control-label" for="employee_password">New password</label><input class="password optional form-control" type="password" name="password" id="employee_password"></div>
                                <div class="form-group password optional employee_password_confirmation"><label class="password optional control-label" for="employee_password_confirmation">Verify password</label><input class="password optional form-control" type="password" name="password_confirmation" id="employee_password_confirmation"  ></div>
                            </div>
                            <div class="m-t-20">
                                <input type="submit" name="commit" value="Save Changes" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--</div>-->
</div>
<script>
    $(function () {
        $(".btn-success").click(function () {
            var password = $("#employee_password").val();
            var confirmPassword = $("#employee_password_confirmation").val();
            var currentPassword = $("#employee_current_password").val();

            if (currentPassword == '') {
                alert("Current password is required.");
                return false;
            } else if (currentPassword != "<?php echo $user['password'] ?>") {
                alert("Incorrect Current password.");
                return false;
            }

            if (password != confirmPassword) {
                alert("New password and Verify password do not match.");
                return false;
            }
            return true;
        });
    });
</script>

