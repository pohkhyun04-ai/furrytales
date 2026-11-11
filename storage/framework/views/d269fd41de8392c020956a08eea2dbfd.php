<?php $__env->startSection('title', 'Add Pet Form Prototypes'); ?>

<?php $__env->startPush('styles'); ?>
<style>
.pet-prototype{--ink:#49332f;--muted:#8a7772;--line:#eadfdb;--brand:#a95c68;--brand-dark:#82434e;max-width:1480px;margin:0 auto;padding-bottom:48px;color:var(--ink)}
.pet-prototype *{box-sizing:border-box}
.pet-prototype .prototype-heading{display:flex;justify-content:space-between;align-items:flex-start;gap:18px;flex-wrap:wrap;margin-bottom:22px}
.pet-prototype .eyebrow{display:inline-flex;align-items:center;gap:7px;color:var(--brand-dark);font-size:11px;font-weight:900;letter-spacing:.12em;text-transform:uppercase;margin-bottom:8px}
.pet-prototype h1{font-size:clamp(26px,3vw,34px);line-height:1.15;margin:0 0 8px;font-weight:850;color:var(--ink)}
.pet-prototype .prototype-heading p{margin:0;color:var(--muted);font-size:14px}
.pet-prototype .live-link{display:inline-flex;align-items:center;gap:9px;border:1px solid var(--line);border-radius:12px;background:#fff;color:var(--ink);padding:11px 15px;text-decoration:none;font-size:12px;font-weight:800}
.pet-prototype .version-picker{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:13px;margin:22px 0 18px}
.pet-prototype .version-tab{display:flex;gap:12px;align-items:flex-start;text-align:left;padding:15px;border:1px solid var(--line);border-radius:15px;background:#fff;color:var(--ink);cursor:pointer;transition:.2s;min-width:0}
.pet-prototype .version-tab:hover{border-color:#d5aab0;transform:translateY(-1px)}
.pet-prototype .version-tab.active{border-color:var(--brand);background:#fff7f7;box-shadow:0 0 0 3px rgba(169,92,104,.09)}
.pet-prototype .tab-number{flex:0 0 32px;height:32px;border-radius:10px;display:grid;place-items:center;background:#f8ecee;color:var(--brand-dark);font-size:12px;font-weight:900}
.pet-prototype .version-tab strong{display:block;font-size:13px;margin:1px 0 4px}
.pet-prototype .version-tab small{display:block;color:var(--muted);font-size:11px;line-height:1.45}
.pet-prototype .prototype-note{display:flex;align-items:center;gap:9px;margin-bottom:16px;padding:11px 14px;border:1px solid #ead9bd;border-radius:12px;background:#fffaf1;color:#795d31;font-size:12px}
.pet-prototype .prototype-version{display:none}
.pet-prototype .prototype-version.active{display:block;animation:prototype-in .25s ease}
@keyframes prototype-in{from{opacity:0;transform:translateY(5px)}to{opacity:1;transform:translateY(0)}}
.pet-prototype .version-title{display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap;margin:0 0 14px}
.pet-prototype .version-title h2{font-size:18px;margin:0 0 4px;font-weight:850}
.pet-prototype .version-title p{font-size:12px;color:var(--muted);margin:0}
.pet-prototype .concept-chip{font-size:10px;font-weight:900;letter-spacing:.08em;text-transform:uppercase;padding:8px 11px;border-radius:999px;background:#f8ecee;color:var(--brand-dark)}
.pet-prototype .prototype-canvas{border:1px solid var(--line);border-radius:20px;background:#fdfbfa;padding:20px;box-shadow:0 12px 32px rgba(90,44,44,.055)}
.pet-prototype .photo-card{border:1px solid var(--line);border-radius:16px;background:#fff;padding:14px;min-width:0}
.pet-prototype .photo-top{display:flex;justify-content:space-between;align-items:center;gap:8px;margin-bottom:11px}
.pet-prototype .photo-top strong{font-size:12px}.pet-prototype .photo-top span{font-size:10px;color:var(--muted)}
.pet-prototype .photo-stage{position:relative;overflow:hidden;border-radius:12px;background:#f7efed;min-height:190px}
.pet-prototype .prototype-preview{display:block;width:100%;height:100%;min-height:190px;max-height:280px;object-fit:cover}
.pet-prototype .scan-overlay{position:absolute;inset:0;display:none;align-items:center;justify-content:center;background:rgba(53,30,34,.22);overflow:hidden}
.pet-prototype .photo-card.is-detecting .scan-overlay{display:flex}
.pet-prototype .scan-overlay:before{content:"";position:absolute;left:0;right:0;top:-5%;height:4px;background:linear-gradient(90deg,transparent,#fff 25%,#f8b5c0 50%,#fff 75%,transparent);box-shadow:0 0 18px 5px rgba(255,255,255,.7);animation:prototype-scan 1.65s ease-in-out infinite}
@keyframes prototype-scan{0%{top:0}100%{top:100%}}
.pet-prototype .scan-ring{width:54px;height:54px;border:2px solid rgba(255,255,255,.45);border-top-color:#fff;border-right-color:#f3bdc5;border-radius:50%;animation:prototype-spin .85s linear infinite;z-index:1}
@keyframes prototype-spin{to{transform:rotate(360deg)}}
.pet-prototype .upload-cta{display:flex;justify-content:center;align-items:center;gap:8px;width:100%;margin-top:11px;padding:11px 13px;border:0;border-radius:10px;background:var(--brand);color:#fff;font-size:12px;font-weight:850;cursor:pointer}
.pet-prototype .upload-cta:hover{background:var(--brand-dark)}
.pet-prototype .upload-help{display:block;text-align:center;color:var(--muted);font-size:10px;margin-top:8px}
.pet-prototype .ai-card{margin-top:12px;border:1px solid #eadfe0;border-radius:12px;background:#fff;padding:12px}
.pet-prototype .ai-card-head{display:flex;align-items:center;gap:8px;font-size:11px;font-weight:900}
.pet-prototype .ai-spark{width:26px;height:26px;display:grid;place-items:center;border-radius:8px;background:#f8ecee;color:var(--brand-dark)}
.pet-prototype .prototype-ai-status{font-size:11px;line-height:1.5;color:var(--muted);margin-top:8px}
.pet-prototype .prototype-ai-status.loading{color:var(--brand-dark);font-weight:700}
.pet-prototype .prototype-ai-status.success{color:#28734d}
.pet-prototype .prototype-ai-status.error{color:#b34444}
.pet-prototype .ai-progress{height:4px;border-radius:99px;background:#f2e9e7;margin-top:10px;overflow:hidden;display:none}
.pet-prototype .ai-progress span{display:block;width:35%;height:100%;border-radius:99px;background:linear-gradient(90deg,#a95c68,#e6aab2);animation:prototype-progress 1.15s ease-in-out infinite}
.pet-prototype .ai-card.is-loading .ai-progress{display:block}
@keyframes prototype-progress{0%{transform:translateX(-110%)}100%{transform:translateX(310%)}}
.pet-prototype .prototype-fields{display:grid;gap:14px;min-width:0}
.pet-prototype .field-card{padding:17px;border:1px solid var(--line);border-radius:16px;background:#fff;min-width:0}
.pet-prototype .field-card-heading{display:flex;align-items:center;gap:10px;margin-bottom:15px}
.pet-prototype .section-index{width:29px;height:29px;display:grid;place-items:center;border-radius:9px;background:#f8ecee;color:var(--brand-dark);font-size:11px;font-weight:900;flex:0 0 29px}
.pet-prototype .field-card-heading h3{font-size:13px;margin:0 0 3px;font-weight:850}
.pet-prototype .field-card-heading p{font-size:10px;color:var(--muted);margin:0}
.pet-prototype .field-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:13px}
.pet-prototype .field{min-width:0}.pet-prototype .field-full{grid-column:1/-1}
.pet-prototype .field>label{display:block;margin-bottom:6px;color:#66514c;font-size:10px;font-weight:850}
.pet-prototype .field>label b{color:#c65d67}
.pet-prototype .field input,.pet-prototype .field select,.pet-prototype .field textarea{display:block;width:100%;min-height:40px;padding:9px 11px;border:1px solid #e6d9d5;border-radius:9px;background:#fff;color:var(--ink);font:inherit;font-size:11px;outline:none;transition:.18s}
.pet-prototype .field textarea{min-height:76px;resize:vertical}
.pet-prototype .field input:focus,.pet-prototype .field select:focus,.pet-prototype .field textarea:focus{border-color:#bd7d86;box-shadow:0 0 0 3px rgba(169,92,104,.1)}
.pet-prototype .field input[readonly]{background:#f8f3f1;color:#806e69}
.pet-prototype .gender-pills{display:flex;gap:7px}
.pet-prototype .gender-pills label{flex:1;cursor:pointer}
.pet-prototype .gender-pills input{position:absolute;opacity:0}
.pet-prototype .gender-pills span{display:flex;align-items:center;justify-content:center;min-height:40px;border:1px solid var(--line);border-radius:9px;font-size:11px;font-weight:750;color:#735f5a}
.pet-prototype .gender-pills input:checked+span{border-color:var(--brand);background:#fbf0f1;color:var(--brand-dark)}
.pet-prototype .prototype-footer{display:flex;justify-content:space-between;align-items:center;gap:12px;margin-top:14px;color:var(--muted);font-size:11px}
.pet-prototype .prototype-footer a{color:var(--brand-dark);font-weight:850;text-decoration:none}
.pet-prototype .layout-split{display:grid;grid-template-columns:270px minmax(0,1fr);gap:16px;align-items:start}
.pet-prototype .layout-split .photo-stage{min-height:230px}
.pet-prototype .layout-split .prototype-preview{min-height:230px}
.pet-prototype .layout-wizard .wizard-steps{display:grid;grid-template-columns:repeat(3,1fr);gap:8px;margin-bottom:15px}
.pet-prototype .layout-wizard .wizard-step{display:flex;align-items:center;gap:8px;padding:10px;border:1px solid var(--line);border-radius:11px;background:#fff;font-size:10px;font-weight:800;color:#75615c}
.pet-prototype .layout-wizard .wizard-step b{width:23px;height:23px;display:grid;place-items:center;border-radius:50%;background:#f8ecee;color:var(--brand-dark)}
.pet-prototype .layout-wizard .wizard-step.current{border-color:#d5aab0;background:#fff7f7}
.pet-prototype .layout-wizard .wizard-photo-row{display:grid;grid-template-columns:minmax(0,1fr) 260px;gap:14px;align-items:stretch;margin-bottom:14px}
.pet-prototype .layout-wizard .wizard-intro{padding:20px;border-radius:15px;background:linear-gradient(120deg,#79434b,#a95c68);color:#fff;display:flex;flex-direction:column;justify-content:center}
.pet-prototype .layout-wizard .wizard-intro small{font-size:10px;letter-spacing:.12em;text-transform:uppercase;opacity:.8;font-weight:900}
.pet-prototype .layout-wizard .wizard-intro h3{font-size:19px;line-height:1.25;margin:9px 0}
.pet-prototype .layout-wizard .wizard-intro p{font-size:11px;line-height:1.6;margin:0;opacity:.88;max-width:420px}
.pet-prototype .layout-wizard .wizard-photo-row .photo-card{display:grid;grid-template-columns:105px minmax(0,1fr);gap:11px;align-items:center}
.pet-prototype .layout-wizard .wizard-photo-row .photo-top{grid-column:1/-1;margin:0}
.pet-prototype .layout-wizard .wizard-photo-row .photo-stage{min-height:105px}
.pet-prototype .layout-wizard .wizard-photo-row .prototype-preview{min-height:105px;height:105px}
.pet-prototype .layout-wizard .wizard-photo-row .upload-cta{margin:0}
.pet-prototype .layout-wizard .wizard-photo-row .upload-help{grid-column:2;text-align:left;margin:0}
.pet-prototype .layout-wizard .wizard-photo-row .ai-card{grid-column:1/-1;margin:0}
.pet-prototype .layout-wizard .prototype-fields{grid-template-columns:repeat(2,minmax(0,1fr));align-items:start}
.pet-prototype .layout-wizard .prototype-fields>.field-card:first-child{grid-row:span 2}
.pet-prototype .layout-studio{display:grid;grid-template-columns:320px minmax(0,1fr);gap:16px;align-items:start}
.pet-prototype .layout-studio .studio-visual{position:sticky;top:18px;padding:15px;border-radius:17px;background:linear-gradient(155deg,#57343a,#86515a);color:#fff}
.pet-prototype .layout-studio .studio-visual .photo-card{background:rgba(255,255,255,.97);border:0}
.pet-prototype .layout-studio .studio-visual .photo-stage{min-height:270px}
.pet-prototype .layout-studio .studio-visual .prototype-preview{min-height:270px}
.pet-prototype .layout-studio .studio-label{font-size:10px;text-transform:uppercase;letter-spacing:.12em;font-weight:900;opacity:.75;margin:2px 0 10px}
.pet-prototype .layout-studio .studio-title{font-size:20px;line-height:1.2;font-weight:900;margin:0 0 7px}
.pet-prototype .layout-studio .studio-copy{font-size:11px;line-height:1.55;opacity:.82;margin:0 0 14px}
.pet-prototype .layout-studio .prototype-fields{gap:12px}
.pet-prototype .layout-studio .field-card{box-shadow:0 6px 20px rgba(90,44,44,.035)}
.pet-prototype .layout-studio .identity-grid{grid-template-columns:repeat(3,minmax(0,1fr))}
.pet-prototype .layout-studio .detail-grid{grid-template-columns:repeat(2,minmax(0,1fr))}
.pet-prototype .prototype-toast{position:fixed;right:24px;bottom:24px;z-index:9999;padding:13px 17px;border-radius:12px;background:#49332f;color:#fff;font-size:12px;box-shadow:0 10px 35px #0002;display:none}
@media(max-width:1000px){.pet-prototype .layout-split,.pet-prototype .layout-studio{grid-template-columns:240px minmax(0,1fr)}.pet-prototype .layout-studio .identity-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media(max-width:760px){.pet-prototype .version-picker{grid-template-columns:1fr}.pet-prototype .layout-split,.pet-prototype .layout-studio{grid-template-columns:1fr}.pet-prototype .layout-studio .studio-visual{position:static}.pet-prototype .layout-wizard .wizard-photo-row{grid-template-columns:1fr}.pet-prototype .layout-wizard .prototype-fields{grid-template-columns:1fr}.pet-prototype .layout-wizard .prototype-fields>.field-card:first-child{grid-row:auto}.pet-prototype .prototype-canvas{padding:12px}}
@media(max-width:520px){.pet-prototype .field-grid,.pet-prototype .layout-studio .identity-grid,.pet-prototype .layout-studio .detail-grid{grid-template-columns:1fr}.pet-prototype .field-full{grid-column:auto}.pet-prototype .layout-wizard .wizard-steps{grid-template-columns:1fr}.pet-prototype .layout-wizard .wizard-photo-row .photo-card{grid-template-columns:85px minmax(0,1fr)}}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<main class="admin-content pet-prototype">
    <div class="prototype-heading">
        <div>
            <span class="eyebrow"><i class="fas fa-swatchbook"></i> UI exploration</span>
            <h1>Add Pet — Form Prototypes</h1>
            <p>Compare three ways to organise the same pet information before choosing a final design.</p>
        </div>
        <a class="live-link" href="<?php echo e(route('admin.pets.add')); ?>"><i class="fas fa-arrow-up-right-from-square"></i> Open current Add Pet page</a>
    </div>

    <div class="version-picker" role="tablist" aria-label="Form design versions">
        <button class="version-tab active" type="button" role="tab" aria-selected="true" data-version="a">
            <span class="tab-number">A</span><span><strong>Modern Split Form</strong><small>Image-first, side-by-side fields and AI assistant</small></span>
        </button>
        <button class="version-tab" type="button" role="tab" aria-selected="false" data-version="b">
            <span class="tab-number">B</span><span><strong>Step-by-Step Wizard</strong><small>Guided flow with clear stages and less visual clutter</small></span>
        </button>
        <button class="version-tab" type="button" role="tab" aria-selected="false" data-version="c">
            <span class="tab-number">C</span><span><strong>Premium Pet Studio</strong><small>Editorial image panel and compact information cards</small></span>
        </button>
    </div>

    <div class="prototype-note"><i class="fas fa-flask"></i><span>Prototype mode: try the image upload and AI breed detection in any version. The sample form fields are for UI review and will not create a database record.</span></div>

    <section class="prototype-version active" data-panel="a" role="tabpanel">
        <div class="version-title"><div><h2>Version A — Modern Split Form</h2><p>Best for admins who want to see the photo and edit the main details at the same time.</p></div><span class="concept-chip">Balanced workflow</span></div>
        <div class="prototype-canvas">
            <div class="layout-split">
                <aside class="photo-card">
                    <div class="photo-top"><strong>Main pet photo</strong><span>Required</span></div>
                    <div class="photo-stage"><img class="prototype-preview" src="<?php echo e(asset('image/default-pet.png')); ?>" alt="Pet photo preview"><div class="scan-overlay"><span class="scan-ring"></span></div></div>
                    <label class="upload-cta"><i class="fas fa-cloud-arrow-up"></i> Upload pet photo<input class="prototype-image-input" type="file" accept="image/jpeg,image/png,image/webp,image/gif" hidden></label>
                    <small class="upload-help">JPG, PNG or WEBP · Max 5 MB</small>
                    <div class="ai-card"><div class="ai-card-head"><span class="ai-spark"><i class="fas fa-wand-magic-sparkles"></i></span> AI breed assistant</div><div class="prototype-ai-status" aria-live="polite">Upload a clear photo. AI detection starts automatically.</div><div class="ai-progress"><span></span></div></div>
                </aside>
                <?php echo $__env->make('admin.pets.partials.prototypeFields', ['prefix' => 'a'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        </div>
    </section>

    <section class="prototype-version" data-panel="b" role="tabpanel">
        <div class="version-title"><div><h2>Version B — Step-by-Step Wizard</h2><p>Best for a guided workflow that helps staff complete each part in order.</p></div><span class="concept-chip">Guided entry</span></div>
        <div class="prototype-canvas layout-wizard">
            <div class="wizard-steps"><div class="wizard-step current"><b>1</b> Photo & identity</div><div class="wizard-step"><b>2</b> Health & listing</div><div class="wizard-step"><b>3</b> Review details</div></div>
            <div class="wizard-photo-row">
                <div class="wizard-intro"><small>Step 01 / Pet profile</small><h3>Let's start with a great photo.</h3><p>Upload the pet's main image. Our AI will suggest the breed and category, then you can review the details below.</p></div>
                <aside class="photo-card">
                    <div class="photo-top"><strong>Main pet photo</strong><span>Required</span></div>
                    <div class="photo-stage"><img class="prototype-preview" src="<?php echo e(asset('image/default-pet.png')); ?>" alt="Pet photo preview"><div class="scan-overlay"><span class="scan-ring"></span></div></div>
                    <label class="upload-cta"><i class="fas fa-cloud-arrow-up"></i> Choose photo<input class="prototype-image-input" type="file" accept="image/jpeg,image/png,image/webp,image/gif" hidden></label>
                    <small class="upload-help">JPG, PNG or WEBP · Max 5 MB</small>
                    <div class="ai-card"><div class="ai-card-head"><span class="ai-spark"><i class="fas fa-wand-magic-sparkles"></i></span> AI breed assistant</div><div class="prototype-ai-status" aria-live="polite">Waiting for a photo.</div><div class="ai-progress"><span></span></div></div>
                </aside>
            </div>
            <?php echo $__env->make('admin.pets.partials.prototypeFields', ['prefix' => 'b'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </section>

    <section class="prototype-version" data-panel="c" role="tabpanel">
        <div class="version-title"><div><h2>Version C — Premium Pet Studio</h2><p>Best for a more visual, polished experience with the photo as the main focus.</p></div><span class="concept-chip">Visual-first</span></div>
        <div class="prototype-canvas">
            <div class="layout-studio">
                <aside class="studio-visual">
                    <div class="studio-label">FurryTales / Pet studio</div>
                    <h3 class="studio-title">Create a profile worth noticing.</h3>
                    <p class="studio-copy">A clear photo helps staff recognise the pet and gives AI a better chance of suggesting its breed.</p>
                    <div class="photo-card">
                        <div class="photo-top"><strong>Pet cover image</strong><span>01 / 05</span></div>
                        <div class="photo-stage"><img class="prototype-preview" src="<?php echo e(asset('image/default-pet.png')); ?>" alt="Pet photo preview"><div class="scan-overlay"><span class="scan-ring"></span></div></div>
                        <label class="upload-cta"><i class="fas fa-cloud-arrow-up"></i> Select cover photo<input class="prototype-image-input" type="file" accept="image/jpeg,image/png,image/webp,image/gif" hidden></label>
                        <small class="upload-help">Recommended: clear, front-facing photo</small>
                        <div class="ai-card"><div class="ai-card-head"><span class="ai-spark"><i class="fas fa-wand-magic-sparkles"></i></span> AI breed assistant</div><div class="prototype-ai-status" aria-live="polite">Ready to analyse your photo.</div><div class="ai-progress"><span></span></div></div>
                    </div>
                </aside>
                <?php echo $__env->make('admin.pets.partials.prototypeFields', ['prefix' => 'c'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        </div>
    </section>

    <div class="prototype-footer"><span><i class="fas fa-info-circle"></i> These are visual prototypes; no pet records are saved.</span><a href="<?php echo e(route('admin.pets.add')); ?>">Return to current Add Pet form <i class="fas fa-arrow-right"></i></a></div>
</main>
<div class="prototype-toast" id="prototypeToast" role="status"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const tabs = Array.from(document.querySelectorAll('.version-tab'));
    const panels = Array.from(document.querySelectorAll('.prototype-version'));
    const toast = document.getElementById('prototypeToast');
    let selectedFile = null;
    let activeController = null;
    let previewUrl = null;

    function showToast(message) {
        toast.textContent = message;
        toast.style.display = 'block';
        window.clearTimeout(showToast.timer);
        showToast.timer = window.setTimeout(() => toast.style.display = 'none', 3200);
    }

    tabs.forEach(tab => tab.addEventListener('click', () => {
        const version = tab.dataset.version;
        tabs.forEach(item => {
            const active = item === tab;
            item.classList.toggle('active', active);
            item.setAttribute('aria-selected', active ? 'true' : 'false');
        });
        panels.forEach(panel => panel.classList.toggle('active', panel.dataset.panel === version));
    }));

    function updateAIState(state, message) {
        document.querySelectorAll('.prototype-ai-status').forEach(status => {
            status.textContent = message;
            status.className = 'prototype-ai-status' + (state ? ' ' + state : '');
        });
        document.querySelectorAll('.ai-card').forEach(card => card.classList.toggle('is-loading', state === 'loading'));
        document.querySelectorAll('.photo-card').forEach(card => card.classList.toggle('is-detecting', state === 'loading'));
    }

    function setCategory(value) {
        document.querySelectorAll('.type-field').forEach(select => {
            let option = Array.from(select.options).find(item => item.value.toLowerCase() === value.toLowerCase());
            if (!option) {
                option = new Option(value, value);
                select.add(option);
            }
            select.value = option.value;
        });
    }

    async function runBreedDetection(file) {
        if (activeController) activeController.abort();
        activeController = new AbortController();
        const controller = activeController;
        const payload = new FormData();
        payload.append('image', file);
        const stages = ['Uploading the photo securely…', 'Scanning image features…', 'Comparing visual patterns with the breed model…'];
        let stage = 0;
        updateAIState('loading', stages[stage]);
        const stageTimer = window.setInterval(() => {
            stage = Math.min(stage + 1, stages.length - 1);
            updateAIState('loading', stages[stage]);
        }, 1900);

        try {
            const response = await fetch(<?php echo json_encode(route('admin.pets.detectBreed'), 15, 512) ?>, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: payload,
                signal: controller.signal
            });
            const data = await response.json().catch(() => ({}));
            if (!response.ok || data.error || !data.breed || !data.type) {
                throw new Error(data.error || data.message || 'The AI could not identify this image. Please try another clear photo.');
            }
            if (selectedFile !== file) return;
            document.querySelectorAll('.breed-field').forEach(input => input.value = data.breed);
            setCategory(data.type);
            updateAIState('success', 'Suggested: ' + data.breed + ' · ' + data.type + '. You can edit these suggestions.');
            showToast('AI detection complete: ' + data.breed);
        } catch (error) {
            if (error.name === 'AbortError') return;
            console.error('Prototype breed detection failed:', error);
            updateAIState('error', (error.message || 'Breed detection failed.') + ' You can still enter the breed manually.');
        } finally {
            window.clearInterval(stageTimer);
            if (activeController === controller) activeController = null;
        }
    }

    document.querySelectorAll('.prototype-image-input').forEach(input => {
        input.addEventListener('change', () => {
            const file = input.files && input.files[0];
            if (!file) return;
            if (!file.type.startsWith('image/')) {
                input.value = '';
                showToast('Please select a valid image file.');
                return;
            }
            if (file.size > 5 * 1024 * 1024) {
                input.value = '';
                showToast('The image must be 5 MB or smaller.');
                return;
            }
            selectedFile = file;
            if (previewUrl) URL.revokeObjectURL(previewUrl);
            previewUrl = URL.createObjectURL(file);
            document.querySelectorAll('.prototype-preview').forEach(image => image.src = previewUrl);
            runBreedDetection(file);
        });
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\user\Desktop\FurryTales\resources\views/admin/pets/petPrototype.blade.php ENDPATH**/ ?>