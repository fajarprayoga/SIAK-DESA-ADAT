@extends('admin.template')

@section('content')
    <div class="card radius-10">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1 ms-3">
                    {{-- <h5 class="mt-0">{{ $journal->title }}</h5>
                    <p class="mb-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla</p> --}}
                    <table style="font-size: 15px" class="table w-50 font-weight-bold ">
                        <tr>
                            <td>Title</td>
                            <td> : </td>
                            <td>{{(new DateTime($journal->register))->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td> : </td>
                            <td>{{ $journal->title }}</td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td> : </td>
                            <td>{{ $journal->description }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col-12 text-right">
                <a href="{{route('accounting.journal.report', $journal->id)}}" class="btn btn-info btn-md">Report</a>
            </div>

            {{-- tabel --}}
            <div class="table-responsive mt-3">
                <table class="table align-middle">
                    <thead class="table-secondary">
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Akun</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($journal->journal_detail as $index=>$detail)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $detail->account->code }}</td>
                                <td>{{ $detail->account->name }}</td>
                                <td> <label class="badge {{ $detail->types =='debit' ? 'badge-info' : 'badge-danger' }}">{{ strtoupper($detail->types) }}</label></td>
                                <td>{{ Rupiah($detail->amount) }}</td>
                                <td>{{ $detail->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if (Auth::user()->can('isManager') && $journal->status != 'approved')
                    <button class="btn btn-primary btn-approve">Terima</button>
                    <button class="btn btn-danger btn-reject">Tolak</button>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')

<script type="text/javascript">

    $(document).ready(function(){
      $('.btn-approve').click(function(){
        $.confirm({
          theme: 'material',
          title: 'Warning!',
          content: 'Apakah anda yakin ingin menerima pemesanan ini ?',
          buttons: {
            Yes: function(){
              urlsnya = '{{ url("/accounting/journal")}}/' + {{$journal->id}},
              _token = $('input[name=_token]').val();
              $.ajax({
                type: 'PUT',
                dataType: 'json',
                data: {_token:_token, status:'approved'},
                url: urlsnya,
              })
              .done(function(response) {
                if(response == 1){
                  toastr.success("Success")
                  url = '{{ url("/accounting/journal")}}';
                  window.location.replace(url);
                }

              })
              .fail(function(){
                $.alert("error");
                return;
              })
              .always(function() {
                  console.log("complete");
              });
            },
            No: function () {
              return;
            }
          }
        })

      })

      $('.btn-reject').click(function(){
        $.confirm({
          theme: 'material',
          title: 'Isi Alasan',
          content: '' +
                '<form action="" class="formName">' +
                '<div class="form-group">' +
                '<input class="form-control alasan" placeholder="Masukan Alasan" required>' +
                '</div>' +
                '</form>',
          buttons: {
            Yes: {
              text:'Submit',
              btnClass: 'btn-primary',
              action: function(){
              var checkrequired = $('input').filter('[required]:visible')
              var isValid = true;
              $(checkrequired).each( function() {
                      if ($(this).parsley().validate() !== true) isValid = false;
              });
              if(!isValid){
                $.alert('Mohon masukan alasan');
                return false;
              }
              else{
                urlsnya = '{{ url("/accounting/journal")}}/' + {{$journal->id}};
                var alasan = this.$content.find('.alasan').val();
                _token = $('input[name=_token]').val();
                $.ajax({
                  type: 'PUT',
                  dataType: 'json',
                  data: {_token:_token, status:'rejected',note:alasan},
                  url: urlsnya,
                })
                .done(function(response) {
                  if(response == 1){
                    toastr.success("Success")
                    url = '{{ url("/accounting/journal")}}/';
                    window.location.replace(url);
                  }

                })
                .fail(function(){
                  $.alert("error");
                  return;
                })
                .always(function() {
                    console.log("complete");
                });
               }
              }

            },

            No: function () {
              return;
            }
          }
        })

      })
    });
  </script>
@endsection
