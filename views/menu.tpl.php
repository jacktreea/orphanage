                <!-- Navbar Custom Menu -->
                <div class="navbar-custom-menu">
                    
                    <div class="container-fluid">
                        <div id="navigation">
                            <!-- Navigation Menu-->
                            <ul class="navigation-menu list-unstyled">
    
                                <li class="has-submenu">
                                    <a href="?module=home&action=index">
                                        <i class="mdi mdi-monitor"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <?  foreach ($realmenus as $mlabel=>$m) {
                                        if ($m['subs'][0]['slabel']) { ?>
                                            <li class="has-submenu">
                                                <a href="#"> 
                                                    <i class="<?=$m['icon']?>"></i>
                                                    <span><?=$mlabel?></span>
                                                </a>
                                                <ul class="submenu">
                                                <? foreach ($m['subs'] as $s) { ?>
                                                    <li>
                                                        <a href="?module=<?=$s['smod']?>&action=<?=$s['sact']?>">
                                                             <?=$s['slabel']?>
                                                        </a>
                                                    </li>
                                                <? } ?>
                                                    
                                                </ul>
                                            </li>
                                        <?} else {?>
                                    <li>
                                        <a href="?module=<?=$m['module']?>&action=<?=$m['action']?>">
                                            
                                            <i class="<?=$m['icon']?>" aria-hidden="true"></i>
                                            <span><?=$mlabel?></span>
                                        </a>
                                    </li>
                                    <?}
                                }?>
                            </ul>
                            <!-- End navigation menu -->
                        </div> <!-- end navigation -->
                    </div> <!-- end container-fluid -->
                </div>
                <!-- end left-sidenav-->