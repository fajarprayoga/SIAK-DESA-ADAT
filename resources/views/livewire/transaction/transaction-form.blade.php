<div>
    <form
        action="{{ $update ? route('cashier.transaction.update', $transaction->id) : route('cashier.transaction.store') }}"
        method="POST">
        @csrf
        @if ($update)
            @method('PUT')
        @endif
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    {{-- <input type="hidden" name="date" value="{{$date ? $date : date('d-m-Y')}}"> --}}
                    <div class="mb-3">
                        <label for="date" class="form-label">@lang('global.transaction.date')</label>
                        {{-- <input class="form-control " data-date-format="DD MMMM YYYY" type="text" id="register" name="register" required > --}}
                        <input class="result form-control" type="text" id="date" {{ $update ? 'disabled' : '' }}
                            value="{{ $transaction?->created_at ? date('d-m-Y', strtotime($transaction->created_at)) : date('d-m-Y') }}"
                            name="date" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="material_id" class="form-label">@lang('global.transaction.name_property')</label>
                        <div wire:ignore>
                            <select name="material_id" id="material_id" class="select2 form-control"
                                wire:model="material_id">
                                @foreach ($materials as $material)
                                    @if (!$update)
                                        <option value="">----</option>
                                    @endif
                                    <option value="{{ $material->id }}"
                                        {{ $material->id == $transaction?->material_id ? 'selected' : '' }}>
                                        {{ "[$material->code]" . $material->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="cost_of_goods" class="form-label">@lang('global.transaction.cost_of_goods')</label>
                        <input class="form-control price" value="{{ $transaction?->cost_of_goods }}" type="text"
                            id="cost_of_goods" name="cost_of_goods" wire:model="cogs" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="price_material" class="form-label">@lang('global.transaction.price_material')</label>
                        <input class="form-control price" type="text" id="price_material" name="price_material"
                            value="{{ $transaction?->price_material }}" wire:model="price" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="quantity" class="form-label">@lang('global.transaction.quantity')</label>
                        <input class="form-control price" type="number" id="quantity" name="quantity"
                            value="{{ $transaction?->quantity }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="discount" class="form-label">@lang('global.transaction.discount')</label>
                        <input class="form-control price" type="number" id="discount"
                            value="{{ $transaction?->discount }}" name="discount">
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
    {{-- 
    @push('scripts')
     --}}
    <script>
        $('.select2').on('select2:select', function(e) {
            var data = e.params.data;
            @this.set('material_id', data['id']);
        });
    </script>
