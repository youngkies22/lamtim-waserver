<!-- Navbar -->
		<?php if(session('admin_id')): ?>
			<div class="alert alert-warning text-center mb-0 fixed-bottom">
				<?php echo e(__('You are logged in as user')); ?>: <strong><?php echo e(auth()->user()->username); ?></strong>
				<a href="<?php echo e(route('admin.backToAdmin')); ?>" class="btn btn-sm btn-primary ms-3">
					<?php echo e(__('Back to Admin')); ?>

				</a>
			</div>
		<?php endif; ?>
          <nav class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                <i class="icon-base ti tabler-menu-2 icon-md"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item navbar-search-wrapper px-md-0 px-2 mb-0">
                  <a class="nav-item nav-link search-toggler d-flex align-items-center px-0" href="javascript:void(0);">
                    <span class="d-inline-block text-body-secondary fw-normal" id="autocomplete"></span>
                  </a>
                </div>
              </div>

              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-md-auto">
                <li class="nav-item dropdown-language dropdown">
                  <a
                    class="nav-link dropdown-toggle hide-arrow btn btn-icon btn-text-secondary rounded-pill"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <i class="icon-base ti tabler-language icon-22px text-heading"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
				  <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                      <a class="dropdown-item" href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>" data-language="<?php echo e(strtolower($localeCode)); ?>">
                        <span><?php echo e($properties['native']); ?></span>
                      </a>
                    </li>
				  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </li>
                <!--/ Language -->

                <!-- Style Switcher -->
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle hide-arrow btn btn-icon btn-text-secondary rounded-pill"
                    id="nav-theme"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <i class="icon-base ti tabler-sun icon-22px theme-icon-active text-heading"></i>
                    <span class="d-none ms-2" id="nav-theme-text">Toggle theme</span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="nav-theme-text">
                    <li>
                      <button
                        type="button"
                        class="dropdown-item align-items-center active"
                        data-bs-theme-value="light"
                        aria-pressed="false">
                        <span><i class="icon-base ti tabler-sun icon-22px me-3" data-icon="sun"></i><?php echo e(__('Light')); ?></span>
                      </button>
                    </li>
                    <li>
                      <button
                        type="button"
                        class="dropdown-item align-items-center"
                        data-bs-theme-value="dark"
                        aria-pressed="true">
                        <span
                          ><i class="icon-base ti tabler-moon-stars icon-22px me-3" data-icon="moon-stars"></i
                          ><?php echo e(__('Dark')); ?></span
                        >
                      </button>
                    </li>
                    <li>
                      <button
                        type="button"
                        class="dropdown-item align-items-center"
                        data-bs-theme-value="system"
                        aria-pressed="false">
                        <span
                          ><i
                            class="icon-base ti tabler-device-desktop-analytics icon-22px me-3"
                            data-icon="device-desktop-analytics"></i
                          ><?php echo e(__('System')); ?></span
                        >
                      </button>
                    </li>
                  </ul>
                </li>
                <!-- / Style Switcher-->

                <!-- Quick links  -->
                <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown">
                  <a
                    class="nav-link dropdown-toggle hide-arrow btn btn-icon btn-text-secondary rounded-pill"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown"
                    data-bs-auto-close="outside"
                    aria-expanded="false">
                    <i class="icon-base ti tabler-layout-grid-add icon-22px text-heading"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end p-0">
                    <div class="dropdown-menu-header border-bottom">
                      <div class="dropdown-header d-flex align-items-center py-3">
                        <h6 class="mb-0 me-auto"><?php echo e(__('Shortcuts')); ?></h6>
                      </div>
                    </div>
                    <div class="dropdown-shortcuts-list scrollable-container">
                      <div class="row row-bordered overflow-visible g-0">
                        <div class="dropdown-shortcuts-item col">
                          <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                            <i class="icon-base ti tabler-mail icon-26px text-heading"></i>
                          </span>
                          <a href="<?php echo e(route('messagetest')); ?>" class="stretched-link"><?php echo e(__('Test Message')); ?></a>
                          <small><?php echo e(__('Send Message')); ?></small>
                        </div>
                        <div class="dropdown-shortcuts-item col">
                          <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                            <i class="icon-base ti tabler-brand-campaignmonitor icon-26px text-heading"></i>
                          </span>
                          <a href="<?php echo e(route('campaign.create')); ?>" class="stretched-link"><?php echo e(__('Campaign')); ?></a>
                          <small><?php echo e(__('Create Campaign')); ?></small>
                        </div>
                      </div>
                      <div class="row row-bordered overflow-visible g-0">
                        <div class="dropdown-shortcuts-item col">
                          <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                            <i class="icon-base ti tabler-robot icon-26px text-heading"></i>
                          </span>
                          <a href="app-user-list.html" class="stretched-link"><?php echo e(__('AI Bot')); ?></a>
                          <small><?php echo e(__('Setup AI Bot')); ?></small>
                        </div>
                        <div class="dropdown-shortcuts-item col">
                          <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                            <i class="icon-base ti tabler-message-2 icon-26px text-heading"></i>
                          </span>
                          <a href="app-access-roles.html" class="stretched-link"><?php echo e(__('Auto Reply')); ?></a>
                          <small><?php echo e(__('Create Auto Reply')); ?></small>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- Quick links -->

                <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-2">
				<?php if(Auth::user()->level != 'admin'): ?>
					<a class="nav-link dropdown-toggle hide-arrow btn btn-icon btn-text-secondary rounded-pill" href="<?php echo e(route('user.tickets.index')); ?>">
                    <span class="position-relative">
                      <i class="icon-base ti tabler-ticket icon-22px text-heading"></i>
                      <span class="badge rounded-pill bg-danger badge-dot badge-notifications border"></span>
                    </span>
                  </a>
				<?php else: ?>
					<a class="nav-link dropdown-toggle hide-arrow btn btn-icon btn-text-secondary rounded-pill" href="<?php echo e(route('admin.tickets.index')); ?>">
                    <span class="position-relative">
                      <i class="icon-base ti tabler-ticket icon-22px text-heading"></i>
                      <span class="badge rounded-pill bg-danger badge-dot badge-notifications border"></span>
                    </span>
                  </a>
				<?php endif; ?>
				</li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a
                    class="nav-link dropdown-toggle hide-arrow p-0"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="<?php echo e(asset('img/avatars/1.png')); ?>" alt class="rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item mt-0" href="pages-account-settings-account.html">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0 me-2">
                            <div class="avatar avatar-online">
                              <img src="<?php echo e(asset('img/avatars/1.png')); ?>" alt class="rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-0"><?php echo e(Auth::user()->username); ?></h6>
                            <small class="text-body-secondary"><?php echo e(__(Auth::user()->level)); ?></small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider my-1 mx-n2"></div>
                    </li>
					<?php if(env("ENABLE_INDEX") == 'yes'): ?>
					<li>
                      <a class="dropdown-item" href="<?php echo e(route('index')); ?>">
                        <i class="icon-base ti tabler-smart-home me-3 icon-md"></i
                        ><span class="align-middle"><?php echo e(__('Home')); ?></span>
                      </a>
                    </li>
					<?php endif; ?>
                    <li>
                      <a class="dropdown-item" href="<?php echo e(route('user.settings')); ?>">
                        <i class="icon-base ti tabler-settings me-3 icon-md"></i
                        ><span class="align-middle"><?php echo e(__('Setting')); ?></span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider my-1 mx-n2"></div>
                    </li>
                    <li>
                      <div class="d-grid px-2 pt-2 pb-1">
                        <a class="btn btn-sm btn-danger d-flex" href="<?php echo e(route('logout')); ?>">
                          <small class="align-middle"><?php echo e(__('Logout')); ?></small>
                          <i class="icon-base ti tabler-logout ms-2 icon-14px"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar --><?php /**PATH /www/wwwroot/blas2.codeteam.id/resources/themes/vuexy/views/components/header.blade.php ENDPATH**/ ?>