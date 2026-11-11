@extends('layouts.admin')

@section('title', 'Add New Pet')

@push('styles')
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
.pet-add-page .studio-layout{display:grid;grid-template-columns:minmax(260px,330px) minmax(0,1fr);gap:22px;align-items:start}
.pet-add-page .studio-visual{position:sticky;top:20px;padding:17px;border-radius:18px;background:linear-gradient(155deg,#57343a,#86515a);color:#fff;box-shadow:0 12px 30px rgba(87,52,58,.16)}
.pet-add-page .studio-label{font-size:10px;text-transform:uppercase;letter-spacing:.14em;font-weight:900;opacity:.78;margin:2px 0 10px}
.pet-add-page .studio-title{font-size:22px;line-height:1.2;font-weight:900;margin:0 0 8px;color:#fff}
.pet-add-page .studio-copy{font-size:12px;line-height:1.6;opacity:.86;margin:0 0 16px}
.pet-add-page .studio-visual .upload-box{border:1px solid var(--line);border-radius:16px;background:#fff;padding:14px;text-align:left}
.pet-add-page .studio-visual .photo-top{display:flex;justify-content:space-between;align-items:center;gap:8px;margin-bottom:11px;color:var(--ink)}
.pet-add-page .studio-visual .photo-top strong{font-size:12px}
.pet-add-page .studio-visual .photo-top span{font-size:10px;color:var(--muted)}
.pet-add-page .studio-visual .photo-stage{position:relative;overflow:hidden;width:100%;height:340px;border-radius:12px;background:#f7efed}
.pet-add-page .studio-visual .main-preview{position:absolute;inset:0;display:block;width:100%;height:100%;min-height:0;max-height:none;aspect-ratio:auto;object-fit:cover;object-position:center;border-radius:12px;margin:0}
.pet-add-page .studio-visual .upload-button{margin-top:11px;padding:11px 13px;border-radius:10px;font-size:12px;font-weight:850}
.pet-add-page .studio-visual .upload-button:hover{background:var(--brand-dark)}
.pet-add-page .studio-visual .upload-help{display:block;text-align:center;color:var(--muted);font-size:10px;margin-top:8px}
.pet-add-page .studio-visual .ai-panel{margin-top:12px;border:1px solid #eadfe0;border-radius:12px;background:#fff;padding:12px}
.pet-add-page .studio-visual .ai-title{font-size:11px;font-weight:900}
.pet-add-page .studio-visual .ai-title i{width:26px;height:26px;display:grid;place-items:center;border-radius:8px;background:#f8ecee;color:var(--brand-dark)}
.pet-add-page .studio-visual .ai-state{font-size:11px;line-height:1.5;margin-top:8px}
.pet-add-page .studio-tip{display:flex;gap:9px;align-items:flex-start;margin-top:13px;padding:11px;border:1px solid rgba(255,255,255,.2);border-radius:12px;background:rgba(255,255,255,.09);font-size:11px;line-height:1.5}
.pet-add-page .studio-form{display:grid;gap:15px;min-width:0}
.pet-add-page .studio-section{padding:20px;border:1px solid var(--line);border-radius:16px;background:#fff;box-shadow:0 6px 20px rgba(90,44,44,.035)}
.pet-add-page .studio-section .section-heading{margin-bottom:16px}
.pet-add-page .studio-section .fields-grid{gap:14px 16px}
.pet-add-page .studio-section .section-heading small{display:block;margin-top:3px;color:var(--muted);font-size:11px;font-weight:500}
.pet-add-page .studio-section .section-heading .step{flex:0 0 29px}
.pet-add-page .section{margin-bottom:30px}
.pet-add-page .section-heading{display:flex;align-items:center;gap:11px;margin:0 0 17px;color:var(--ink);font-size:15px;font-weight:800}
.pet-add-page .step{width:29px;height:29px;border-radius:9px;display:grid;place-items:center;background:#f8ecee;color:var(--brand-dark);font-size:12px}
.pet-add-page .upload-layout{display:grid;grid-template-columns:230px minmax(0,1fr);gap:25px;align-items:start}
.pet-add-page .upload-box{border:1.5px dashed #d9bfc0;border-radius:17px;background:#fffafa;padding:17px;text-align:center}
.pet-add-page .main-preview{width:100%;aspect-ratio:1/1;object-fit:cover;display:block;border-radius:13px;background:#f6efed;margin-bottom:14px}
.pet-add-page .preview-wrap{position:relative;overflow:hidden;border-radius:13px;margin-bottom:14px;background:#f6efed}
.pet-add-page .preview-wrap .main-preview{margin:0}
.pet-add-page .ai-scan-overlay{position:absolute;inset:0;display:none;align-items:center;justify-content:center;flex-direction:column;gap:10px;background:rgba(57,35,39,.28);overflow:hidden}
.pet-add-page .upload-box.is-detecting .ai-scan-overlay{display:flex}
.pet-add-page .ai-scan-overlay:before{content:"";position:absolute;left:0;right:0;top:0;height:3px;background:linear-gradient(90deg,transparent,#fff,#f4b6c0,#fff,transparent);box-shadow:0 0 16px 4px rgba(255,255,255,.65);animation:pet-scan 1.6s ease-in-out infinite}
@keyframes pet-scan{from{top:0}to{top:100%}}
.pet-add-page .ai-scan-ring{width:46px;height:46px;border:3px solid rgba(255,255,255,.45);border-top-color:#fff;border-right-color:#f4c0c6;border-radius:50%;animation:pet-spin .8s linear infinite;z-index:1}
.pet-add-page .ai-scan-label{z-index:1;padding:6px 10px;border-radius:999px;background:rgba(48,31,31,.7);color:#fff;font-size:11px;font-weight:800}
.pet-add-page .upload-button{display:flex;align-items:center;justify-content:center;gap:8px;width:100%;border:0;border-radius:11px;padding:12px 14px;background:var(--brand);color:#fff;font-size:13px;font-weight:800;cursor:pointer}
.pet-add-page .upload-help{display:block;color:var(--muted);font-size:11px;margin-top:10px;line-height:1.5}
.pet-add-page .ai-panel{margin-top:13px;padding:13px;border:1px solid var(--line);border-radius:12px;background:#fff;text-align:left}
.pet-add-page .ai-title{display:flex;align-items:center;gap:8px;font-size:12px;font-weight:800;color:var(--ink)}
.pet-add-page .ai-state{margin-top:7px;color:var(--muted);font-size:12px;line-height:1.5}
.pet-add-page .ai-state.success{color:#28734d}.pet-add-page .ai-state.error{color:#b34444}.pet-add-page .ai-state.loading{color:var(--brand-dark)}
.pet-add-page .ai-state.loading:before{content:"";display:inline-block;width:11px;height:11px;margin-right:8px;vertical-align:-1px;border:2px solid #ead7da;border-top-color:var(--brand);border-radius:50%;animation:pet-spin .7s linear infinite}
.pet-add-page .ai-progress{height:4px;margin-top:10px;border-radius:99px;background:#f2e9e7;overflow:hidden;display:none}
.pet-add-page .ai-progress span{display:block;width:35%;height:100%;border-radius:99px;background:linear-gradient(90deg,#a95c68,#e6aab2);animation:pet-progress 1.15s ease-in-out infinite}
.pet-add-page .ai-panel.is-loading .ai-progress{display:block}
@keyframes pet-progress{0%{transform:translateX(-110%)}100%{transform:translateX(310%)}}
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
.pet-add-page.processing{position:fixed!important;inset:0!important;z-index:2147483647!important;display:none;align-items:center;justify-content:center;width:100vw!important;height:100vh!important;height:100dvh!important;max-width:none!important;min-width:100vw!important;min-height:100vh!important;max-height:none!important;margin:0!important;padding:24px!important;box-sizing:border-box!important;border:0!important;border-radius:0!important;background:rgba(48,31,31,.58);backdrop-filter:blur(5px);-webkit-backdrop-filter:blur(5px)}
body.pet-submitting{overflow:hidden!important}
.pet-add-page .processing-card{width:min(320px,calc(100% - 40px));padding:25px;border-radius:17px;background:#fff;text-align:center;box-shadow:0 20px 60px #0002}








.pet-add-page .spinner{width:34px;height:34px;margin:0 auto 14px;border:3px solid #f1e4e3;border-top-color:var(--brand);border-radius:50%;animation:pet-spin .8s linear infinite}
@keyframes pet-spin{to{transform:rotate(360deg)}}
@media(max-width:900px){.pet-add-page .studio-layout{grid-template-columns:250px minmax(0,1fr)}.pet-add-page .extra-grid{grid-template-columns:repeat(3,minmax(0,1fr))}}
@media(max-width:680px){.pet-add-page .form-body{padding:18px}.pet-add-page .card-top{padding:18px}.pet-add-page .studio-layout{grid-template-columns:1fr}.pet-add-page .studio-visual{position:static}.pet-add-page .upload-box{max-width:360px;width:100%;margin:0 auto}.pet-add-page .fields-grid{grid-template-columns:1fr}.pet-add-page .field.full{grid-column:auto}.pet-add-page .extra-grid{grid-template-columns:repeat(2,minmax(0,1fr))}.pet-add-page .form-actions{flex-direction:column-reverse}.pet-add-page .form-actions .pet-btn{width:100%}}

/* New Studio Visual: light editorial pet-profile workspace */
.pet-add-page .studio-layout{grid-template-columns:minmax(300px,390px) minmax(0,1fr);gap:26px}
.pet-add-page .studio-visual{position:sticky;top:18px;padding:0;background:#f1f5ef;color:#263b32;border:1px solid #dce7dc;border-radius:22px;box-shadow:0 16px 38px rgba(40,68,52,.08);overflow:hidden}
.pet-add-page .studio-visual:before{content:"";display:block;height:7px;background:linear-gradient(90deg,#7caa8b,#c8d9b9,#e9cda7)}
.pet-add-page .studio-intro{padding:23px 23px 15px}
.pet-add-page .studio-label{display:inline-flex;align-items:center;gap:7px;margin:0 0 12px;padding:7px 10px;border:1px solid #d8e4d7;border-radius:999px;background:#fff;color:#56745d;font-size:9px;letter-spacing:.13em}
.pet-add-page .studio-title{max-width:300px;margin:0 0 9px;color:#263b32;font-size:27px;line-height:1.12;letter-spacing:-.04em}
.pet-add-page .studio-copy{max-width:310px;margin:0;color:#6d8072;font-size:12px;line-height:1.65;opacity:1}
.pet-add-page .studio-visual .upload-box{margin:0 16px;padding:12px;border:1px solid #e2e9df;border-radius:17px;background:#fff;box-shadow:0 8px 22px rgba(40,68,52,.06)}
.pet-add-page .studio-visual .photo-top{margin-bottom:10px}
.pet-add-page .studio-visual .photo-top strong{color:#344a3a;font-size:12px}
.pet-add-page .studio-visual .photo-top span{color:#8a9a8c}
.pet-add-page .studio-visual .photo-stage{height:310px;border-radius:12px;background:#edf2e9}
.pet-add-page .studio-visual .main-preview{border-radius:12px}
.pet-add-page .studio-visual .upload-button{background:#456b50;color:#fff}
.pet-add-page .studio-visual .upload-button:hover{background:#34543d}
.pet-add-page .studio-visual .upload-help{color:#849187}
.pet-add-page .studio-visual .ai-panel{margin-top:12px;border-color:#e4ebe1;background:#f8faf6}
.pet-add-page .studio-visual .ai-title{color:#3b5942}
.pet-add-page .studio-visual .ai-title i{background:#e7efe4;color:#456b50}
.pet-add-page .studio-visual .ai-state{color:#7a897c}
.pet-add-page .studio-visual .ai-state.success{color:#34724a}
.pet-add-page .studio-visual .ai-state.error{color:#b34444}
.pet-add-page .studio-tip{margin:13px 16px 17px;padding:12px;border:1px solid #dce7dc;border-radius:13px;background:#e7efe4;color:#526c57;font-size:11px}
.pet-add-page .studio-tip i{color:#6b956f}
.pet-add-page .studio-section{border-color:#e8e2dc;border-radius:17px;box-shadow:0 7px 22px rgba(67,54,43,.035)}
.pet-add-page .studio-section .step{background:#eaf1e7;color:#456b50;border-radius:10px}
.pet-add-page .section-heading{color:#3b443d}
.pet-add-page .studio-section .section-heading small{color:#8b918a}
.pet-add-page .id-chip{background:#eaf1e7;color:#456b50}
@media(max-width:900px){.pet-add-page .studio-layout{grid-template-columns:minmax(260px,320px) minmax(0,1fr)}}
@media(max-width:680px){.pet-add-page .studio-layout{grid-template-columns:1fr}.pet-add-page .studio-visual{position:static}.pet-add-page .studio-visual .photo-stage{height:300px}}


/* Final Studio Visual refinements: rose palette and one full-width cover-photo card */
.pet-add-page{--brand:#c7798d;--brand-dark:#995467;--line:#f0dce1}
.pet-add-page .studio-visual{display:flex;flex-direction:column;min-width:0;padding:0;background:linear-gradient(155deg,#fff8fa 0%,#fbeef2 100%);color:#49323a;border:1px solid #f0d9e0;box-shadow:0 16px 38px rgba(132,67,87,.09);overflow:hidden}
.pet-add-page .studio-visual:before{background:linear-gradient(90deg,#c7798d,#e9b9c5,#f1d9bd)}
.pet-add-page .studio-intro{padding:23px 23px 17px}
.pet-add-page .studio-label{border-color:#f0d9e0;background:#fff;color:#a56879}
.pet-add-page .studio-title{color:#49323a}
.pet-add-page .studio-copy{color:#92747e}
.pet-add-page .studio-visual .upload-box{display:block!important;float:none!important;width:auto!important;max-width:none!important;margin:0 16px!important;padding:13px!important;border:1px solid #f0dce1!important;border-radius:17px!important;background:#fff!important;box-shadow:0 8px 22px rgba(132,67,87,.06)!important;text-align:left!important}
.pet-add-page .studio-visual .photo-top{display:flex!important;width:100%;justify-content:space-between;align-items:center;gap:8px;margin:0 0 11px;color:#63434d}
.pet-add-page .studio-visual .photo-top strong{color:#63434d}
.pet-add-page .studio-visual .photo-top span{color:#b08c96}
.pet-add-page .studio-visual .photo-stage{display:block!important;position:relative!important;width:100%!important;height:340px!important;min-height:0!important;overflow:hidden!important;border-radius:12px;background:#f8edf0;cursor:pointer}
.pet-add-page .studio-visual .main-preview{position:absolute!important;inset:0!important;display:block!important;width:100%!important;height:100%!important;min-height:0!important;max-height:none!important;aspect-ratio:auto!important;object-fit:cover!important;object-position:center!important;border-radius:12px!important;margin:0!important}
.pet-add-page .studio-visual .upload-button{display:flex!important;width:100%!important;margin-top:11px!important;background:#bd7185!important;color:#fff!important}
.pet-add-page .studio-visual .upload-button:hover{background:#995467!important}
.pet-add-page .studio-visual .upload-help{display:block!important;text-align:center;color:#a58b92}
.pet-add-page .studio-visual .ai-panel{display:block!important;margin-top:12px!important;border-color:#f0dce1!important;background:#fff8fa!important}
.pet-add-page .studio-visual .ai-title{color:#895365}
.pet-add-page .studio-visual .ai-title i{background:#f8e8ed;color:#a85f75}
.pet-add-page .studio-visual .ai-state{color:#9b8189}
.pet-add-page .studio-tip{margin:13px 16px 17px;border-color:#f0dce1;background:#f8e8ed;color:#8c6370}
.pet-add-page .studio-tip i{color:#b86e83}
.pet-add-page .studio-section{border-color:#f0e0e3}
.pet-add-page .studio-section .step{background:#f8e8ed;color:#a45e73}
.pet-add-page .section-heading{color:#59424a}
.pet-add-page .studio-section .section-heading small{color:#a18b91}
.pet-add-page .id-chip{background:#f8e8ed;color:#995467}
.pet-add-page .studio-form .extra-area{background:#fffafb}
.pet-add-page .studio-form .extra-item{background:#fff}
@media(max-width:680px){.pet-add-page .studio-visual .photo-stage{height:340px!important}}

.pet-add-page .studio-visual .upload-button{position:relative;z-index:5;pointer-events:auto;cursor:pointer;appearance:none;border:0;text-align:center;box-sizing:border-box;text-decoration:none}
</style>
@endpush

@section('content')
<main class="admin-content pet-add-page">
    <div class="page-heading">
        <div><h1><i class="fas fa-paw"></i> Add New Pet</h1><p>Create a pet listing and let AI suggest its breed from the main photo.</p></div>
        <a href="{{ route('admin.pets.index') }}" class="back-link"><i class="fas fa-arrow-left"></i> Back to Pet Management</a>
    </div>

    @if ($errors->any())
        <div class="alert"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
    @endif

    <form id="petCreateForm" method="POST" action="{{ route('admin.pets.store') }}" enctype="multipart/form-data" class="form-card">
        @csrf
        <input type="hidden" name="image_features" id="imageFeaturesInput">
        <div class="card-top"><h2>Pet information</h2><span class="id-chip"><i class="fas fa-hashtag"></i> {{ $nextPetID }}</span></div>
        <div class="form-body">
            <div class="studio-layout">
                <aside class="studio-visual">
                    <div class="studio-intro">
                        <div class="studio-label"><i class="fas fa-leaf"></i> FURRYTALES · PROFILE STUDIO</div>
                        <h3 class="studio-title">A lovely new face deserves a lovely profile.</h3>
                        <p class="studio-copy">Add a great cover photo, let the breed assistant offer a suggestion, then complete the details on the right.</p>
                    </div>
                    <div class="upload-box photo-card">
                        <div class="photo-top"><strong><i class="fas fa-image"></i> Cover photo</strong><span>STEP 1 OF 2</span></div>
                        <label for="imageInput" class="photo-stage" aria-label="Choose a cover photo"><img src="{{ asset('image/default-pet.png') }}" id="mainImagePreview" class="main-preview" alt="Pet photo preview"><div class="ai-scan-overlay" aria-hidden="true"><span class="ai-scan-ring"></span><span class="ai-scan-label">AI is analysing your photo</span></div></label>
                        <label for="imageInput" class="upload-button"><i class="fas fa-camera"></i> Choose a cover photo</label>
                        <input type="file" id="imageInput" name="image" accept="image/jpeg,image/png,image/webp,image/gif" hidden>
                        <small class="upload-help">Recommended: clear, front-facing photo · Max 5 MB</small>
                        <div class="ai-panel" aria-live="polite"><div class="ai-title"><i class="fas fa-wand-magic-sparkles"></i> AI breed assistant</div><div id="breedDetectionStatus" class="ai-state">Ready to analyse your photo.</div><div class="ai-progress" aria-hidden="true"><span></span></div></div>
                    </div>
                    <div class="studio-tip"><i class="fas fa-sparkles"></i><span><strong>Photo tip</strong><br>Natural light and a clear view of the pet help the assistant make a more useful suggestion.</span></div>
                </aside>
                <div class="studio-form">
                    <section class="studio-section">
                        <h3 class="section-heading"><span class="step">01</span><span>Pet identity<small>Basic information and AI-assisted breed details</small></span></h3>
                    <div class="fields-grid">
                        <div class="field"><label for="petName">Pet name <span class="required">*</span></label><input id="petName" type="text" name="petName" value="{{ old('petName') }}" placeholder="Enter pet name" required maxlength="255"></div>
                        <div class="field"><label for="petIdDisplay">Pet ID</label><input id="petIdDisplay" type="text" value="{{ $nextPetID }}" readonly></div>
                        <div class="field"><label for="typeInput">Pet category <span class="required">*</span></label><select id="typeInput" name="type" required><option value="" disabled selected>Select category</option>@foreach($categories as $category)<option value="{{ $category->category_name }}" @selected(old('type') === $category->category_name)>{{ $category->category_name }}</option>@endforeach</select></div>
                        <div class="field"><label for="breedInput">Breed <span class="required">*</span></label><input id="breedInput" type="text" name="breed" value="{{ old('breed') }}" placeholder="AI suggestion appears here" required></div>
                        <div class="field"><label for="colorInput">Colour</label><input id="colorInput" type="text" name="color" value="{{ old('color') }}" placeholder="e.g. Brown and white"></div>
                        <div class="field"><label for="ageInput">Age (months) <span class="required">*</span></label><input id="ageInput" type="number" name="age" value="{{ old('age') }}" placeholder="Enter age in months" min="0" required></div>
                        <div class="field"><label for="priceInput">Price (RM) <span class="required">*</span></label><input id="priceInput" type="number" name="price" value="{{ old('price') }}" placeholder="0.00" min="0" step="0.01" required></div>
                        <div class="field"><label for="sizeInput">Size <span class="required">*</span></label><select id="sizeInput" name="size" required><option value="" disabled selected>Select size</option>@foreach(['Small','Medium','Large'] as $size)<option value="{{ $size }}" @selected(old('size') === $size)>{{ $size }}</option>@endforeach</select></div>
                        <div class="field"><label>Gender <span class="required">*</span></label><div class="gender-options"><label class="gender-option"><input type="radio" name="gender" value="Male" @checked(old('gender') === 'Male') required><span><i class="fas fa-mars"></i> Male</span></label><label class="gender-option"><input type="radio" name="gender" value="Female" @checked(old('gender') === 'Female')><span><i class="fas fa-venus"></i> Female</span></label></div></div>
                    </div>
                    </section>

                    <section class="studio-section">
                <h3 class="section-heading"><span class="step">02</span><span>Health and listing<small>Care status and where this pet will be listed</small></span></h3>
                <div class="fields-grid">
                    <div class="field"><label for="healthStatus">Health status <span class="required">*</span></label><select id="healthStatus" name="healthStatus" required><option value="" disabled selected>Select health status</option>@foreach(['Excellent','Good','Fair'] as $status)<option value="{{ $status }}" @selected(old('healthStatus') === $status)>{{ $status }}</option>@endforeach</select></div>
                    <div class="field"><label for="vaccinationStatus">Vaccination status <span class="required">*</span></label><select id="vaccinationStatus" name="vaccinationStatus" required><option value="" disabled selected>Select vaccination status</option>@foreach(['Up-to-date','Due Soon','Overdue','Not-vaccinated','Partial'] as $status)<option value="{{ $status }}" @selected(old('vaccinationStatus') === $status)>{{ $status }}</option>@endforeach</select></div>
                    <div class="field"><label for="outletID">Outlet <span class="required">*</span></label><select id="outletID" name="outletID" required><option value="" disabled selected>Select outlet</option>@foreach($outlets as $outlet)<option value="{{ $outlet->OutletID }}" @selected(old('outletID') == $outlet->OutletID)>{{ $outlet->City }} - ({{ $outlet->State }})</option>@endforeach</select></div>
                    <div class="field"><label for="supplierID">Supplier <span class="required">*</span></label><select id="supplierID" name="supplierID" required><option value="" disabled selected>Select supplier</option>@foreach($suppliers as $supplier)<option value="{{ $supplier->SupplierID }}" @selected(old('supplierID') == $supplier->SupplierID)>{{ $supplier->SupplierName }}</option>@endforeach</select></div>
                    <div class="field full"><label for="description">Description</label><textarea id="description" name="description" placeholder="Add a short description, personality, or any important information about this pet.">{{ old('description') }}</textarea></div>
                </div>
                    </section>

                    <section class="studio-section">
                <h3 class="section-heading"><span class="step">03</span><span>Additional photos<small>Add more angles to complete the pet profile</small></span></h3>
                <div class="extra-area"><div class="extra-header"><p>Add up to four more photos to show the pet from different angles.</p><button type="button" id="addImageBtn" class="add-extra"><i class="fas fa-plus"></i> Add photo <span id="imageCountLabel">(1/5)</span></button></div><div id="extraImagesContainer" class="extra-grid"></div></div>
                    </section>

            <div class="form-actions">
                <a href="{{ route('admin.pets.index') }}" class="pet-btn btn-secondary">Cancel</a>
                <button type="reset" id="resetPetForm" class="pet-btn btn-secondary">Reset form</button>
                <button type="submit" id="submitPetButton" class="pet-btn btn-primary"><i class="fas fa-check"></i> Add pet</button>
            </div>
                </div>
            </div>
        </div>
    </form>
</main>
<div id="processingOverlay" class="pet-add-page processing"><div class="processing-card"><div class="spinner"></div><strong id="processingText">Preparing pet images…</strong><p style="margin:8px 0 0;color:#8a7772;font-size:12px;">Please keep this page open.</p></div></div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/mobilenet"></script>
<script src="{{ asset('js/pet-features.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('petCreateForm');
    const imageInput = document.getElementById('imageInput');
    const preview = document.getElementById('mainImagePreview');
    const breedInput = document.getElementById('breedInput');
    const typeInput = document.getElementById('typeInput');
    const status = document.getElementById('breedDetectionStatus');
    const aiPanel = status.closest('.ai-panel');
    const uploadBox = imageInput.closest('.upload-box');
    const addButton = document.getElementById('addImageBtn');
    const extraContainer = document.getElementById('extraImagesContainer');
    const countLabel = document.getElementById('imageCountLabel');
    const overlay = document.getElementById('processingOverlay');
    // Keep the fixed overlay outside admin layout containers so transforms,
    // clipping, and the page's 1440px content width cannot constrain it.
    document.body.appendChild(overlay);
    const submitButton = document.getElementById('submitPetButton');
    const featuresInput = document.getElementById('imageFeaturesInput');
    const maxImages = 5;
    let detectionPromise = Promise.resolve();
    let activeDetection = null;
    let previewUrl = null;

    function setStatus(message, state) {
        status.textContent = message;
        status.className = 'ai-state' + (state ? ' ' + state : '');
        aiPanel.classList.toggle('is-loading', state === 'loading');
        uploadBox.classList.toggle('is-detecting', state === 'loading');
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
                const response = await fetch(@json(route('admin.pets.detectBreed')), {
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
        image.src = @json(asset('image/default-pet.png'));
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
            preview.src = @json(asset('image/default-pet.png'));
            extraContainer.innerHTML = '';
            featuresInput.value = '';
            setStatus('Upload a clear photo of the pet. Detection will start automatically.');
            updateImageCount();
        }, 0);
    });

    form.addEventListener('submit', async event => {
        event.preventDefault();
        submitButton.disabled = true;
        document.body.classList.add('pet-submitting');
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
            document.body.classList.remove('pet-submitting');
            submitButton.disabled = false;
        }
    });
});
</script>
@endpush
