<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SSTap Using the tutorial &mdash; {$config["appName"]}</title>
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
                                        <h2 class="text-white font-weight-bold my-2 mr-5">SSTap for Windows Using the tutorial</h2>
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
                                                            <p>SSTapisSocksCap6The author of the newly developed a network layer agent using the virtual network adapter.。</p>
                                                            <p>SSTapCan intercept all connections in the network layer and sendHTTP,SOCKS4,5,SHADOWSOCKSThe agent, Without making any changes to be agent application or Settings.</p>
                                                            <p>It can be forwPackets.It is very suitable for game players use. timeTCP, UDPPackets.It is very suitable for game players use.</p>
                                                            <p>Enjoy your game time!Please use theSSTap！</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-5">
                                                        <a class="image-popup-no-margins" href="{$metron['assets_url']}/media/tutorial/windows/sstap/sstap.jpg" data-lightbox="images">
                                                        <img class="rounded-lg" style="width:100%" src="{$metron['assets_url']}/media/tutorial/windows/sstap/sstap.jpg"/></a>
                                                    </div>
                                                </div>

                                                <div class="separator separator-dashed separator-border-4"></div>

                                                <div class="row p-5">
                                                    <div class="col-sm-12 col-md-12 col-lg-7 pb-5">
                                                        <p class="font-size-h1 pb-5"><strong>1. Download the client</strong></p>
                                                        <a href="{$metron['client_windows']['sstap']['down']}" class="btn btn-pill btn-sstap mb-4" target="_blank">&nbsp;&nbsp;<i class="metron-sstap text-white"></i>download SSTap The client</a>
                                                        <p class="mb-2">This file right click run as administrator</p>
                                                        <p class="mb-2">It will prompt you choose to install language, Chinese by default, all the way to the next step, then step into the installation progress bar</p>
                                                        <p class="mb-2">becauseSSTAPWant to block all traffic on the network, you must set up a virtual network card, in order to let all network traffic through the virtual network adapter, so as to achieve "true · The global agency ".</p>
                                                        <p class="mb-2">so As shown below, check Always tThe software, and clickom....The software, and click The installation Button to。install the virtual network adapter 。</p>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-5">
                                                        <a class="image-popup-no-margins" href="{$metron['assets_url']}/media/tutorial/windows/sstap/2018020309355115.png" data-lightbox="images">
                                                        <img class="rounded-lg" style="width:100%" src="{$metron['assets_url']}/media/tutorial/windows/sstap/2018020309355115.png"/></a>
                                                    </div>
                                                </div>

                                                <div class="separator separator-dashed separator-border-4"></div>

                                                <div class="row p-5">
                                                    <div class="col-sm-12 col-md-12 col-lg-7 pb-5">
                                                        <p class="font-size-h1 pb-5"><strong>2. Set the subscription address</strong></p>
                                                        <div class="btn-group mb-3 mr-3">
                                                            <button type="button" class="btn btn-pill btn-sstap copy-text" data-clipboard-text="{$subInfo["ssr"]}">&nbsp;&nbsp;<i class="metron-ssr1 text-white"></i>copy SSTap To subscribe to&nbsp;&nbsp;</button>
                                                        </div>
                                                        <p class="mb-2">Right-click the taskbar icon <code>SSRTo subscribe to</code> - <code>SSRSubscribe to the management</code></p>
                                                        <p class="mb-2">Paste the subscription addA barss <code>URL</code> A bar, And click the <code>add</code></p>
                                                        <p class="mb-2">And then the top right cClosed automatically refresh nodet directly <code>X</code> Closed automatically refresh node</p>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-5">
                                                        <a class="image-popup-no-margins" href="{$metron['assets_url']}/media/tutorial/windows/sstap/20200330195059.png" data-lightbox="images">
                                                        <img class="rounded-lg" style="width:100%" src="{$metron['assets_url']}/media/tutorial/windows/sstap/20200330195059.png"/></a>
                                                    </div>
                                                </div>

                                                <div class="separator separator-dashed separator-border-4"></div>

                                                <div class="row p-5">
                                                    <div class="col-sm-12 col-md-12 col-lg-7 pb-5">
                                                        <p class="font-size-h1 pb-5"><strong>3. Select the node and open proxye node and open proxy</strong></p>
                                                        <p class="mb-2">Click on the drop-down choice node agent column, Clicking on the right side of the lightning marks the usability of test nodes</code> </p>
                                                        <p class="mb-2">Click on the model column. Direct selection <code>No agent of ChinaIP</code></p>
                                                        <p class="mb-2">Click on the <code>ConnectioneCo., LTD.nnect the onnection</p>Open the agent
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-5">
                                                        <a class="image-popup-no-margins" href="{$metron['assets_url']}/media/tutorial/windows/sstap/20200330195447.jpg" data-lightbox="images">
                                                        <img class="rounded-lg" style="width:100%" src="{$metron['assets_url']}/media/tutorial/windows/sstap/20200330195447.jpg"/></a>
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
        <script src="{$metron['assets_url']}/plugins/tutorial/lightbox/lightbox.min.js" type="text/javascript"></script>
    </body>
</html>