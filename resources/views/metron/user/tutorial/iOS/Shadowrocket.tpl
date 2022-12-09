<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Shadowrocket Using the tutorial &mdash; {$config["appName"]}</title>
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
                                        <h2 class="text-white font-weight-bold my-2 mr-5">Shadowrocket Using the tutorial</h2>
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
                                                            <p>ShadowrocketIs a debugging tool based on the rules of the network, has high performance and good stability, the use of fluent, the characteristic of diversity of function, only takes up the least amount of system resources, fully take over all of the connection, according to the rules for processing, make you happy.Unique scene mode, convenient automatic switch configuration and node according to different needs.</p>
                                                            <p>Due to theApp StoreChinaAll kind of software, so the software area, port etc in the United States not only the areaArea, port etc ofCan be downloaded, and the software is charging software, charge for developers.And the software is software, charge for developers.
                                                            {if $metron['ios_account'] != ''}
                                                            <p>This site provide have bought the software to conform to the requirements of the memberApple IDShared account to download, conditional suggestion search relevant tutorial to the registered district account to buy the software to support the developers.</p>
                                                            {/if}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-5">
                                                        <a class="image-popup-no-margins" href="{$metron['assets_url']}/media/tutorial/ios/shadowrocket/shadowrocket.jpg" data-lightbox="images">
                                                        <img class="rounded-lg" style="width:100%" src="{$metron['assets_url']}/media/tutorial/ios/shadowrocket/shadowrocket.jpg"/></a>
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
                                                                <p class="mb-2">ShadowrocketforApp StoreStore paid software, in order to prevent frequent login caused by titles, Shared account only <code>Lv.{$metron['ios_class']}Or more members</codeTo provide.For.<br>
                                                                When you become a <code>Lv.{$metron['ios_class']}Or more members</code> when(Do not include triaThe page will automatically display Shared account.Automatically display Shared account.<br>
                                                                You can download through other channels for installationShadowrocket, specific to search engines for resources.</p>
                                                            </div>
                                                        </div>
                                                        {/if}
                                                        {else}
                                                        <div class="alert alert-primary" role="alert">
                                                            <div class="alert-text mt-3">
                                                                <h4 class="alert-heading">You need to hold the country sectionApple ID</h4>
                                                                <hr>
                                                                <p class="mb-2">
                                                                    ShadowrocketforApp StoreStore paid software, and is in China Apple ID Only you can download.<br />
                                                                    You need to have in ChinaApple IDAnd buy aShadowrocketAccount.<br />
                                                                    This site does not Online search related registration of the areaevant accounts, you need to resolve itself.(Online search related registration of the areaIDThe tutorial, Then in a treasure to buy gift CARDS, prepaid phone and buy software)
                                                                </p>
                                                            </div>
                                                        </div>
                                                        {/if}
                                                        <br />
                                                        <p class="mb-2">Open the phone<code>Set up the</code> -> <code>iTunes Store with App Store</code> ->use <coThe Chinese sectionThe Chinese section Apple ID </code>The login</p>
                                                        <p class="mb-2">After a successful login App Store Will switch the corresponding language, inTo install search box input <code>Shadowrocket</code> To install</p>
                                                        <p class="mb-2">The installation is complete, can open normallyaSet up theafOpen the phoneOpen the phone<code>Set up the</code> -> <code>iTunes Store with App StoExit the Shared account, no longer needed after the installation is completeThat is no longer required after the installation is complete, so please don't keep the cell phone to log in.Remain in the mobile phone to log in.</p>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-5">
                                                        <a class="image-popup-no-margins" href="{$metron['assets_url']}/media/tutorial/ios/shadowrocket/01.png" data-lightbox="images">
                                                        <img class="rounded-lg" style="width:100%" src="{$metron['assets_url']}/media/tutorial/ios/shadowrocket/01.png"/></a>
                                                    </div>
                                                </div>

                                                <div class="separator separator-dashed separator-border-4"></div>

                                                <div class="row p-5">
                                                    <div class="col-sm-12 col-md-12 col-lg-7 pb-5">
                                                        <p class="font-size-h1 pb-5"><strong>2. Set the subscription address</strong></p>
                                                        <div class="btn-group mb-3 mr-3">
                                                            <button type="button" class="btn btn-pill btn-shadowrocket dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">&nbsp;&nbsp;<i class="metron-shadowrocket text-white"></i>Shadowrocket To subscribe to&nbsp;&nbsp;</button>
                                                            <div class="dropdown-menu">
                                                                <button type="button" class="dropdown-item copy-text" data-clipboard-text="{$subInfo["shadowrocket"]}">copy Shadowrocket To subscribe to</button>
                                                                <div class="dropdown-divider"></div>
                                                                <button type="button" class="dropdown-item" href="##" onclick="importSublink('shadowrocket')">A key to import Shadowrocket</button>
                                                            </div>
                                                        </div>
                                                        <p class="mb-2">Click on the button above import node configuration to a keyShadowrocket</p>
                                                        <p class="mb-2">If the node after import not show, please restartShadowrocket</p>
                                                        <p class="mb-2">Click on the bottom bar <code>Set up the</code> -> <code>Server subscription</code> -> To enable the <code>When open the update</code></p>
                                                        <p class="mb-2">So that every time after open the client will automatically update the latest nodes</p>
                                                        <br />

                                                        <div class="alert alert-custom alert-outline-primary fade show mb-5" role="alert">
                                                            <div class="alert-icon">
                                                                <i class="flaticon-warning"></i>
                                                            </div>
                                                            <div class="alert-text">
                                                                <p class="mb-2">Unable to import a key? Try manually subscription</p>
                                                                <p class="mb-2">inAPPClick on the upper right corner of the home page + No.</p>
                                                                <p class="mb-2">type choose <code>Subscribe</code> , And paste tA barthe subscription addressURLA bar, Note to fill in {$config["appName"]} - Click finish</p>
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
                                                        <a class="image-popup-no-margins" href="{$metron['assets_url']}/media/tutorial/ios/shadowrocket/02.png" data-lightbox="images">
                                                        <img class="rounded-lg" style="width:100%" src="{$metron['assets_url']}/media/tutorial/ios/shadowrocket/02.png"/></a>
                                                    </div>
                                                </div>

                                                <div class="separator separator-dashed separator-border-4"></div>

                                                <div class="row p-5">
                                                    <div class="col-sm-12 col-md-12 col-lg-7 pb-5">
                                                        <p class="font-size-h1 pb-5"><strong>3. Add the rule configuration</strong></p>
                                                        <button type="button" class="btn btn-pill btn-shadowrocket copy-text mb-4" data-clipboard-text="{$metron['shadowrocket_conf']}"><i class="fa fa-copy text-white"></i>&nbsp;&nbsp;Copy the configuration link</button>
                                                        <p class="mb-2">Click on the bottom bar<code>configuration</code>, the choice of<code>Add the configuration</code>,<code>Paste copy the configuration of the links above</code>,<code>download</code></p>
                                                        <p class="mb-2">Then click on Remote file new configuration file address, in the pop-up menu, choose the second<code>Using a configuration</code></p>
                                                        <p class="mb-2">At thisWill automatically start downloading the configuration and application configuration.Download the configuration and application configuration.</p>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-5">
                                                        <a class="image-popup-no-margins" href="{$metron['assets_url']}/media/tutorial/ios/shadowrocket/03.png" data-lightbox="images">
                                                        <img class="rounded-lg" style="width:100%" src="{$metron['assets_url']}/media/tutorial/ios/shadowrocket/03.png"/></a>
                                                    </div>
                                                </div>

                                                <div class="separator separator-dashed separator-border-4"></div>

                                                <div class="row p-5">
                                                    <div class="col-sm-12 col-md-12 col-lg-7 pb-5">
                                                        <p class="font-size-h1 pb-5"><strong>4. Open the agent</strong></p>
                                                        <p class="mb-2"><code>Back to thehome page</co, click to enterClick to enter<code>The global routing</code>Change it to <code>configuration</configurationde></p>
                                                        <p class="mb-2">Choose the nodes in a node list, yellow spot said the currently selected node</p>
                                                        <p class="mb-2">Click on the switch at the top of the agent</p>
                                                        <p class="mb-2">If it is the first time open will pop upVPNBe sure to click on the application of file<code>Allow</code>And verify</p>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-5">
                                                        <a class="image-popup-no-margins" href="{$metron['assets_url']}/media/tutorial/ios/shadowrocket/04.png" data-lightbox="images">
                                                        <img class="rounded-lg" style="width:100%" src="{$metron['assets_url']}/media/tutorial/ios/shadowrocket/04.png"/></a>
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