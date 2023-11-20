<div class="flex-wrap -mx-3 mt-4">
    <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
               for="unit-number">
            Unit number
        </label>
        <br>
        <input name="unit_number" id="unit-number" type="text" placeholder="A1578" value="{{ $truck?->unit_number ?? ''}}">
    </div>
</div>
<div class="flex-wrap -mx-3 mt-4">
    <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="year">
            Year
        </label>
        <br>
        <input name="year" id="year" type="text" placeholder="{{ date('Y') }}" value="{{ $truck?->year ?? ''}}">
    </div>
</div>
<div class="flex-wrap -mx-3 mt-4">
    <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
            Notes
        </label>
        <br>
        <textarea name="notes" id="grid-password" type="password" placeholder="Write your notes...">{{ $truck?->notes ?? '' }}</textarea>
    </div>
</div>

<style>
    select, input {
        height: 30px;
        padding: 5px;
        width: 200px;
    }
    select {
        border-radius: 3px;
    }
    input, textarea {
        border: 1px solid #6e6e6e;border-radius: 3px
    }
    textarea {
        width: 200px;
        min-height: 200px;
        border: 1px solid #6e6e6e;
        border-radius: 3px
    }
</style>
