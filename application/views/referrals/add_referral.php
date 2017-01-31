<div aria-hidden="true" aria-labelledby="referralModal" class="modal slide-up in" id="newReferralModal" role="dialog" tabindex="-1" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-center">
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        <i class="pg-close fs-14"></i>
                    </button>
                    <h4><?php echo (!empty($referralSources['id'])) ? "Edit Referral Source" : "New Referral Source" ?></h4>
                </div>
                <form class="simple_form new_referral" id="new_referral" method="post">
                    <input type="hidden" name="referral_id" value="<?php echo $referralSources['id']; ?>"/>
                    <div class="modal-body">
                        <div class="alert alert-danger hide"></div>
                        <div class="form-group">
                            <div class="form-group string required referral_source_name">
                                <label class="string required control-label" for="referral_source_name">
                                    <abbr title="required">*</abbr> Name
                                </label>
                                <input class="string required form-control" placeholder="e.g. Local promotion" type="text" name="referral_source[name]" id="referral_source_name" value="<?php echo $referralSources['referralname'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="referral_source_active">
                                <input name="referral_source[active]" type="hidden" value=<?php echo ((!empty($referralSources['active'])) ? $referralSources['active'] : "1") ?>>
                                <input class="ios-switch-cb" type="checkbox" value="<?php echo ((!empty($referralSources['active'])) ? ($referralSources['active']) : "1") ?>" <?php echo (!empty($referralSources['active'])) ? (($referralSources['active'] == 1) ? 'checked="checked"' : '') : 'checked="checked"'; ?> name="referral_source[active]" id="referral_source_active">
                                <span class="switchery m-r-10"></span>
                                <span>Active</span>
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="pull-left">
                        </div>
                        <button aria-hidden="true" class="btn btn-default" data-dismiss="modal" type="button">
                            Cancel
                        </button>
                        <input type="submit" name="commit" value="Save" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>

    $("#new_referral").validator().on("submit", function (event) {
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            alert(g.base_url);
            $.ajax({
                url: '/provider/addReferralSources',
                type: 'post',
                dataType: 'json',
                data: $('form#new_referral').serialize(),
                success: function (data) {
                    if (data.success) {
                        window.location = g.base_url + 'provider/settings';//location.pathname;
                    } else {
                        $('.alert-danger').removeClass('hide').html(data.error)
                    }
                }
            });
        }
    });

</script>