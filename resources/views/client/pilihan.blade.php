@extends('layouts.client')
@section('content')

<div class="flex justify-center items-center">
    <div class="w-[900px] h-[500px]">
        <div class="grid grid-cols-3 gap-4 ">
            <a href="/test/1/{{ $id }}" class="<?php if($sudah[0] == true) echo "pointer-events-none" ?>">
                <div class="h-[100px] <?php echo ($sudah[0] == false) ? "bg-slate-800" : "bg-green-500" ?> flex justify-center items-center rounded-md">
                    <button class="hover:font-bold rounded-sm transition text-white font-medium" >
                        Bahasa Verbal
                    </button>
                </div>
            </a>
            <a href="/test/2/{{ $id }}" class="<?php if($sudah[1] == true) echo "pointer-events-none" ?>">
                <div class="h-[100px] <?php echo ($sudah[1] == false) ? "bg-slate-800" : "bg-green-500" ?> flex justify-center items-center rounded-md">
                    <button class="hover:font-bold rounded-sm transition text-white font-medium" >
                        Bahasa Non Verbal
                    </button>
                </div>
            </a>
            <a href="/test/3/{{ $id }}" class="<?php if($sudah[2] == true) echo "pointer-events-none" ?>">
                <div class="h-[100px] <?php echo ($sudah[2] == false) ? "bg-slate-800" : "bg-green-500" ?> flex justify-center items-center rounded-md">
                    <button class="hover:font-bold rounded-sm transition text-white font-medium" >
                        Motorik Kasar
                    </button>
                </div>
            </a>
            <a href="/test/4/{{ $id }}" class="<?php if($sudah[3] == true) echo "pointer-events-none" ?>">
                <div class="h-[100px] <?php echo ($sudah[3] == false) ? "bg-slate-800" : "bg-green-500" ?> flex justify-center items-center rounded-md">
                    <button class="hover:font-bold rounded-sm transition text-white font-medium" >
                        Motorik Halus
                    </button>
                </div>
            </a>
            <a href="/test/5/{{ $id }}" class="<?php if($sudah[4] == true) echo "pointer-events-none" ?>">
                <div class="h-[100px] <?php echo ($sudah[4] == false) ? "bg-slate-800" : "bg-green-500" ?> flex justify-center items-center rounded-md">
                    <button class="hover:font-bold rounded-sm transition text-white font-medium" >
                        Interaksi Sosial dan Emosi
                    </button>
                </div>
            </a>
            <a href="/test/6/{{ $id }}" class="<?php if($sudah[5] == true) echo "pointer-events-none" ?>">
                <div class="h-[100px] <?php echo ($sudah[5] == false) ? "bg-slate-800" : "bg-green-500" ?> flex justify-center items-center rounded-md">
                    <button class="hover:font-bold rounded-sm transition text-white font-medium" >
                        Kemandirian / Self Help
                    </button>
                </div>
            </a>
            <a href="/test/7/{{ $id }}" class="<?php if($sudah[6] == true) echo "pointer-events-none" ?>">
                <div class="h-[100px] <?php echo ($sudah[6] == false) ? "bg-slate-800" : "bg-green-500" ?> flex justify-center items-center rounded-md">
                    <button class="hover:font-bold rounded-sm transition text-white font-medium" >
                        Akademik dan Pra Akademik - Membaca
                    </button>
                </div>
            </a>
            <a href="/test/8/{{ $id }}" class="<?php if($sudah[7] == true) echo "pointer-events-none" ?>">
                <div class="h-[100px] <?php echo ($sudah[7] == false) ? "bg-slate-800" : "bg-green-500" ?> flex justify-center items-center rounded-md">
                    <button class="hover:font-bold rounded-sm transition text-white font-medium" >
                        Akademik dan Pra Akademik - Berhitung
                    </button>
                </div>
            </a>
            <a href="/test/9/{{ $id }}" class="<?php if($sudah[8] == true) echo "pointer-events-none" ?>">
                <div class="h-[100px] <?php echo ($sudah[8] == false) ? "bg-slate-800" : "bg-green-500" ?> flex justify-center items-center rounded-md">
                    <button class="hover:font-bold rounded-sm transition text-white font-medium" >
                        Akademik dan Pra Akademik - Menulis
                    </button>
                </div>
            </a>
        </div>
        <div class="btn-action flex justify-between">
          <div class="text-lg mt-3 flex justify-start rounden-md">
              <a href="{{ url('/home') }}">
                  <button class="py-2 px-4 bg-[#FF0000] hover:font-bold rounded-sm transition text-white shadow-xl font-medium" >
                      Kembali
                  </button>
              </a>
          </div>
          <div class="text-lg mt-3 flex justify-start rounden-md <?php if($finish == false) echo "hidden" ?>">
              <a href="/finalresults/{{ $id }}">
                  <button class="py-2 px-4 bg-sky-500 hover:font-bold rounded-sm transition text-white shadow-xl font-medium" >
                      Lihat Hasil
                  </button>
              </a>
          </div>
        </div>
    </div>
</div>
@endsection