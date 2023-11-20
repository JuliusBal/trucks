<div class="flex-wrap -mx-3 mt-4">
    <div class="w-full px-3">
        <label for="main_truck" class="sr-only">Select Truck</label>
        <br>
        <select name="main_truck" id="main_truck" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
            <option selected>Choose a truck</option>
            @foreach($trucks as $truck)
            <option value="{{ $truck->id }}">{{ $truck->unit_number }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="flex-wrap -mx-3 mt-4">
    <div class="w-full px-3">
        <label for="subunit" class="sr-only">Select Sub-unit</label>
        <br>
        <select name="subunit" id="subunit" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
            <option selected>Choose a truck</option>
            @foreach($trucks as $truck)
                <option value="{{ $truck->id }}">{{ $truck->unit_number }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="flex-wrap -mx-3 mt-4">
    <div class="w-full px-3">
        <label for="start_date" class="sr-only">Start date</label>
        <br>
        <input name="start_date" id="start_date" data-provide="datepicker" required="required">
    </div>
</div>
<div class="flex-wrap -mx-3 mt-4">
    <div class="w-full px-3">
        <label for="end_date" class="sr-only">End date</label>
        <br>
        <input name="end_date" id="end_date" data-provide="datepicker" required="required">
    </div>
</div>

<style>
    select, input {
        height: 30px;
        padding: 5px;
        min-width: 200px;
        max-width: 200px;
    }
    select {
        border-radius: 3px;
    }
    input {
        border: 1px solid #6e6e6e;
        border-radius: 3px
    }
</style>
