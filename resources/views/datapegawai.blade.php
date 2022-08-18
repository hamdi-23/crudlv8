<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD LARAVEL 8</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
    integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
  <h1 class="text-center mb-5">DATA PEGAWAI</h1>
  <div class="container">
    <a href="/tambahpegawai" class="btn btn-success">Tambah +</a>
    <div class="row g-3 align-items-center mt-2">
      <div class="col-auto">
        <form action="/pegawai" method="get">
          <input type="search" name="search" id="inputPassword6" class="form-control"
            aria-describedby="passwordHelpInline">
        </form>
      </div>


      {{-- @if($message = Session::get('success'))
      <div class=" alert alert-success" role="alert">{{ $message}}
      </div>
      @endif --}}

      <div class="row">

        <table class="table">
      </div>
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">nama</th>
          <th scope="col">Foto</th>
          <th scope="col">jenis kelamin</th>
          <th scope="col">No telpon</th>
          <th scope="col">aksi</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        @php
        $no = 1;
        @endphp
        @foreach ($data as $index=> $row)
        <tr>
          <th scope="row">{{ $index + $data->firstItem()}}</th>
          <td>{{ $row->nama }}</td>
          <td>
            <img src="{{ asset('fotopegawai/'.$row->foto ) }}" alt="" style="width:40px;">
          </td>
          <td>{{ $row->jeniskelamin }}</td>
          <td>0{{ $row->notelpon }}</td>
          <td>
            <a href="/tampilkandata/{{ $row->id }}" class="btn btn-info">edit</a>
            <a href="#" type=" button" class="btn btn-danger delete" data-id="{{ $row->id}}"
              data-nama="{{ $row->nama}}">delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
      </table>
      {{ $data->links() }}
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
<script>
  $('.delete').click(function(){
var pegawaiid = $(this).attr('data-id');
var nama = $(this).attr('data-nama')
swal({
title: "Are you sure?",
text: "apakah kamu menghapus data dengan nama! "+nama+" ",
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {
if (willDelete) {
  window.location = "/delete/"+pegawaiid+""
swal("Poof! data telah dihapus!", {
icon: "success",
});
} else {
swal("data tidak jadi dihapus!");
}
});
  });
  
</script>
<script>
  @if (Session::has('success'))
  toastr.success("{{ Session::get('success') }}")

  @endif

</script>

</html>