{include file='admin/main.tpl'}

<main class="content">
    <div class="content-header ui-content-header">
        <div class="container">
            <h1 class="content-heading">Add the goods</h1>
        </div>
    </div>
    <div class="container">
        <div class="col-lg-12 col-sm-12">
            <section class="content-inner margin-top-no">

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">
                            <div class="form-group form-group-label">
                                <label class="floating-label" for="name">The name of the</label>
                                <input class="form-control maxwidth-edit" id="name" type="text">
                            </div>


                            <div class="form-group form-group-label">
                                <label class="floating-label" for="price">The price</label>
                                <input class="form-control maxwidth-edit" id="price" type="text">
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="auto_renew">Automatically renew the number of days</label>
                                <input class="form-control maxwidth-edit" id="auto_renew" type="text" value="0">
                                <p class="form-control-guide"><i class="material-icons">info</i>0To not allow automatic renewal, as in so many other days will automatically delimit money deduction from the user's account
                                </p>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="bandwidth">Flow )GB)</label>
                                <input class="form-control maxwidth-edit" id="bandwidth" type="text">
                            </div>

                            <div class="form-group form-group-label">
                                <div class="checkbox switch">
                                    <label for="auto_reset_bandwidth">
                                        <input class="access-hide" id="auto_reset_bandwidth" type="checkbox"><span
                                                class="switch-toggle"></span>Continue time consuming automatic reset user flow for the above flow value
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="limitamount">Limit the purchase quantity</label>
                                <input class="form-control maxwidth-edit" id="limitamount" type="text" value="0">
                                <p class="form-control-guide"><i class="material-icons">info</i>According to all users, The cumulative effect package for the package, More than the number of other users can't buy, 0 To not limit</p>
                                <p class="form-control-guide"><i class="material-icons">info</i>If other users set expires didn't buy the meal, The automatic have1Seats can be purchased</p>
                            </div>

                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="traffic-package-min">Minimum can buy user level</label>
                                <input class="form-control maxwidth-edit" id="traffic-package-min" type="text">
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="traffic-package-max">Could buy user level</label>
                                <input class="form-control maxwidth-edit" id="traffic-package-max" type="text">
                            </div>

                            <div class="form-group form-group-label">
                                <div class="checkbox switch">
                                    <label for="traffic-package-enable">
                                        <input class="access-hide" id="traffic-package-enable" type="checkbox"><span
                                                class="switch-toggle"></span>Whether to set up this goods for traffic overlay package
                                    </label>
                                    <p class="form-control-guide">
                                        <i class="material-icons">info</i>
                                        After the bag is set to flow superposition except get traffic when buying setting is invalid
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="expire">Validity of account number</label>
                                <input class="form-control maxwidth-edit" id="expire" type="text" value="0">
                            </div>
                            <div class="form-group form-group-label">
                                <label class="floating-label" for="node_group">The user group</label>
                                <input class="form-control maxwidth-edit" id="node_group" type="text" value="-1">
                                <p class="form-control-guide"> <i class="material-icons">info</i> Customers buy the package will be modified into this packet,   -1 Don't assign, Keep the user default</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="class">level</label>
                                <input class="form-control maxwidth-edit" id="class" type="text" value="0">
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="class_expire">Rating validity days</label>
                                <input class="form-control maxwidth-edit" id="class_expire" type="text" value="0">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">
                            <div class="form-group form-group-label">
                                <label class="floating-label" for="reset_exp">How many days</label>
                                <input class="form-control maxwidth-edit" id="reset_exp" type="number" value="0">
                            </div>


                            <div class="form-group form-group-label">
                                <label class="floating-label" for="reset">How many days per</label>
                                <input class="form-control maxwidth-edit" id="reset" type="number" value="0">
                            </div>

                            <div class="form-group form-group-label">
                                <label class="floating-label" for="reset_value">How much for reset flowG</label>
                                <input class="form-control maxwidth-edit" id="reset_value" type="number" value="0">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">
                            <div class="form-group form-group-label">
                                <label class="floating-label" for="speedlimit">Port speed limit</label>
                                <input class="form-control maxwidth-edit" id="speedlimit" type="number" value="0">
                            </div>


                            <div class="form-group form-group-label">
                                <label class="floating-label" for="connector">IPlimit</label>
                                <input class="form-control maxwidth-edit" id="connector" type="number" value="0">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">
                            <div class="form-group form-group-label">
                                <label class="floating-label" for="content_extra">Service support</label>
                                <input class="form-control maxwidth-edit" id="content_extra" type="text" value="">
                                <p class="form-control-guide"><i class="material-icons">info</i>Ex. :<code>check-Global node distribution;clear-Quick customer response</code>, a minus sign is on the lefticonCode name for the text on the right,In order to;separated
                                </p>
                                <p class="form-control-guide">iconCode refer to:<a
                                            href="https://material.io/tools/icons/?icon=clear&style=baseline">Material-icon</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-main">
                        <div class="card-inner">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-10 col-md-push-1">
                                        <button id="submit" type="submit"
                                                class="btn btn-block btn-brand waves-attach waves-light">add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {include file='dialog.tpl'}


        </div>


    </div>
</main>

{include file='admin/footer.tpl'}


<script>
    window.addEventListener('load', () => {
        function submit() {
            if ($$.getElementById('auto_reset_bandwidth').checked) {
                var auto_reset_bandwidth = 1;
            } else {
                var auto_reset_bandwidth = 0;
            }

            let contentExtra = $$getValue('content_extra');
            if (contentExtra === '') {
                contentExtra = 'check-Global node distribution;check-Quick customer response;check-The platform to the client';
            }

            let data = {
                name: $$getValue('name'),
                auto_reset_bandwidth,
                price: $$getValue('price'),
                auto_renew: $$getValue('auto_renew'),
                bandwidth: $$getValue('bandwidth'),
                speedlimit: $$getValue('speedlimit'),
                connector: $$getValue('connector'),
                expire: $$getValue('expire'),
                class: $$getValue('class'),
                class_expire: $$getValue('class_expire'),
                reset: $$getValue('reset'),
                reset_value: $$getValue('reset_value'),
                reset_exp: $$getValue('reset_exp'),
                node_group: $$getValue('node_group'),
                limitamount: $$getValue('limitamount'),
                content_extra: contentExtra,
            }

            if ($$.getElementById('traffic-package-enable').checked) {
                data.traffic_package = {
                    class: {
                        min: $$getValue('traffic-package-min'),
                        max: $$getValue('traffic-package-max')
                    }
                }
            } 
            
            $.ajax({
                type: "POST",
                url: "/admin/shop",
                dataType: "json",
                data,
                success: data => {
                    if (data.ret) {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                        window.setTimeout("location.href=top.document.referrer", {$config['jump_delay']});
                    } else {
                        $("#result").modal();
                        $$.getElementById('msg').innerHTML = data.msg;
                    }
                },
                error: jqXHR => {
                    $("#result").modal();
                    $$.getElementById('msg').innerHTML = `An error occurred：${
                            jqXHR.status
                            }`;
                }
            });
        }

        $("html").keydown(event => {
            if (event.keyCode == 13) {
                submit();
            }
        });

        $$.getElementById('submit').addEventListener('click', submit);
    })
</script>
