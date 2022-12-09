<?php
/* Smarty version 3.1.47, created on 2022-12-04 03:07:22
  from '/www/wwwroot/EZvpn/main-panel/resources/views/metron/include/index/sub_button.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.47',
  'unifunc' => 'content_638b9e6a391151_11047244',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce5a12b63e3c6da84b7c2ce090db6f5ed2be5049' => 
    array (
      0 => '/www/wwwroot/EZvpn/main-panel/resources/views/metron/include/index/sub_button.tpl',
      1 => 1670092670,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_638b9e6a391151_11047244 (Smarty_Internal_Template $_smarty_tpl) {
?>                                                        <?php if (in_array('ssr',$_smarty_tpl->tpl_vars['metron']->value['index_sub'])) {?>
                                                        <!-- SSRTo subscribe to -->
                                                        <div class="btn-group mb-3 mr-3">
                                                            <button type="button" class="btn btn-pill btn-ssr dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="metron-ssr1 text-white"></i>&nbsp;&nbsp;SSR To subscribe to&nbsp;&nbsp;</button>
                                                            <div class="dropdown-menu">
                                                                <button type="button" class="dropdown-item copy-text" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value["ssr"];?>
">copy SSR To subscribe to</button>
                                                                <div class="dropdown-divider">
                                                                </div>
                                                                <button type="button" class="dropdown-item" href="##" onclick="importSublink('ssr')">A key to import SSR</button>
                                                            </div>
                                                        </div>
                                                        <?php }?>
                                                        <?php if (in_array('clash',$_smarty_tpl->tpl_vars['metron']->value['index_sub'])) {?>
                                                        <!-- ClashTo subscribe to -->
                                                        <div class="btn-group mb-3 mr-3">
                                                            <button type="button" class="btn btn-pill btn-clash dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="metron-clash text-white"></i>&nbsp;&nbsp;Clash To subscribe to&nbsp;&nbsp;</button>
                                                            <div class="dropdown-menu">
                                                                <button type="button" class="dropdown-item copy-text" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value["clash"];?>
">copy Clash To subscribe to</button>
                                                                <div class="dropdown-divider">
                                                                </div>
                                                                <button type="button" class="dropdown-item" href="##" onclick="importSublink('clash')">A key to import Clash</button>
                                                            </div>
                                                        </div>
                                                        <?php }?>
                                                        <?php if (in_array('surge',$_smarty_tpl->tpl_vars['metron']->value['index_sub'])) {?>
                                                        <!-- SurgeTo subscribe to -->
                                                        <div class="btn-group mb-3 mr-3">
                                                            <button type="button" class="btn btn-pill btn-surge dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="metron-surge text-white"></i>&nbsp;&nbsp;Surge To subscribe to&nbsp;&nbsp;</button>
                                                            <div class="dropdown-menu">
                                                                <button type="button" class="dropdown-item copy-text" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value["surge2"];?>
">copy Surge 2 Node subscription</button>
                                                                <button type="button" class="dropdown-item copy-text" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value["surge3"];?>
">copy Surge 3 Node subscription</button>
                                                                <button type="button" class="dropdown-item copy-text" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value["surge4"];?>
">copy Surge 4 Node subscription</button>
                                                            </div>
                                                        </div>
                                                        <?php }?>
                                                        <?php if (in_array('shadowrocket',$_smarty_tpl->tpl_vars['metron']->value['index_sub'])) {?>
                                                        <!-- ShadowrocketTo subscribe to -->
                                                        <div class="btn-group mb-3 mr-3">
                                                            <button type="button" class="btn btn-pill btn-shadowrocket dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="metron-shadowrocket text-white"></i>&nbsp;&nbsp;Shadowrocket To subscribe to&nbsp;&nbsp;</button>
                                                            <div class="dropdown-menu">
                                                                <button type="button" class="dropdown-item" href="##" onclick="qrcodeSublink('shadowrocket')">Scan the qr code to add subscription</button>
                                                                <div class="dropdown-divider"></div>
                                                                <button type="button" class="dropdown-item copy-text" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value["shadowrocket"];?>
">copy Shadowrocket To subscribe to</button>
                                                                <div class="dropdown-divider"></div>
                                                                <button type="button" class="dropdown-item" href="##" onclick="importSublink('shadowrocket')">A key to import Shadowrocket</button>
                                                            </div>
                                                        </div>
                                                        <?php }?>
                                                        <?php if (in_array('stash',$_smarty_tpl->tpl_vars['metron']->value['index_sub'])) {?>
                                                            <!-- Stash -->
                                                            <div class="btn-group mb-3 mr-3">
                                                                <button type="button" class="btn btn-pill btn-surfboard dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="text-white"></i>&nbsp;&nbsp;Stash To subscribe to&nbsp;&nbsp;</button>
                                                                <div class="dropdown-menu">
                                                                    <button type="button" class="dropdown-item copy-text" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value["stash"];?>
">copy Stash To subscribe to</button>
                                                                    <div class="dropdown-divider"></div>
                                                                    <button type="button" class="dropdown-item" href="##" onclick="importSublink('stash')">A key to import Stash</button>
                                                                </div>
                                                            </div>
                                                        <?php }?>
                                                        <?php if (in_array('quantumult',$_smarty_tpl->tpl_vars['metron']->value['index_sub'])) {?>
                                                        <!-- QuantumultTo subscribe to -->
                                                        <div class="btn-group mb-3 mr-3">
                                                            <button type="button" class="btn btn-pill btn-quantumult dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="metron-quantumult text-white"></i>&nbsp;&nbsp;Quantumult To subscribe to&nbsp;&nbsp;</button>
                                                            <div class="dropdown-menu">
                                                                <button type="button" class="dropdown-item copy-text" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value["ssr"];?>
">copy SSR Node subscription</button>
                                                                <button type="button" class="dropdown-item copy-text" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value["quantumult_v2"];?>
">copy V2ray Node subscription</button>
                                                                <div class="dropdown-divider"></div>
                                                                <button type="button" class="dropdown-item" href="##" onclick="importSublink('quantumult')">A key to import SSR Node subscription</button>
                                                                <button type="button" class="dropdown-item" href="##" onclick="importSublink('quantumult_v2')">A key to import V2Ray Node subscription</button>
                                                            </div>
                                                        </div>
                                                        <?php }?>
                                                        <?php if (in_array('quantumultx',$_smarty_tpl->tpl_vars['metron']->value['index_sub'])) {?>
                                                        <!-- QuantumultXTo subscribe to -->
                                                        <div class="btn-group mb-3 mr-3">
                                                            <button type="button" class="btn btn-pill btn-quantumultx copy-text" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value["quantumultx"];?>
"><i class="metron-quantumultx text-white"></i>&nbsp;&nbsp;copy Quantumult X To subscribe to&nbsp;&nbsp;</button>
                                                        </div>
                                                        <?php }?>
                                                        <?php if (in_array('v2ray',$_smarty_tpl->tpl_vars['metron']->value['index_sub'])) {?>
                                                        <!-- V2RayTo subscribe to -->
                                                        <div class="btn-group mb-3 mr-3">
                                                            <button type="button" class="btn btn-pill btn-v2ray copy-text" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value["v2ray"];?>
"><i class="metron-v2rayng text-white"></i>&nbsp;&nbsp;copy V2Ray To subscribe to&nbsp;&nbsp;</button>
                                                        </div>
                                                        <?php }?>
                                                        <?php if (in_array('v2ray',$_smarty_tpl->tpl_vars['metron']->value['index_sub'])) {?>
                                                            <!-- V2RayTo subscribe to -->
                                                            <div class="btn-group mb-3 mr-3">
                                                                <button type="button" class="btn btn-pill btn-v2ray copy-text" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value["v2ray_vless"];?>
"><i class="metron-v2rayng text-white"></i>&nbsp;&nbsp;copy V2Ray-VLESS To subscribe to&nbsp;&nbsp;</button>
                                                            </div>
                                                        <?php }?>
                                                        <?php if (in_array('surfboard',$_smarty_tpl->tpl_vars['metron']->value['index_sub'])) {?>
                                                        <!-- SurfboardTo subscribe to -->
                                                        <div class="btn-group mb-3 mr-3">
                                                            <button type="button" class="btn btn-pill btn-surfboard copy-text" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value["surfboard"];?>
"><i class="metron-surfboard text-white"></i>&nbsp;&nbsp;copy Surfboard To subscribe to&nbsp;&nbsp;</button>
                                                        </div>
                                                        <?php }?>
                                                        <?php if (in_array('kitsunebi',$_smarty_tpl->tpl_vars['metron']->value['index_sub'])) {?>
                                                        <!-- KitsunebiTo subscribe to -->
                                                        <div class="btn-group mb-3 mr-3">
                                                            <button type="button" class="btn btn-pill btn-kitsunebi copy-text" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['subInfo']->value["kitsunebi"];?>
"><i class="metron-kitsunebi text-white"></i>&nbsp;&nbsp;copy Kitsunebi To subscribe to&nbsp;&nbsp;</button>
                                                        </div>
                                                        <?php }
}
}
