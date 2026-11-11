<?php $__env->startSection('title', 'Add New Pet'); ?>

<?php $__env->startPush('styles'); ?>
<style>
.pet-add-page{--ink:#49332f;--muted:#8a7772;--line:#eadfdb;--brand:#a95c68;--brand-dark:#82434e;max-width:1440px;margin:0 auto;padding-bottom:42px;color:var(--ink)}
.pet-add-page .page-heading{display:flex;justify-content:space-between;align-items:flex-start;gap:20px;margin-bottom:24px;flex-wrap:wrap}
.pet-add-page .page-heading h1{margin:0 0 7px;color:var(--ink);font-size:clamp(25px,3vw,32px);font-weight:800}
.pet-add-page .page-heading p{margin:0;color:var(--muted);font-size:14px}
.pet-add-page .back-link{display:inline-flex;align-items:center;gap:9px;padding:11px 16px;border:1px solid var(--line);border-radius:12px;background:#fff;color:var(--ink);text-decoration:none;font-weight:700}
.pet-add-page .form-card{background:#fff;border:1px solid var(--line);border-radius:20px;box-shadow:0 10px 30px rgba(90,44,44,.06);overflow:hidden}
.pet-add-page .card-top{padding:23px 28px;border-bottom:1px solid var(--line);display:flex;align-items:center;justify-content:space-between;gap:16px;background:linear-gradient(110deg,#fff 0%,#fff9f8 100%)}
.pet-add-page .card-top h2{margin:0;font-size:18px;font-weight:800;color:var(--ink)}
.pet-add-page .id-chip{border-radius:999px;padding:8px 13px;background:#f8ecee;color:var(--brand-dark);font-size:12px;font-weight:800}
.pet-add-page .form-body{padding:28px}
.pet-add-page .section{margin-bottom:30px}
.pet-add-page .section-heading{display:flex;align-items:center;gap:11px;margin:0 0 17px;color:var(--ink);font-size:15px;font-weight:800}
.pet-add-page .step{width:29px;height:29px;border-radius:9px;display:grid;place-items:center;background:#f8ecee;color:var(--brand-dark);font-size:12px}
.pet-add-page .upload-layout{display:grid;grid-template-columns:230px minmax(0,1fr);gap:25px;align-items:start}
.pet-add-page .upload-box{border:1.5px dashed #d9bfc0;border-radius:17px;background:#fffafa;padding:17px;text-align:center}
.pet-add-page .main-preview{width:100%;aspect-ratio:1/1;object-fit:cover;display:block;border-radius:13px;background:#f6efed;margin-bottom:14px}
.pet-add-page .upload-button{display:flex;align-items:center;justify-content:center;gap:8px;width:100%;border:0;border-radius:11px;padding:12px 14px;background:var(--brand);color:#fff;font-size:13px;font-weight:800;cursor:pointer}
.pet-add-page .upload-help{display:block;color:var(--muted);font-size:11px;margin-top:10px;line-height:1.5}
.pet-add-page .ai-panel{margin-top:13px;padding:13px;border:1px solid var(--line);border-radius:12px;background:#fff;text-align:left}
.pet-add-page .ai-title{display:flex;align-items:center;gap:8px;font-size:12px;font-weight:800;color:var(--ink)}
.pet-add-page .ai-state{margin-top:7px;color:var(--muted);font-size:12px;line-height:1.5}
.pet-add-page .ai-state.success{color:#28734d}.pet-add-page .ai-state.error{color:#b34444}.pet-add-page .ai-state.loading{color:var(--brand-dark)}
.pet-add-page .fields-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:17px 18px}
.pet-add-page .field{min-width:0}.pet-add-page .field.full{grid-column:1/-1}
.pet-add-page .field label{display:block;margin:0 0 7px;color:#66514c;font-size:12px;font-weight:800}
.pet-add-page .required{color:#c65d67}
.pet-add-page .field input,.pet-add-page .field select,.pet-add-page .field textarea{display:block;width:100%;min-height:45px;padding:11px 13px;border:1px solid #e6d9d5;border-radius:11px;background:#fff;color:var(--ink);font:inherit;font-size:13px;outline:none;transition:border-color .18s,box-shadow .18s;box-sizing:border-box}
.pet-add-page .field textarea{min-height:112px;resize:vertical}
.pet-add-page .field input:focus,.pet-add-page .field select:focus,.pet-add-page .field textarea:focus{border-color:#bd7d86;box-shadow:0 0 0 3px rgba(169,92,104,.12)}
.pet-add-page .field input[readonly]{background:#f8f3f1;color:#806e69}
.pet-add-page .gender-options{display:flex;gap:10px}
.pet-add-page .gender-option{flex:1}.pet-add-page .gender-option input{position:absolute;opacity:0;pointer-events:none}
.pet-add-page .gender-option span{display:flex;justify-content:center;align-items:center;gap:8px;min-height:43px;border:1px solid var(--line);border-radius:11px;color:#735f5a;font-size:13px;font-weight:700;cursor:pointer}
.pet-add-page .gender-option input:checked+span{border-color:var(--brand);background:#fbf0f1;color:var(--brand-dark)}
.pet-add-page .extra-area{padding:18px;border:1px solid var(--line);border-radius:15px;background:#fffdfc}
.pet-add-page .extra-header{display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap;margin-bottom:14px}
.pet-add-page .extra-header p{margin:0;color:var(--muted);font-size:12px}
.pet-add-page .add-extra{border:1px solid #dfc5c5;background:#fff;color:var(--brand-dark);border-radius:10px;padding:9px 13px;font-size:12px;font-weight:800;cursor:pointer}
.pet-add-page .add-extra:disabled{opacity:.45;cursor:not-allowed}
.pet-add-page .extra-grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:12px}
.pet-add-page .extra-item{position:relative;border:1px solid var(--line);border-radius:12px;padding:9px;background:#fff;text-align:center}
.pet-add-page .extra-item img{display:block;width:100%;aspect-ratio:1/1;object-fit:cover;border-radius:8px;background:#f5eeee}
.pet-add-page .extra-item label{display:block;margin-top:8px;color:#75615c;font-size:11px;font-weight:700;cursor:pointer;overflow-wrap:anywhere}
.pet-add-page .extra-item input[type=file]{display:none}
.pet-add-page .remove-extra{position:absolute;top:4px;right:4px;width:25px;height:25px;border:0;border-radius:50%;background:#fff;color:#b34852;box-shadow:0 2px 8px #0002;cursor:pointer;font-size:16px}
.pet-add-page .form-actions{display:flex;justify-content:flex-end;gap:11px;padding-top:23px;border-top:1px solid var(--line);margin-top:28px}
.pet-add-page .pet-btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;min-height:45px;padding:0 20px;border-radius:11px;font-size:13px;font-weight:800;cursor:pointer;text-decoration:none;transition:.2s}
.pet-add-page .btn-secondary{border:1px solid var(--line);background:#fff;color:#6f5c56}
.pet-add-page .btn-primary{border:1px solid var(--brand);background:var(--brand);color:#fff}
.pet-add-page .btn-primary:hover{background:var(--brand-dark)}
.pet-add-page .pet-btn:disabled{opacity:.6;cursor:wait}
.pet-add-page .alert{margin-bottom:18px;padding:13px 16px;border-radius:12px;border:1px solid #f0c8c8;background:#fff5f5;color:#9f3838;font-size:13px}
.pet-add-page .alert ul{margin:0;padding-left:19px}
.pet-add-page .processing{position:fixed;inset:0;z-index:9999;display:none;align-items:center;justify-content:center;background:rgba(48,31,31,.42);backdrop-filter:blur(3px)}
.pet-add-page .processing-card{width:min(320px,calc(100% - 40px));padding:25px;border-radius:17px;background:#fff;text-align:center;box-shadow:0 20px 60px #0002}
.pet-add-page .spinner{width:34px;height:34px;margin:0 auto 14px;border:3px solid #f1e4e3;border-top-color:var(--brand);border-radius:50%;animation:pet-spin .8s linear infinite}
@keyframes pet-spin{to{transform:rotate(360deg)}}
@media(max-width:900px){.pet-add-page .upload-layout{grid-template-columns:190px minmax(0,1fr)}.pet-add-page .extra-grid{grid-template-columns:repeat(3,minmax(0,1fr))}}
@media(max-width:680px){.pet-add-page .form-body{padding:18px}.pet-add-page .card-top{padding:18px}.pet-add-page .upload-layout{grid-template-columns:1fr}.pet-add-page .upload-box{max-width:260px;width:100%;margin:0 auto}.pet-add-page .fields-grid{grid-template-columns:1fr}.pet-add-page .field.full{grid-column:auto}.pet-add-page .extra-grid{grid-template-columns:repeat(2,minmax(0,1fr))}.pet-add-page .form-actions{flex-direction:column-reverse}.pet-add-page .form-actions .pet-btn{width:100%}}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<main class="admin-content pet-add-page">
    <div class="page-heading">
        <div><h1><i class="fas fa-paw"></i> Add New Pet</h1><p>Create a pet listing and let AI suggest its breed from the main photo.</p></div>
        <a href="<?php echo e(route('admin.pets.index')); ?>" class="back-link"><i class="fas fa-arrow-left"></i> Back to Pet Management</a>
    </div>

    <?php if($errors->any()): ?>
        <div class="alert"><ul><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></div>
    <?php endif; ?>

    <form id="petCreateForm" method="POST" action="<?php echo e(route('admin.pets.store')); ?>" enctype="multipart/form-data" class="form-card">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="image_features" id="imageFeaturesInput">
        <div class="card-top"><h2>Pet information</h2><span class="id-chip"><i class="fas fa-hashtag"></i> <?php echo e($nextPetID); ?></span></div>
        <div class="form-body">
            <section class="section">
                <h3 class="section-heading"><span class="step">01</span> Main photo and AI breed detection</h3>
                <div class="upload-layout">
                    <div class="upload-box">
                        <img src="<?php echo e(asset('image/default-pet.png')); ?>" id="mainImagePreview" class="main-preview" alt="Pet photo preview">
                        <label for="imageInput" class="upload-button"><i class="fas fa-cloud-upload-alt"></i> Choose pet photo</label>
                        <input type="file" id="imageInput" name="image" accept="image/jpeg,image/png,image/webp,image/gif" hidden>
                        <small class="upload-help">JPG, PNG, WEBP or GIF. Maximum 5 MB.</small>
                        <div class="ai-panel" aria-live="polite"><div class="ai-title"><i class="fas fa-wand-magic-sparkles"></i> AI breed assistant</div><div id="breedDetectionStatus" class="ai-state">Upload a clear photo of the pet. Detection will start automatically.</div></div>
                    </div>
                    <div class="fields-grid">
                        <div class="field"><label for="petName">Pet name <span class="required">*</span></label><input id="petName" type="text" name="petName" value="<?php echo e(old('petName')); ?>" placeholder="Enter pet name" required maxlength="255"></div>
                        <div class="field"><label for="petIdDisplay">Pet ID</label><input id="petIdDisplay" type="text" value="<?php echo e($nextPetID); ?>" readonly></div>
                        <div class="field"><label for="typeInput">Pet category <span class="required">*</span></label><select id="typeInput" name="type" required><option value="" disabled selected>Select category</option><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($category->category_name); ?>" <?php if(old('type') === $category->category_name): echo 'selected'; endif; ?>><?php echo e($category->category_name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
                        <div class="field"><label for="breedInput">Breed <span class="required">*</span></label><input id="breedInput" type="text" name="breed" value="<?php echo e(old('breed')); ?>" placeholder="AI suggestion appears here" required></div>
                        <div class="field"><label for="colorInput">Colour</label><input id="colorInput" type="text" name="color" value="<?php echo e(old('color')); ?>" placeholder="e.g. Brown and white"></div>
                        <div class="field"><label for="ageInput">Age (months) <span class="required">*</span></label><input id="ageInput" type="number" name="age" value="<?php echo e(old('age')); ?>" placeholder="Enter age in months" min="0" required></div>
                        <div class="field"><label for="priceInput">Price (RM) <span class="required">*</span></label><input id="priceInput" type="number" name="price" value="<?php echo e(old('price')); ?>" placeholder="0.00" min="0" step="0.01" required></div>
                        <div class="field"><label for="sizeInput">Size <span class="required">*</span></label><select id="sizeInput" name="size" required><option value="" disabled selected>Select size</option><?php $__currentLoopData = ['Small','Medium','Large']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($size); ?>" <?php if(old('size') === $size): echo 'selected'; endif; ?>><?php echo e($size); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
                        <div class="field"><label>Gender <span class="required">*</span></label><div class="gender-options"><label class="gender-option"><input type="radio" name="gender" value="Male" <?php if(old('gender') === 'Male'): echo 'checked'; endif; ?> required><span><i class="fas fa-mars"></i> Male</span></label><label class="gender-option"><input type="radio" name="gender" value="Female" <?php if(old('gender') === 'Female'): echo 'checked'; endif; ?>><span><i class="fas fa-venus"></i> Female</span></label></div></div>
                    </div>
                </div>
            </section>

            <section class="section">
                <h3 class="section-heading"><span class="step">02</span> Health and listing details</h3>
                <div class="fields-grid">
                    <div class="field"><label for="healthStatus">Health status <span class="required">*</span></label><select id="healthStatus" name="healthStatus" required><option value="" disabled selected>Select health status</option><?php $__currentLoopData = ['Excellent','Good','Fair']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($status); ?>" <?php if(old('healthStatus') === $status): echo 'selected'; endif; ?>><?php echo e($status); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
                    <div class="field"><label for="vaccinationStatus">Vaccination status <span class="required">*</span></label><select id="vaccinationStatus" name="vaccinationStatus" required><option value="" disabled selected>Select vaccination status</option><?php $__currentLoopData = ['Up-to-date','Due Soon','Overdue','Not-vaccinated','Partial']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($status); ?>" <?php if(old('vaccinationStatus') === $status): echo 'selected'; endif; ?>><?php echo e($status); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
                    <div class="field"><label for="outletID">Outlet <span class="required">*</span></label><select id="outletID" name="outletID" required><option value="" disabled selected>Select outlet</option><?php $__currentLoopData = $outlets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $outlet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($outlet->OutletID); ?>" <?php if(old('outletID') == $outlet->OutletID): echo 'selected'; endif; ?>><?php echo e($outlet->City); ?> - (<?php echo e($outlet->State); ?>)</option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
                    <div class="field"><label for="supplierID">Supplier <span class="required">*</span></label><select id="supplierID" name="supplierID" required><option value="" disabled selected>Select supplier</option><?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($supplier->SupplierID); ?>" <?php if(old('supplierID') == $supplier->SupplierID): echo 'selected'; endif; ?>><?php echo e($supplier->SupplierName); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
                    <div class="field full"><label for="description">Description</label><textarea id="description" name="description" placeholder="Add a short description, personality, or any important information about this pet."><?php echo e(old('description')); ?></textarea></div>
                </div>
            </section>

            <section class="section">
                <h3 class="section-heading"><span class="step">03</span> Additional photos</h3>
                <div class="extra-area"><div class="extra-header"><p>Add up to four more photos to show the pet from different angles.</p><button type="button" id="addImageBtn" class="add-extra"><i class="fas fa-plus"></i> Add photo <span id="imageCountLabel">(1/5)</span></button></div><div id="extraImagesContainer" class="extra-grid"></div></div>
            </section>

            <div class="form-actions">
                <a href="<?php echo e(route('admin.pets.index')); ?>" class="pet-btn btn-secondary">Cancel</a>
                <button type="reset" id="resetPetForm" class="pet-btn btn-secondary">Reset form</button>
                <button type="submit" id="submitPetButton" class="pet-btn btn-primary"><i class="fas fa-check"></i> Add pet</button>
            </div>
        </div>
    </form>
</main>
<div id="processingOverlay" class="pet-add-page processing"><div class="processing-card"><div class="spinner"></div><strong id="processingText">Preparing pet images…</strong><p style="margin:8px 0 0;color:#8a7772;font-size:12px;">Please keep this page open.</p></div></div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/mobilenet"></script>
<script src="<?php echo e(asset('js/pet-features.js')); ?>"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('petCreateForm');
    const imageInput = document.getElementById('imageInput');
    const preview = document.getElementById('mainImagePreview');
    const breedInput = document.getElementById('breedInput');
    const typeInput = document.getElementById('typeInput');
    const status = document.getElementById('breedDetectionStatus');
    const addButton = document.getElementById('addImageBtn');
    const extraContainer = document.getElementById('extraImagesContainer');
    const countLabel = document.getElementById('imageCountLabel');
    const overlay = document.getElementById('processingOverlay');
    const submitButton = document.getElementById('submitPetButton');
    const featuresInput = document.getElementById('imageFeaturesInput');
    const maxImages = 5;
    let detectionPromise = Promise.resolve();
    let activeDetection = null;
    let previewUrl = null;

    function setStatus(message, state) {
        status.textContent = message;
        status.className = 'ai-state' + (state ? ' ' + state : '');
    }

    function setPetType(value) {
        if (!value) return;
        let option = Array.from(typeInput.options).find(item => item.value.toLowerCase() === value.toLowerCase());
        if (!option) {
            option = new Option(value, value);
            typeInput.add(option);
        }
        typeInput.value = option.value;
    }

    async function detectBreed(file) {
        if (activeDetection) activeDetection.abort();
        activeDetection = new AbortController();
        const controller = activeDetection;
        const payload = new FormData();
        payload.append('image', file);
        setStatus('Analysing the photo… this may take a moment on the first run.', 'loading');

        detectionPromise = (async () => {
            try {
                const response = await fetch(<?php echo json_encode(route('admin.pets.detectBreed'), 15, 512) ?>, {
                    method: 'POST',
                    headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content, 'Accept': 'application/json'},
                    body: payload,
                    signal: controller.signal
                });
                const data = await response.json().catch(() => ({}));
                if (!response.ok) throw new Error(data.error || data.message || ('Detection request failed (' + response.status + ').'));
                if (data.error) throw new Error(data.error);
                if (!data.breed || !data.type) throw new Error('The AI could not identify this image. Please enter the breed and category manually.');
                if (imageInput.files[0] !== file) return;
                breedInput.value = data.breed;
                setPetType(data.type);
                setStatus('Suggested breed: ' + data.breed + ' · Category: ' + data.type + '. You can edit either field.', 'success');
            } catch (error) {
                if (error.name === 'AbortError') return;
                console.error('Pet breed detection failed:', error);
                setStatus((error.message || 'Breed detection failed.') + ' You can still enter the details manually.', 'error');
            }
        })();
        await detectionPromise;
    }

    imageInput.addEventListener('change', () => {
        const file = imageInput.files && imageInput.files[0];
        if (!file) return;
        if (!file.type.startsWith('image/')) {
            imageInput.value = '';
            setStatus('Please choose a valid image file.', 'error');
            return;
        }
        if (file.size > 5 * 1024 * 1024) {
            imageInput.value = '';
            setStatus('The main photo must be 5 MB or smaller.', 'error');
            return;
        }
        if (previewUrl) URL.revokeObjectURL(previewUrl);
        previewUrl = URL.createObjectURL(file);
        preview.src = previewUrl;
        detectBreed(file);
    });

    function imageCount() { return 1 + extraContainer.querySelectorAll('.extra-item').length; }
    function updateImageCount() {
        const count = imageCount();
        countLabel.textContent = '(' + count + '/' + maxImages + ')';
        addButton.disabled = count >= maxImages;
    }
    function availableSlot() {
        const used = new Set(Array.from(extraContainer.querySelectorAll('input[type="file"]')).map(input => input.name));
        for (let slot = 1; slot <= 4; slot++) if (!used.has('extraImage' + slot)) return slot;
        return null;
    }
    function createExtraImage() {
        const slot = availableSlot();
        if (!slot || imageCount() >= maxImages) return;
        const item = document.createElement('div');
        item.className = 'extra-item';
        const image = document.createElement('img');
        image.src = <?php echo json_encode(asset('image/default-pet.png'), 15, 512) ?>;
        image.alt = 'Additional pet photo ' + slot;
        const label = document.createElement('label');
        label.textContent = 'Choose photo';
        const input = document.createElement('input');
        input.type = 'file';
        input.name = 'extraImage' + slot;
        input.accept = 'image/jpeg,image/png,image/webp,image/gif';
        input.addEventListener('change', () => {
            const file = input.files && input.files[0];
            if (!file) return;
            if (!file.type.startsWith('image/') || file.size > 5 * 1024 * 1024) {
                input.value = '';
                setStatus('Additional photos must be valid images no larger than 5 MB.', 'error');
                return;
            }
            const reader = new FileReader();
            reader.onload = event => image.src = event.target.result;
            reader.readAsDataURL(file);
            label.firstChild.textContent = file.name;
        });
        label.appendChild(input);
        const remove = document.createElement('button');
        remove.type = 'button';
        remove.className = 'remove-extra';
        remove.setAttribute('aria-label', 'Remove additional photo');
        remove.textContent = '×';
        remove.addEventListener('click', () => { item.remove(); updateImageCount(); });
        item.append(image, label, remove);
        extraContainer.appendChild(item);
        updateImageCount();
        input.click();
    }
    addButton.addEventListener('click', createExtraImage);
    updateImageCount();

    form.addEventListener('reset', () => {
        window.setTimeout(() => {
            if (activeDetection) activeDetection.abort();
            if (previewUrl) URL.revokeObjectURL(previewUrl);
            previewUrl = null;
            preview.src = <?php echo json_encode(asset('image/default-pet.png'), 15, 512) ?>;
            extraContainer.innerHTML = '';
            featuresInput.value = '';
            setStatus('Upload a clear photo of the pet. Detection will start automatically.');
            updateImageCount();
        }, 0);
    });

    form.addEventListener('submit', async event => {
        event.preventDefault();
        submitButton.disabled = true;
        overlay.style.display = 'flex';
        try {
            await detectionPromise;
            const images = [];
            if (imageInput.files[0]) images.push(imageInput.files[0]);
            extraContainer.querySelectorAll('input[type="file"]').forEach(input => { if (input.files[0]) images.push(input.files[0]); });
            if (images.length && typeof window.generatePetFeatures === 'function') {
                document.getElementById('processingText').textContent = 'Generating image search features…';
                try {
                    const features = await window.generatePetFeatures(images);
                    if (features) featuresInput.value = JSON.stringify(features);
                } catch (featureError) {
                    console.warn('Image feature generation skipped:', featureError);
                }
            }
            form.submit();
        } catch (error) {
            console.error('Pet form submission failed:', error);
            setStatus('Could not prepare the pet images. Please try again.', 'error');
            overlay.style.display = 'none';
            submitButton.disabled = false;
        }
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\user\Desktop\FurryTales\resources\views\admin\pets\petAdd.blade.php ENDPATH**/ ?>