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
                    <div class="mb-3">
                        <label for="date" class="form-label">@lang('global.transaction.date')</label>
                        <input class="result form-control" type="text" id="date" {{ $update ? 'disabled' : '' }}
                            value="{{ $transaction?->created_at ? date('d-m-Y', strtotime($transaction->created_at)) : date('d-m-Y') }}"
                            name="date" required>
                    </div>
                </div>
                @foreach ($forms as $item)
                    <div class="border mb-3">
                        <div class="col-md-12 row p-4 ">
                            <div class="col-md-6">
                                <label class="form-label">@lang('global.transaction.name_property')</label>
                                <select name="material_id[]" class="form-control select2 ">
                                    @if (!$update)
                                        <option value="">----</option>
                                    @endif
                                    @foreach ($materials as $material)
                                        <option value="{{ $material->id }}"
                                            {{ $material->id == $transaction?->material_id ? 'selected' : '' }}>
                                            {{ "[$material->code] " . $material->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="price_material" class="form-label">@lang('global.transaction.price_material')</label>
                                <input type="text" name="price_material[]" class="form-control price">

                            </div>
                            <div class="col-md-6">
                                <label for="quantity" class="form-label">@lang('global.transaction.quantity')</label>
                                <input class="form-control price" type="number" name="quantity[]"
                                    value="{{ $transaction?->quantity }}">
                            </div>
                            <div class="col-md-6">
                                <label for="discount" class="form-label">@lang('global.transaction.discount')</label>
                                <input class="form-control price" type="number" value="{{ $transaction?->discount }}"
                                    name="discount[]">

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            <button type="button" wire:click="addTransactions" class="btn mb-3 btn-light">Tambah +</button>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
    {{--
    @push('scripts')
     --}}
    <script>
        $('#select-material').on('select2:select', function(e) {
            var data = e.params.data;
            @this.set('material_id', data['id']);
        });
    </script>
