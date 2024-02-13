<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Dashboard Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite('resources/css/app.css')
</head>
<body>
    <section class="bg-slate-100 h-screen w-screen">
        <div class="flex flex-col  items-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="grid gap-4 mt-24 bg-white p-6 rounded-lg shadow-md shadow-slate-300">
                <div class="flex justify-between">
                    <div>
                        <h2 class="text-lg font-bold text-slate-700">Tambah/Ubah Pendaftaran Pemeriksaan sampel</h2>
                        <small class="text-blue-400">Catatan: Menyimpan dan Update data menggunakan tombol yang sama</small>
                    </div>

                    <div>
                        <a class="bg-slate-300 p-2 text-slate-600 rounded-md" href="{{ route('logout') }}">Logout</a>
                    </div>
                </div>
                <form method="POST" id="formCustomer" action="{{ route('admin.customers') }}">
                    @csrf
                    <div class="grid gap-2 mb-6 md:grid-cols-2">
                            <input type="text" id="_id" name="_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 " hidden>
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900" >NIK</label>
                            <input type="number" id="nik" name="nik" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="mis: 8899289189183919 "  required>
                        </div>
                        <div>
                            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Awal</label>
                            <input type="text" id="first_name" name="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="mis: Syahidan" required>
                        </div>
                        <div>
                            <label for="company" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Akhir</label>
                            <input type="text" id="last_name" name="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="mis: Arrizaldy Sidik" required>
                        </div>  
                        <div>
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Lahir</label>
                            <input type="date" id="birth_date" name="birth_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "  required>
                        </div>
                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900">Alamat Lengkap</label>
                            <input type="text" id="full_address" name="full_address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="mis: Perum Villa Permata Hijau Blok A3/16" required>
                        </div>
                        <div>
                            <label for="screening_id" name="screening_id" class=" cursor-pointer block mb-2 text-sm font-medium">Nama Pemeriksaan</label>
                            <select name="screening_id" id="screening_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">--Pilih Pemeriksaan--</option>
                                @foreach ($screenings as $item)
                                <option value="{{ $item->_id }}">{{ $item->name }}</option>   
                                @endforeach
                              </select>
                        </div>
                    </div>
                    <div class="w-full flex justify-between">
                        <div></div>
                        <div>
                            <a type="reset" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-md text-sm w-full sm:w-auto px-5 py-2.5 text-center" href="{{ route('admin.export') }}">Export PDF</a>
                            <button type="reset" class="text-white bg-slate-600 hover:bg-slate-700 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-md text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Reset</button>
                            <button type="submit" class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-md text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Simpan Data</button>
                        </div>
                    </div>
                </form>
                
                <div>
                    <h2 class="text-lg font-bold text-slate-700">Histori Pendaftaran Pemeriksaan sampel</h2>
                    <small class="text-blue-400">Catatan: Menyimpan dan Update data menggunakan tombol yang sama</small>
                </div>
                <table id="customer_table" class="border-collapse border border-slate-500">
                    <thead class="bg-slate-200">
                        <tr>
                            <th class="border border-slate-300 text-slate-800">No</th>
                            <th class="border border-slate-300 text-slate-800">NIK</th>
                            <th class="border border-slate-300 text-slate-800">Nama Lengkap</th>
                            <th class="border border-slate-300 text-slate-800">Tanggal lahir</th>
                            <th class="border border-slate-300 text-slate-800">Pemeriksaan</th>
                            <th class="border border-slate-300 text-slate-800">Status</th>
                            <th class="border border-slate-300 text-slate-800">Alamat Lengkap</th>
                            <th class="border border-slate-300 text-slate-800">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function populateData(){
            let APP_URL = {!! json_encode(url('/')) !!}
            $('#customer_table tbody').empty().append();
            $.ajax({
                url: `${APP_URL}/api/v1/customers`,
                dataType: 'json',
                type: 'get',
                cache:false,
                success: function(data){
                    let event_data = '';
                    $.each(data.data, function(index, value){
                        event_data += '<tr>';
                        event_data += '<td class="border border-slate-300 text-slate-800 p-4">'+(index+1)+'</td>';
                        event_data += '<td class="border border-slate-300 text-slate-800 p-4">'+value.nik+'</td>';
                        event_data += '<td class="border border-slate-300 text-slate-800 p-4">'+value.first_name+' '+value.last_name+'</td>';
                        event_data += '<td class="border border-slate-300 text-slate-800 p-4">'+value.birth_date+'</td>';
                        event_data += '<td class="border border-slate-300 text-slate-800 p-4">'+value.name+'</td>';
                        event_data += '<td class="border border-slate-300 text-slate-800 p-4">'+value.status+'</td>';
                        event_data += '<td class="border border-slate-300 text-slate-800 p-4">'+value.full_address+'</td>';
                        event_data += `<td class="border border-slate-300 text-slate-800 p-4"><a class="cursor-pointer bg-yellow-600 p-2 rounded-md text-white hover:bg-yellow-700" onClick="getId('${value._id}')">Edit</a></td>`;
                        event_data += '</tr class="border border-slate-300 text-slate-800 p-4">';
                    });
                    $("#customer_table").append(event_data);
                },
                error: function(error){
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Terjadi kesalahan saat memuat data!",
                        showConfirmButton: false,
                        timer: 1500
                        });
                }
            });
        }

        function getId(value){
            let APP_URL = {!! json_encode(url('/')) !!}
            $.ajax({
                url: `${APP_URL}/api/v1/customers/${value}`,
                dataType: 'json',
                type: 'get',
                cache:false,
                success: function(response){
                    $("#_id").val(response.data._id);
                    $("#nik").val(response.data.nik);
                    $("#first_name").val(response.data.first_name);
                    $("#last_name").val(response.data.last_name);
                    $("#birth_date").val(response.data.birth_date);
                    $("#full_address").val(response.data.full_address);
                    $("#screening_id").val(response.data.screening_id).change();
                },
                error: function(error){
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Terjadi kesalahan saat memuat data!",
                        showConfirmButton: false,
                        timer: 1500
                        });
                }
            });
        }
        $(document).ready(function(){
            populateData();
        });
        $(document).on("submit", "#formCustomer", function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: $('#formCustomer').attr('action'),
                data:  new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response){
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                        });
                        populateData();
                },
                error: function (response){
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Gagal menyimpan data!",
                        showConfirmButton: false,
                        timer: 1500
                        });
                        populateData();
                }
            });
        });
    </script>
</body>
</html>