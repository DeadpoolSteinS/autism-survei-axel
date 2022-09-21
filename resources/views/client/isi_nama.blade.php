@extends('layouts.client')

@section('content')
<div class="h-[420px] items-center row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <!-- <div class="card-header text-xl font-medium">Masukan data anak</div> -->

            <div class="w-full card-body flex justify-center">
                <form method="POST" class=" bg-gray-300 p-4 rounded-lg w-[500px]" action="/isi_nama">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="text-lg text-center font-semibold block mb-2">Nama</label>

                        <div class="">
                            <input id="nama" type="text" class="form-control w-full outline-none rounded px-4 py-2" name="nama" value="{{ old('nama') }}" required autocomplete="email" autofocus>
                        </div>
                    </div>

                    <div class="line-break h-[2px] bg-black mb-4"></div>

                    <div class="mb-4">
                        <label for="gender" class="text-lg font-semibold text-center block mb-2">Gender</label>

                        <div class="flex justify-center">
                            <div class="form-check mr-4">
                                <input class="form-check-input" type="radio" name="gender" id="lakilaki" value="Laki-laki" >
                                <label class="form-check-label" for="lakilaki">
                                    Laki Laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="perempuan" value="Perempuan" >
                                <label class="form-check-label" for="perempuan">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="line-break h-[2px] bg-black mb-4"></div>

                    <div class="grid gap-4 grid-cols-2 mb-4">
                      <div class="w-full">
                          <label for="tempat" class="text-lg font-semibold">Tempat</label>

                          <div class="">
                              <input id="tempat" type="text" class="form-control w-full outline-none rounded px-4 py-2" name="tempat" value="{{ old('tempat') }}" required autocomplete="email" autofocus>
                          </div>
                      </div>

                      <div class="w-full">
                          <label for="tgllahit" class="text-lg font-semibold">Tanggal Lahir</label>

                          <div class="">
                              <input id="tgllahir" type="date" class="form-control w-full outline-none rounded px-4 py-2" name="tgllahir" value="{{ old('tgllahir') }}" required autocomplete="email" autofocus>
                          </div>
                      </div>
                    </div>

                    <div class="flex justify-center">
                      <button type="submit" class="btn btn-primary text-white mt-4 bg-gray-700 px-8 py-2 rounded-3xl">
                          Lanjut
                      </button>
                    </div>
                
                </form>
            </div>
        </div>
    </div>
</div>
@endsection