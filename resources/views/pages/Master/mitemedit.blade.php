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
                                    <label>No Consign</label>
                                    <input type="text" class="form-control" name="no_consign" value="{{ $mitem->no_consign }}" readonly>
                                </div>       
                                <div class="form-group">
                                    <label>Code Tag</label>
                                    <input type="text" class="form-control" name="tag" value="{{ $mitem->code_tag }}">
                                </div>    
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $mitem->name }}">
                                </div>    
                                <div class="form-group">
                                    <label>Consignee / Owner</label>
                                    <select class="form-control select2" name="consignee" id="consignee">
                                        <option selected>{{ $mitem->consignee }}</option>
                                        <option>SAZZZ</option>
                                    </select>
                                </div>         
                                <div class="form-group">
                                    <label>Hp</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $mitem->phone }}">
                                </div>            
                                <div class="form-group">
                                    <label>Tanggal Consigne</label>
                                    <input type="date" class="form-control" name="dt" value="{{ date("Y-m-d", strtotime($mitem->tgl_consign)) }}">
                                </div>                               
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Type</label>
                                    <select class="form-control select2" name="type" id="type">
                                        <option selected>{{ $mitem->type }}</option>
                                        <option>Bags</option>
                                    </select>
                                </div>  
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="text" class="form-control" name="quantity" value="{{ $mitem->qty }}">
                                </div> 
                                <div class="form-group">
                                    <label>Sat</label>
                                    <select class="form-control select2" name="satuan" id="satuan">
                                        <option selected>{{ $mitem->sat }}</option>
                                        <option>PCS</option>
                                    </select>
                                </div>  
                                <div class="form-group">
                                    <label>Brand</label>
                                    <select class="form-control select2" name="brand" id="brand">
                                        <option selected>{{ $mitem->brand }}</option>
                                        <option>Bags</option>
                                    </select>
                                </div>  
                                <div class="form-group">
                                    <label>Warna</label>
                                    <input type="text" class="form-control" name="warna" value="{{ $mitem->warna }}">
                                </div>
                                <div class="form-group">
                                    <label>Size</label>
                                    <input type="text" class="form-control" name="size" value="{{ $mitem->size }}">
                                </div>  
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Harga Modal Satuan</label>
                                            <select class="form-control select2" name="curr_type1" id="curr_type1">
                                                <option selected>{{ $mitem->kurs_modal }}</option>
                                                <option>Rupiah</option>
                                                <option>USD</option>
                                            </select>
                                        </div>  
                                        <div class="form-group">
                                            <label>Harga Jual Satuan</label>
                                            <select class="form-control select2" name="curr_type2" id="curr_type2">
                                                <option selected>{{ $mitem->kurs_jual }}</option>
                                                <option>Rupiah</option>
                                                <option>USD</option>
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nominal Modal</label>
                                            <input type="text" class="form-control" name="hrgmodal" value="{{ $mitem->nominal_modal }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Nominal Jual</label>
                                            <input type="text" class="form-control" name="hrgjual" value="{{ $mitem->nominal_jual }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Notes Kelengkapan</label>
                                    <textarea class="form-control" style="height:100px" name="spesifikasi">{{ $mitem->note }}</textarea>
                                </div>
                                {{-- <div class="form-group">
                                    <label>Lokasi</label>
                                    <select class="form-control select2" name="lokasi" id="lokasi">
                                        <option disabled selected>--Select Lokasi--</option>
                                        <option>JKT</option>
                                        <option>HKT</option>
                                        <option>AKB</option>
                                    </select>
                                </div>  --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">    
                        <button class="btn btn-primary mr-1" type="submit"
                        formaction="/mitem/{{ $mitem->id }}" id="confirm">Update</button>
                        <button class="btn btn-secondary" type="reset">Cancel</button>
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
                                                <input type="text" class="form-control" id="hdnupload0" name="hdnupload0" readonly hidden>
                                                <div class="input-group mb-3 px-2 py-1 bg-white shadow-sm" style="border:1px solid #ced4da; border-radius:5px;">
                                                    <input id="upload0" name="upload0" type="file" onchange="readURL0(this);" class="form-control border-0 upload">
                                                    {{-- <label id="upload-label0" for="upload0" class="font-weight-light text-muted upload-label">Choose
                                                        file</label>
                                                    <div class="input-group-append">
                                                        <label for="upload0" class="btn btn-light m-0 px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted"> Choose file</small></label>
                                                    </div> --}}
                                                </div>
                                                {{-- @php
                                                $image = $mitems->pict;

                                                $imageData = base64_encode(file_get_contents($image));

                                                $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                                                @endphp --}}
                                                {{-- <img class="" src="data:image/png;base64,{{ chunk_split(base64_encode($mitems->pict)) }}" height="300" alt="photo"> --}}
                                                {{-- <img src="{{ asset('storage/images/'.$mitem->pict) }}" /> --}}
                                                {{-- <img src="{{ url("../images/".$mitem->pict) }}" alt="photo" height="300"> --}}
                                                <div class="image-area mt-4"><img id="imageResult0" src="{{ asset('storage/images/'.$mitem->pict) }}" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                                                <input type="text" class="form-control" id="hdnupload0" name="hdnupload0" readonly value="{{ $mitem->pict }}" hidden>
                                                <hr>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input type="text" class="form-control" name="stock" value="{{ $mitem->stock }}">
                                </div>                        
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control select2" name="status" id="status">
                                        <option selected>{{ $mitem->status }}</option>
                                        <option>Ada</option>
                                        <option>Kosong</option>
                                    </select>
                                </div>                         
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="ch_boxori" value="Y" name="">
                                    <label class="form-check-label" for="ch_boxori">Box Ori</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="ch_oridustbag" value="Y" name="">
                                    <label class="form-check-label" for="ch_oridustbag">Dustbag Ori</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="ch_authcard" value="Y" name="">
                                    <label class="form-check-label" for="ch_authcard">Auth Card</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="ch_mirror" value="Y" name="">
                                    <label class="form-check-label" for="ch_mirror">Mirror</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="ch_booklet" value="Y" name="">
                                    <label class="form-check-label" for="ch_booklet">Booklet</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="ch_receipt" value="Y" name="">
                                    <label class="form-check-label" for="ch_receipt">Receipt</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="ch_strap" value="Y" name="">
                                    <label class="form-check-label" for="ch_strap">Strap</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="ch_padlock" value="Y" name="">
                                    <label class="form-check-label" for="ch_padlock">Padlock</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="ch_key" value="Y" name="">
                                    <label class="form-check-label" for="ch_key">Strap</label>
                                </div>
                            </div>    
                            <div class="col-md-4">                                
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="ch_dustganti" value="Y" name="">
                                    <label class="form-check-label" for="ch_dustganti">Dustbag Ganti</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="ch_hollow" value="Y" name="">
                                    <label class="form-check-label" for="ch_hollow">Hollow</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="ch_paperbag" value="Y" name="">
                                    <label class="form-check-label" for="ch_paperbag">Paperbag</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="ch_tag" value="Y" name="">
                                    <label class="form-check-label" for="ch_tag">Tag</label>
                                </div>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="ch_raincoat" value="Y" name="">
                                    <label class="form-check-label" for="ch_raincoat">Raincoat</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="ch_camelia" value="Y" name="">
                                    <label class="form-check-label" for="ch_camelia">Camelia</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="ch_ribbon" value="Y" name="">
                                    <label class="form-check-label" for="ch_ribbon">Ribbon/Pita</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="ch_sampleather" value="Y" name="">
                                    <label class="form-check-label" for="ch_sampleather">Sample Leather</label>
                                </div>
                            </div>    
                            <div class="col-md-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="ch_copyreceipt" value="Y" name="">
                                    <label class="form-check-label" for="ch_copyreceipt">Copy Receipt</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="ch_lap" value="Y" name="">
                                    <label class="form-check-label" for="ch_lap">Lap</label>
                                </div>
                                <div class="form-group">
                                    <label>Kelengkapan Lain</label>
                                    <textarea class="form-control" style="height:100px" name="kel_lain"></textarea>
                                </div>
                            </div>                    
                        </div>
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

    $(document).ready(function() {
        rowCount = 0;
        //CSRF TOKEN
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {
            // $('.select2').select2({
            // });


            var counter = 1;
            $(document).on("click", "#addItem", function(e) {
                e.preventDefault();
                if($('#quantity').val() == 0){
                    swal('WARNING', 'Quantity Tidak boleh 0!', 'warning');
                    return false;
                }

                kode = $("#select2-kode-container").text();
                kode_id = $("#kode").val();
                nama_item = $("#nama_item").val();
                warna = $("#warna").val();
                hrgjual = $("#hrgjual").val();
                quantity = $("#quantity").val();
                satuan = $("#satuan").val();
                subtot = $("#subtot").val();


                tablerow = "<tr row_id="+ counter +"><th style='readonly:true;' class='border border-5'>" + counter + "</th><td class='border border-5' style='display:none;'><input style='width:120px;' readonly form='thisform' class='numberclass form-control' type='text' value='" + counter + "'></td><td class='border border-5'><input style='width:120px;' readonly form='thisform' class='kodeclass form-control' name='kode_d[]' type='text' value='" + kode_id + "'></td><td class='border border-5'><input style='width:120px;' readonly form='thisform' class='namaitemclass form-control' name='namaitem_d[]' type='text' value='" + nama_item + "'></td><td class='border border-5'><input style='width:120px;' readonly form='thisform' class='warnaclass form-control' name='warna_d[]' type='text' value='" + warna + "'></td><td class='border border-5'><input style='width:120px;' form='thisform' class='row_qty quantityclass form-control' name='quantity_d[]' type='text' value='" + quantity + "' id='qty_d_"+counter+"'></td><td class='border border-5'><input style='width:120px;' readonly form='thisform' class='satuanclass form-control' name='satuan_d[]' type='text' value='" + satuan + "'></td><td class='border border-5'><input style='width:120px;' readonly form='thisform' class='row_hrgjual hrgjualclass form-control' name='hrgjual_d[]' type='text' value='" + hrgjual + "' id='hrgjual_d_"+ counter +"'></td><td class='border border-5'><input type='text' readonly form='thisform' style='width:100px;' class='subtotclass form-control' value='" + subtot + "' name='subtot_d[]' id='subtot_d_"+counter+"'></td><td class='border border-5'><a title='Delete' class='delete'><i style='font-size:15pt;color:#6777ef;' class='fa fa-trash'></i></a></td><td hidden><input style='width:120px;' readonly form='thisform' class='noclass form-control' name='no_d[]' type='text' value='" + no + "'></td></tr>";
                
                subtotparse = subtot.replaceAll(",", "");
                $("#datatable tbody").append(tablerow);
                // if(counter == 1){
                //     disc = Number(subtotparse).toFixed(2) * ($("#disc").val() / 100);
                //     tax = (Number(subtotparse).toFixed(2) - Number(disc).toFixed(2)) * ($("#tax").val() / 100);
                //     total =  (Number(subtotparse).toFixed(2) - Number(disc).toFixed(2)) + Number(tax.toFixed(2));
                //     subtot = Number(subtotparse);

                //     $("#subtotal_h").val(thousands_separators(subtot.toFixed(2)));
                //     $("#price_disc").val(thousands_separators(disc.toFixed(2)));
                //     $("#price_tax").val(thousands_separators(tax.toFixed(2)));
                //     $("#price_total").val(thousands_separators(total.toFixed(2)));


                //     $("#nama_item").val('');
                //     $('#tax').val(0);
                //     $('#disc').val(0);
                //     $('#hrgjual').val(0);
                //     $('#quantity').val(0);
                //     console.log("Disc : "+disc.toFixed(2), "Tax : "+tax, "Total : "+total);
                // }else{
                //     subtot_old = $("#subtotal_h").val().replaceAll(",", "");
                //     disc_old = $("#price_disc").val().replaceAll(",", "");
                //     tax_old = $("#price_tax").val().replaceAll(",", "");
                //     total_old = $("#price_total").val().replaceAll(",", "");
                //     thisdisc = $("#disc").val();
                //     thistax = $("#tax").val()

                //     disc = Number(subtotparse).toFixed(2) * (Number(thisdisc).toFixed(2) / 100);
                //     tax = (Number(subtotparse).toFixed(2) - Number(disc).toFixed(2)) * (Number(thistax).toFixed(2) / 100);
                //     total =  (Number(subtotparse).toFixed(2) - Number(disc).toFixed(2)) + Number(tax.toFixed(2));

                //     subtot_new = Number(Number(subtotparse).toFixed(2)) + Number(Number(subtot_old).toFixed(2));
                //     disc_new = Number(Number(disc_old).toFixed(2)) + Number(disc.toFixed(2));
                //     tax_new = Number(Number(tax_old).toFixed(2)) + Number(tax.toFixed(2));
                //     total_new = Number(Number(total_old).toFixed(2)) + Number(total.toFixed(2));

                //     $("#subtotal_h").val(thousands_separators(subtot_new.toFixed(2)));
                //     $("#price_disc").val(thousands_separators(disc_new.toFixed(2)));
                //     $("#price_tax").val(thousands_separators(tax_new.toFixed(2)));
                //     $("#price_total").val(thousands_separators(total_new.toFixed(2)));

                //     $("#nama_item").val('');
                //     $('#tax').val(0);
                //     $('#disc').val(0);
                //     $('#hrgjual').val(0);
                //     $('#quantity').val(0);
                // }
                if(counter == 1){
                    if (/\D/g.test(subtot))
                    {
                        // Filter comma
                        subtot = subtot.replace(/\,/g,"");
                        subtot = Number(Math.trunc(subtot))
                    }
                    grandtot = subtot;

                    rowCount++;
                    $("#price_total").val(thousands_separators(grandtot.toFixed(2)));
                }else{
                    if (/\D/g.test(subtot))
                    {
                        // Filter comma
                        subtot = subtot.replace(/\,/g,"");
                        subtot = Number(Math.trunc(subtot))
                    }

                    old_grandtot = $("#price_total").val();
                    if (/\D/g.test(old_grandtot))
                    {
                        // Filter comma
                        old_grandtot = old_grandtot.replace(/\,/g,"");
                        old_grandtot = Number(Math.trunc(old_grandtot))
                    }
                    
                    console.log("subtotal: " + subtot + ", grandtot: " + grandtot);
                    sum = subtot + old_grandtot;

                    rowCount++;
                    $("#price_total").val(thousands_separators(sum.toFixed(2)));
                }
                counter++;
                $("#kode").prop('selectedIndex', 0).trigger('change');
                $("#nama_item").val('');
                $("#warna").val('');
                $("#hrgjual").val(0);
                $("#satuan").val('');
                $("#quantity").val(0);
                $("#merk").val('');
                $("#subtot").val('');
                $("#note").val('');
            });

            $(document).on("click", ".delete", function(e) {
                e.preventDefault();
                var r = confirm("Delete Transaksi ?");
                if (r == true) {
                    // counter_id = $(this).closest('tr').text();
                    counter_id = $('td').find('.numberclass').val();
                    console.log(counter_id);
                    subtot = $("#subtot_d_"+ counter_id).val().replaceAll(",", "");
                    
                    if (/\D/g.test(subtot))
                    {
                        // Filter comma
                        subtot = subtot.replace(/\,/g,"");
                        subtot = Number(Math.trunc(subtot))
                    }

                    old_grandtot = $("#price_total").val();

                    if (/\D/g.test(old_grandtot))
                    {
                        // Filter comma
                        old_grandtot = old_grandtot.replace(/\,/g,"");
                        old_grandtot = Number(Math.trunc(old_grandtot))
                    }

                    sum = old_grandtot - subtot;

                    rowCount--;
                    $("#price_total").val(thousands_separators(sum.toFixed(2)));
                    $(this).closest('tr').remove();

                    var table   = document.getElementById('datatable');
                    for (var i = 1; i < table.rows.length; i++) 
                    {
                    var firstCol = table.rows[i].cells[0];
                    firstCol.innerText = i;
                    }
                    counter--;
                } else {
                    return false;
                }
            });


            $(document).on("change", "#quantity", function(e) {
                if($('#quantity').val() == ''){
                    $('#quantity').val(0);
                }
                hrg = $('#hrgjual').val();
                if (/\D/g.test(hrg))
                {
                    // Filter comma
                    hrg = hrg.replace(/\,/g,"");
                    hrg = Number(Math.trunc(hrg))
                }
                console.log(hrg);
                var qty = this.value
                var total = parseInt(hrg) * parseInt(qty);               
                $("#subtot").val(thousands_separators(total.toFixed(2)));
            });

            $(document).on("change", "#hrgjual", function(e) {
                if($('#hrgjual').val() == ''){
                    $('#hrgjual').val(0);
                }
                $(this).val(thousands_separators($(this).val()));
                hrgparse = $('#hrgjual').val();
                if (/\D/g.test(hrgparse))
                {
                    // Filter comma
                    hrgparse = hrgparse.replace(/\,/g,"");
                    hrgparse = Number(Math.trunc(hrgparse))
                }
                var hrg = Number(hrgparse).toFixed(2);
                var qty = Number($("#quantity").val()).toFixed(2);
                var total = Number(hrg) * Number(qty);
                console.log(total);
            
            $("#subtot").val(thousands_separators(total.toFixed(2)));
            });
            
            $(document).on("change", "#kurs", function(e) {
                if($('#kurs').val() == ''){
                    $('#kurs').val(1);
                }
                $(this).val(thousands_separators($(this).val()));
            });

            $(document).on("click", "#hrgjual", function(e) {
                if (/\D/g.test(this.value))
                {
                    // Filter comma
                    this.value = this.value.replace(/\,/g,"");
                    this.value = Number(Math.trunc(this.value))
                }
            });
        });
        // VALIDATE TRIGGER
        $("#quantity").keyup(function(e){
            if (/\D/g.test(this.value)){
                // Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, '');
            }
        });
        $("#hrgjual").keyup(function(e){
            if (/\D/g.test(this.value)){
                // Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, '');
            }
        });

        
        $(document).on('focusout', '.row_qty', function(event) 
            {
                event.preventDefault();

                console.log("focus out");
                var tbl_row = $(this).closest('tr');
                var row_id = tbl_row.attr('row_id');

                subtot = $('#subtot_d_'+row_id).val();
                console.log("subtot : "+subtot);
                if (/\D/g.test(subtot))
                {
                    // Filter comma
                    subtot = subtot.replace(/\,/g,"");
                    subtot = Number(Math.trunc(subtot))
                }

                total = $('#price_total').val();
                console.log("total : "+total);
                if (/\D/g.test(total))
                {
                    // Filter comma
                    total = total.replace(/\,/g,"");
                    total = Number(Math.trunc(total))
                }

                total_old = total - subtot;

                qty = $(this).val();

                hrg = $('#hrgjual_d_'+row_id).val();
                if (/\D/g.test(hrg))
                {
                    // Filter comma
                    hrg = hrg.replace(/\,/g,"");
                    hrg = Number(Math.trunc(hrg))
                }

                sum = hrg * qty;
                $('#subtot_d_'+row_id).val(thousands_separators(sum.toFixed(2)));

                total_new = total_old + sum;

                $('#price_total').val(thousands_separators(total_new.toFixed(2)));
            })	
        
    })
</script>
@endsection
