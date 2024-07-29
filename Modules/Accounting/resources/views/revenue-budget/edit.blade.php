<div class="modal-body">
    <form action="{{ route('budget.revenue.update', $revenue->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="row">
            <x-form.input-block>
                <x-form.label required>{{ __('Title') }}</x-form.label>
                <x-form.input type="text" name="title" value="{{ $revenue->title }}" />
            </x-form.input-block>
            <div class="col-md-6">
            <x-form.input-block>
                <x-form.label>{{ __('Budget') }}</x-form.label>
                <select name="budget" class="form-control">
                    <option value="">{{ __('Select budget') }}</option>
                    @foreach ($budgets as $budget)
                        <option {{ $revenue->budget_id == $budget->id ? 'selected': '' }} value="{{ $budget->id }}">{{ $budget->title }}</option>
                    @endforeach
                </select>
            </x-form.input-block>
            </div>
            <div class="col-md-6">
                <x-form.input-block>
                    <x-form.label>{{ __('Category') }}</x-form.label>
                    <select name="category" class="form-control">
                        <option value="">{{ __('Select category') }}</option>
                        @foreach ($categories as $category)
                            <option {{ $revenue->category->id == $category->id ? 'selected': '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </x-form.input-block>
            </div>
            <div class="col-md-6">
                <x-form.input-block>
                    <x-form.label class="focus-label" required> {{ __('Start Date') }}</x-form.label>
                    <div class="cal-icon">
                        <x-form.input type="text" class="datepicker" name="startDate" value="{{ $revenue->startDate}}" />
                    </div>
                </x-form.input-block>
            </div>
            <div class="col-md-6">
                <x-form.input-block>
                    <x-form.label class="focus-label" required> {{ __('End Date') }}</x-form.label>
                    <div class="cal-icon">
                        <x-form.input type="text" class="datepicker" name="endDate" value="{{ $revenue->endDate }}" />
                    </div>
                </x-form.input-block>
            </div>
            <div class="col-md-6">
            <x-form.input-block>
                <x-form.label required>{{ __('Amount') }}</x-form.label>
                <x-form.input type="text" name="amount" value="{{ $revenue->amount }}" />
            </x-form.input-block>
            </div>
            <div class="col-md-6">
            <x-form.input-block>
                <x-form.label>{{ __('Attachment') }}</x-form.label>
                <x-form.input type="file" name="attachment"/>
            </x-form.input-block>
            </div>
            <x-form.input-block>
                <x-form.label>{{ __('Note') }}</x-form.label>
                <x-form.textarea name="note">{{ $revenue->note }}</x-form.textarea>
            </x-form.input-block>
       </div>
        <div class="submit-section mb-3">
            <x-form.button class="btn btn-primary submit-btn">{{ __('Submit') }}</x-form.button>
        </div>
    </form>
</div>
