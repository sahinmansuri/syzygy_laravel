<header id="app-header">
    <div class="px-3 py-2 mb-3 d-none d-md-block">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                

                <ul class="nav col-12 col-md-auto my-2 justify-content-center my-md-0 text-small">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superadmin')): ?>
                    <li class="mx-2">
                        <a href="<?php echo e(route('dashboard'), false); ?>" class="nav-link text-center">
                            <i class="bi bi-speedometer2 d-block mx-auto mb-1 fs-3"></i>
                            <?php echo e(__('Dashboard'), false); ?>

                        </a>
                    </li>
                    <?php endif; ?>

                    <li class="mx-2">
                        <a class="nav-link text-center" href="<?php echo e(route('my_account'), false); ?>#/tickets">
                            <i class="bi bi-chat-left-text d-block mx-auto mb-1 fs-3"></i>
                            <?php echo e(__('My Tickets'), false); ?>

                        </a>
                    </li>

                    <?php if(setting('frontend_enabled', true)): ?>
                    <li class="mx-2">
                        <a class="nav-link text-center" target="_blank" href="<?php echo e(route('frontend'), false); ?>">
                            <i class="bi bi-book d-block mx-auto mb-1 fs-3"></i>
                            <?php echo e(__('knowledge_base'), false); ?>

                        </a>
                    </li>
                    <?php endif; ?>

                    <li class="mx-2">
                        <a href="#" class="nav-link text-center" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-bell d-block mx-auto mb-1 fs-3"></i>
                            <?php echo e(__('notifications.notifications'), false); ?>

                        </a>
                        <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="header-notification">
                            <v-notifications></v-notifications>
                        </div>
                    </li>

                    <li class="mx-2">
                        <a href="<?php echo e(route('my_account.profile'), false); ?>" class="nav-link text-center">
                            <span class="d-block mx-auto mb-1 fs-3">
                                
                            </span>
                            <?php echo e(Auth::user()->name, false); ?>

                        </a>
                    </li>

                    

                </ul>
            </div>
        </div>
    </div>

    <div class="px-3 py-2 mb-3 d-md-none d-sm-block ">
        <div class="container">

            <div class="clearfix">
                <div class="float-start">
                  <router-link to="/">
                    <img src="<?php echo e(asset(setting('app_logo')), false); ?>" height="40" />
                  </router-link>
                </div>

                <div class="float-end">
                    <button class="btn btn-link fs-2  p-0 m-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#headerSidebar" aria-controls="headerSidebar">
                        <i class="bi bi-list"></i>
                    </button>
                </div>
            </div>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="headerSidebar"
                aria-labelledby="headerSidebarLabel">
                <div class="offcanvas-header">
                    <div></div>
                    <button type="button" class="" data-bs-dismiss="offcanvas" aria-label="Close">
                        <i class="bi bi-x-lg fs-2"></i>
                    </button>
                </div>
                <div class="offcanvas-body">
                    <ul class="text-small">

                        <li class="mx-2">
                            <a href="<?php echo e(route('dashboard'), false); ?>" class="nav-link  text-center">
                                <i class="bi bi-speedometer2 d-block mx-auto mb-1 fs-3"></i>
                                <?php echo e(__('Dashboard'), false); ?>

                            </a>
                        </li>
                        

                        <li class="mx-2">
                            <router-link class="nav-link  text-center" to="/tickets">
                                <i class="bi bi-chat-left-text d-block mx-auto mb-1 fs-3"></i>
                                <?php echo e(__('My Tickets'), false); ?>

                            </router-link>
                        </li>
                        <li class="mx-2">
                            <a class="nav-link  text-center" target="_blank" href="<?php echo e(route('frontend'), false); ?>">
                                <i class="bi bi-book d-block mx-auto mb-1 fs-3"></i>
                                <?php echo e(__('knowledge_base'), false); ?>

                            </a>
                        </li>

                        <li class="mx-2">
                            <a href="#" class="nav-link  text-center" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-bell d-block mx-auto mb-1 fs-3"></i>
                                <?php echo e(__('notifications.notifications'), false); ?>

                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="header-notification">
                                <v-notifications></v-notifications>
                            </div>
                        </li>

                        <li class="mx-2">
                            <a href="<?php echo e(route('my_account.profile'), false); ?>" class="nav-link  text-center">
                                <span class="d-block mx-auto mb-1 fs-3">
                                    
                                </span>
                                <?php echo e(Auth::user()->name, false); ?>

                            </a>
                        </li>

                        <li class="mx-2">
                            <a href="#" class="nav-link  text-center"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right d-block mx-auto mb-1 fs-3"></i>
                                <?php echo e(__('Logout'), false); ?>

                                <form id="logout-form" action="<?php echo e(route('logout'), false); ?>" method="POST"><?php echo csrf_field(); ?></form>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

</header>
<?php /**PATH /home/vimi31/public_html/Modules/HelpGuide/Resources/views/my_account/layouts/header.blade.php ENDPATH**/ ?>