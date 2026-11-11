

<?php $__env->startSection('title', 'All Accessories Management'); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .accessory-thumbnail {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
        }

        .popup-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .popup-box {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
        }

        .popup-close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .popup-thumbs img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            margin: 5px;
            cursor: pointer;
            border-radius: 5px;
        }

        .popup-image {
            width: 100%;
            max-height: 300px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        ul {
            list-style: none;
        }

        /* Filters area */
        .filters-container {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: center;
            margin: 16px 0 24px;
            padding: 12px 16px;
            border: 1px solid rgba(0, 0, 0, 0.12);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.92);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
        }

        .filters-container input[type="text"],
        .filters-container select {
            flex: 1 1 240px;
            min-width: 180px;
            padding: 10px 14px;
            border: 1px solid rgba(0, 0, 0, 0.24);
            border-radius: 30px;
            font-size: 14px;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            background: #fff;
        }

        .filters-container input[type="text"]:focus,
        .filters-container select:focus {
            outline: none;
            border-color: rgba(48, 133, 214, 0.8);
            box-shadow: 0 0 0 3px rgba(48, 133, 214, 0.18);
        }

        .filters-container button[type="submit"],
        .filters-container a {
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 10px 18px;
            border-radius: 999px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }

        .filters-container button[type="submit"] {
            border: none;
            background: linear-gradient(135deg, #2a9df4, #1b6dd5);
            color: #fff;
        }

        .filters-container button[type="submit"]:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 18px rgba(26, 101, 183, 0.25);
        }

        .filters-container a {
            border: 1px solid rgba(0, 0, 0, 0.16);
            background: rgba(255, 255, 255, 0.85);
            color: rgba(0, 0, 0, 0.75);
        }

        .filters-container a:hover {
            background: rgba(0, 0, 0, 0.06);
        }

        /* =========================
           PAGINATION
        ========================= */
        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding-left: 0;
            margin: 30px;
            gap: 5px;
        }

        .pagination li a,
        .pagination li span {
            padding: 8px 14px;
            border-radius: 6px;
            border: 1px solid var(--color-brand-medium);
            text-decoration: none;
            color: var(--color-brand-dark);
            font-size: 14px;
            transition: all 0.2s ease;
        }

        .pagination li a:hover {
            background-color: var(--color-brand-light);
        }

        .pagination li.active span {
            background: linear-gradient(135deg, var(--color-brand-primary-gradient-start), var(--color-brand-primary-gradient-end));
            color: #fff;
            border-color: transparent;
        }

        .pagination li.disabled span {
            color: #aaa;
            cursor: not-allowed;
            background-color: #f8f8f8;
            border-color: #ddd;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <main class="admin-content">
        <div class="admin-header">
            <h1><i class="fa-sharp fa-solid fa-bone"></i> All Accessories Management</h1>
            <div class="header-actions">
                <a href="<?php echo e(route('admin.accessories.add')); ?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Accessory
                </a>
            </div>
        </div>

        
        <?php if(session('message')): ?>
            <div class="alert <?php echo e(session('message_type') === 'success' ? 'alert-success' : 'alert-error'); ?>">
                <?php echo e(session('message')); ?>

            </div>
        <?php endif; ?>

        
        <form method="GET" action="<?php echo e(route('admin.accessories.index')); ?>" class="filters-container">
            <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Search by Name, ID, Category">

            <select name="category">
                <option value="">All Categories</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cat->Category); ?>" <?php echo e(request('category') == $cat->Category ? 'selected' : ''); ?>>
                        <?php echo e($cat->Category); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
            <a href="<?php echo e(route('admin.accessories.index')); ?>" class="btn btn-secondary"><i class="fas fa-times"></i>
                Clear</a>
        </form>

        <?php if($accessories->isEmpty()): ?>
            <div class="no-pets">
                <i class="fas fa-box-open"></i>
                <h3>No accessories found</h3>
                <a href="<?php echo e(route('admin.accessories.add')); ?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add First Accessory
                </a>
            </div>
        <?php else: ?>
            <div class="pets-table-container" style="overflow: scroll">
                <table class="pets-table" id="accessoriesTable">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Accessory</th>
                            <th>Category</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $accessories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-name="<?php echo e(strtolower($acc->AccessoryName)); ?>">
                                <td>
                                    <img src="<?php echo e(asset($acc->ImageURL1 ?: 'image/default-pet.png')); ?>"
                                        class="accessory-thumbnail">
                                </td>
                                <td>
                                    <strong><?php echo e($acc->AccessoryName); ?></strong>
                                    <div>ID: <?php echo e($acc->AccessoryID); ?></div>
                                </td>
                                <td><?php echo e($acc->Category); ?></td>
                                <td><?php echo e($acc->outletAccessories->sum('StockQty') ?? 0); ?></td>
                                <td>
                                    
                                    <button class="btn btn-success btn-sm"
                                        onclick="document.getElementById('accessoryPopup<?php echo e($acc->AccessoryID); ?>').style.display='flex'">
                                        View
                                    </button>

                                    
                                    <a href="<?php echo e(route('admin.accessories.edit', $acc->AccessoryID)); ?>"
                                        class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    
                                    <form action="<?php echo e(route('admin.accessories.destroy', $acc->AccessoryID)); ?>"
                                        method="POST" style="display:inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this accessory?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>

                                
                                <div class="popup-overlay" id="accessoryPopup<?php echo e($acc->AccessoryID); ?>">
                                    <div class="popup-box">
                                        <span class="popup-close"
                                            onclick="this.closest('.popup-overlay').style.display='none'">&times;</span>

                                        
                                        <img class="popup-image"
                                            src="<?php echo e(asset($acc->ImageURL1 ?: 'image/default-pet.png')); ?>">

                                        
                                        <div class="popup-thumbs">
                                            <?php $__currentLoopData = array_filter([$acc->ImageURL2, $acc->ImageURL3, $acc->ImageURL4, $acc->ImageURL5]); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <img src="<?php echo e(asset($img)); ?>"
                                                    onclick="this.closest('.popup-box').querySelector('.popup-image').src=this.src">
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>

                                        
                                        <h2><?php echo e($acc->AccessoryName); ?></h2>
                                        <p><strong>ID:</strong> <?php echo e($acc->AccessoryID); ?></p>
                                        <p><strong>Category:</strong> <?php echo e($acc->Category); ?></p>
                                        <p><strong>Brand:</strong> <?php echo e($acc->Brand); ?></p>
                                        <p><strong>Description:</strong> <?php echo nl2br(e($acc->Description)); ?></p>
                                        <p style="color:--color-brand-accent;">
                                            ------------------------------------------------------------------------------------------------------------------
                                        </p>
                                        
                                        <h3>Variants</h3>
                                        <?php if($acc->variants->isEmpty()): ?>
                                            <p>No variants</p>
                                        <?php else: ?>
                                            <ul>
                                                <?php $__currentLoopData = $acc->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($var->VariantKey); ?> @ RM <?php echo e(number_format($var->Price, 2)); ?>

                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php endif; ?>

                                        <p style="color:--color-brand-accent;">
                                            ------------------------------------------------------------------------------------------------------------------
                                        </p>
                                        
                                        <h3>Outlet Stock</h3>

                                        <?php if($acc->outletAccessories->isEmpty()): ?>
                                            <p>No outlet stock</p>
                                        <?php else: ?>
                                            <ul class="no-bullet">
                                                <?php $__currentLoopData = $acc->outletAccessories->sortBy(fn($oa) => $oa->outlet->State ?? ''); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <strong><i><?php echo e($oa->outlet->State ?? $oa->OutletID); ?></i></strong>
                                                        -- <?php echo e($oa->outlet->City); ?> &nbsp;
                                                        | <?php echo e($oa->variant->VariantKey ?? 'No Variant'); ?>

                                                        — Stock: <?php echo e($oa->StockQty); ?>

                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php endif; ?>

                                    </div>
                                </div>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="mt-3">
                    <?php echo e($accessories->links()); ?>

                </div>
            </div>
        <?php endif; ?>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\user\Desktop\FurryTales\resources\views/admin/accessory/accessoryList.blade.php ENDPATH**/ ?>