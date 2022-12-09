<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Quantumult Using the tutorial &mdash; {$config["appName"]}</title>
        <link href="{$metron['assets_url']}/css/client/metron-icon.css" rel="stylesheet" type="text/css" />
        <link href="{$metron['assets_url']}/plugins/tutorial/lightbox/lightbox.min.css" rel="stylesheet" >
        {include file='include/global/head.tpl'}
        <div class="d-flex flex-column flex-root">
            <div class="d-flex flex-row flex-column-fluid page">
                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    {include file='include/global/menu.tpl'}
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <div class="subheader min-h-lg-175px pt-5 pb-7 subheader-transparent" id="kt_subheader">
                            <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <div class="d-flex align-items-center flex-wrap mr-2">
                                    <div class="d-flex flex-column">
                                        <h2 class="text-white font-weight-bold my-2 mr-5">Quantumult Using the tutorial</h2>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column-fluid">
                            <div class="container">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="card card-custom gutter-b {$metron['style_shadow']}">
                                            <div class="card-header">
                                                <div class="card-title">
                                                </div>
                                            </div>
                                            <div class="card-body">

                                                <div class="row p-5">
                                                    <div class="col-sm-12 col-md-12 col-lg-7 pb-5">
                                                        <p class="font-size-h1 pb-5"><strong>0. Introduction to the</strong></p>
                                                        <div class="example-preview">
                                                            <p>quantumult(comWith the "circle") known as With the "circle")(commonly known asadowrocket(commonly known as "Small rocket"), is a iOS The platform'Software helps wall.SSR/V2Ray Software helps wall.</p>
                                                            <p>Due to theAChina banned shelveseChina bannAll kind of software, so the software area, port etc in the United States not only the areaSoftware area, port etc in the United States not only the areaApp StoreCan be downloaded, and the software is charging software, charge for developers.</p>
                                                            {if $metron['ios_account'] != ''}
                                                            <p>This site provide have bought the software to conform to the requirements of the memberApple IDShared account to download, conditional suggestion search relevant tutorial to the registered district account to buy the software to support the developers.</p>
                                                            {/if}
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-5">
                                                        <a class="image-popup-no-margins" href="{$metron['assets_url']}/media/tutorial/ios/quantumult/quantumult.jpg" data-lightbox="images">
                                                        <img class="rounded-lg" style="width:100%" src="{$metron['assets_url']}/media/tutorial/ios/quantumult/quantumult.jpg"/></a>
                                                    </div>
                                                </div>

                                                <div class="separator separator-dashed separator-border-4"></div>

                                                <div class="row p-5">
                                                    <div class="col-sm-12 col-md-12 col-lg-7 pb-5">
                                                    <p class="font-size-h1 pb-5"><strong>1. through App Store Install the client</strong></p>
                                                        {if $metron['ios_account'] != ''}
                                                        {if $user->class >= $metron['ios_class'] && $user->class != 10}
                                                        <div class="input-group mb-3 col-md-8 col-lg-8">
                                                            <input type="text" class="form-control" value="{$metron['ios_account']}" disabled="disabled">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-primary copy-text" type="button" data-clipboard-text="{$metron['ios_account']}">Duplicate account</button>
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-3 col-md-8 col-lg-8">
                                                            <input type="text" class="form-control" value="{$metron['ios_password']}" disabled="disabled">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-primary copy-text" type="button" data-clipboard-text="{$metron['ios_password']}">Copy the password</button>
                                                            </div>
                                                        </div>
                                                        <p class="mb-2">If the account is locked, can contact the administrator for unlock, is available from other sources</p>
                                                        {else}
                                                        <div class="alert alert-primary" role="alert">
                                                            <div class="alert-text mt-3">
                                                                <h4 class="alert-heading">Your grade does not support the view Shared accounts</h4>
                                                                <hr>
                                                                <p class="mb-2">quantumultforApp StoreStore paid software, in order to prevent frequent login caused by titlesTo provide.hared account only <code>Lv.{$metron['ios_class']}Or more membeTo provide./code> To provide.<br>
                                                                When you become a <code>Lv.{$metron['ios_class']}Or more members</code> when(Do not include trial membeThe page will automatically display Shared account.Account.<br>
                                                                You can download through, specific to search engines for resources.s for installationquantumult, specific to search engines for resources.</p>
                                                            </div>
                                                        </div>
                                                        {/if}
                                                        {else}
                                                        <div class="alert alert-primary" role="alert">
                                                            <div class="alert-text mt-3">
                                                                <h4 class="alert-heading">You need to hold the country sectionApple ID</h4>
                                                                <hr>
                                                                <p class="mb-2">
                                                                    quantumultforApp StoStore paid software, and is in Chinathe Apple IDOnly you can downloadload.<br />
                                                                    You need to have in ChinaApple IDAnd buy aquantumultAccount.<br />
                                                                    This site does not provide relevant accounts, you need to resolve itself.(Online search relaThen in a treasure to buy gift CARDS, prepaid phone and buy softwareof the areaIDThe tutorial, Then in a treasure to buy gift CARDS, prepaid phone and buy software)
                                                                </p>
                                                            </div>
                                                        </div>
                                                        {/if}
                                                        <br />
                                                        <p class="mb-2">Open the phone<code>Set up the</code> -> <code>iTunes Store with App Store</code> ->use <code>The Chinese section Apple ID </code>The login</p>
                                                        <p class="mb-2">After a successfWill switch the corresponding language, in the search box inputore Will switch the corresponding language, in the search box input <code>quantumult</code> To install</p>
                                                        <p class="mb-2">The installation is complete, can open normallyappafOpen the phoneOpen the phone<code>Set up the</code> -> <code>iTunes Store with App Store</code> Exit the Shared account, no longer needed after the installation is completeAppe ID, so please don't keep the cell phone to log in.</p>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-5">
                                                        <a class="image-popup-no-margins" href="{$metron['assets_url']}/media/tutorial/ios/quantumult/quantumult.jpg" data-lightbox="images">
                                                        <img class="rounded-lg" style="width:100%" src="{$metron['assets_url']}/media/tutorial/ios/quantumult/quantumult.jpg"/></a>
                                                    </div>
                                                </div>

                                                <div class="separator separator-dashed separator-border-4"></div>

                                                <div class="row p-5">
                                                    <div class="col-sm-12 col-md-12 col-lg-7 pb-5">
                                                        <p class="font-size-h1 pb-5"><strong>2. Set the subscription address</strong></p>
                                                        <div class="btn-group mb-3 mr-3">
                                                            <button type="button" class="btn btn-pill btn-quantumult dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">&nbsp;&nbsp;<i class="metron-quantumult"></i>Quantumult To subscribe to&nbsp;&nbsp;</button>
                                                            <div class="dropdown-menu">
                                                                <button type="button" class="dropdown-item copy-text" data-clipboard-text="{$subInfo["ssr"]}">copy SSNode subscriptionTo subscribe to</button>
                                                                <button type="button" class="dropdown-item copy-text" data-clipboard-text="{$subInfo["quantumult_v2"]}">copy V2ray Node subscription</button>
                                                                <div class="dropdown-divider"></div>
                                                                <button type="button" class="dropdown-item" href="##" onclick="importSublink('quantumult')">A key to import SSR Node subscription</button>
                                                                <button type="button" class="dropdown-item" href="##" onclick="importSublink('quantumult_v2')">A key to import V2Ray Node subscription</button>
                                                            </div>
                                                        </div>
                                                        <p class="mb-2">Click on the button above import node configuration to a keyquantumult</p>
                                                        <p class="mb-2">If the node after import not show, please restartquantumult</p>
                                                        <br />

                                                        <div class="alert alert-custom alert-outline-primary fade show mb-5" role="alert">
                                                            <div class="alert-icon">
                                                                <i class="flaticon-warning"></i>
                                                            </div>
                                                            <div class="alert-text">
                                                                <p class="mb-2">In turn, click <code>Set up the</code> - <code>To subscribe to</The top right cornere> - rightNo.Angle <No.ode>+</code>No. - <code>The server</code></p>
                                                                <p class="mb-2">Name at random to fill out - Sticking to the subscription address<code>link</code>A bar after save</p>
                                                                <p class="mb-2">Scroll left just add subscription, Click on the update</p>
                                                            </div>
                                                            <div class="alert-close">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="guan">
                                                                    <span aria-hidden="true">
                                                                        <i class="ki ki-close"></i>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-5">
                                                        <a class="image-popup-no-margins" href="{$metron['assets_url']}/media/tutorial/ios/quantumult/quantumult.jpg" data-lightbox="images">
                                                        <img class="rounded-lg" style="width:100%" src="{$metron['assets_url']}/media/tutorial/ios/quantumult/quantumult.jpg"/></a>
                                                    </div>
                                                </div>

                                                <div class="separator separator-dashed separator-border-4"></div>

                                                <div class="row p-5">
                                                    <div class="col-sm-12 col-md-12 col-lg-7 pb-5">
                                                        <p class="font-size-h1 pb-5"><strong>3. Add the rule configuration</strong></p>
                                                        <button type="button" class="btn btn-pill btn-quantumult copy-text mb-4" data-clipboard-text="{$subInfo["quantumult_conf"]}"><i class="fa fa-copy text-white"></i>&nbsp;&nbsp;Copy the configuration link</button>
                                                        <p class="mb-2">In the same<code>Set up the</code> - <code>To subscribe to</code> - The top right corner <code>+</code>No. - <code>shunt</code></p>
                                                        <p class="mb-2">Name at random to fill out - Paste the configuration address<code>link</code>A bar after save</p>
                                                        <p class="mb-2">Scroll left just add bypass configuration, Click on the add or replace</p>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-5">
                                                        <a class="image-popup-no-margins" href="{$metron['assets_url']}/media/tutorial/ios/quantumult/quantumult.jpg" data-lightbox="images">
                                                        <img class="rounded-lg" style="width:100%" src="{$metron['assets_url']}/media/tutorial/ios/quantumult/quantumult.jpg"/></a>
                                                    </div>
                                                </div>

                                                <div class="separator separator-dashed separator-border-4"></div>

                                                <div class="row p-5">
                                                    <div class="col-sm-12 col-md-12 col-lg-7 pb-5">
                                                        <p class="font-size-h1 pb-5"><strong>4. Open the agent</strong></p>
                                                        <p class="mb-2"><code>Back to the home page</code>Square icon, click on the lower right corner, choose <code>Automatic shunt</code></p>
                                                        <p class="mb-2">Click on the middleAPPtheLogoIcon to open the node list(The lower left button can test node)</p>
                                                        <p class="mb-2">Select nodes and then click the blank back, And open the top Quantumult The switch on the right</p>
                                                        <p>If it is the first time open will pop upVPNBe sure to click on the application of file<code>Allow</code>And verify</p>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-5">
                                                        <a class="image-popup-no-margins" href="{$metron['assets_url']}/media/tutorial/ios/quantumult/quantumult.jpg" data-lightbox="images">
                                                        <img class="rounded-lg" style="width:100%" src="{$metron['assets_url']}/media/tutorial/ios/quantumult/quantumult.jpg"/></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
							</div>
						</div>
					</div>
                    {include file='include/global/footer.tpl'}
				</div>
			</div>
		</div>

        {include file='include/global/scripts.tpl'}
        {include file='include/global/import_sublink.tpl'}
        <script src="{$metron['assets_url']}/plugins/tutorial/lightbox/lightbox.min.js" type="text/javascript"></script>
    </body>
</html>