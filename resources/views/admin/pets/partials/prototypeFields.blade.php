<div class="prototype-fields">
    <section class="field-card">
        <div class="field-card-heading"><span class="section-index">01</span><div><h3>Pet identity</h3><p>Basic information and AI-assisted breed details</p></div></div>
        <div class="field-grid identity-grid">
            <div class="field"><label>Pet name <b>*</b></label><input type="text" placeholder="e.g. Milo"></div>
            <div class="field"><label>Pet ID</label><input type="text" value="{{ $nextPetID }}" readonly></div>
            <div class="field"><label>Pet category <b>*</b></label><select class="type-field"><option value="">Select category</option>@foreach($categories as $category)<option value="{{ $category->category_name }}">{{ $category->category_name }}</option>@endforeach</select></div>
            <div class="field"><label>Breed <b>*</b></label><input class="breed-field" type="text" placeholder="AI suggestion appears here"></div>
            <div class="field"><label>Colour</label><input type="text" placeholder="e.g. Golden"></div>
            <div class="field"><label>Age (months) <b>*</b></label><input type="number" min="0" placeholder="e.g. 8"></div>
            <div class="field"><label>Price (RM) <b>*</b></label><input type="number" min="0" step="0.01" placeholder="0.00"></div>
            <div class="field"><label>Size <b>*</b></label><select><option value="">Select size</option><option>Small</option><option>Medium</option><option>Large</option></select></div>
            <div class="field gender-field"><label>Gender <b>*</b></label><div class="gender-pills"><label><input type="radio" name="gender-{{ $prefix }}" value="Male"><span>♂ Male</span></label><label><input type="radio" name="gender-{{ $prefix }}" value="Female"><span>♀ Female</span></label></div></div>
        </div>
    </section>
    <section class="field-card">
        <div class="field-card-heading"><span class="section-index">02</span><div><h3>Health & listing</h3><p>Care status and where this pet is listed</p></div></div>
        <div class="field-grid detail-grid">
            <div class="field"><label>Health status <b>*</b></label><select><option value="">Select status</option>@foreach(['Excellent','Good','Fair'] as $status)<option>{{ $status }}</option>@endforeach</select></div>
            <div class="field"><label>Vaccination status <b>*</b></label><select><option value="">Select status</option>@foreach(['Up-to-date','Due Soon','Overdue','Not-vaccinated','Partial'] as $status)<option>{{ $status }}</option>@endforeach</select></div>
            <div class="field"><label>Outlet <b>*</b></label><select><option value="">Select outlet</option>@foreach($outlets as $outlet)<option value="{{ $outlet->OutletID }}">{{ $outlet->City }} - ({{ $outlet->State }})</option>@endforeach</select></div>
            <div class="field"><label>Supplier <b>*</b></label><select><option value="">Select supplier</option>@foreach($suppliers as $supplier)<option value="{{ $supplier->SupplierID }}">{{ $supplier->SupplierName }}</option>@endforeach</select></div>
            <div class="field field-full"><label>Description</label><textarea rows="3" placeholder="Describe this pet's personality, behaviour and other details…"></textarea></div>
        </div>
    </section>
</div>