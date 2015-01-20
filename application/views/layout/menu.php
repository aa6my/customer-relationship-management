<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> 
                    <span class="pull-left">
                        <img class="img-circle avatar" src="<?= $this->session->current->userdata('avatar')?>" style="width: 45px" />&nbsp;
                    </span>
                    <a href="profile" class="pull-left m-l-sm">
                        <span class="clear"> 
                            <span class="block m-t-xs"> 
                                <strong class="font-bold user_name"><?= $this->session->current->userdata('name')?></strong>
                            </span> 
                            <span class="text-muted text-xs block"><?= $this->session->current->userdata('position')?></span>
                        </span> 
                    </a>
                    <div class="clearfix"></div>
                </div>
                <div class="logo-element">
                    <a href="profile">
                        <img class="img-circle avatar" src="<?= $this->session->current->userdata('avatar')?>" style="width: 45px" />
                    </a>
                </div>
            </li>
            <li <?= ($active_menu=='dashboard')?'class="active"':''?>>
                <a href="dashboard">
                    <i class="fa fa-th-large"></i> 
                    <span class="nav-label"><?= $this->lang->line('Dashboard')?></span> 
                </a>
            </li>
            
            <?php if ($this->module_actions->is_allowed('MOD001') && $this->user_actions->is_allowed('employees')){?>
            <li <?= (in_array($active_menu,array('employees','employees_edit','employees_new')))?'class="active"':''?>>
                <a href="employees">
                    <i class="fa fa-users"></i>
                    <span class="nav-label"><?= $this->lang->line('Employees')?></span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li <?= ($active_menu=='employees'?'class="active"':'')?>>
                        <a href="employees"><?= $this->lang->line('List')?></a>
                    </li>
                    <li <?= ($active_menu=='employees_new'?'class="active"':'')?>>
                        <a href="employees/new_employe"><?= $this->lang->line('New employee')?></a>
                    </li>
                </ul>
            </li>
            <?php }?>
            
            <?php if ($this->module_actions->is_allowed('MOD002') && $this->user_actions->is_allowed('skills')){?>
            <li <?= (in_array($active_menu,array('skills','skills_categories','assessments')))?'class="active"':''?>>
                <a href="skills">
                    <i class="fa fa-cubes"></i>
                    <span class="nav-label"><?= $this->lang->line('Skills')?></span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li <?= ($active_menu=='skills'?'class="active"':'')?>>
                        <a href="skills"><?= $this->lang->line('List')?></a>
                    </li>
                    <li <?= ($active_menu=='skills_categories'?'class="active"':'')?>>
                        <a href="skills/categories"><?= $this->lang->line('Categories')?></a>
                    </li>
                    <li <?= ($active_menu=='assessments'?'class="active"':'')?>>
                        <a href="skills/assessments"><?= $this->lang->line('Assessments')?></a>
                    </li>
                </ul>
            </li>
            <?php }?>
            
            <?php if ($this->module_actions->is_allowed('MOD003') && $this->user_actions->is_allowed('performance')){?>
            <li <?= (in_array($active_menu,array('performance','performance_criteria')))?'class="active"':''?>>
                <a href="performance">
                    <i class="fa fa-location-arrow"></i>
                    <span class="nav-label"><?= $this->lang->line('Performance')?></span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li <?= ($active_menu=='performance'?'class="active"':'')?>>
                        <a href="performance"><?= $this->lang->line('Appraisal')?></a>
                    </li>
                    <li <?= ($active_menu=='performance_criteria'?'class="active"':'')?>>
                        <a href="performance/criteria"><?= $this->lang->line('Criteria')?></a>
                    </li>
                </ul>
            </li>
            <?php }?>
            
            <?php if($this->module_actions->is_allowed('MOD004') && $this->user_actions->is_allowed('discipline')){?>
            <li <?= (in_array($active_menu,array('discipline','discipline_new')))?'class="active"':''?>>
                <a href="discipline">
                    <i class="fa fa-dot-circle-o"></i>
                    <span class="nav-label"><?= $this->lang->line('Discipline')?></span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li <?= ($active_menu=='discipline'?'class="active"':'')?>>
                        <a href="discipline"><?= $this->lang->line('List')?></a>
                    </li>
                    <li <?= ($active_menu=='discipline_new'?'class="active"':'')?>>
                        <a href="discipline/new_record"><?= $this->lang->line('New record')?></a>
                    </li>
                </ul>
            </li>
            <?php }?>
            
            <?php if ($this->module_actions->is_allowed('MOD005') && $this->user_actions->is_allowed('timeoff')){?>
            <li <?= (in_array($active_menu,array('timeoff','timeoff_requests')))?'class="active"':''?>>
                <a href="timeoff">
                    <i class="fa fa-briefcase"></i>
                    <span class="nav-label"><?= $this->lang->line('Leave tracking')?></span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li <?= ($active_menu=='timeoff')?'class="active"':''?>>
                        <a href="timeoff"><?= $this->lang->line('Approved')?></a>
                    </li>
                    <li <?= ($active_menu=='timeoff_requests')?'class="active"':''?>>
                        <a href="timeoff/requests"><?= $this->lang->line('Requests')?></a>
                    </li>
                </ul>
            </li>
            <?php }?>

                        
            <?php if ($this->module_actions->is_allowed('MOD006') && $this->user_actions->is_allowed('recruiting')){?>
            <li <?= in_array($active_menu,array('recruiting','applicants'))?'class="active"':''?>>
                <a href="recruiting">
                    <i class="fa fa-certificate"></i>
                    <span class="nav-label"><?= $this->lang->line('Recruiting')?></span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li <?= ($active_menu=='recruiting')?'class="active"':''?>>
                        <a href="recruiting"><?= $this->lang->line('Vacancies')?></a>
                    </li>
                    <li <?= ($active_menu=='applicants')?'class="active"':''?>>
                        <a href="recruiting/applicants"><?= $this->lang->line('Applicants')?></a>
                    </li>
                </ul>
            </li>
            <?php }?>
            
            <?php if ($this->module_actions->is_allowed('MOD009') && $this->user_actions->is_allowed('reports')){?>
            <li <?= (in_array($active_menu,array('reports_skills','reports_clock')))?'class="active"':''?>>
                <a href="reports">
                    <i class="fa fa-bar-chart-o"></i>
                    <span class="nav-label"><?= $this->lang->line('Reports')?></span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <!--<li <?= ($active_menu=='reports_skills'?'class="active"':'')?>>
                        <a href="reports/skills"><?= $this->lang->line('Skills')?></a>
                    </li>-->
                    <li <?= ($active_menu=='reports_clock'?'class="active"':'')?>>
                        <a href="reports/clock"><?= $this->lang->line('Punch clock')?></a>
                    </li>
                </ul>
            </li>
            <?php }?>
            
            <?php if ($this->module_actions->is_allowed('MOD015') && $this->user_actions->is_allowed('admin')){?>
            <li <?= (in_array($active_menu,array('company_settings','company_email','company_positions','resign_reasons','departments','processing_errors')))?'class="active"':''?>>
                <a href="settings/company">
                    <i class="fa fa-cogs"></i>
                    <span class="nav-label"><?= $this->lang->line('Settings')?></span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li <?= ($active_menu=='company_settings'?'class="active"':'')?>>
                        <a href="settings/company"><?= $this->lang->line('Company')?></a>
                    </li>
                    <li <?= ($active_menu=='company_email'?'class="active"':'')?>>
                        <a href="settings/email"><?= $this->lang->line('Email')?></a>
                    </li>
                    <li <?= ($active_menu=='company_positions'?'class="active"':'')?>>
                        <a href="settings/positions"><?= $this->lang->line('Positions')?></a>
                    </li>
                    <li <?= ($active_menu=='resign_reasons'?'class="active"':'')?>>
                        <a href="settings/resign_reasons"><?= $this->lang->line('Resign reasons')?></a>
                    </li>
                    <li <?= ($active_menu=='departments'?'class="active"':'')?>>
                        <a href="settings/departments"><?= $this->lang->line('Departments')?></a>
                    </li>
                    <li <?= ($active_menu=='processing_errors'?'class="active"':'')?>>
                        <a href="processing_errors"><?= $this->lang->line('Processing errors')?></a>
                    </li>
                </ul>
            </li>
            <?php }?>
        </ul>
    </div>
</nav>