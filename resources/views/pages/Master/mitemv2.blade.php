@extends('layouts.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Master Data Item</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item"><a class="text-muted">Master Data Item</a></div>
            </div>
        </div>
        @php
            $tpos_save = session('tpos_save');
        @endphp
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    @include('layouts.flash-message')
                </div>
            </div>
            <form action="" method="POST" id="thisform" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Header Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Code Tag</label>
                                            <input type="text" class="form-control" name="code_tag" id="code_tag">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Consigne</label>
                                            <input type="date" class="form-control" name="dt_consign"
                                                value="{{ date('Y-m-d') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input type="text" class="form-control" name="name" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label>Owner</label>
                                            <select class="form-control select2" name="owner" id="owner">
                                                <option disabled selected>--Select Owner--</option>
                                                @foreach ($owners as $owner)
                                                    <option value="{{ $owner->code }}">
                                                        {{ $owner->code . '-' . $owner->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Brand</label>
                                            <select class="form-control select2" name="brand" id="brand">
                                                <option disabled selected>--Select Brand--</option>
                                                @foreach ($brands as $brand)
                                                    <option>{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jenis Barang</label>
                                            <input type="text" class="form-control" name="jenis" id="jenis"
                                                value="">
                                            {{-- <select class="form-control select2" name="type" id="type">
                                                <option disabled selected>--Select Jenis Barang--</option>
                                                @foreach ($jenis_brgs as $jenis_brg)
                                                    <option>{{ $jenis_brg->name }}</option>
                                                @endforeach
                                            </select> --}}
                                        </div>
                                        <div class="form-group">
                                            <label>Harga Jual</label>
                                            <input type="text" class="form-control" name="hrgjual" id="hrgjual"
                                                value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Harga Titip</label>
                                            <input type="text" class="form-control" name="hrgtitip" id="hrgtitip"
                                                value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card" style="border: 1px solid lightblue">
                            <div class="card-header">
                                <h4>Gambar</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <section class="uploadimg">
                                                <div class="row py-2">
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" id="hdnupload0"
                                                            name="hdnupload0" readonly hidden>
                                                        <div class="input-group mb-3 px-2 py-1 bg-white shadow-sm"
                                                            style="border:1px solid #ced4da; border-radius:5px;">
                                                            <input id="upload0" name="upload0" type="file"
                                                                onchange="readURL0(this);"
                                                                class="form-control border-0 upload">
                                                            <label id="upload-label0" for="upload0"
                                                                class="font-weight-light text-muted upload-label"
                                                                style="position: absolute; top: 50%; left: 1rem; transform: translateY(-50%);">Choose
                                                                file</label>
                                                            <div class="input-group-append">
                                                                <label for="upload0" class="btn btn-light m-0 px-4"><img
                                                                        src="{{ asset('../assets/img/icons/cloud-upload-regular-24.png') }}"alt="dots-vertical" /><small
                                                                        class="text-uppercase font-weight-bold text-muted">
                                                                        Choose file</small></label>
                                                            </div>
                                                        </div>
                                                        <div class="image-area mt-4"><img id="imageResult0" src=""
                                                                alt=""
                                                                class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary mr-1" id="confirm" type="submit"
                                    formaction="{{ route('mitemv2post') }}" style="width: 100%">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@stop
@section('botscripts')
    <script type="text/javascript">
        $('#datatable').DataTable({
            // "ordering":false,
            "bInfo": false
        });
        /*  ==========================================
            SHOW UPLOADED IMAGE 
        * ========================================== */
        function readURL0(input0) {
            if (input0.files && input0.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imageResult0').attr('src', e.target.result);
                };
                reader.readAsDataURL(input0.files[0]);
                console.log(input0.files[0]);
            }
        }

        $(function() {
            $('#upload0').on('change', function() {
                readURL0(input0);
            });
        });

        /*  ==========================================
            SHOW UPLOADED IMAGE NAME
        * ========================================== */
        var input0 = document.getElementById('upload0');
        var infoArea0 = document.getElementById('upload-label0');

        input0.addEventListener('change', showFileName0);

        function showFileName0(event) {
            var input0 = event.srcElement;
            var fileName0 = input0.files[0].name;
            infoArea0.textContent = 'File name: ' + fileName0;

        }

        function submitDel(id) {
            $('#del-' + id).submit()
        }


        $(document).on("click", "#confirm", function(e) {
            // Validate ifnull
            name = $("#name").val();
            consignee = $("#consignee").prop('selectedIndex');
            code_tag = $("#code_tag").val();
            type = $("#type").val();
            satuan = $("#satuan").prop('selectedIndex');
            quantity = $("#quantity").val();
            brand = $("#brand").prop('selectedIndex');
            phone = $("#phone").val();
            curr_type1 = $("#curr_type1").prop('selectedIndex');
            curr_type2 = $("#curr_type2").prop('selectedIndex');
            if (consignee == "") {
                swal('WARNING', 'Consignee Tidak boleh kosong!', 'warning');
                return false;
            } else if (code_tag == "") {
                swal('WARNING', 'Kode tag Tidak boleh kosong!', 'warning');
                return false;
            } else if (name == "") {
                swal('WARNING', 'Nama Tidak boleh kosong!', 'warning');
                return false;
            } else if (type == "") {
                swal('WARNING', 'Type Tidak boleh kosong!', 'warning');
                return false;
            } else if (satuan == 0) {
                swal('WARNING', 'Satuan Kelamin Tidak boleh kosong!', 'warning');
                return false;
            } else if (brand == 0) {
                swal('WARNING', 'Brand Kelamin Tidak boleh kosong!', 'warning');
                return false;
            } else if (phone == 0) {
                swal('WARNING', 'Phone Tidak boleh kosong!', 'warning');
                return false;
            }

        });

        $(document).ready(function() {

            $("#consignee").on('select2:select', function(e) {
                var code = $(this).val();
                show_loading()
                $.ajax({
                    url: '{{ route('getmconsign') }}',
                    method: 'post',
                    data: {
                        'code': code
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function(response) {
                        // console.log(code);
                        console.log(response);
                        for (i = 0; i < response.length; i++) {
                            if (response[i].code == code) {
                                $("#no_consign").val(response[i].code)
                                $("#phone").val(response[i].phone)
                            }
                        }
                        hide_loading()
                    }
                });
            });
            $(document).ready(function() {
                $(document).on("change", "#hrgjual", function(e) {
                    if ($('#hrgjual').val() == '') {
                        $('#hrgjual').val(0);
                    }
                    $(this).val(thousands_separators($(this).val()));
                });

                $(document).on("change", "#hrgtitip", function(e) {
                    if ($('#hrgtitip').val() == '') {
                        $('#hrgtitip').val(0);
                    }
                    $(this).val(thousands_separators($(this).val()));
                });

                $(document).on("click", "#hrgjual", function(e) {
                    if (/\D/g.test(this.value)) {
                        // Filter comma
                        this.value = this.value.replace(/\,/g, "");
                        this.value = Number(Math.trunc(this.value))
                    }
                });
                $(document).on("click", "#hrgtitip", function(e) {
                    if (/\D/g.test(this.value)) {
                        // Filter comma
                        this.value = this.value.replace(/\,/g, "");
                        this.value = Number(Math.trunc(this.value))
                    }
                });
            });
            // VALIDATE TRIGGER
            $("#hrgmodal").keyup(function(e) {
                if (/\D/g.test(this.value)) {
                    // Filter non-digits from input value.
                    this.value = this.value.replace(/\D/g, '');
                }
            });
            $("#hrgtitip").keyup(function(e) {
                if (/\D/g.test(this.value)) {
                    // Filter non-digits from input value.
                    this.value = this.value.replace(/\D/g, '');
                }
            });

        })
    </script>
@endsection
