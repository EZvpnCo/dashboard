<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Clash Using the tutorial &mdash; {$config["appName"]}</title>
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
                                        <h2 class="text-white font-weight-bold my-2 mr-5">Clash for Windows Using the tutorial</h2>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">

                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column-fluid">
                            <div class="container">

                                <!-- start :: The tutorial content -->
                                <div class="row" data-sticky-container>
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
                                                        <!-- The enSection titles the :: Section titles -->
                                                        <div class="example-preview">
                                                            <p><code>Clash</code>Is a use Golanguage The development of the support Linux/MacOS/Windows/Android Multiple platforms such as proxy tools and support ss/v(does not support(does not support ssr), support rules shunt (simiConfiguration).o Surge Configuration).</p>
                                                            <p>Since the client update for a long time or feature may appear in the interface does not accord with the tutorial, we recommend that you take this tutorial as a reference only, specific needs according to their use in the process of understanding.</p>
                                                            <p><code>ClashR</code>In theClashOn the basis of the increaseSSRThe support of</p>
                                                            <code>Clash for Windows Only supportWindows 64A system,32A system, please choose other clients</code>
                                                        </div>
                                                    </div>
                                                    <!-- The end of the :: Paragraph text area -->

                                                    <!-- start :: The picture -->
                                                    <div class="col-sm-12 col-md-12 col-lg-5">
                                                        <!-- Click to open the light box Gao Qingtu -->
                                                        <a class="image-popup-no-margins" href="{$metron['assets_url']}/media/tutorial/windows/clashr/clashr.png" data-lightbox="images">
                                                        <!-- Page displays the photo thumbnails -->
                                                        <img class="rounded-lg" style="width:100%" src="{$metron['assets_url']}/media/tutorial/windows/clashr/clashr.png"/></a>
                                                    </div>
                                                    <!-- The end of the :: The picture -->

                                                </div>
<!-- The end of the :: Content of the paragraph 1 -->

                                                <!-- start The dividerThe divider -->
                                                <div class="separator separator-dashed separator-border-4"></div>
                                                <!-- The end of the :: The divider -->

<!-- start :: Content of the paragraph 2 -->
                                                <div class="row p-5">
                                                    <!-- Content of the paragraph -->
                                                    <div class="col-sm-12 col-md-12 col-lg-7 pb-5">
                                                        <!-- start Section titlesFall title -->
                                                        <p class="font-size-h1 pb-5"><strong>1. Download the client</strong></p>
                                                        <!-- The end of the :: Section titles -->
                                                        <!-- start :: The client download button -->
                                                        <a href="{$metron['client_windows']['clash']['down']}" class="btn btn-pill btn-clash mb-4" target="_blank">&nbsp;&nbsp;<i class="metron-clash text-white"></i>download Clash The client</a>&nbsp;&nbsp;&nbsp;
                                                        <!-- The end of the :: The client download button -->
                                                        <div class="h6 pt-2">From the desktop to open after download and install<br />Or in the open directory <code>Clash for Windows.exe</code></div>
                                                    </div>
                                                    <!-- start :: The picture -->
                                                    <div class="col-sm-12 col-md-12 col-lg-5">
                                                        <a class="image-popup-no-margins" href="{$metron['assets_url']}/media/tutorial/windows/clashr/clashr.png" data-lightbox="images">
                                                        <img class="rounded-lg" style="width:100%" src="{$metron['assets_url']}/media/tutorial/windows/clashr/clashr.png"/></a>
                                                    </div>
                                                    <!-- The enThe pictureof the :: The picture -->
                                                </div>
<!-- The end of the :: Content of the paragraph 2 -->

                                                <!-- start The dividerThe divider -->
                                                <div class="separator separator-dashed separator-border-4"></div>
                                                <!-- The end of the :: The divider -->

<!-- start :: Content of the paragraph 3 -->
                                                <div class="row p-5">
                                                    <div class="col-sm-12 col-md-12 col-lg-7 pb-5">
                                                        <!-- start :: Section titles -->
                                                        <p class="font-size-h1 pb-5"><strong>2. Set the subscription address</strong></p>
                                                        <!-- The end of the :: Section titles -->
                                                        <!-- start :: Subscribe button -->
                                                        {if in_array('clash',$metron['index_sub'])}
                                                        <div class="btn-group mb-3 mr-3">
                                                            <button type="button" class="btn btn-pill btn-clash dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">&nbsp;&nbsp;<i class="metron-clash text-white"></i>Clash Subscribe to the configuration&nbsp;&nbsp;</button>
                                                            <div class="dropdown-menu">
                                                                <button type="button" class="dropdown-item copy-text" data-clipboard-text="{$subInfo["clash"]}">copy Clash To subscribe to</button>
                                                                <div class="dropdown-divider">
                                                                </div>
                                                                <button type="button" class="dropdown-item" href="##" onclick="importSublink('clash')">A key to import Clash</button>
                                                            </div>
                                                        </div>
                                                        {/if}
                                                        <!-- The end of the :: Subscribe button -->
                                                        <div class="h6 pt-2">Click on the button above import node configuration to a keyClash/ClashR</div>
                                                        <div class="h6 pt-2">After the success of the import, <code>Profiles</code> Interface will be more a configuration TAB</div>
                                                        <div class="h6 pt-2">Click on the selected just imported configuration TAB</div>
                                                        <div class="h6 pt-2">If the pop-up configuration error, please restart your client to select just imported configuration</div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-5">
                                                        <a class="image-popup-no-margins" href="{$metron['assets_url']}/media/tutorial/windows/clashr/clashr.png" data-lightbox="images">
                                                        <img class="rounded-lg" style="width:100%" src="{$metron['assets_url']}/media/tutorial/windows/clashr/clashr.png"/></a>
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
                                                        <div class="h6 pt-2">Click on the <code>Profiles</code> Option to switch to the proxy node interface</div>
                                                        <div class="h6 pt-2">According to the rules of the link set the corresponding node</div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-5">
                                                        <a class="image-popup-no-margins" href="{$metron['assets_url']}/media/tutorial/windows/clashr/clashr.png" data-lightbox="images">
                                                        <img class="rounded-lg" style="width:100%" src="{$metron['assets_url']}/media/tutorial/windows/clashr/clashr.png"/></a>
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
                                                        <div class="h6 pt-2">Click on the <code>General</code> Option to switch to the common interface</div>
                                                        <div class="h6 pt-2">Open the <code>System Proxy</Switch;Other keep default.A default.</div>
                                                        <div class="h6 pt-2">Everything is ready~~~</div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-5">
                                                        <a class="image-popup-no-margins" href="{$metron['assets_url']}/media/tutorial/windows/clashr/clashr.png" data-lightbox="images">
                                                        <img class="rounded-lg" style="width:100%" src="{$metron['assets_url']}/media/tutorial/windows/clashr/clashr.png"/></a>
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
