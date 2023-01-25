                                                        {if in_array('ssr',$metron['index_sub'])}
                                                        <!-- SSRTo subscribe to -->
                                                        <div class="btn-group mb-3 mr-3">
                                                            <button type="button" class="btn btn-pill btn-ssr dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="metron-ssr1 text-white"></i>&nbsp;&nbsp;SSR subscription&nbsp;&nbsp;</button>
                                                            <div class="dropdown-menu">
                                                                <button type="button" class="dropdown-item copy-text" data-clipboard-text="{$subInfo["ssr"]}">Copy link</button>
                                                                <div class="dropdown-divider">
                                                                </div>
                                                                <button type="button" class="dropdown-item" href="##" onclick="importSublink('ssr')">Import link</button>
                                                            </div>
                                                        </div>
                                                        {/if}
                                                        {if in_array('clash',$metron['index_sub'])}
                                                        <!-- ClashTo subscribe to -->
                                                        <div class="btn-group mb-3 mr-3">
                                                            <button type="button" class="btn btn-pill btn-clash dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="metron-clash text-white"></i>&nbsp;&nbsp;Clash To subscribe to&nbsp;&nbsp;</button>
                                                            <div class="dropdown-menu">
                                                                <button type="button" class="dropdown-item copy-text" data-clipboard-text="{$subInfo["clash"]}">copy Clash To subscribe to</button>
                                                                <div class="dropdown-divider">
                                                                </div>
                                                                <button type="button" class="dropdown-item" href="##" onclick="importSublink('clash')">A key to import Clash</button>
                                                            </div>
                                                        </div>
                                                        {/if}
                                                        {if in_array('surge',$metron['index_sub'])}
                                                        <!-- SurgeTo subscribe to -->
                                                        <div class="btn-group mb-3 mr-3">
                                                            <button type="button" class="btn btn-pill btn-surge dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="metron-surge text-white"></i>&nbsp;&nbsp;Surge To subscribe to&nbsp;&nbsp;</button>
                                                            <div class="dropdown-menu">
                                                                <button type="button" class="dropdown-item copy-text" data-clipboard-text="{$subInfo["surge2"]}">copy Surge 2 Node subscription</button>
                                                                <button type="button" class="dropdown-item copy-text" data-clipboard-text="{$subInfo["surge3"]}">copy Surge 3 Node subscription</button>
                                                                <button type="button" class="dropdown-item copy-text" data-clipboard-text="{$subInfo["surge4"]}">copy Surge 4 Node subscription</button>
                                                            </div>
                                                        </div>
                                                        {/if}
                                                        {if in_array('shadowrocket',$metron['index_sub'])}
                                                        <!-- ShadowrocketTo subscribe to -->
                                                        <div class="btn-group mb-3 mr-3">
                                                            <button type="button" class="btn btn-pill btn-shadowrocket dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="metron-shadowrocket text-white"></i>&nbsp;&nbsp;Shadowrocket To subscribe to&nbsp;&nbsp;</button>
                                                            <div class="dropdown-menu">
                                                                <button type="button" class="dropdown-item" href="##" onclick="qrcodeSublink('shadowrocket')">Scan the qr code to add subscription</button>
                                                                <div class="dropdown-divider"></div>
                                                                <button type="button" class="dropdown-item copy-text" data-clipboard-text="{$subInfo["shadowrocket"]}">copy Shadowrocket To subscribe to</button>
                                                                <div class="dropdown-divider"></div>
                                                                <button type="button" class="dropdown-item" href="##" onclick="importSublink('shadowrocket')">A key to import Shadowrocket</button>
                                                            </div>
                                                        </div>
                                                        {/if}
                                                        {if in_array('stash',$metron['index_sub'])}
                                                            <!-- Stash -->
                                                            <div class="btn-group mb-3 mr-3">
                                                                <button type="button" class="btn btn-pill btn-surfboard dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="text-white"></i>&nbsp;&nbsp;Stash To subscribe to&nbsp;&nbsp;</button>
                                                                <div class="dropdown-menu">
                                                                    <button type="button" class="dropdown-item copy-text" data-clipboard-text="{$subInfo["stash"]}">copy Stash To subscribe to</button>
                                                                    <div class="dropdown-divider"></div>
                                                                    <button type="button" class="dropdown-item" href="##" onclick="importSublink('stash')">A key to import Stash</button>
                                                                </div>
                                                            </div>
                                                        {/if}
                                                        {if in_array('quantumult',$metron['index_sub'])}
                                                        <!-- QuantumultTo subscribe to -->
                                                        <div class="btn-group mb-3 mr-3">
                                                            <button type="button" class="btn btn-pill btn-quantumult dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="metron-quantumult text-white"></i>&nbsp;&nbsp;Quantumult To subscribe to&nbsp;&nbsp;</button>
                                                            <div class="dropdown-menu">
                                                                <button type="button" class="dropdown-item copy-text" data-clipboard-text="{$subInfo["ssr"]}">copy SSR Node subscription</button>
                                                                <button type="button" class="dropdown-item copy-text" data-clipboard-text="{$subInfo["quantumult_v2"]}">copy V2ray Node subscription</button>
                                                                <div class="dropdown-divider"></div>
                                                                <button type="button" class="dropdown-item" href="##" onclick="importSublink('quantumult')">A key to import SSR Node subscription</button>
                                                                <button type="button" class="dropdown-item" href="##" onclick="importSublink('quantumult_v2')">A key to import V2Ray Node subscription</button>
                                                            </div>
                                                        </div>
                                                        {/if}
                                                        {if in_array('quantumultx',$metron['index_sub'])}
                                                        <!-- QuantumultXTo subscribe to -->
                                                        <div class="btn-group mb-3 mr-3">
                                                            <button type="button" class="btn btn-pill btn-quantumultx copy-text" data-clipboard-text="{$subInfo["quantumultx"]}"><i class="metron-quantumultx text-white"></i>&nbsp;&nbsp;copy Quantumult X To subscribe to&nbsp;&nbsp;</button>
                                                        </div>
                                                        {/if}
                                                        {if in_array('v2ray',$metron['index_sub'])}
                                                        <!-- V2RayTo subscribe to -->
                                                        <div class="btn-group mb-3 mr-3">
                                                            <button type="button" class="btn btn-pill btn-v2ray copy-text" data-clipboard-text="{$subInfo["v2ray"]}">
                                                                <i class="metron-v2rayng text-white"></i>
                                                                &nbsp;&nbsp;Universal subscription&nbsp;&nbsp;
                                                                <b>(OneClick/Fair/EZvpn/v2rayN)</b>
                                                            </button>
                                                        </div>
                                                        {/if}
                                                        {if in_array('v2ray-vless',$metron['index_sub'])}
                                                            <!-- V2RayTo subscribe to -->
                                                            <div class="btn-group mb-3 mr-3">
                                                                <button type="button" class="btn btn-pill btn-v2ray copy-text" data-clipboard-text="{$subInfo["v2ray_vless"]}"><i class="metron-v2rayng text-white"></i>&nbsp;&nbsp;copy V2Ray-VLESS To subscribe to&nbsp;&nbsp;</button>
                                                            </div>
                                                        {/if}
                                                        {if in_array('surfboard',$metron['index_sub'])}
                                                        <!-- SurfboardTo subscribe to -->
                                                        <div class="btn-group mb-3 mr-3">
                                                            <button type="button" class="btn btn-pill btn-surfboard copy-text" data-clipboard-text="{$subInfo["surfboard"]}">
                                                                <i class="metron-surfboard text-white"></i>
                                                                &nbsp;&nbsp;Surfboard subscription&nbsp;&nbsp;
                                                            </button>
                                                        </div>
                                                        {/if}
                                                        {if in_array('kitsunebi',$metron['index_sub'])}
                                                        <!-- KitsunebiTo subscribe to -->
                                                        <div class="btn-group mb-3 mr-3">
                                                            <button type="button" class="btn btn-pill btn-kitsunebi copy-text" data-clipboard-text="{$subInfo["kitsunebi"]}"><i class="metron-kitsunebi text-white"></i>&nbsp;&nbsp;copy Kitsunebi To subscribe to&nbsp;&nbsp;</button>
                                                        </div>
                                                        {/if}
