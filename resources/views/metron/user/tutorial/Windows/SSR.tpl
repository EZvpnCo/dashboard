<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SSR Using the tutorial &mdash; {$config["appName"]}</title>
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
                                        <h2 class="text-white font-weight-bold my-2 mr-5">SSR for Windows Using the tutorial</h2>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column-fluid">
                            <div class="container">

                                <!-- start :: The tutorial content -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card card-custom gutter-b {$metron['style_shadow']}">
                                            <div class="card-header">
                                                <div class="card-title">
                                                </div>
                                            </div>
                                            <div class="card-body">

<!-- start :: Content of the paragraph 1 -->
                                                <div class="row p-5">

                                                    <!-- start :: Paragraph text area -->
                                                    <div class="col-sm-12 col-md-12 col-lg-7 pb-5">
                                                        <!-- start :: Section titles -->
                                                        <p class="font-size-h1 pb-5"><strong>0. Introduction to the</strong></p>
                                                        <!-- The end of the :: Section titles -->
                                                        <div class="example-preview">
                                                            <p>ShadowsocksRIs often referred to asSSR, yogurt, small aircraft (pink), the paper planes (pink)</p>
                                                            <p>By "broken Eva sauce" launched a project, and is one of the popular science and Internet technology.</p>
                                                            <p>SSRThere is no official web site, the project code in custodyGithub, has already cut development, customer comprised of volunteers to maintain.</p>
                                                        </div>
                                                    </div>
                                                    <!-- The end of the :: Paragraph text area -->

                                                    <!-- start :: The picture -->
                                                    <div class="col-sm-12 col-md-12 col-lg-5">
                                                        <!-- Click to open the light box Gao Qingtu -->
                                                        <a class="image-popup-no-margins" href="{$metron['assets_url']}/media/tutorial/windows/ssr/ssr.jpg" data-lightbox="images">
                                                        <!-- Page displays the photo thumbnails -->
                                                        <img class="rounded-lg" style="width:100%" src="{$metron['assets_url']}/media/tutorial/windows/ssr/ssr.jpg"/></a>
                                                    </div>
                                                    <!-- The end of the :: The picture -->

                                                </div>
<!-- The end of the :: Content of the paragraph 1 -->

                                                <!-- start :: The divider -->
                                                <div class="separator separator-dashed separator-border-4"></div>
                                                <!-- The end of the :: The divider -->

<!-- start :: Content of the paragraph 2 -->
                                                <div class="row p-5">
                                                    <!-- Content of the paragraph -->
                                                    <div class="col-sm-12 col-md-12 col-lg-7 pb-5">
                                                        <!-- start :: Section titles -->
                                                        <p class="font-size-h1 pb-5"><strong>1. Download the client</strong></p>
                                                        <!-- The end of the :: Section titles -->
                                                        <a href="{$metron['client_windows']['ssr']['down']}" class="btn btn-pill btn-ssr mb-4" target="_blank">&nbsp;&nbsp;<i class="metron-ssr1 text-white"></i>download SSR The client</a>
                                                        <p class="mb-2">After the download into any directory</p>
                                                        <p class="mb-2">Open the run in the directory <code>exe</code> The suffix file</p>
                                                    </div>
                                                    <!-- start :: The picture -->
                                                    <div class="col-sm-12 col-md-12 col-lg-5">
                                                        <a class="image-popup-no-margins" href="{$metron['assets_url']}/media/tutorial/windows/ssr/ssr.jpg" data-lightbox="images">
                                                        <img class="rounded-lg" style="width:100%" src="{$metron['assets_url']}/media/tutorial/windows/ssr/ssr.jpg"/></a>
                                                    </div>
                                                    <!-- The end of the :: The picture -->
                                                </div>
<!-- The end of the :: Content of the paragraph 2 -->

                                                <!-- start :: The divider -->
                                                <div class="separator separator-dashed separator-border-4"></div>
                                                <!-- The end of the :: The divider -->

<!-- start :: Content of the paragraph 3 -->
                                                <div class="row p-5">
                                                    <div class="col-sm-12 col-md-12 col-lg-7 pb-5">
                                                        <!-- start :: Section titles -->
                                                        <p class="font-size-h1 pb-5"><strong>2. Set the subscription address</strong></p>
                                                        <!-- The end of the :: Section titles -->
                                                        <div class="btn-group mb-3 mr-3">
                                                            <button type="button" class="btn btn-pill btn-ssr dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">&nbsp;&nbsp;<i class="metron-ssr1 text-white"></i>SSR To subscribe to&nbsp;&nbsp;</button>
                                                            <div class="dropdown-menu">
                                                                <button type="button" class="dropdown-item copy-text" data-clipboard-text="{$subInfo["ssr"]}">copy SSTo subscribe toTo subscribe to</button>
                                                                <div class="dropdown-divider">
                                                                </div>
                                                                <button type="button" class="dropdown-item" href="##" onclick="importSublink('ssr')">A key to import SSR</button>
                                                            </div>
                                                        </div>
                                                        <p class="mb-2">Click on the button above a key subscribe to import the nodeSSR (First openSSRThe client)</p>
                                                        <p class="mb-2">Check the <code>Automatic updates</code> And click the <code>Save and update</code> , Click ok after the success</p>
                                                        <br />
                                                        <div class="alert alert-custom alert-outline-primary fade show mb-5" role="alert">
                                                            <div class="alert-icon">
                                                                <i class="flaticon-warning"></i>
                                                            </div>
                                                            <div class="alert-text">
                                                                <p class="mb-2">Unable to import a key? Try manually subscription</p>
                                                                <p class="mb-2">copy SSR Subscribe to the address</p>
                                                                <p class="mb-2">Right click on the Paper airplane icon, choose <code>To subscribe to</code> - <code>Set up the</code> </p>
                                                                <p class="mb-2">Click on the <code>add</code>, Paste the subscription address <code>The url</code> A bar and then click the <code>Save and update</code> </p>
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
                                                        <a class="image-popup-no-margins" href="{$metron['assets_url']}/media/tutorial/windows/ssr/ssr.jpg" data-lightbox="images">
                                                        <img class="rounded-lg" style="width:100%" src="{$metron['assets_url']}/media/tutorial/windows/ssr/ssr.jpg"/></a>
                                                    </div>
                                                </div>
<!-- The end of the :: Content of the paragraph 3 -->

                                                <!-- start :: The divider -->
                                                <div class="separator separator-dashed separator-border-4"></div>
                                                <!-- The end of the :: The divider -->

<!-- start :: Content of the paragraph 4 -->
                                                <div class="row p-5">
                                                    <div class="col-sm-12 col-md-12 col-lg-7 pb-5">
                                                        <!-- start :: Section titles -->
                                                        <p class="font-size-h1 pb-5"><strong>3. Select the node</strong></p>
                                                        <!-- The end of the :: Section titles -->
                                                        <p class="mb-2">Right click on the Paper achooseplane icon, choose <code>The server</code> - <code>{$config["appName"]}</code> </p>
                                                        <p class="mb-2">Choose to suit your node</p>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-5">
                                                        <a class="image-popup-no-margins" href="{$metron['assets_url']}/media/tutorial/windows/ssr/ssr.jpg" data-lightbox="images">
                                                        <img class="rounded-lg" style="width:100%" src="{$metron['assets_url']}/media/tutorial/windows/ssr/ssr.jpg"/></a>
                                                    </div>
                                                </div>
<!-- The end of the :: Content of the paragraph 4 -->

                                                <!-- start :: The divider -->
                                                <div class="separator separator-dashed separator-border-4"></div>
                                                <!-- The end of the :: The divider -->

<!-- start :: Content of the paragraph 5 -->
                                                <div class="row p-5">
                                                    <div class="col-sm-12 col-md-12 col-lg-7 pb-5">
                                                        <!-- start :: Section titles -->
                                                        <p class="font-size-h1 pb-5"><strong>4. Open the agent</strong></p>
                                                        <!-- The end of the :: Section titles -->
                                                        <p class="mb-2">By default, only need to agent some foreign websites by walls</p>
                                                        <p class="mb-2">Click on the <code>Agent system</code> Set to <code>PAC</code></p>
                                                        <p class="mb-2">Click on the <code>The rules set</code> - <code>PAC</code> - <code>update PAC for GFWList</code></p>
                                                        <p class="mb-2">Click on the <code>The rules set</code> - <code>Agency rules</code> - Check the <code>Bypass the LAN and the mainland</code></p>
                                                        <p class="mb-2">Everything is ready~~~</p>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-5">
                                                        <a class="image-popup-no-margins" href="{$metron['assets_url']}/media/tutorial/windows/ssr/ssr.jpg" data-lightbox="images">
                                                        <img class="rounded-lg" style="width:100%" src="{$metron['assets_url']}/media/tutorial/windows/ssr/ssr.jpg"/></a>
                                                    </div>
                                                </div>
<!-- The end of the :: Content of the paragraph 5 -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- The end of the :: The tutorial content -->
                                
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