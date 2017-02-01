<style>
    .main-content {
        /*margin-left: 65px;*/
        -webkit-transition: margin-left 0.25s, -webkit-transform 0.25s;
        transition: margin-left 0.25s, -webkit-transform 0.25s;
        transition: transform 0.25s, margin-left 0.25s;
        transition: transform 0.25s, margin-left 0.25s, -webkit-transform 0.25s;
        position: relative;
        min-height: 100%;
    }
    .main-content--grey {
        background-color: #f0f0f0;
    }

    div {
        display: block;
    }
    .page-wrapper {
        padding: 30px;
    }
    .box-container {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        background-color: #f0f0f0;
    }

    .box {
        background-color: #fff;
        box-shadow: 0 1px 1px rgba(0,0,0,0.05);
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 calc(50% - 15px);
        -ms-flex: 0 0 calc(50% - 15px);
        flex: 0 0 calc(50% - 15px);
        margin-bottom: 30px;
        padding: 20px;
        width: calc(50% - 15px);
    }

    .box:nth-child(odd) {
        margin-right: 30px;
    }

    .box__title {
        /*        font-family: "Montserrat";*/
        font-weight: bold;
        text-transform: uppercase;
    }

    ul, ol {
        margin-top: 0;
        margin-bottom: 10px;
    }
    .link-list {
        list-style-type: none;
        margin-bottom: 0;
        margin-top: 15px;
        padding-left: 0;
    }

    ul>li, ol>li {
        padding-left: 3px;
        line-height: 24px;
        display: list-item;
        text-align: -webkit-match-parent;
    }
    a {
        text-shadow: none !important;
        color: #3a8ec8;
        -webkit-transition: color 0.1s linear 0s,background-color 0.1s linear 0s,opacity 0.2s linear 0s !important;
        transition: color 0.1s linear 0s,background-color 0.1s linear 0s,opacity 0.2s linear 0s !important;    
        background-color: transparent;
        color: #337ab7;
        text-decoration: none;

    }
    a:focus, a:hover, a:active {
        outline: 0 !important;
        text-decoration: none;
        color: #48b0f7;
    }
    a:hover, a:focus {
        color: #23527c;
        text-decoration: underline;
    }
    .link-list__link {
        font-size: 1.23076923em;
        line-height: 2;
    }

</style>
<section class="main-content main-content--grey">
    <section class="page-wrapper page-wrapper--horizont">

        <div class="box-container">
            <!--            <div class="box box--left">
                            <div class="box__title">
                                Account Setup
                            </div>
                            <ul class="link-list">
                                <li>
                                    <a class="link-list__link" href="/provider/company_details">Company Details</a>
                                </li>
                                <li>
                                    <a class="link-list__link" href="/locations">Locations</a>
                                </li>
                                <li>
                                    <a class="link-list__link" href="/resources">Resources</a>
                                </li>
                                <li>
                                    <a class="link-list__link" href="/provider/calendar">Calendar Settings</a>
                                </li>
                                <li>
                                    <a class="link-list__link" href="/provider/online_booking">Online Booking Settings</a>
                                </li>
                                <li>
                                    <a class="link-list__link" href="/communication_config/staff">Staff Notifications</a>
                                </li>
                            </ul>
                        </div>-->
            <div class="box box--left">
                <div class="box__title">
                    Point of Sale
                </div>
                <ul class="link-list">
                    <!--                    <li>
                                            <a class="link-list__link" href="/payment_methods">Payment Types</a>
                                        </li>-->
                    <li>
                        <a class="link-list__link" href="/provider/taxes">Taxes</a>
                    </li>
                    <li>
                        <a class="link-list__link" href="/discounts">Discount Types</a>
                    </li>
                    <!--                    <li>
                                            <a class="link-list__link" href="/provider/sales_settings">Sales Settings</a>
                                        </li>-->
                </ul>
            </div>
            <div class="box box--left">
                <div class="box__title">
                    Client Settings
                </div>
                <ul class="link-list">
                    <!--                    <li>
                                            <a class="link-list__link" href="/communication_config/clients">Client Notifications</a>
                                        </li>-->
                    <li>
                        <a class="link-list__link" href="/provider/referral_sources">Referral Sources</a>
                    </li>
                    <li>
                        <a class="link-list__link" href="/provider/cancellation_reasons">Cancellation Reasons</a>
                    </li>
                    <li>
                        <a class="link-list__link" href="/user/permissions">User Permissions</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</section>