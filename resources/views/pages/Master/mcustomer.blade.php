@extends('layouts.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Master Data Customer</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-Customer active"><a href="#">Master Data</a></div>
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
            <form action="{{ route('mcustpost') }}" method="POST" id="thisform" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Header Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Code</label>
                                            <input type="text" class="form-control" name="code" id="code">
                                        </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" name="phone" id="phone">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary mr-1" id="confirm" type="submit"
                                    formaction="{{ route('mcustpost') }}" style="width: 100%">Save</button>
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
            $('#confirm').addClass('btn-progress');
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
                $('#confirm').removeClass('btn-progress');
                return false;
            } else if (code_tag == "") {
                swal('WARNING', 'Kode tag Tidak boleh kosong!', 'warning');
                $('#confirm').removeClass('btn-progress');
                return false;
            } else if (name == "") {
                swal('WARNING', 'Nama Tidak boleh kosong!', 'warning');
                $('#confirm').removeClass('btn-progress');
                return false;
            } else if (type == "") {
                swal('WARNING', 'Type Tidak boleh kosong!', 'warning');
                $('#confirm').removeClass('btn-progress');
                return false;
            } else if (satuan == 0) {
                swal('WARNING', 'Satuan Kelamin Tidak boleh kosong!', 'warning');
                $('#confirm').removeClass('btn-progress');
                return false;
            } else if (brand == 0) {
                swal('WARNING', 'Brand Tidak boleh kosong!', 'warning');
                $('#confirm').removeClass('btn-progress');
                return false;
            } else if (phone == 0) {
                swal('WARNING', 'Phone Tidak boleh kosong!', 'warning');
                $('#confirm').removeClass('btn-progress');
                return false;
            }
            // Check if code exists via AJAX
            $.ajax({
                url: '{{ route('getexistcode') }}', // Change this to the server-side endpoint
                method: 'POST',
                data: {
                    code: code_tag
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    console.log("code tag :" + code_tag);
                    if (response == null) {
                        // swal('Warning', 'Code Tag kosong!', 'warning');
                        // return false;
                        setTimeout(function() {
                            // Submit the form after the delay
                            $("#thisform").submit();
                        }, 5000);
                        // $("#thisform").submit();
                    } else {
                        swal('Warning', 'Code Tag sudah ada!', 'warning');
                        $('#confirm').removeClass('btn-progress');
                        return false;
                    }
                    // Assuming the response is either 'exists' or 'not_exists'

                    // if (response === 'exists') {
                    //     // Proceed with form submission if code exists
                    //     $("#myForm").submit();
                    // } else {
                    //     // Code doesn't exist, you can show an alert or message
                    //     alert('Code does not exist!');
                    // }
                },
                error: function() {
                    swal('WARNING', 'An error occurred while checking the code!', 'warning');
                    return false;
                },
                complete: function() {
                    // Hide loading indicator
                    $("#loading").hide();
                }
            });
            return false;
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
                $(document).on("click", "#hrgjual", function(e) {
                    if (/\D/g.test(this.value)) {
                        // Filter comma
                        this.value = this.value.replace(/\,/g, "");
                        this.value = Number(Math.trunc(this.value))
                    }
                });
            });
            // VALIDATE TRIGGER
            $("#hrgjual").keyup(function(e) {
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
