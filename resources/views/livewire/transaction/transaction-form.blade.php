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
                @foreach ($forms as $index => $item)
                    <div class="col-md-12 border border-solid border-primary p-2 mb-3">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="mb-3">
                                    <label for="material_id" class="form-label">@lang('global.transaction.name_property')</label>
                                    <div wire:ignore>
                                        <select name="material_id[]" id={{ "select-material$index" }}
                                            class="form-control select2">
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

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price_material" class="form-label">@lang('global.transaction.price_material')</label>
                                    <input class="form-control price" type="text" id={{ "price_material$index" }}
                                        name="price_material[]" value="{{ $transaction?->price_material }}"
                                        wire:model="price" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">@lang('global.transaction.quantity')</label>
                                    <input class="form-control price" type="number" id={{ "quantity$index" }}
                                        name="quantity[]" value="{{ $transaction?->quantity }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="discount" class="form-label">@lang('global.transaction.discount')</label>
                                    <input class="form-control price" type="number" id={{ "discount${index}" }}
                                        value="{{ $transaction?->discount }}" name="discount[]">
                                </div>
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
