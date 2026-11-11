<div class="prototype-fields">
    <section class="field-card">
        <div class="field-card-heading"><span class="section-index">01</span><div><h3>Pet identity</h3><p>Basic information and AI-assisted breed details</p></div></div>
        <div class="field-grid identity-grid">
            <div class="field"><label>Pet name <b>*</b></label><input type="text" placeholder="e.g. Milo"></div>
            <div class="field"><label>Pet ID</label><input type="text" value="<?php echo e($nextPetID); ?>" readonly></div>
            <div class="field"><label>Pet category <b>*</b></label><select class="type-field"><option value="">Select category</option><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($category->category_name); ?>"><?php echo e($category->category_name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
            <div class="field"><label>Breed <b>*</b></label><input class="breed-field" type="text" placeholder="AI suggestion appears here"></div>
            <div class="field"><label>Colour</label><input type="text" placeholder="e.g. Golden"></div>
            <div class="field"><label>Age (months) <b>*</b></label><input type="number" min="0" placeholder="e.g. 8"></div>
            <div class="field"><label>Price (RM) <b>*</b></label><input type="number" min="0" step="0.01" placeholder="0.00"></div>
            <div class="field"><label>Size <b>*</b></label><select><option value="">Select size</option><option>Small</option><option>Medium</option><option>Large</option></select></div>
            <div class="field gender-field"><label>Gender <b>*</b></label><div class="gender-pills"><label><input type="radio" name="gender-<?php echo e($prefix); ?>" value="Male"><span>♂ Male</span></label><label><input type="radio" name="gender-<?php echo e($prefix); ?>" value="Female"><span>♀ Female</span></label></div></div>
        </div>
    </section>
    <section class="field-card">
        <div class="field-card-heading"><span class="section-index">02</span><div><h3>Health & listing</h3><p>Care status and where this pet is listed</p></div></div>
        <div class="field-grid detail-grid">
            <div class="field"><label>Health status <b>*</b></label><select><option value="">Select status</option><?php $__currentLoopData = ['Excellent','Good','Fair']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option><?php echo e($status); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
            <div class="field"><label>Vaccination status <b>*</b></label><select><option value="">Select status</option><?php $__currentLoopData = ['Up-to-date','Due Soon','Overdue','Not-vaccinated','Partial']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option><?php echo e($status); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
            <div class="field"><label>Outlet <b>*</b></label><select><option value="">Select outlet</option><?php $__currentLoopData = $outlets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $outlet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($outlet->OutletID); ?>"><?php echo e($outlet->City); ?> - (<?php echo e($outlet->State); ?>)</option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
            <div class="field"><label>Supplier <b>*</b></label><select><option value="">Select supplier</option><?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($supplier->SupplierID); ?>"><?php echo e($supplier->SupplierName); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
            <div class="field field-full"><label>Description</label><textarea rows="3" placeholder="Describe this pet's personality, behaviour and other details…"></textarea></div>
        </div>
    </section>
</div><?php /**PATH C:\Users\user\Desktop\FurryTales\resources\views/admin/pets/partials/prototypeFields.blade.php ENDPATH**/ ?>