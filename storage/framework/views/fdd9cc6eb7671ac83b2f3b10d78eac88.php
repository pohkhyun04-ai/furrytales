

<?php $__env->startSection('title', 'All Pets Management'); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
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

        @media (max-width: 720px) {
            .filters-container {
                flex-direction: column;
                align-items: stretch;
            }

            .filters-container button[type="submit"],
            .filters-container a {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <main class="admin-content">

        
        <div class="admin-header">
            <h1><i class="fas fa-dog"></i> All Pets Management</h1>
            <div class="header-actions">
                <button class="btn btn-primary" id="addCategoryBtn">
                    <i class="fas fa-plus-circle"></i> Add Category
                </button>
                <a href="<?php echo e(route('admin.pets.add')); ?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Pet
                </a>
                <a href="<?php echo e(route('admin.pets.index')); ?>" class="btn btn-secondary">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </div>
        </div>

        
        <?php if(session('category_message')): ?>
            <?php $msg = session('category_message') ?>
            <div class="alert <?php echo e($msg['type'] === 'success' ? 'alert-success' : 'alert-error'); ?>">
                <?php echo e($msg['text']); ?>

            </div>
        <?php endif; ?>

        <?php if(session('message')): ?>
            <div class="alert <?php echo e(session('message_type') === 'success' ? 'alert-success' : 'alert-error'); ?>">
                <?php echo e(session('message')); ?>

            </div>
        <?php endif; ?>

        
        <?php
            $categoryCounts = [];
            foreach ($allPets as $pet) {
                $type = strtolower(trim($pet->Type));
                if ($type) {
                    $categoryCounts[$type] = ($categoryCounts[$type] ?? 0) + 1;
                }
            }
        ?>

        <div class="stats-container">
            <div class="stats-header">
                <h3><i class="fas fa-chart-bar"></i> Pet Statistics</h3>
                <button class="btn btn-sm btn-secondary" onclick="location.reload()">
                    <i class="fas fa-sync-alt"></i> Refresh
                </button>
            </div>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-paw"></i></div>
                    <h3>Total Pets</h3>
                    <div class="number"><?php echo e($petCount); ?></div>
                    <div class="stat-trend">All categories</div>
                </div>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $type = strtolower($cat->category_name);
                        $count = $categoryCounts[$type] ?? 0;
                        $percent = $petCount ? round(($count / $petCount) * 100, 1) : 0;
                    ?>
                    <div class="stat-card" data-type="<?php echo e($type); ?>">
                        <div class="stat-icon">
                            <i class="fas fa-paw"></i>
                        </div>
                        <h3><?php echo e($cat->category_name); ?></h3>
                        <div class="number"><?php echo e($count); ?></div>
                        <div class="stat-trend"><?php echo e($percent); ?>% of total</div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <form method="GET" action="<?php echo e(route('admin.pets.index')); ?>" class="filters-container">
            <input type="text" name="search" value="<?php echo e(request('search')); ?>"
                placeholder="Search by Pet Name, Breed, ID">
            <select name="category">
                <option value="">All Categories</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cat->category_name); ?>"
                        <?php echo e(request('category') == $cat->category_name ? 'selected' : ''); ?>>
                        <?php echo e($cat->category_name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <button type="submit">Search</button>
            <a href="<?php echo e(route('admin.pets.index')); ?>">Clear</a>
        </form>

        <?php if($pets->isEmpty()): ?>
            <div class="no-pets">
                <i class="fas fa-box-open"></i>
                <h3>No pets found</h3>
                <a href="<?php echo e(route('admin.pets.add')); ?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add First Pet
                </a>
            </div>
        <?php else: ?>
            <div class="pets-table-container">
                <table class="pets-table" id="petsTable">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Pet</th>
                            <th>Type / Breed</th>
                            <th>Age / Gender</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $pets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $outlet = $pet->outlet;
                                $supplier = $pet->supplier;
                                $images = array_filter([
                                    $pet->ImageURL1,
                                    $pet->ImageURL2,
                                    $pet->ImageURL3,
                                    $pet->ImageURL4,
                                    $pet->ImageURL5,
                                ]);
                            ?>

                            <tr data-type="<?php echo e(strtolower($pet->Type)); ?>">
                                
                                <td>
                                    <img src="<?php echo e($pet->ImageURL1 ? asset($pet->ImageURL1) : asset('image/default-pet.png')); ?>"
                                        class="pet-thumbnail">
                                </td>

                                
                                <td>
                                    <strong><?php echo e($pet->PetName); ?></strong>
                                    <div>ID: <?php echo e($pet->PetID); ?></div>
                                </td>
                                <td><?php echo e($pet->Type); ?><br><small><?php echo e($pet->Breed); ?></small></td>
                                <td><?php echo e($pet->Age); ?> months<br><small><?php echo e($pet->Gender); ?></small></td>
                                <td><?php echo e($pet->HealthStatus); ?><br><?php echo e($pet->VaccinationStatus); ?></td>
                                <td>RM <?php echo e(number_format($pet->Price, 2)); ?></td>

                                
                                <td>
                                    <button class="btn btn-success btn-sm"
                                        onclick="document.getElementById('petPopup<?php echo e($pet->PetID); ?>').style.display='flex'">
                                        View
                                    </button>

                                    <a href="<?php echo e(route('admin.pets.edit', $pet->PetID)); ?>" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="<?php echo e(route('admin.pets.destroy', $pet->PetID)); ?>" method="POST"
                                        style="display:inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this pet?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                                
                                <div class="popup-overlay" id="petPopup<?php echo e($pet->PetID); ?>">
                                    <div class="popup-box">
                                        <span class="popup-close"
                                            onclick="this.closest('.popup-overlay').style.display='none'">&times;</span>

                                        
                                        <img class="popup-image"
                                            src="<?php echo e($pet->ImageURL1 ? asset($pet->ImageURL1) : asset('image/default-pet.png')); ?>">

                                        
                                        <div class="popup-thumbs">
                                            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <img src="<?php echo e(asset($img)); ?>" data-src="<?php echo e(asset($img)); ?>"
                                                    onclick="this.closest('.popup-box').querySelector('.popup-image').src=this.dataset.src">
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>

                                        
                                        <h3><?php echo e($pet->PetName); ?></h3>
                                        <p><strong>ID:</strong> <?php echo e($pet->PetID); ?></p>
                                        <p><strong>Type:</strong> <?php echo e($pet->Type); ?></p>
                                        <p><strong>Breed:</strong> <?php echo e($pet->Breed); ?></p>
                                        <p><strong>Age:</strong> <?php echo e($pet->Age); ?> months</p>
                                        <p><strong>Gender:</strong> <?php echo e($pet->Gender); ?></p>
                                        <p><strong>Price:</strong> RM <?php echo e(number_format($pet->Price, 2)); ?></p>
                                        <p><strong>Health Status:</strong> <?php echo e($pet->HealthStatus); ?></p>
                                        <p><strong>Vaccination Status:</strong> <?php echo e($pet->VaccinationStatus); ?></p>
                                        <p><strong>Outlet:</strong>
                                            <?php echo e($outlet ? $outlet->OutletID . ' - ' . $outlet->City . '  (' . $outlet->State . ')' : 'N/A'); ?>

                                        </p>
                                        <p><strong>Supplier:</strong>
                                            <?php echo e($supplier ? $supplier->SupplierID . ' - ' . $supplier->SupplierName : 'N/A'); ?>

                                        </p>
                                        <p><strong>Description:</strong> <?php echo nl2br(e($pet->Description)); ?></p>
                                    </div>
                                </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                <div class="mt-3">
                    <?php echo e($pets->links()); ?>

                </div>

            </div>
        <?php endif; ?>

        
        <div id="addCategoryModal" class="modal-overlay">
            <div class="modal-content">
                <h2><i class="fas fa-folder-plus"></i> Add Category</h2>
                <form action="<?php echo e(route('admin.categories.add')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="category_name" required>
                    </div>
                    <div class="modal-actions">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" id="closeModal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        // Category modal
        const addBtn = document.getElementById('addCategoryBtn');
        const modal = document.getElementById('addCategoryModal');
        const closeBtn = document.getElementById('closeModal');
        addBtn?.addEventListener('click', () => modal.style.display = 'flex');
        closeBtn?.addEventListener('click', () => modal.style.display = 'none');
        window.addEventListener('click', e => {
            if (e.target === modal) modal.style.display = 'none';
        });

        // Category filter
        document.getElementById('categoryFilter')?.addEventListener('change', function() {
            const value = this.value;
            const rows = document.querySelectorAll('#petsTable tbody tr');
            let count = 0;
            rows.forEach(r => {
                if (value === 'all' || r.dataset.type === value) {
                    r.style.display = '';
                    count++;
                } else {
                    r.style.display = 'none';
                }
            });
            document.querySelector('.pets-count p').textContent = `Showing ${count} pets in the system`;
        });


        document.addEventListener("DOMContentLoaded", function() {
            // AI Detection Elements
            const imageInput = document.getElementById("imageInput");
            const preview = document.getElementById("preview");
            const breedInput = document.getElementById("breed");
            const typeInput = document.getElementById("type");
            const overlay = document.getElementById("loadingOverlay");

            // Multiple Images Elements
            const addImageBtn = document.getElementById("addImageBtn");
            const extraImagesContainer = document.getElementById("extraImagesContainer");
            const maxImages = 5;
            let imageCount = 1; // Start with 1 (main image)

            // ========== AI BREED DETECTION ==========
            if (imageInput) {
                imageInput.addEventListener("change", async function() {
                    if (!this.files[0]) return;

                    const file = this.files[0];

                    // Show preview immediately
                    preview.src = URL.createObjectURL(file);

                    // Show loading overlay
                    if (overlay && window.showLoadingOverlay) {
                        window.showLoadingOverlay();
                    } else {
                        overlay.style.display = "flex";
                    }

                    const formData = new FormData();
                    formData.append("image", file);

                    try {
                        const res = await fetch("index.php?action=detectBreed", {
                            method: "POST",
                            body: formData
                        });
                        const data = await res.json();

                        console.log("AI Response:", data);

                        if (data.breed) breedInput.value = data.breed;
                        if (data.type) typeInput.value = data.type;

                        if (data.debug) console.log("Debug:", data.debug);

                    } catch (err) {
                        console.error("AI detection failed:", err);
                        alert("AI detection failed! Please try again.");
                    } finally {
                        // Hide loading overlay
                        if (overlay && window.hideLoadingOverlay) {
                            window.hideLoadingOverlay();
                        } else {
                            setTimeout(() => {
                                overlay.style.display = "none";
                            }, 300);
                        }
                    }
                });
            }

            // ========== MULTIPLE IMAGES FUNCTIONALITY ==========

            // Function to create a new image input field
            function createImageInput(index) {
                const imageItem = document.createElement('div');
                imageItem.className = 'image-item';
                imageItem.dataset.index = index;

                const label = document.createElement('label');
                label.htmlFor = `extraImage${index}`;

                const img = document.createElement('img');
                img.src = 'public/uploads/placeholder.png';
                img.className = 'extra-preview';
                img.id = `extraPreview${index}`;
                img.alt = `Extra image ${index}`;

                const p = document.createElement('p');
                p.textContent = `Image ${index + 1}`;

                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.className = 'remove-image-btn';
                removeBtn.innerHTML = 'x';
                removeBtn.title = 'Remove this image';

                const input = document.createElement('input');
                input.type = 'file';
                input.id = `extraImage${index}`;
                input.name = `extraImage${index + 1}`;
                input.accept = 'image/*';
                input.hidden = true;

                // Preview for extra image
                input.addEventListener('change', function() {
                    if (this.files && this.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            img.src = e.target.result;
                        };
                        reader.readAsDataURL(this.files[0]);
                    }
                });

                // Remove button functionality
                removeBtn.addEventListener('click', function() {
                    imageItem.remove();
                    imageCount--;
                    updateAddButton();
                    updateImageNumbers();
                });

                label.appendChild(img);
                label.appendChild(p);
                imageItem.appendChild(label);
                imageItem.appendChild(removeBtn);
                imageItem.appendChild(input);

                return imageItem;
            }

            // Update add button state and counter
            function updateAddButton() {
                if (imageCount >= maxImages) {
                    addImageBtn.disabled = true;
                    addImageBtn.textContent = 'Maximum 5 images reached';
                } else {
                    addImageBtn.disabled = false;
                    addImageBtn.innerHTML =
                        `+ Add Another Image <span class="image-counter">(${imageCount}/${maxImages})</span>`;
                }
            }

            // Update image numbers
            function updateImageNumbers() {
                const imageItems = document.querySelectorAll('.image-item');
                imageItems.forEach((item, index) => {
                    const p = item.querySelector('p');
                    if (p) {
                        p.textContent = `Image ${index + 2}`; // +2 because main is image 1
                    }
                    item.dataset.index = index;
                });
            }

            // Add new image button click
            if (addImageBtn) {
                // Initial button text with counter
                addImageBtn.innerHTML =
                    `+ Add Another Image <span class="image-counter">(${imageCount}/${maxImages})</span>`;

                addImageBtn.addEventListener('click', function() {
                    if (imageCount < maxImages) {
                        const newIndex = imageCount - 1;
                        const newImageInput = createImageInput(newIndex);
                        extraImagesContainer.appendChild(newImageInput);
                        imageCount++;
                        updateAddButton();

                        // Auto-click the new file input
                        setTimeout(() => {
                            document.getElementById(`extraImage${newIndex}`)
                        .click(); // Use backticks here too
                        }, 100);
                    }
                });
            }

            // Initialize the button state
            updateAddButton();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\user\Desktop\FurryTales\resources\views\admin\pets\petList.blade.php ENDPATH**/ ?>