                    <ul class="sidebar-menu">
                        <li class="<?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>">
                            <a href="<?php echo base_url(); ?>dashboard">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="<?php if($this->uri->segment(1)=="calendar"){echo "active";}?>">
                            <a href="<?php echo base_url(); ?>calendar">
                                <i class="fa fa-calendar"></i> <span>Calendar</span>
                            </a>
                        </li>
                        <li class="<?php if($this->uri->segment(1)=="vendors"){echo "active";}?>">
                            <a href="<?php echo base_url(); ?>vendors">
                                <i class="fa fa-book"></i> <span>Vendors</span>
                            </a>
                        </li>
                        <li class="<?php if($this->uri->segment(1)=="leads"){echo "active";}?>">
                            <a href="<?php echo base_url(); ?>leads">
                                <i class="fa fa-book"></i> <span>Leads</span>
                            </a>
                        </li>
                        <li class="<?php if($this->uri->segment(1)=="customers"){echo "active";}?>">
                            <a href="<?php echo base_url(); ?>customers">
                                <i class="fa fa-folder"></i> <span>Customers</span>
                            </a>
                        </li>
                         <li class="<?php if($this->uri->segment(1)=="products"){echo "active";}?>">
                            <a href="<?php echo base_url(); ?>products">
                                <i class="fa fa-folder"></i> <span>Products</span>
                            </a>
                        </li>
                        <li class="<?php if($this->uri->segment(1)=="quotes"){echo "active";}?>">
                            <a href="<?php echo base_url(); ?>quotes">
                                <i class="fa fa-edit"></i> <span>Quotes</span>
                            </a>
                        </li>
                        <li class="<?php if($this->uri->segment(1)=="websites"){echo "active";}?>">
                            <a href="<?php echo base_url(); ?>websites">
                                <i class="fa fa-globe"></i> <span>Websites</span>
                            </a>
                        </li>
                        <li class="<?php if($this->uri->segment(1)=="jobs"){echo "active";}?>">
                            <a href="<?php echo base_url(); ?>jobs">
                                <i class="fa fa-folder"></i> <span>Jobs</span>
                            </a>
                        </li>
                        <li class="<?php if($this->uri->segment(1)=="invoices"){echo "active";}?>">
                            <a href="<?php echo base_url(); ?>invoices">
                                <i class="fa fa-edit"></i> <span>Invoices</span>
                            </a>
                        </li>
                        <li class="<?php if($this->uri->segment(1)=="files"){echo "active";}?>">
                            <a href="<?php echo base_url(); ?>files">
                                <i class="fa fa-files-o"></i> <span>Files</span>
                            </a>
                        </li>
                        <li class="<?php if($this->uri->segment(1)=="finance"){echo "active";}?>">
                            <a href="<?php echo base_url(); ?>finance">
                                <i class="fa fa-money"></i> <span>Finance</span>
                            </a>
                        </li>
                        <li class="<?php if($this->uri->segment(1)=="settings"){echo "active";}?>">
                            <a href="<?php echo base_url(); ?>settings">
                                <i class="fa fa-cogs"></i> <span>Settings</span>
                            </a>
                        </li>
                    </ul>