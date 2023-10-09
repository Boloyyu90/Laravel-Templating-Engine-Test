@extends('dashboard')
@section('content')
<style>
  .contentCont {
    margin-block: 20px;
  }

  .gambar {
    height: 200px;
    border-radius: 100px;
    border: 1px solid black;
    background-image: none;
  }

  .gambarKelas {
    width: 300px;
  }

  .presensi-button {
    font-size: 20px;
    float: right;

  }



  .card {
    margin: 20px;
    height: 100%;
    width: 100%;
  }

  .backgroundJenis {
    font-size: small;
    border: 1px solid;
    border-radius: 10px;
    padding-left: 4px;
    padding-right: 4px;
    color: white;
  }

  .toast {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 1;
  }

  .toast-body {
    background-color: green;
    color: white;

  }
</style>

<div class="header">
  <div class="container-fluid d-flex flex-column align-items-center contentCont">
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-4 d-flex justify-content-center">
          <img src="{{$instruktur['gambar']}}" class="img-fluid rounded-start" alt="gambar">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h1 class="card-title"><strong>{{$instruktur['bidang']}}</strong>
              <button type="button" id="showModalBtn" class="btn btn-link btn-sm" data-bs-toggle="modal" data-bs-target="#modalEye">
                <i class="far fa-eye" style="background-color: green; color: white; font-size: 17px; padding: 6px; border-radius: 10px;"></i>
              </button>
            </h1>
            <h5 style="font-size: 20px; font-weight: bold; text-align: right;"> Tanggal : {{ date('l, d-F-Y') }}</h5>
            <p class="card-text"><Strong>Instruktur : {{$instruktur['nama']}}</Strong></p>
            <p class="card-text"><Strong>Ruang : {{$instruktur['ruang']}}</Strong></p>
            <p class="card-text"><Strong>Total Member : {{$instruktur['member']}}</Strong></p>
            <p class="card-text" style="display: inline"><Strong>Rating:
                @for ($i = 0; $i < $instruktur['rating']; $i++) <div class="mb-0 " style="color: gold; display: inline;">
                  <i class="fas fa-star fa-xs"></i>
          </div>
          @endfor</Strong>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="d-flex justify-content-between align-items-center">
  <h3 class="ml-3 mb-3">Daftar Member</h3>
  <button type="button" class="btn btn-primary mr-3 mb-3" id="toastPresensi">
    <i class="fa-solid fa-check" style="padding-left: 2px;"></i> Presensi
  </button>
</div>
<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="toastId" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
    <div class="d-flex btn-primary  ">
      <div class="toast-body">
        <i class="fas fa-check" style="margin-right: 5px;"></i>Berhasil mempresensi Member!
      </div>
    </div>
  </div>
</div>

<div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3">
  @foreach($daftarMember as $member)
  <div class="col-md-4">
    <div class="card" style="border: 2px solid black;">
      <img src=" {{ $member['gambar']}}" class="card-img-top">

      @if($member['jenis'] == 'Gold')
      <div class="card-body" style="background-color : #f9c221; ">
        <h5 class="card-title"><strong>{{ $member['nama'] }}</strong></h5>
        <p class="card-text">Email: {{ $member['email'] }}</p>
        <p class="card-text">No telp: {{ $member['noTelp'] }}</p>
        <p class="card-text">Jenis Kartu : <strong class="backgroundJenis">{{ $member['jenis'] }}</strong></p>
        <p class="card-text">Metode Pembayaran :<span class="badge text-bg-success">{{ $member['metode'] }}</span> </p>
      </div>
      @elseif ($member['jenis'] == "Silver")
      <div class="card-body" style="background-color : #6e757d; color: white">
        <h5 class="card-title">{{ $member['nama'] }}</h5>
        <p class="card-text">Email: {{ $member['email'] }}</p>
        <p class="card-text">No telp: {{ $member['noTelp'] }}</p>
        <p class="card-text">Jenis Kartu : <strong class="backgroundJenis">{{ $member['jenis'] }}</strong></p>
        <p class="card-text">Metode Pembayaran :<span class="badge text-bg-primary">{{ $member['metode'] }}</span> </p>
      </div>
      @elseif ($member['jenis'] == "Black")
      <div class="card-body" style="background-color : #212429; color: white">
        <h5 class="card-title">{{ $member['nama'] }}</h5>
        <p class="card-text">Email: {{ $member['email'] }}</p>
        <p class="card-text">No telp: {{ $member['noTelp'] }}</p>
        <p class="card-text">Jenis Kartu : <strong class="backgroundJenis">{{ $member['jenis'] }}</strong></p>
        <p class="card-text">Metode Pembayaran :<span class="badge text-bg-primary">{{ $member['metode'] }}</span> </p>
      </div>
      @endif

    </div>
  </div>
  @endforeach
</div>
</div>


<div class="modal fade" id="modalEye" tabindex="-1" aria-labelledby="kelasModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="kelasModalLabel">Detail Kelas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3><strong>{{$instruktur['bidang']}}</strong></h3>
        <p class="card-text">Nama Instruktur : {{$instruktur['nama']}}</p>
        <p class="card-text">Kode Instruktur : {{$instruktur['kodeInst']}}</p>
        <p class="card-text">Hari Kelas : {{ date('l') }}</p>
        <p class="card-text">Tanggal kelas : {{ date('d-M-Y') }}</p>
        <p class="card-text">Ruang : {{$instruktur['ruang']}}</p>
        <p class="card-text" style="display: inline">Rating :
          @for ($i = 0; $i < $instruktur['rating']; $i++) <div class="mb-0 " style="color: black; display: inline;">
            <i class="fas fa-star fa-xs"></i>
      </div>
      @endfor
      </p>
    </div>
  </div>
</div>



<!-- 
<script>
  const myModal = document.getElementById('kelasModal');
  const myInput = document.getElementById('kelasModalLabel');
  myModal.addEventListener('shown.bs.modal', () => {
    myInput.focus();
  })
</script> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
  const PresensiToast = document.getElementById('toastPresensi');
  const toastElement = document.getElementById('toastId');

  // if (toastTrigger) {
  //   const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLive)
  //   toastTrigger.addEventListener('click', () => {
  //     toastBootstrap.show();
  //   })
  // }

  PresensiToast.addEventListener('click', function() {
    var toast = new bootstrap.Toast(toastElement);
    toast.show();
  })
</script>
@endsection