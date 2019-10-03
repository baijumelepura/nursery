<li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <?php if(config_item('Notification')['TotalNotification'] > 0 ){ ?> 
              <span class="label label-success "><?=config_item('Notification')['TotalNotification'];?></span>
              <?php } ?>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?=config_item('Notification')['TotalNotification'];?> notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">

                
                <?php if(config_item('Notification')['NurseryToday'] > 0){ ?>
                   <li>
                    <a href="<?=site_url('nursery');?>">
                      <i class="fa fa-institution text-aqua"></i> <?=config_item('Notification')['NurseryToday'];?> new nursery joined today
                    </a>
                  </li>
                <?php } ?>

                <?php if(config_item('Notification')['NurseryOld'] > 0){ ?>
                   <li>
                    <a href="<?=site_url('nursery');?>">
                      <i class="fa fa-institution text-aqua"></i> <?=config_item('Notification')['NurseryOld'];?> new nursery joined
                    </a>
                  </li>
                <?php } ?>



                </ul>
              </li>
              <?php if(config_item('Notification')['TotalNotification'] > 0 ){ ?>
              <li class="footer"><a href="<?=base_url('dashboard');?>">View all</a></li>
              <?php } ?>
            </ul>
          </li>
